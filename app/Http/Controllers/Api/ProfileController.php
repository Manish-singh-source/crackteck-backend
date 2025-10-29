<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Engineer;

class ProfileController extends Controller
{
      //
      public function index(Request $request){
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'Engineer ID is required'], 400);
        }

        $Engineer = Engineer::where('id', $validated['user_id'])->first();

        return response()->json(['Engineer' => $Engineer], 200);
    }

    public function update(Request $request) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);
        
        $Engineer = Engineer::where('id', $validated['user_id'])->update($request->all());

        return response()->json(['Engineer' => $Engineer], 200);
    }






   
}
