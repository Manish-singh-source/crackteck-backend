<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\ParentCategorie;
use App\Models\Product;
use App\Models\ProductSerial;
use App\Models\ProductVariantAttribute;
use App\Models\ProductVariantAttributeValue;
use App\Models\ScrapItem;
use App\Models\SubCategorie;
use App\Models\Warehouse;
use App\Models\WarehouseRack;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductListController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'parentCategorie', 'subCategorie', 'warehouse', 'warehouseRack'])->get();
        return view('/warehouse/product-list/index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::pluck('brand_title', 'id');
        $parentCategories = ParentCategorie::pluck('parent_categories', 'id');
        $subCategories = SubCategorie::pluck('sub_categorie', 'id');
        $warehouses = Warehouse::pluck('warehouse_name', 'id');
        $warehouseRacks = WarehouseRack::pluck('rack_name', 'id');

        $zoneAreas = WarehouseRack::pluck('zone_area', 'id');
        $rackNo = WarehouseRack::pluck('rack_no', 'id');
        $levelNo = WarehouseRack::pluck('level_no', 'id');
        $positionNo = WarehouseRack::pluck('position_no', 'id');

        // Get variation options
        $colorOptions = ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Color');
        })->pluck('attribute_value', 'id');
        // dd($colorOptions);

        $sizeOptions = ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Size');
        })->pluck('attribute_value', 'id');

        $lengthOptions = ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Length');
        })->pluck('attribute_value', 'id');

        return view('/warehouse/product-list/create', compact(
            'brands', 'parentCategories', 'subCategories', 'warehouses', 'warehouseRacks',
            'zoneAreas', 'rackNo', 'levelNo', 'positionNo',
            'colorOptions', 'sizeOptions', 'lengthOptions'
        ));
    }

    public function store(StoreProductRequest $request)
    {

        $product = new Product();
        $product->fill($request->except(['main_product_image', 'additional_product_images', 'invoice_pdf', 'datasheet_manual']));

        // Handle file uploads
        if ($request->hasFile('main_product_image')) {
            $file = $request->file('main_product_image');
            $filename = time() . '_main.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/images'), $filename);
            $product->main_product_image = 'uploads/products/images/' . $filename;
        }

        if ($request->hasFile('additional_product_images')) {
            $additionalImages = [];
            foreach ($request->file('additional_product_images') as $index => $file) {
                $filename = time() . '_additional_' . $index . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products/images'), $filename);
                $additionalImages[] = 'uploads/products/images/' . $filename;
            }
            $product->additional_product_images = $additionalImages;
        }

        if ($request->hasFile('invoice_pdf')) {
            $file = $request->file('invoice_pdf');
            $filename = time() . '_invoice.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/documents'), $filename);
            $product->invoice_pdf = 'uploads/products/documents/' . $filename;
        }

        if ($request->hasFile('datasheet_manual')) {
            $file = $request->file('datasheet_manual');
            $filename = time() . '_datasheet.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/documents'), $filename);
            $product->datasheet_manual = 'uploads/products/documents/' . $filename;
        }

        // Calculate final price
        $finalPrice = $product->selling_price;
        if ($product->discount_price) {
            $finalPrice = $product->discount_price;
        }
        if ($product->tax) {
            $finalPrice = $finalPrice + ($finalPrice * $product->tax / 100);
        }
        $product->final_price = $finalPrice;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function view($id)
    {
        $product = Product::with([
            'brand',
            'parentCategorie',
            'subCategorie',
            'warehouse',
            'warehouseRack',
            'productSerials' => function($query) {
                $query->where('status', 'active'); // Only show active serial numbers
            }
        ])->findOrFail($id);

        // Create product serials if they don't exist based on stock quantity
        $this->ensureProductSerials($product);

        // Reload product with active serials only
        $product->load(['productSerials' => function($query) {
            $query->where('status', 'active');
        }]);

        return view('/warehouse/product-list/view', compact('product'));
    }

    /**
     * Ensure product serials exist for the product based on stock quantity
     */
    private function ensureProductSerials(Product $product)
    {
        $stockQuantity = $product->stock_quantity ?? 0;
        $existingSerials = $product->productSerials()->count();

        // If we need more serials, create them
        if ($existingSerials < $stockQuantity) {
            $serialsToCreate = $stockQuantity - $existingSerials;

            for ($i = 0; $i < $serialsToCreate; $i++) {
                $autoSerial = ProductSerial::generateAutoSerial($product->id);

                ProductSerial::create([
                    'product_id' => $product->id,
                    'auto_generated_serial' => $autoSerial,
                    'final_serial' => $autoSerial,
                    'is_manual' => false,
                    'status' => 'active'
                ]);
            }
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::pluck('brand_title', 'id');
        $parentCategories = ParentCategorie::pluck('parent_categories', 'id');
        $subCategories = SubCategorie::pluck('sub_categorie', 'id');
        $warehouses = Warehouse::pluck('warehouse_name', 'id');
        $warehouseRacks = WarehouseRack::pluck('rack_name', 'id');

        $zoneAreas = WarehouseRack::pluck('zone_area', 'id');
        $rackNo = WarehouseRack::pluck('rack_no', 'id');
        $levelNo = WarehouseRack::pluck('level_no', 'id');
        $positionNo = WarehouseRack::pluck('position_no', 'id');

        // Get variation options
        $colorOptions = ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Color');
        })->pluck('attribute_value', 'id');

        $sizeOptions = ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Size');
        })->pluck('attribute_value', 'id');

        $lengthOptions = ProductVariantAttributeValue::whereHas('attribute', function($query) {
            $query->where('attribute_name', 'Length');
        })->pluck('attribute_value', 'id');

        return view('/warehouse/product-list/edit', compact(
            'product', 'brands', 'parentCategories', 'subCategories', 'warehouses', 'warehouseRacks',
            'zoneAreas', 'rackNo', 'levelNo', 'positionNo',
            'colorOptions', 'sizeOptions', 'lengthOptions'
        ));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->fill($request->except(['main_product_image', 'additional_product_images', 'invoice_pdf', 'datasheet_manual']));

        // Handle file uploads
        if ($request->hasFile('main_product_image')) {
            // Delete old file if exists
            if ($product->main_product_image && file_exists(public_path($product->main_product_image))) {
                unlink(public_path($product->main_product_image));
            }

            $file = $request->file('main_product_image');
            $filename = time() . '_main.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/images'), $filename);
            $product->main_product_image = 'uploads/products/images/' . $filename;
        }

        if ($request->hasFile('additional_product_images')) {
            // Delete old files if exist
            if ($product->additional_product_images) {
                foreach ($product->additional_product_images as $oldImage) {
                    if (file_exists(public_path($oldImage))) {
                        unlink(public_path($oldImage));
                    }
                }
            }

            $additionalImages = [];
            foreach ($request->file('additional_product_images') as $index => $file) {
                $filename = time() . '_additional_' . $index . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products/images'), $filename);
                $additionalImages[] = 'uploads/products/images/' . $filename;
            }
            $product->additional_product_images = $additionalImages;
        }

        if ($request->hasFile('invoice_pdf')) {
            // Delete old file if exists
            if ($product->invoice_pdf && file_exists(public_path($product->invoice_pdf))) {
                unlink(public_path($product->invoice_pdf));
            }

            $file = $request->file('invoice_pdf');
            $filename = time() . '_invoice.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/documents'), $filename);
            $product->invoice_pdf = 'uploads/products/documents/' . $filename;
        }

        if ($request->hasFile('datasheet_manual')) {
            // Delete old file if exists
            if ($product->datasheet_manual && file_exists(public_path($product->datasheet_manual))) {
                unlink(public_path($product->datasheet_manual));
            }

            $file = $request->file('datasheet_manual');
            $filename = time() . '_datasheet.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/documents'), $filename);
            $product->datasheet_manual = 'uploads/products/documents/' . $filename;
        }

        // Calculate final price
        $finalPrice = $product->selling_price;
        if ($product->discount_price) {
            $finalPrice = $product->discount_price;
        }
        if ($product->tax) {
            $finalPrice = $finalPrice + ($finalPrice * $product->tax / 100);
        }
        $product->final_price = $finalPrice;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete associated files
        if ($product->main_product_image && file_exists(public_path($product->main_product_image))) {
            unlink(public_path($product->main_product_image));
        }

        if ($product->additional_product_images) {
            foreach ($product->additional_product_images as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        }

        if ($product->invoice_pdf && file_exists(public_path($product->invoice_pdf))) {
            unlink(public_path($product->invoice_pdf));
        }

        if ($product->datasheet_manual && file_exists(public_path($product->datasheet_manual))) {
            unlink(public_path($product->datasheet_manual));
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function scrapItems()
    {
        $scrapItems = ScrapItem::with(['product', 'productSerial'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('/warehouse/product-list/scrap-items', compact('scrapItems'));
    }

    public function scrapProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'serial_ids' => 'required|string',
            'reason' => 'required|string|max:500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $serialIds = array_map('trim', explode(',', $request->serial_ids));
            $scrappedCount = 0;
            $errors = [];

            foreach ($serialIds as $serialId) {
                if (empty($serialId)) continue;

                // Find the product serial
                $productSerial = ProductSerial::where('final_serial', $serialId)
                    ->where('status', 'active')
                    ->first();

                if (!$productSerial) {
                    $errors[] = "Serial ID '{$serialId}' not found or already inactive";
                    continue;
                }

                $product = $productSerial->product;
                if (!$product) {
                    $errors[] = "Product not found for serial ID '{$serialId}'";
                    continue;
                }

                // Create scrap item record
                ScrapItem::create([
                    'product_id' => $product->id,
                    'product_serial_id' => $productSerial->id,
                    'serial_number' => $serialId,
                    'product_name' => $product->product_name,
                    'product_sku' => $product->sku,
                    'reason' => $request->reason,
                    'quantity_scrapped' => 1,
                    'scrapped_at' => now(),
                    'scrapped_by' => auth()->user()->name ?? 'System'
                ]);

                // Update product serial status
                $productSerial->update(['status' => 'damaged']);

                // Decrease product quantity
                if ($product->stock_quantity > 0) {
                    $product->decrement('stock_quantity', 1);
                }

                $scrappedCount++;
            }

            DB::commit();

            if ($scrappedCount > 0) {
                $message = $scrappedCount . ' item(s) scrapped successfully';
                if (!empty($errors)) {
                    $message .= '. Some items had errors: ' . implode(', ', $errors);
                }
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'scrapped_count' => $scrappedCount
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No items were scrapped. Errors: ' . implode(', ', $errors)
                ], 400);
            }

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while scrapping items: ' . $e->getMessage()
            ], 500);
        }
    }

    public function restoreProduct(Request $request, $scrapItemId)
    {
        try {
            DB::beginTransaction();

            $scrapItem = ScrapItem::with(['product', 'productSerial'])->findOrFail($scrapItemId);

            // Restore the product serial status
            if ($scrapItem->productSerial) {
                $scrapItem->productSerial->update(['status' => 'active']);
            }

            // Increase product quantity
            if ($scrapItem->product) {
                $scrapItem->product->increment('stock_quantity', $scrapItem->quantity_scrapped);
            }

            // Delete the scrap item record
            $scrapItem->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Product restored successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while restoring the product: ' . $e->getMessage()
            ], 500);
        }
    }

    public function ec_index()
    {
        return view('/e-commerce/products/index');
    }

    public function ec_create()
    {
        $brand = Brand::pluck('brand_title', 'id');
        $parentCategorie = ParentCategorie::pluck('parent_categories', 'id');
        $subcategorie = SubCategorie::pluck('sub_categorie', 'id');
        return view('/e-commerce/products/create', compact('brand', 'parentCategorie', 'subcategorie'));
    }

    public function ec_view()
    {
        return view('/e-commerce/products/view');
    }

    public function ec_edit()
    {
        return view('/e-commerce/products/edit');
    }

    public function ec_scrapItems()
    {
        return view('/e-commerce/products/scrap-items');
    }

    /**
     * Save or update a product serial number
     */
    public function saveSerial(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'serial_id' => 'required|exists:product_serials,id',
            'manual_serial' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $productSerial = ProductSerial::findOrFail($request->serial_id);

            // Check if manual serial is provided and if it's unique
            if ($request->manual_serial) {
                $existingSerial = ProductSerial::where('final_serial', $request->manual_serial)
                    ->where('id', '!=', $productSerial->id)
                    ->first();

                if ($existingSerial) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Serial number already exists. Please use a unique serial number.'
                    ], 422);
                }

                $productSerial->manual_serial = $request->manual_serial;
                $productSerial->final_serial = $request->manual_serial;
                $productSerial->is_manual = true;
            } else {
                // If no manual serial provided, use auto-generated
                $productSerial->manual_serial = null;
                $productSerial->final_serial = $productSerial->auto_generated_serial;
                $productSerial->is_manual = false;
            }

            $productSerial->save();

            return response()->json([
                'success' => true,
                'message' => 'Serial number saved successfully',
                'data' => [
                    'final_serial' => $productSerial->final_serial,
                    'is_manual' => $productSerial->is_manual
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the serial number'
            ], 500);
        }
    }

}
