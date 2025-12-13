<?php

namespace App\Http\Controllers;

use App\Models\AMC;
use Illuminate\Http\Request;
use App\Models\AmcCoveredItems;
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
        $coveredItems = AmcCoveredItems::all();
        return view('/crm/amc-plans/create', compact('coveredItems'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'plan_name' => 'required',
            'plan_code' => 'required',
            'plan_type' => 'required',
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
        $coveredItems = AmcCoveredItems::all();
        return view('/crm/amc-plans/edit', compact('amc', 'coveredItems'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'plan_name' => 'required',
            'plan_code' => 'required',
            'plan_type' => 'required',
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
        $amc->total_visits = $request->total_visits;
        $amc->plan_cost = $request->plan_cost;
        $amc->tax = $request->tax;
        $amc->total_cost = $request->total_cost;
        $amc->pay_terms = $request->pay_terms;
        $amc->support_type = $request->support_type;
        $amc->replacement_policy = $request->replacement_policy;
        $amc->items = json_encode($request->items) ?? [];
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

    public function coveredItems()
    {
        $coveredItems = AmcCoveredItems::all();
        return view('/crm/amc-plans/covered-items/index', compact('coveredItems'));
    }   

    public function createCoveredItems()
    {
        return view('/crm/amc-plans/covered-items/create');
    }

    public function storeCoveredItems(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $coveredItems = new AmcCoveredItems();
        $coveredItems->item_name = $request->item_name;
        $coveredItems->save();

        if (!$coveredItems) {
            return back()->with('error', 'Something went wrong.');
        }

        return redirect()->route('covered-items.index')->with('success', 'Covered Item added successfully.');
    }

    public function editCoveredItems($id)
    {
        $coveredItems = AmcCoveredItems::findOrFail($id);
        return view('/crm/amc-plans/covered-items/edit', compact('coveredItems'));
    }

    public function updateCoveredItems(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $coveredItems = AmcCoveredItems::findOrFail($id);
        $coveredItems->item_name = $request->item_name;
        $coveredItems->save();

        if (!$coveredItems) {
            return back()->with('error', 'Something went wrong.');
        }

        return redirect()->route('covered-items.index')->with('success', 'Covered Item updated successfully.');
    }

    public function deleteCoveredItems($id)
    {        
        $coveredItems = AmcCoveredItems::findOrFail($id);
        $coveredItems->delete();

        if (!$coveredItems) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('covered-items.index')->with('success', 'Covered Item deleted successfully.');
    }

}
