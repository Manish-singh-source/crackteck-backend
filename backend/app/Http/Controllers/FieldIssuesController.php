<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldIssuesController extends Controller
{
    //
    public function index()
    {
        return view('/crm/field-issues/index');
    }

    public function view()
    {
        return view('/crm/field-issues/view');
    }

    public function edit()
    {
        return view('/crm/field-issues/edit');
    }
}
