<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorPurchaseBillController extends Controller
{
    //
    public function index()
    {
        return view('/warehouse/vendor-purchase-bills/index');
    }

    public function create()
    {
        return view('/warehouse/vendor-purchase-bills/create');
    }

    public function view()
    {
        return view('/warehouse/vendor-purchase-bills/view');
    }
}
