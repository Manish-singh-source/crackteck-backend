<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeadResource;

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

        $leads = Lead::where('user_id', $validated['user_id'])->paginate();

        // return response()->json(['leads' => $leads], 200);
        return LeadResource::collection($leads);
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
            'name' => 'required',
            'company_name' => 'nullable',
            'designation' => 'nullable',
            'phone' => 'required',
            'email' => 'required|email',
            
            'dob' => 'nullable|date',
            'gender' => 'nullable',

            'address' => 'nullable',

            'budget_range' => 'required',
            'source' => 'required',
            'urgency' => 'required',
            'requirement_type' => 'required',
            'industry_type' => 'required',
            'status' => 'required',

            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/crm/lead/file'), $filename);
            $validated['file'] = 'uploads/crm/lead/file/' . $filename;
        }

        if ($request->name) {
            $full_name = explode(' ', $request->name);
            $request->merge(['first_name' => $full_name[0]]);
            $request->merge(['last_name' => $full_name[1]]);

            unset($request['name']);
        }

        $lead = Lead::create($request->all());

        if (!$lead) {
            return response()->json(['message' => 'Lead not created'], 500);
        }
        return new LeadResource($lead);
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

        $lead = Lead::where('user_id', $validated['user_id'])->find($lead_id);

        if (!$lead) {
            return response()->json(['message' => 'Lead not found'], 404);
        }
        return new LeadResource($lead);
    }


    public function update(Request $request, $lead_id)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        if ($request->full_name) {
            $full_name = explode(' ', $request->full_name);
            $request->merge(['first_name' => $full_name[0]]);
            $request->merge(['last_name' => $full_name[1]]);

            unset($request['full_name']);
        }

        $lead = Lead::find($lead_id);

        if (!$lead) {
            return response()->json(['message' => 'Lead not found'], 404);
        }

        $lead->update($request->all());
        return new LeadResource($lead);
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

        $lead = Lead::where('user_id', $validated['user_id'])->where('id', $lead_id)->delete();

        if (!$lead) {
            return response()->json(['message' => 'Lead not found'], 404);
        }
        return response()->json(['message' => 'Lead deleted successfully'], 200);
    }
}

