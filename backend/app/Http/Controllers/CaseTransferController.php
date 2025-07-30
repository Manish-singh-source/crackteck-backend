<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseTransferController extends Controller
{
    //
    public function index()
    {
        return view('/crm/case-transfer/index');
    }

    public function create()
    {
        return view('/crm/case-transfer/create');
    }
}
