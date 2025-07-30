<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackRequestController extends Controller
{
    //
    public function index()
    {
        return view('/crm/track-request/index');
    }
}
