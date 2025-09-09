<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    //
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('/warehouse/warehouses-list/index', compact('warehouses'));
    }

    public function create()
    {
        return view('/warehouse/warehouses-list/create');
    }

    public function store(StoreWarehouseRequest $request)
    {

        $warehouse = new Warehouse();
        $warehouse->warehouse_name = $request->warehouse_name;
        $warehouse->warehouse_type = $request->warehouse_type;
        $warehouse->warehouse_addr1 = $request->warehouse_addr1;
        $warehouse->warehouse_addr2 = $request->warehouse_addr2;
        $warehouse->city = $request->city;
        $warehouse->state = $request->state;
        $warehouse->country = $request->country;
        $warehouse->pincode = $request->pincode;

        $warehouse->contact_person_name = $request->contact_person_name;
        $warehouse->phone_number = $request->phone_number;
        $warehouse->alternate_phone_number = $request->alternate_phone_number;
        $warehouse->email = $request->email;

        $warehouse->working_hours = $request->working_hours;
        $warehouse->working_days = $request->working_days;
        $warehouse->max_store_capacity = $request->max_store_capacity;
        $warehouse->supported_operations = $request->supported_operations;
        $warehouse->zone_conf = $request->zone_conf;

        $warehouse->gst_no = $request->gst_no;
        $warehouse->licence_no = $request->licence_no;
        // dd($request->hasFile('licence_doc'));
        if ($request->hasFile('licence_doc')) {
            $file = $request->file('licence_doc');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($filename);
    
            $file->move(public_path('uploads/warehouse/licence_docs'), $filename);
            $warehouse->licence_doc = 'uploads/warehouse/licence_docs/' . $filename;
        }
        // dd('Done');
        $warehouse->default_warehouse = $request->default_warehouse;
        $warehouse->status = $request->status;

        $warehouse->save();

        if (!$warehouse) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('warehouses-list.index')->with('success', 'Warehouse added successfully.');
    }

    public function view($id)
    {
        $warehouse = Warehouse::find($id);
        return view('/warehouse/warehouses-list/view', compact('warehouse'));
    }

    public function edit($id)
    {
        $warehouse = Warehouse::find($id);
        return view('/warehouse/warehouses-list/edit', compact('warehouse'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'warehouse_name' => 'required|min:3',
            'warehouse_type' => 'required',
            'warehouse_addr1' => 'required|min:3',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required|digits:6',
            'contact_person_name' => 'required|min:3',
            'phone_number' => 'required|digits:10',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $warehouse = Warehouse::findOrFail($id);
        $warehouse->warehouse_name = $request->warehouse_name;
        $warehouse->warehouse_type = $request->warehouse_type;
        $warehouse->warehouse_addr1 = $request->warehouse_addr1;
        $warehouse->warehouse_addr2 = $request->warehouse_addr2;
        $warehouse->city = $request->city;
        $warehouse->state = $request->state;
        $warehouse->country = $request->country;
        $warehouse->pincode = $request->pincode;

        $warehouse->contact_person_name = $request->contact_person_name;
        $warehouse->phone_number = $request->phone_number;
        $warehouse->alternate_phone_number = $request->alternate_phone_number;
        $warehouse->email = $request->email;

        $warehouse->working_hours = $request->working_hours;
        $warehouse->working_days = $request->working_days;
        $warehouse->max_store_capacity = $request->max_store_capacity;
        $warehouse->supported_operations = $request->supported_operations;
        $warehouse->zone_conf = $request->zone_conf;

        $warehouse->gst_no = $request->gst_no;
        $warehouse->licence_no = $request->licence_no;
        $warehouse->licence_doc = $request->licence_doc;

        $warehouse->default_warehouse = $request->default_warehouse;
        $warehouse->status = $request->status;
        $warehouse->save();

        return redirect()->route('warehouses-list.index')->with('success', 'Warehouse updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->default_warehouse = $request->default_warehouse;
        $warehouse->status = $request->status;

        $warehouse->save();

        return redirect()->route('warehouses-list.index')->with('success', 'Warehouse updated successfully.');
    }

    public function delete($id)
    {
        $warehouse = Warehouse::findOrFail($id);
        $warehouse->delete();

        return redirect()->route('warehouses-list.index')->with('success', 'Warehouse deleted successfully.');
    }
}
