<?php

namespace App\Http\Controllers\Api;

use App\Models\Meet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetController extends Controller
{
    //
    public function index(Request $request)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $meets = Meet::where('user_id', $validated['user_id'])->get();

        return response()->json(['meets' => $meets], 200);
    }

    public function store(Request $request)
    {

        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
            'lead_id' => 'required',
            'meet_title' => 'nullable',
            'client_name' => 'nullable',
            'meeting_type' => 'nullable',
            'date' => 'nullable',
            'time' => 'nullable',
            'location' => 'nullable',
            'attachment' => 'nullable',
            'meetAgenda' => 'nullable',
            'followUp' => 'nullable',
            'status' => 'nullable',
        ]);

        $meet = Meet::create($validated);

        return response()->json(['meet' => $meet], 200);
    }


    public function show(Request $request, $lead_id)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $meets = Meet::where('user_id', $validated['user_id'])->where('id', $lead_id)->first();

        return response()->json(['meets' => $meets], 200);
    }

    public function update(Request $request, $lead_id)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        $meet = Meet::where('user_id', $validated['user_id'])->where('id', $lead_id)->update($request->all());

        return response()->json(['meet' => $meet], 200);
    }

    public function destroy(Request $request, $lead_id)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        Meet::where('user_id', $validated['user_id'])->where('id', $lead_id)->delete();

        return response()->json(['message' => 'Meet deleted successfully'], 200);
    }
}
