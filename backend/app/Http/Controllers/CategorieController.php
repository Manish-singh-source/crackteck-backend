<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $users = User::all();
    
        // dd($users);
        return view('/e-commerce/categories/create');
    }

    public function edit() 
    {
        return view('/e-commerce/categories/edit');
    }
}
