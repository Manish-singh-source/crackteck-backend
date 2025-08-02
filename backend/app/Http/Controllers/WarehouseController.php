<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    //
    public function index()
    {
        return view('/warehouse/warehouses-list/index');
    }

    public function create()
    {
        return view('/warehouse/warehouses-list/create');
    }

    public function view()
    {
        return view('/warehouse/warehouses-list/view');
    }

    public function edit()
    {
        return view('/warehouse/warehouses-list/edit');
    }
}
