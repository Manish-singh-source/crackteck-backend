<?php

namespace App\Http\Controllers;

use App\Models\ProductDeal;
use App\Models\EcommerceProduct;
use App\Http\Requests\StoreProductDealRequest;
use App\Http\Requests\UpdateProductDealRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductDealController extends Controller
{
    /**
     * Display a listing of product deals.
     */
    public function index()
    {
        $deals = ProductDeal::with(['ecommerceProduct.warehouseProduct'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('e-commerce.product-deals.index', compact('deals'));
    }

    /**
     * Show the form for creating a new product deal.
     */
    public function create()
    {
        return view('e-commerce.product-deals.create');
    }

    /**
     * Store a newly created product deal in storage.
     */
    public function store(StoreProductDealRequest $request)
    {
        $validated = $request->validated();

        // Get the e-commerce product to calculate offer price
        $ecommerceProduct = EcommerceProduct::with('warehouseProduct')->findOrFail($validated['ecommerce_product_id']);
        $originalPrice = $ecommerceProduct->warehouseProduct->selling_price;

        // Calculate offer price based on discount type
        if ($validated['discount_type'] === 'percentage') {
            $offerPrice = $originalPrice - ($originalPrice * $validated['discount_value'] / 100);
        } else {
            $offerPrice = $originalPrice - $validated['discount_value'];
        }

        $validated['original_price'] = $originalPrice;
        $validated['offer_price'] = $offerPrice;

        ProductDeal::create($validated);

        return redirect()->route('product-deals.index')->with('success', 'Product deal created successfully!');
    }

    /**
     * Display the specified product deal.
     */
    public function show(ProductDeal $productDeal)
    {
        $productDeal->load(['ecommerceProduct.warehouseProduct']);
        return view('e-commerce.product-deals.view', compact('productDeal'));
    }

    /**
     * Show the form for editing the specified product deal.
     */
    public function edit(ProductDeal $productDeal)
    {
        $productDeal->load(['ecommerceProduct.warehouseProduct']);
        return view('e-commerce.product-deals.edit', compact('productDeal'));
    }

    /**
     * Update the specified product deal in storage.
     */
    public function update(UpdateProductDealRequest $request, ProductDeal $productDeal)
    {
        $validated = $request->validated();

        // Get the e-commerce product to calculate offer price
        $ecommerceProduct = EcommerceProduct::with('warehouseProduct')->findOrFail($validated['ecommerce_product_id']);
        $originalPrice = $ecommerceProduct->warehouseProduct->selling_price;

        // Calculate offer price based on discount type
        if ($validated['discount_type'] === 'percentage') {
            $offerPrice = $originalPrice - ($originalPrice * $validated['discount_value'] / 100);
        } else {
            $offerPrice = $originalPrice - $validated['discount_value'];
        }

        $validated['original_price'] = $originalPrice;
        $validated['offer_price'] = $offerPrice;

        $productDeal->update($validated);

        return redirect()->route('product-deals.index')->with('success', 'Product deal updated successfully!');
    }

    /**
     * Remove the specified product deal from storage.
     */
    public function destroy(ProductDeal $productDeal)
    {
        $productDeal->delete();
        return redirect()->route('product-deals.index')->with('success', 'Product deal deleted successfully!');
    }

    /**
     * Search for e-commerce products via AJAX.
     */
    public function searchEcommerceProducts(Request $request): JsonResponse
    {
        $search = $request->get('search', '');

        $products = EcommerceProduct::with(['warehouseProduct.brand'])
            ->where(function ($query) use ($search) {
                // Search in e-commerce product SKU
                $query->where('sku', 'LIKE', "%{$search}%")
                      // Or search in warehouse product name and SKU
                      ->orWhereHas('warehouseProduct', function ($subQuery) use ($search) {
                          $subQuery->where('product_name', 'LIKE', "%{$search}%")
                                   ->orWhere('sku', 'LIKE', "%{$search}%");
                      });
            })
            ->whereHas('warehouseProduct', function ($query) {
                $query->where('status', 'active');
            })
            ->where('ecommerce_status', 'active')
            ->limit(10)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->warehouseProduct->product_name,
                    'sku' => $product->sku, // E-commerce SKU
                    'warehouse_sku' => $product->warehouseProduct->sku, // Warehouse SKU
                    'brand' => $product->warehouseProduct->brand->brand_title ?? 'N/A',
                    'selling_price' => $product->warehouseProduct->selling_price,
                    'image' => $product->warehouseProduct->main_product_image,
                    'display_text' => $product->warehouseProduct->product_name . ' (SKU: ' . $product->sku . ')',
                ];
            });

        return response()->json($products);
    }

    /**
     * Get specific e-commerce product details via AJAX.
     */
    public function getEcommerceProduct($id): JsonResponse
    {
        $product = EcommerceProduct::with(['warehouseProduct.brand'])
            ->where('id', $id)
            ->where('ecommerce_status', 'active')
            ->whereHas('warehouseProduct', function ($query) {
                $query->where('status', 'active');
            })
            ->first();

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->warehouseProduct->product_name,
            'brand' => $product->warehouseProduct->brand->brand_title ?? 'N/A',
            'selling_price' => $product->warehouseProduct->selling_price,
            'image' => $product->warehouseProduct->main_product_image,
        ]);
    }
}
