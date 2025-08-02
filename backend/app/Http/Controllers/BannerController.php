<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function websiteBanner()
    {
        return view('/e-commerce/banner/website-banner/index');
    }

    public function addWebsiteBanner()
    {
        return view('/e-commerce/banner/website-banner/create');
    }

    public function editWebsiteBanner()
    {
        return view('/e-commerce/banner/website-banner/edit');
    }

    public function promotionalBanner()
    {
        return view('/e-commerce/banner/promotional-banner/index');
    }

    public function addPromotionalBanner()
    {
        return view('/e-commerce/banner/promotional-banner/create');
    }

    public function editPromotionalBanner()
    {
        return view('/e-commerce/banner/promotional-banner/edit');
    }
}
