<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductVariantsController extends Controller
{
    //
    public function index()
    {
        return view('/e-commerce/product-variants/index');
    }

    public function view()
    {
        return view('/e-commerce/product-variants/view');
    }
}
