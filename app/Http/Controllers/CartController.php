<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\EcommerceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    /**
     * Display the user's cart page.
     */
    public function index()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }

        // Get user's cart items with product relationships
        $cartItems = Cart::with([
            'ecommerceProduct.warehouseProduct.brand',
            'ecommerceProduct.warehouseProduct.parentCategorie',
            'ecommerceProduct.warehouseProduct.subCategorie'
        ])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        // Debug: Check if relationships are loaded properly
        foreach ($cartItems as $item) {
            if (!$item->ecommerceProduct || !$item->ecommerceProduct->warehouseProduct) {
                \Log::warning('Cart item missing product relationship', [
                    'cart_id' => $item->id,
                    'ecommerce_product_id' => $item->ecommerce_product_id,
                    'has_ecommerce_product' => !is_null($item->ecommerceProduct),
                    'has_warehouse_product' => $item->ecommerceProduct ? !is_null($item->ecommerceProduct->warehouseProduct) : false
                ]);
            }
        }

        // Calculate totals
        $subtotal = Cart::getCartTotal(Auth::id());
        $cartCount = Cart::getCartCount(Auth::id());

        return view('frontend.shop-cart', compact('cartItems', 'subtotal', 'cartCount'));
    }

    /**
     * Add product to cart via AJAX.
     */
    public function store(Request $request): JsonResponse
    {
        // Check authentication
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add items to cart.',
                'requires_auth' => true
            ], 401);
        }

        $request->validate([
            'ecommerce_product_id' => 'required|exists:ecommerce_products,id',
            'quantity' => 'integer|min:1|max:100'
        ]);

        $productId = $request->ecommerce_product_id;
        $quantity = $request->quantity ?? 1;
        $userId = Auth::id();

        // Check if product exists and is active
        $product = EcommerceProduct::with('warehouseProduct')
            ->where('id', $productId)
            ->where('ecommerce_status', 'active')
            ->first();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found or not available.'
            ], 404);
        }

        // Check if product is already in cart
        $existingCartItem = Cart::getCartItem($userId, $productId);

        if ($existingCartItem) {
            // Update quantity
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();

            return response()->json([
                'success' => true,
                'message' => 'Product quantity updated in cart.',
                'action' => 'updated',
                'cart_count' => Cart::getCartCount($userId),
                'cart_total' => Cart::getCartTotal($userId)
            ]);
        } else {
            // Add new item to cart
            Cart::create([
                'user_id' => $userId,
                'ecommerce_product_id' => $productId,
                'quantity' => $quantity
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully.',
                'action' => 'added',
                'cart_count' => Cart::getCartCount($userId),
                'cart_total' => Cart::getCartTotal($userId)
            ]);
        }
    }

    /**
     * Update cart item quantity via AJAX.
     */
    public function update(Request $request, $id): JsonResponse
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to update cart.',
                'requires_auth' => true
            ], 401);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:100'
        ]);

        $cartItem = Cart::with('ecommerceProduct.warehouseProduct')
                       ->where('id', $id)
                       ->where('user_id', Auth::id())
                       ->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.'
            ], 404);
        }

        // Check if product and warehouse product exist
        if (!$cartItem->ecommerceProduct || !$cartItem->ecommerceProduct->warehouseProduct) {
            return response()->json([
                'success' => false,
                'message' => 'Product information not found.'
            ], 404);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        // Get the product price for JavaScript calculation
        $productPrice = $cartItem->ecommerceProduct->warehouseProduct->selling_price ?? 0;

        // Ensure price is numeric
        $productPrice = is_numeric($productPrice) ? (float)$productPrice : 0;

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully.',
            'item_price' => $productPrice,
            'item_total' => $productPrice * $cartItem->quantity,
            'cart_count' => Cart::getCartCount(Auth::id()),
            'cart_total' => Cart::getCartTotal(Auth::id())
        ]);
    }

    /**
     * Remove product from cart via AJAX.
     */
    public function destroy($id): JsonResponse
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to remove items from cart.',
                'requires_auth' => true
            ], 401);
        }

        $cartItem = Cart::where('id', $id)
                       ->where('user_id', Auth::id())
                       ->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.'
            ], 404);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart.',
            'cart_count' => Cart::getCartCount(Auth::id()),
            'cart_total' => Cart::getCartTotal(Auth::id())
        ]);
    }

    /**
     * Get cart data for sidebar via AJAX.
     */
    public function getCartData(): JsonResponse
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'cart_items' => [],
                'cart_count' => 0,
                'cart_total' => 0,
                'requires_auth' => true
            ]);
        }

        $cartItems = Cart::with([
            'ecommerceProduct.warehouseProduct'
        ])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($item) {
            return [
                'id' => $item->id,
                'product_id' => $item->ecommerce_product_id,
                'product_name' => $item->ecommerceProduct->warehouseProduct->product_name ?? 'Unknown Product',
                'product_image' => $item->ecommerceProduct->warehouseProduct->main_product_image ?? '',
                'selling_price' => $item->ecommerceProduct->warehouseProduct->selling_price ?? 0,
                'quantity' => $item->quantity,
                'total_price' => ($item->ecommerceProduct->warehouseProduct->selling_price ?? 0) * $item->quantity
            ];
        });

        return response()->json([
            'success' => true,
            'cart_items' => $cartItems,
            'cart_count' => Cart::getCartCount(Auth::id()),
            'cart_total' => Cart::getCartTotal(Auth::id())
        ]);
    }

    /**
     * Get cart count for header badge via AJAX.
     */
    public function getCartCount(): JsonResponse
    {
        if (!Auth::check()) {
            return response()->json([
                'cart_count' => 0
            ]);
        }

        return response()->json([
            'cart_count' => Cart::getCartCount(Auth::id())
        ]);
    }

    /**
     * Check if product is in user's cart.
     */
    public function checkCartStatus(Request $request): JsonResponse
    {
        if (!Auth::check()) {
            return response()->json([
                'in_cart' => false
            ]);
        }

        $productId = $request->product_id;
        $inCart = Cart::isInCart(Auth::id(), $productId);

        return response()->json([
            'in_cart' => $inCart
        ]);
    }
}
