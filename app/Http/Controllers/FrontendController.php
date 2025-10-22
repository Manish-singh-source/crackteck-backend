<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use App\Models\ParentCategorie;
use App\Models\ProductDeal;
use Carbon\Carbon;

class FrontendController extends Controller
{
    /**
     * Display the frontend homepage with active banners, categories, and deals
     */
    public function index()
    {
        // Get active banners ordered by sort_order
        $banners = WebsiteBanner::active()->ordered()->get();

        // Get active parent categories for e-commerce display, ordered by sort_order
        $categories = ParentCategorie::active()
            ->ecommerceActive()
            ->ordered()
            ->get();

        // Get active deals that are currently running
        $activeDeals = ProductDeal::with([
                'dealItems.ecommerceProduct.warehouseProduct.brand',
                'dealItems.ecommerceProduct.warehouseProduct'
            ])
            ->where('status', 'active')
            ->where('offer_start_date', '<=', Carbon::now())
            ->where('offer_end_date', '>=', Carbon::now())
            ->orderBy('offer_start_date', 'desc')
            ->get();

        return view('frontend.index', compact('banners', 'categories', 'activeDeals'));
    }
}
