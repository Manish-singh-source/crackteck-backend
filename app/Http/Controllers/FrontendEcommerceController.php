<?php

namespace App\Http\Controllers;

use App\Models\EcommerceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendEcommerceController extends Controller
{
    /**
     * Display the e-commerce shop page with products from ecommerce_products table
     */
    public function shop()
    {
        // Get active e-commerce products with their warehouse product relationships
        $products = EcommerceProduct::with([
            'warehouseProduct.brand',
            'warehouseProduct.parentCategorie',
            'warehouseProduct.subCategorie'
        ])
        ->active() // Only active products
        ->paginate(12); // Paginate for better performance

        return view('frontend.ecommerce-shop', compact('products'));
    }

    /**
     * Display individual product detail page
     */
    public function productDetail($id)
    {
        // Get the specific e-commerce product with all relationships
        $product = EcommerceProduct::with([
            'warehouseProduct.brand',
            'warehouseProduct.parentCategorie',
            'warehouseProduct.subCategorie'
        ])
        ->active()
        ->findOrFail($id);

        // Track recently viewed products
        $this->trackRecentlyViewed($id);

        // Get recently viewed products (excluding current product)
        $recentlyViewed = $this->getRecentlyViewedProducts($id);

        // Get related products based on category
        $relatedProducts = $this->getRelatedProducts($product, 8);

        // Generate product features list from description
        $productFeatures = $this->extractProductFeatures($product);

        return view('frontend.ecommerce-product-detail', compact(
            'product',
            'recentlyViewed',
            'relatedProducts',
            'productFeatures'
        ));
    }

    /**
     * Track recently viewed products in session
     */
    private function trackRecentlyViewed($productId)
    {
        $recentlyViewed = Session::get('recently_viewed', []);

        // Remove product if it already exists to avoid duplicates
        $recentlyViewed = array_filter($recentlyViewed, function($id) use ($productId) {
            return $id != $productId;
        });

        // Add current product to the beginning of the array
        array_unshift($recentlyViewed, $productId);

        // Keep only the last 10 viewed products
        $recentlyViewed = array_slice($recentlyViewed, 0, 10);

        Session::put('recently_viewed', $recentlyViewed);
    }

    /**
     * Get recently viewed products (excluding current product)
     */
    private function getRecentlyViewedProducts($currentProductId, $limit = 6)
    {
        $recentlyViewedIds = Session::get('recently_viewed', []);

        // Remove current product from recently viewed
        $recentlyViewedIds = array_filter($recentlyViewedIds, function($id) use ($currentProductId) {
            return $id != $currentProductId;
        });

        // Limit the results
        $recentlyViewedIds = array_slice($recentlyViewedIds, 0, $limit);

        if (empty($recentlyViewedIds)) {
            return collect();
        }

        return EcommerceProduct::with([
            'warehouseProduct.brand',
            'warehouseProduct.parentCategorie',
            'warehouseProduct.subCategorie'
        ])
        ->whereIn('id', $recentlyViewedIds)
        ->active()
        ->get()
        ->sortBy(function($product) use ($recentlyViewedIds) {
            return array_search($product->id, $recentlyViewedIds);
        });
    }

    /**
     * Get related products based on category and brand
     */
    private function getRelatedProducts($product, $limit = 8)
    {
        $query = EcommerceProduct::with([
            'warehouseProduct.brand',
            'warehouseProduct.parentCategorie',
            'warehouseProduct.subCategorie'
        ])
        ->where('id', '!=', $product->id)
        ->active();

        // First try to get products from same sub-category
        if ($product->warehouseProduct && $product->warehouseProduct->sub_category_id) {
            $relatedProducts = $query->whereHas('warehouseProduct', function($q) use ($product) {
                $q->where('sub_category_id', $product->warehouseProduct->sub_category_id);
            })->limit($limit)->get();

            if ($relatedProducts->count() >= $limit) {
                return $relatedProducts;
            }
        }

        // If not enough products, get from same parent category
        if ($product->warehouseProduct && $product->warehouseProduct->parent_category_id) {
            $relatedProducts = $query->whereHas('warehouseProduct', function($q) use ($product) {
                $q->where('parent_category_id', $product->warehouseProduct->parent_category_id);
            })->limit($limit)->get();

            if ($relatedProducts->count() >= $limit) {
                return $relatedProducts;
            }
        }

        // If still not enough, get from same brand
        if ($product->warehouseProduct && $product->warehouseProduct->brand_id) {
            $relatedProducts = $query->whereHas('warehouseProduct', function($q) use ($product) {
                $q->where('brand_id', $product->warehouseProduct->brand_id);
            })->limit($limit)->get();

            if ($relatedProducts->count() >= $limit) {
                return $relatedProducts;
            }
        }

        // Fallback: get any active products
        return $query->limit($limit)->get();
    }

    /**
     * Extract product features from description
     */
    private function extractProductFeatures($product)
    {
        $features = [];

        // Try to get features from ecommerce short description first
        if ($product->ecommerce_short_description) {
            $description = strip_tags($product->ecommerce_short_description);
        } elseif ($product->warehouseProduct && $product->warehouseProduct->short_description) {
            $description = strip_tags($product->warehouseProduct->short_description);
        } else {
            return $features;
        }

        // Split by common delimiters and extract bullet points
        $lines = preg_split('/[•\-\*\n\r]+/', $description);

        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line) && strlen($line) > 10 && strlen($line) < 200) {
                $features[] = $line;
            }
        }

        // Limit to 6 features
        return array_slice($features, 0, 6);
    }
}
