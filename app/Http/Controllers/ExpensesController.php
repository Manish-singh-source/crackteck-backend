<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    //
    public function index()
    {
        return view('/crm/accounts/expenses/index');
    }

    public function create()
    {
        return view('/crm/accounts/expenses/create');
    }
}
