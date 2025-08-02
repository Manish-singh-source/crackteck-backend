<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SparePartController extends Controller
{
    //
    public function index()
    {
        return view('/warehouse/spare-parts-requests/index');
    }

    public function view()
    {
        return view('/warehouse/spare-parts-requests/view');
    }
}
