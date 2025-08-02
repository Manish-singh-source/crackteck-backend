<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    //
    public function index()
    {
        return view('/e-commerce/collection/index');
    }

    public function create()
    {
        return view('/e-commerce/collection/create');
    }

    public function edit()
    {
        return view('/e-commerce/collection/edit');
    }
}
