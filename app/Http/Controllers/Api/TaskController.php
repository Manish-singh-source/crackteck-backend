<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meet;

class TaskController extends Controller
{
    //
    //Calender wise Task Filtering
    public function index(Request $request){
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);
        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }
        //Filter By date wise all as per calender user Requested 
        $date = $request->date?? today();
        $tasks = Meet::where('user_id', $validated['user_id'])
            ->whereDate('created_at', date($date))

            ->get();

        return response()->json(['tasks' => $tasks], 200);
       
        

       
    }
    
}
