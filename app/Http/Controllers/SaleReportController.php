<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    //
    public function index()
    {
        return view('/crm/sales-reports/index');
    }
}
