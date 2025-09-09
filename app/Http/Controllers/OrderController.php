<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        return view('/e-commerce/order/index');
    }

    public function create()
    {
        return view('/e-commerce/order/create');
    }

    public function view()
    {
        return view('/e-commerce/order/view');
    }
}
