<?php

namespace App\Http\Controllers\Api;

use App\Models\EcommerceProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //Sales Person and Customer
    public function listProducts(Request $request)
    {
        if ($request->filled('search')) {
            $products = EcommerceProduct::where('product_name', 'like', "%{$request->search}%")->get();
        } else {
            $products = EcommerceProduct::get();
        }

        return response()->json(['products' => $products], 200);
    }

    public function product(Request $request, $product_id)
    {

        $product = EcommerceProduct::find($product_id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(['product' => $product], 200);
    }

    // Engineer 

    public function allListProducts(Request $request)
    {
        if ($request->filled('search')) {
            $products = Product::where('product_name', 'like', "%{$request->search}%")->get();
        } else {
            $products = Product::get();
        }

        return response()->json(['products' => $products], 200);
    }

    public function allProduct(Request $request, $product_id)
    {

        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(['product' => $product], 200);
    }
}
