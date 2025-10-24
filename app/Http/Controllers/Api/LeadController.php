<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
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

        $leads = Lead::where('user_id', $validated['user_id'])->get();

        return response()->json(['leads' => $leads], 200);
    }

    public function store(Request $request) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $lead = Lead::create($validated);

        return response()->json(['lead' => $lead], 200);
    }


    public function show(Request $request, $lead_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $leads = Lead::where('user_id', $validated['user_id'])->where('id', $lead_id)->first();

        return response()->json(['leads' => $leads], 200);
    }


    public function destroy(Request $request, $lead_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        Lead::where('user_id', $validated['user_id'])->where('id', $lead_id)->delete();

        return response()->json(['message' => 'Lead deleted successfully'], 200);
    }
}
