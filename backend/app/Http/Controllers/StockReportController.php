<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockReportController extends Controller
{
    //
    public function index()
    {
        return view('/crm/accounts/stock-request/index');
    }

    public function create()
    {
        return view('/crm/accounts/stock-request/create');
    }
}
