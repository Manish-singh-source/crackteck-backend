<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductListController extends Controller
{
    //
    public function index()
    {
        return view('/warehouse/product-list/index');
    }

    public function create()
    {
        return view('/warehouse/product-list/create');
    }

    public function view()
    {
        return view('/warehouse/product-list/view');
    }

    public function edit()
    {
        return view('/warehouse/product-list/edit');
    }

    public function scrapItems()
    {
        return view('/warehouse/product-list/scrap-items');
    }

    public function ec_index()
    {
        return view('/e-commerce/products/index');
    }

    public function ec_create()
    {
        return view('/e-commerce/products/create');
    }

    public function ec_view()
    {
        return view('/e-commerce/products/view');
    }

    public function ec_edit()
    {
        return view('/e-commerce/products/edit');
    }

    public function ec_scrapItems()
    {
        return view('/e-commerce/products/scrap-items');
    }
}
