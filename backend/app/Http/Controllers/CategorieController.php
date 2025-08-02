<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function index()
    {
        return view('/e-commerce/categories/index');
    }

    public function create()
    {
        return view('/e-commerce/categories/create');
    }

    public function edit() 
    {
        return view('/e-commerce/categories/edit');
    }
}
