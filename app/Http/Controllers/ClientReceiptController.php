<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientReceiptController extends Controller
{
    //
    public function index()
    {
        return view('/crm/accounts/client-receipts/index');
    }

    public function create()
    {
        return view('/crm/accounts/client-receipts/create');
    }

    public function edit()
    {
        return view('/crm/accounts/client-receipts/edit');
    }
}
