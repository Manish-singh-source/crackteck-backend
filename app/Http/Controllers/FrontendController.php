<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use App\Models\ParentCategorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display the frontend homepage with active banners and categories
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

        return view('frontend.index', compact('banners', 'categories'));
    }
}
