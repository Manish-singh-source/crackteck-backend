<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDealController extends Controller
{
    //
    public function index()
    {
        return view('e-commerce.product-deals.index');
    }

    public function create()
    {
        return view('e-commerce.product-deals.create');
    }

    public function edit()
    {
        return view('e-commerce.product-deals.edit');
    }
}
