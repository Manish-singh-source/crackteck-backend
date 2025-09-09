<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    //
    public function index()
    {
        $lead = Lead::all();
        return view('/crm/leads/index', compact('lead'));
    }

    public function create()
    {
        return view('/crm/leads/create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:leads,email',
            'dob' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $lead = new Lead();
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->dob = $request->dob;
        $lead->gender = $request->gender;

        $lead->company_name = $request->company_name;
        $lead->designation = $request->designation;
        $lead->industry_type = $request->industry_type;
        $lead->source = $request->source;
        $lead->requirement_type = $request->requirement_type;

        $lead->budget_range = $request->budget_range;
        $lead->urgency = $request->urgency;
        $lead->status = $request->status;

        $lead->save();

        if (!$lead) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('leads.index')->with('success', 'Leads added successfully.');
    }

    public function view($id)
    {
        $lead = Lead::find($id);
        return view('/crm/leads/view', compact('lead'));
    }

    public function edit($id)
    {
        $lead = Lead::find($id);
        return view('/crm/leads/edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:users,email',
            'dob' => 'required',
            'gender' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $lead = Lead::findOrFail($id);
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->phone = $request->phone;
        $lead->email = $request->email;
        $lead->dob = $request->dob;
        $lead->gender = $request->gender;

        $lead->company_name = $request->company_name;
        $lead->designation = $request->designation;
        $lead->industry_type = $request->industry_type;
        $lead->source = $request->source;
        $lead->requirement_type = $request->requirement_type;

        $lead->budget_range = $request->budget_range;
        $lead->urgency = $request->urgency;
        $lead->status = $request->status;

        $lead->save();

        return redirect()->route('leads.index')->with('success', 'Leads updated successfully.');
    }

    public function delete($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Leads deleted successfully.');
    }
}
