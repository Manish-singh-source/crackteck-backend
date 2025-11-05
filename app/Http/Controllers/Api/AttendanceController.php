<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //
    public function index(Request $request){
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $attendance = Attendance::where('user_id', $validated['user_id'])->get();

        return response()->json(['attendance' => $attendance], 200);
    }
    public function store(Request $request) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        $attendance = Attendance::create($validated);

        return response()->json(['attendance' => $attendance], 200);
    }
    
}
