<?php

namespace App\Http\Controllers\Api;

use App\Models\Meet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MeetResource;

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

        $meets = Meet::where('user_id', $validated['user_id'])->paginate();

        if ($meets->isEmpty()) {
            return response()->json(['message' => 'No meets found'], 404);
        }
        return MeetResource::collection($meets);
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

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $meet = Meet::create($validated);

        if (!$meet) {
            return response()->json(['message' => 'Meet not created'], 500);
        }
        return new MeetResource($meet);
    }


    public function show(Request $request, $meet_id)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $meets = Meet::where('user_id', $validated['user_id'])->where('id', $meet_id)->first();

        if (!$meets) {
            return response()->json(['message' => 'Meet not found'], 404);
        }
        return new MeetResource($meets);
    }

    public function update(Request $request, $meet_id)
    {
        $validated = $request->validate([
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        // Find the meeting record
        $meet = Meet::find($meet_id);

        if (!$meet) {
            return response()->json(['message' => 'Meeting not found'], 404);
        }

        // Update the model
        $meet->update($request->all());

        // Return updated resource
        return new MeetResource($meet);
    }


    public function destroy(Request $request, $meet_id)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        Meet::where('user_id', $validated['user_id'])->where('id', $meet_id)->delete();

        return response()->json(['message' => 'Meet deleted successfully'], 200);
    }
}
