<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function listProducts(Request $request)
    {
                if($request->filled('search')) {
            $products = Product::where('product_name', 'like', "%{$request->search}%")->get();
        }else {            
            $products = Product::get();
        }

        return response()->json(['products' => $products], 200);
    }

    public function product(Request $request, $product_id) {
        
        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json(['product' => $product], 200);
    }
}
