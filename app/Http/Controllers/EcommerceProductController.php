<?php

namespace App\Http\Controllers;

use App\Models\EcommerceProduct;
use App\Models\Product;
use App\Models\ProductSerial;
use App\Models\Brand;
use App\Models\ParentCategorie;
use App\Models\SubCategorie;
use App\Http\Requests\StoreEcommerceProductRequest;
use App\Http\Requests\UpdateEcommerceProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EcommerceProductController extends Controller
{
    /**
     * Display a listing of e-commerce products.
     */
    public function index()
    {
        $products = EcommerceProduct::with([
            'warehouseProduct.brand',
            'warehouseProduct.parentCategorie',
            'warehouseProduct.subCategorie'
        ])->paginate(15);

        return view('e-commerce.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new e-commerce product.
     */
    public function create()
    {
        $brands = Brand::pluck('brand_title', 'id');
        $parentCategories = ParentCategorie::pluck('parent_categories', 'id');
        $subCategories = SubCategorie::pluck('sub_categorie', 'id');

        return view('e-commerce.products.create', compact('brands', 'parentCategories', 'subCategories'));
    }

    /**
     * Store a newly created e-commerce product.
     */
    public function store(StoreEcommerceProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validated();
            
            // Handle with_installation array
            if ($request->has('installation_options')) {
                $data['with_installation'] = array_filter($request->installation_options);
            }

            // Handle product_tags array
            if ($request->has('product_tags')) {
                $data['product_tags'] = is_array($request->product_tags) 
                    ? $request->product_tags 
                    : explode(',', $request->product_tags);
            }

            // Create the e-commerce product
            $ecommerceProduct = EcommerceProduct::create($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'E-commerce product created successfully!',
                'redirect' => route('ec.product.index')
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating e-commerce product: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the product: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified e-commerce product.
     */
    public function show($id)
    {
        $product = EcommerceProduct::with([
            'warehouseProduct.brand',
            'warehouseProduct.parentCategorie',
            'warehouseProduct.subCategorie',
            'warehouseProduct.warehouse',
            'warehouseProduct.warehouseRack',
            'warehouseProduct.productSerials' => function($query) {
                $query->where('status', 'active'); // Only show active serial numbers
            }
        ])->findOrFail($id);

        // Ensure product serials exist for the warehouse product if they don't exist based on stock quantity
        if ($product->warehouseProduct) {
            $this->ensureProductSerials($product->warehouseProduct);

            // Reload product with active serials only
            $product->warehouseProduct->load(['productSerials' => function($query) {
                $query->where('status', 'active');
            }]);
        }

        return view('e-commerce.products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified e-commerce product.
     */
    public function edit($id)
    {
        $product = EcommerceProduct::with([
            'warehouseProduct.brand',
            'warehouseProduct.parentCategorie',
            'warehouseProduct.subCategorie',
            'warehouseProduct.warehouse',
            'warehouseProduct.warehouseRack',
            'warehouseProduct.productSerials' => function($query) {
                $query->where('status', 'active');
            }
        ])->findOrFail($id);

        $brands = Brand::pluck('brand_title', 'id');
        $parentCategories = ParentCategorie::pluck('parent_categories', 'id');
        $subCategories = SubCategorie::pluck('sub_categorie', 'id');

        return view('e-commerce.products.edit', compact('product', 'brands', 'parentCategories', 'subCategories'));
    }

    /**
     * Update the specified e-commerce product.
     */
    public function update(UpdateEcommerceProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $product = EcommerceProduct::findOrFail($id);
            $data = $request->validated();

            // Handle with_installation array
            if ($request->has('installation_options')) {
                $data['with_installation'] = array_filter($request->installation_options);
            }

            // Handle product_tags array
            if ($request->has('product_tags')) {
                $tags = is_array($request->product_tags)
                    ? $request->product_tags
                    : array_map('trim', explode(',', $request->product_tags));
                $data['product_tags'] = array_filter($tags); // Remove empty tags
            }

            // Handle image uploads
            if ($request->hasFile('product_images')) {
                $imagePaths = [];
                foreach ($request->file('product_images') as $image) {
                    $path = $image->store('ecommerce/products', 'public');
                    $imagePaths[] = $path;
                }

                // Merge with existing images if any
                $existingImages = $product->product_images ?? [];
                $data['product_images'] = array_merge($existingImages, $imagePaths);
            }

            // Handle image removal
            if ($request->has('remove_images')) {
                $existingImages = $product->product_images ?? [];
                $removeIndices = $request->remove_images;

                foreach ($removeIndices as $index) {
                    if (isset($existingImages[$index])) {
                        // Delete the file from storage
                        Storage::disk('public')->delete($existingImages[$index]);
                        unset($existingImages[$index]);
                    }
                }

                $data['product_images'] = array_values($existingImages); // Re-index array
            }

            // Auto-generate URL slug if not provided
            if (empty($data['meta_product_url_slug']) && !empty($data['meta_title'])) {
                $data['meta_product_url_slug'] = Str::slug($data['meta_title']);
            }

            $product->update($data);

            DB::commit();

            // Return appropriate response based on request type
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'E-commerce product updated successfully!',
                    'redirect' => route('ec.product.view', $product->id)
                ]);
            }

            return redirect()->route('ec.product.view', $product->id)
                           ->with('success', 'E-commerce product updated successfully!');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating e-commerce product: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while updating the product: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                           ->withInput()
                           ->withErrors(['error' => 'An error occurred while updating the product: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified e-commerce product.
     */
    public function destroy($id)
    {
        try {
            $product = EcommerceProduct::findOrFail($id);
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'E-commerce product deleted successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('Error deleting e-commerce product: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the product: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search warehouse products for auto-fill functionality.
     */
    public function searchWarehouseProducts(Request $request)
    {
        $query = $request->get('query');
        
        if (empty($query) || strlen($query) < 2) {
            return response()->json([]);
        }

        $products = Product::with(['brand', 'parentCategorie', 'subCategorie'])
            ->where(function($q) use ($query) {
                $q->where('product_name', 'LIKE', "%{$query}%")
                  ->orWhere('sku', 'LIKE', "%{$query}%")
                  ->orWhere('serial_no', 'LIKE', "%{$query}%");
            })
            ->where('status', 'active')
            ->limit(10)
            ->get();

        $results = $products->map(function($product) {
            return [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'sku' => $product->sku,
                'serial_no' => $product->serial_no,
                'brand_name' => $product->brand->brand_title ?? '',
                'category_name' => $product->parentCategorie->parent_categories ?? '',
                'subcategory_name' => $product->subCategorie->sub_categorie ?? '',
                'short_description' => $product->short_description,
                'full_description' => $product->full_description,
                'technical_specification' => $product->technical_specification,
                'brand_warranty' => $product->brand_warranty,
                'cost_price' => $product->cost_price,
                'selling_price' => $product->selling_price,
                'discount_price' => $product->discount_price,
                'tax' => $product->tax,
                'final_price' => $product->final_price,
                'stock_quantity' => $product->stock_quantity,
                'stock_status' => $product->stock_status,
                'main_product_image' => $product->main_product_image,
                'additional_product_images' => $product->additional_product_images,
                'brand_id' => $product->brand_id,
                'parent_category_id' => $product->parent_category_id,
                'sub_category_id' => $product->sub_category_id,
                'model_no' => $product->model_no,
                'hsn_code' => $product->hsn_code,
                'display_text' => $product->product_name . ' - ' . $product->sku . ($product->brand ? ' (' . $product->brand->brand_title . ')' : '')
            ];
        });

        return response()->json($results);
    }

    /**
     * Get warehouse product details by ID for auto-fill.
     */
    public function getWarehouseProduct($id)
    {
        try {
            $product = Product::with(['brand', 'parentCategorie', 'subCategorie'])->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'product' => [
                    'id' => $product->id,
                    'product_name' => $product->product_name,
                    'sku' => $product->sku,
                    'serial_no' => $product->serial_no,
                    'brand_name' => $product->brand->brand_title ?? '',
                    'category_name' => $product->parentCategorie->parent_categories ?? '',
                    'subcategory_name' => $product->subCategorie->sub_categorie ?? '',
                    'short_description' => $product->short_description,
                    'full_description' => $product->full_description,
                    'technical_specification' => $product->technical_specification,
                    'brand_warranty' => $product->brand_warranty,
                    'cost_price' => $product->cost_price,
                    'selling_price' => $product->selling_price,
                    'discount_price' => $product->discount_price,
                    'tax' => $product->tax,
                    'final_price' => $product->final_price,
                    'stock_quantity' => $product->stock_quantity,
                    'stock_status' => $product->stock_status,
                    'main_product_image' => $product->main_product_image,
                    'additional_product_images' => $product->additional_product_images,
                    'brand_id' => $product->brand_id,
                    'parent_category_id' => $product->parent_category_id,
                    'sub_category_id' => $product->sub_category_id,
                    'model_no' => $product->model_no,
                    'hsn_code' => $product->hsn_code
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }
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
}
