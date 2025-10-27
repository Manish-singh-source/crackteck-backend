<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    //
    /**
     * Get all leads for a user
     * description: Get all leads for a user
     *
     * @param Request $request
     * @return void
     * 
     * 
     * 
     */
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

    public function store(Request $request, $user_id) {
        
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'message' => 'nullable',
            'dob' => 'nullable',
            'gender' => 'nullable',
            'company_name' => 'nullable',
            'designation' => 'nullable',
            'industry_type' => 'nullable',
            'source' => 'nullable',
            'requirement_type' => 'nullable',
            'budget_range' => 'nullable',
            'urgency' => 'nullable',
            'status' => 'nullable',
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


    public function update(Request $request, $lead_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        if($request->full_name){
            $full_name = explode(' ', $request->full_name);
            $request->merge(['first_name' => $full_name[0]]);
            $request->merge(['last_name' => $full_name[1]]);

            unset($request['full_name']);
        }

        $lead = Lead::where('user_id', $validated['user_id'])->where('id', $lead_id)->update($request->all());

        return response()->json(['lead' => $lead], 200);
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
