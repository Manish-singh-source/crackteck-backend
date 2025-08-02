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

    public function warehouse_index()
    {
        return view('/warehouse/stock-request/index');
    }

    public function warehouse_create()
    {
        return view('/warehouse/stock-request/create');
    }

    public function warehouse_edit()
    {
        return view('/warehouse/stock-request/edit');
    }
}
