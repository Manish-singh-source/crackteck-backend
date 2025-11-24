<?php

namespace App\Http\Controllers\Api;

use App\Models\FollowUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FollowUpResource;

class FollowUpController extends Controller
{
    public function index(Request $request)
    {
        $validated = request()->validate([
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $followup = FollowUp::where('user_id', $validated['user_id'])->paginate();
        if ($followup->isEmpty()) {
            return response()->json(['message' => 'No followup found'], 404);
        }

        return FollowUpResource::collection($followup);
    }

    public function store(Request $request)
    {
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

    public function show(Request $request, $lead_id)
    {
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

    public function update(Request $request, $followup_id)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $followup = FollowUp::find($followup_id);

        if (!$followup) {
            return response()->json(['message' => 'Follow Up not found'], 404);
        }

        $followup->update($request->all());
        return new FollowUpResource($followup);
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

        $followup = FollowUp::where('user_id', $validated['user_id'])->where('id', $lead_id)->delete();

        if (!$followup) {
            return response()->json(['message' => 'Follow Up not found'], 404);
        }

        return response()->json(['message' => 'Follow Up deleted successfully'], 200);
    }
}
