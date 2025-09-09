<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InHandProductController extends Controller
{
    //
    public function index()
    {
        return view('/crm/assign-products/index');
    }

    public function view()
    {
        return view('/crm/assign-products/view');
    }
}
