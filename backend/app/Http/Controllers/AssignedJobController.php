<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignedJobController extends Controller
{
    //
    public function index()
    {
        return view('/crm/assigned-jobs/index');
    }

    public function view()
    {
        return view('/crm/assigned-jobs/view');
    }

    public function edit()
    {
        return view('/crm/assigned-jobs/edit');
    }
}
