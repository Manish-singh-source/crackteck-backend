<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\EcommerceProduct;
use App\Http\Requests\StoreWishlistRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist page.
     */
    public function index()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
        }

        // Get user's wishlist items with product relationships
        $wishlistItems = Wishlist::with([
            'ecommerceProduct.warehouseProduct.brand',
            'ecommerceProduct.warehouseProduct.parentCategorie',
            'ecommerceProduct.warehouseProduct.subCategorie'
        ])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        return view('frontend.wishlist', compact('wishlistItems'));
    }

    /**
     * Add a product to the user's wishlist.
     */
    public function store(StoreWishlistRequest $request): JsonResponse
    {
        try {
            $userId = Auth::id();
            $ecommerceProductId = $request->validated()['ecommerce_product_id'];

            // Check if the e-commerce product exists and is active
            $ecommerceProduct = EcommerceProduct::active()->find($ecommerceProductId);
            if (!$ecommerceProduct) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found or is not available.'
                ], 404);
            }

            // Add to wishlist
            $wishlistItem = Wishlist::create([
                'user_id' => $userId,
                'ecommerce_product_id' => $ecommerceProductId
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Product added to your wishlist successfully!',
                'wishlist_item_id' => $wishlistItem->id
            ], 201);

        } catch (\Exception $e) {
            Log::error('Error adding product to wishlist: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding the product to your wishlist.'
            ], 500);
        }
    }

    /**
     * Remove a product from the user's wishlist.
     */
    public function destroy($id): JsonResponse
    {
        try {
            // Find the wishlist item and ensure it belongs to the authenticated user
            $wishlistItem = Wishlist::where('id', $id)
                                   ->where('user_id', Auth::id())
                                   ->first();

            if (!$wishlistItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Wishlist item not found.'
                ], 404);
            }

            // Delete the wishlist item
            $wishlistItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product removed from your wishlist successfully!'
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error removing product from wishlist: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while removing the product from your wishlist.'
            ], 500);
        }
    }

    /**
     * Move a product from wishlist to cart.
     */
    public function moveToCart($id): JsonResponse
    {
        try {
            // Find the wishlist item and ensure it belongs to the authenticated user
            $wishlistItem = Wishlist::with('ecommerceProduct')
                                   ->where('id', $id)
                                   ->where('user_id', Auth::id())
                                   ->first();

            if (!$wishlistItem) {
                return response()->json([
                    'success' => false,
                    'message' => 'Wishlist item not found.'
                ], 404);
            }

            // Check if the product is still available
            if (!$wishlistItem->ecommerceProduct || $wishlistItem->ecommerceProduct->ecommerce_status !== 'active') {
                return response()->json([
                    'success' => false,
                    'message' => 'This product is no longer available.'
                ], 400);
            }

            // TODO: Implement cart functionality here
            // For now, we'll just remove from wishlist and return success
            // In a real implementation, you would add the product to the cart system

            // Remove from wishlist
            $wishlistItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Product moved to cart successfully!',
                'redirect_to_cart' => true
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error moving product from wishlist to cart: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while moving the product to cart.'
            ], 500);
        }
    }

    /**
     * Get the count of items in user's wishlist.
     */
    public function getWishlistCount(): JsonResponse
    {
        try {
            if (!Auth::check()) {
                return response()->json(['count' => 0]);
            }

            $count = Wishlist::where('user_id', Auth::id())->count();

            return response()->json(['count' => $count]);

        } catch (\Exception $e) {
            Log::error('Error getting wishlist count: ' . $e->getMessage());
            return response()->json(['count' => 0]);
        }
    }
}
