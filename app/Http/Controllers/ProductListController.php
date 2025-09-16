<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Categorie;
use App\Models\ParentCategorie;
use App\Models\Product;
use App\Models\ProductVariantAttribute;
use App\Models\ProductVariantAttributeValue;
use App\Models\SubCategorie;
use App\Models\Warehouse;
use App\Models\WarehouseRack;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        $product = Product::with(['brand', 'parentCategorie', 'subCategorie', 'warehouse', 'warehouseRack'])->findOrFail($id);
        return view('/warehouse/product-list/view', compact('product'));
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
        $scrapProducts = Product::where('status', 'Inactive')->get();
        return view('/warehouse/product-list/scrap-items', compact('scrapProducts'));
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
    
}
