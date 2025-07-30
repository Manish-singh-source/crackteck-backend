<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
    //
    public function index()
    {
        // $meet = Quotation::all();
        // return view('/crm/meets/index', compact('meet'));
        return view('/crm/Quotation/index');
    }

    public function create()
    {
        return view('/crm/Quotation/create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'lead_id' => 'required',
            'quote_id' => 'required',
            'quote_date' => 'required',
            'expiry_date' => 'required',
            'item_desc' => 'required',
            'hsn_code' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'tax' => 'required',
            'total_value' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $quotation = new Quotation();
        $quotation->lead_id = $request->lead_id;
        $quotation->quote_id = $request->quote_id;
        $quotation->quote_date = $request->quote_date;
        $quotation->expiry_date = $request->expiry_date;
        $quotation->item_desc = $request->item_desc;
        $quotation->hsn_code = $request->hsn_code;
        $quotation->quantity = $request->quantity;
        $quotation->unit_price = $request->unit_price;
        $quotation->tax = $request->tax;
        $quotation->total_value = $request->total_value;

        $quotation->save();

        if (!$quotation) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('quotation.index')->with('success', 'Quotation added successfully.');
    }

    public function view($id)
    {
        $quotation = Quotation::find($id);
        return view('/crm/quotation/view', compact('quotation'));
    }

    public function edit($id)
    {
        $quotation = Quotation::find($id);
        return view('/crm/quotation/edit', compact('quotation'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'lead_id' => 'required',
            'quote_id' => 'required',
            'quote_date' => 'required',
            'expiry_date' => 'required',
            'item_desc' => 'required',
            'hsn_code' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'tax' => 'required',
            'total_value' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $quotation = Quotation::findOrFail($id);
        $quotation->lead_id = $request->lead_id;
        $quotation->quote_id = $request->quote_id;
        $quotation->quote_date = $request->quote_date;
        $quotation->expiry_date = $request->expiry_date;
        $quotation->item_desc = $request->item_desc;
        $quotation->hsn_code = $request->hsn_code;
        $quotation->quantity = $request->quantity;
        $quotation->unit_price = $request->unit_price;
        $quotation->tax = $request->tax;
        $quotation->total_value = $request->total_value;

        $quotation->save();

        return redirect()->route('quotation.index')->with('success', 'Quotation updated successfully.');
    }

    public function delete($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return redirect()->route('quotation.index')->with('success', 'Quotation deleted successfully.');
    }
}
