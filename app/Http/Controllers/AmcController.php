<?php

namespace App\Http\Controllers;

use App\Models\AMC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmcController extends Controller
{
    //
    public function index()
    {
        $amc = AMC::all();
        return view('/crm/amc-plans/index', compact('amc'));
    }

    public function create()
    {
        return view('/crm/amc-plans/create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'plan_name' => 'required',
            'plan_code' => 'required',
            'plan_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $amc = new AMC();
        $amc->plan_name = $request->plan_name;
        $amc->plan_code = $request->plan_code;
        $amc->plan_type = $request->plan_type;
        $amc->description = $request->description;
        $amc->duration = $request->duration;
        $amc->start_date = $request->start_date;
        $amc->end_date = $request->end_date;
        $amc->total_visits = $request->total_visits;
        $amc->plan_cost = $request->plan_cost;
        $amc->tax = $request->tax;
        $amc->total_cost = $request->total_cost;
        $amc->pay_terms = $request->pay_terms;
        $amc->support_type = $request->support_type;
        $amc->replacement_policy = $request->replacement_policy;
        $amc->items = json_encode($request->items);
        $amc->brochure = $request->brochure;
        $amc->tandc = $request->tandc;
        $amc->status = $request->status;



        $amc->save();

        if (!$amc) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('amc-plans.index')->with('success', 'AMC Plan added successfully.');
    }

    public function edit($id)
    {
        $amc = AMC::find($id);
        return view('/crm/amc-plans/edit', compact('amc'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'plan_name' => 'required',
            'plan_code' => 'required',
            'plan_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $amc = AMC::findOrFail($id);
        $amc->plan_name = $request->plan_name;
        $amc->plan_code = $request->plan_code;
        $amc->plan_type = $request->plan_type;
        $amc->description = $request->description;
        $amc->duration = $request->duration;
        $amc->start_date = $request->start_date;
        $amc->end_date = $request->end_date;
        $amc->total_visits = $request->total_visits;
        $amc->plan_cost = $request->plan_cost;
        $amc->tax = $request->tax;
        $amc->total_cost = $request->total_cost;
        $amc->pay_terms = $request->pay_terms;
        $amc->support_type = $request->support_type;
        $amc->replacement_policy = $request->replacement_policy;
        $amc->items = json_encode($request->items);
        $amc->brochure = $request->brochure;
        $amc->tandc = $request->tandc;
        $amc->status = $request->status;

        $amc->save();

        return redirect()->route('amc-plans.index')->with('success', 'AMC Plan updated successfully.');
    }

    public function delete($id)
    {
        $amc = AMC::findOrFail($id);
        $amc->delete();

        return redirect()->route('amc-plans.index')->with('success', 'AMC Plan deleted successfully.');
    }
}
