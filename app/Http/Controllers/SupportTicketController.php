<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    //
    public function index()
    {
        return view('/crm/support-ticket/index');
    }

    public function view()
    {
        return view('/crm/support-ticket/view');
    }
}
