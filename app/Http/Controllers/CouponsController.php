<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponsController extends Controller
{
    //
    public function index()
    {
        return view('/e-commerce/coupons/index');
    }

    public function create()
    {
        return view('/e-commerce/coupons/create');
    }

    public function edit()
    {
        return view('/e-commerce/coupons/edit');
    }
}
