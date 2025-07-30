<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SparePartController extends Controller
{
    //
    public function index()
    {
        return view('/crm/spare-parts-requests/index');
    }

    public function view()
    {
        return view('/crm/spare-parts-requests/view');
    }
}
