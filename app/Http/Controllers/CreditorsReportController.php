<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditorsReportController extends Controller
{
    //
    public function index()
    {
        return view('/crm/accounts/creditors-report/index');
    }
}
