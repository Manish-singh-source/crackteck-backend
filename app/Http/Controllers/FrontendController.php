<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display the frontend homepage with active banners
     */
    public function index()
    {
        // Get active banners ordered by sort_order
        $banners = WebsiteBanner::active()->ordered()->get();
        
        return view('frontend.index', compact('banners'));
    }
}
