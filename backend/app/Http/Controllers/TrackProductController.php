<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackProductController extends Controller
{
    //
    public function index()
    {
        return view('/warehouse/track-product/index');
    }
}
