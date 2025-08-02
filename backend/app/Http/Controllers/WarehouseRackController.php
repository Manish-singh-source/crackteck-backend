<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseRackController extends Controller
{
    //
    public function index()
    {
        return view('/warehouse/rack/index');
    }

    public function create()
    {
        return view('/warehouse/rack/create');
    }

    public function edit() 
    {
        return view('/warehouse/rack/edit');
    }
}
