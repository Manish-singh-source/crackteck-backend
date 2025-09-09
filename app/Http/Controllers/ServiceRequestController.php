<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    //
    public function index()
    {
        return view('/crm/service-request/index');
    }

    public function create()
    {
        return view('/crm/service-request/create-servies');
    }

    public function view()
    {
        return view('/crm/service-request/view-service');
    }

    public function edit()
    {
        return view('/crm/service-request/edit-service');
    }

    public function create_amc()
    {
        return view('/crm/service-request/create-amc');
    }

    public function view_amc()
    {
        return view('/crm/service-request/view-amc');
    }

    public function edit_amc()
    {
        return view('/crm/service-request/edit-amc');
    }
}
