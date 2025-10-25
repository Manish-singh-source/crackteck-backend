<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FollowUp;

class FollowUpController extends Controller
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

        $followup = FollowUp::where('user_id', $validated['user_id'])->get();

        return response()->json(['followup' => $followup], 200);
    }

    public function store(Request $request) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
            'lead_id' => 'required',
            'client_name' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ]);

        $followup = FollowUp::create($validated);

        return response()->json(['followup' => $followup], 200);
    }

    public function show(Request $request, $lead_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $followup = FollowUp::where('user_id', $validated['user_id'])->where('id', $lead_id)->first();

        return response()->json(['followup' => $followup], 200);
    }

    public function update(Request $request, $followup_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        $followup = FollowUp::where('user_id', $validated['user_id'])->where('id', $followup_id)->update($request->all());

        return response()->json(['followup' => $followup], 200);
    }

    public function destroy(Request $request, $lead_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        FollowUp::where('user_id', $validated['user_id'])->where('id', $lead_id)->delete();

        return response()->json(['message' => 'Follow Up deleted successfully'], 200);
    }
}
