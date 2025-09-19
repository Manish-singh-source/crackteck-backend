<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //
    public function index()
    {
        $subscriber = Subscriber::all();
        return view('/e-commerce/subscribers/index', compact('subscriber'));
    }

    public function sendMail()
    {
        return view('/e-commerce/subscribers/send-mail');
    }

    public function delete($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('subscriber.index')->with('success', 'Subscriber deleted successfully.');
    }
}
