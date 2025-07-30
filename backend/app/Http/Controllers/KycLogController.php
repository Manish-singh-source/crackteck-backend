<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KycLogController extends Controller
{
    //
    public function index()
    {
        return view('/crm/accounts/kyc-log');
    }
}
