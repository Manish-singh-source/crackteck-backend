<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //
    public function index()
    {
        return view('/e-commerce/subscribers/index');
    }

    public function sendMail()
    {
        return view('/e-commerce/subscribers/send-mail');
    }
}
