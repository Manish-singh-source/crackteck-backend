<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallLogController extends Controller
{
    //
    public function index()
    {
        return view('/crm/call-logs/index');
    }

    public function view()
    {
        return view('/crm/call-logs/view');
    }
}
