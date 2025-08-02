<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function index()
    {
        return view('e-commerce/brands/index');
    }

    public function create()
    {
        return view('e-commerce/brands/create');
    }

    public function edit()
    {
        return view('e-commerce/brands/edit');
    }
}
