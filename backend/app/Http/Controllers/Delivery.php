<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Delivery extends Controller
{
    //
    public function index()
    {
        $delivery = DeliveryMan::all();
        return view('/crm/delivery-man/index', compact('delivery'));
    }

    public function create()
    {
        return view('/crm/delivery-man/create');
    }

    public function store(Request $request)
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

        $delivery = new DeliveryMan();
        $delivery->first_name = $request->first_name;
        $delivery->last_name = $request->last_name;
        $delivery->phone = $request->phone;
        $delivery->email = $request->email;
        $delivery->dob = $request->dob;
        $delivery->gender = $request->gender;

        $delivery->current_address = $request->current_address;
        $delivery->city = $request->city;
        $delivery->state = $request->state;
        $delivery->country = $request->country;
        $delivery->pincode = $request->pincode;

        $delivery->employment_type = $request->employment_type;
        $delivery->joining_date = $request->joining_date;
        $delivery->assigned_area = $request->assigned_area;

        $delivery->vehicle_type = $request->vehicle_type;
        $delivery->vehical_no = $request->vehical_no;
        $delivery->driving_license_no = $request->driving_license_no;
        $delivery->driving_license = $request->driving_license;

        $delivery->police_verification = $request->police_verification;
        $delivery->police_certificate = $request->police_certificate;

        $delivery->govid = $request->govid;
        $delivery->idno = $request->idno;
        $delivery->adhar_pic = $request->adhar_pic;

        $delivery->bank_acc_no = $request->bank_acc_no;
        $delivery->bank_name = $request->bank_name;
        $delivery->ifsc_code = $request->ifsc_code;
        $delivery->passbook_pic = $request->passbook_pic;
        $delivery->status = $request->status;

        $delivery->save();

        if (!$delivery) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('delivery-man.index')->with('success', 'Delivery Man added successfully.');
    }

    public function view($id)
    {
        $delivery = DeliveryMan::find($id);
        return view('crm/delivery-man/view', compact('delivery'));
    }

    public function edit($id)
    {
        $delivery = DeliveryMan::find($id);
        return view('/crm/delivery-man/edit', compact('delivery'));
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

        $delivery = DeliveryMan::findOrFail($id);
        $delivery->first_name = $request->first_name;
        $delivery->last_name = $request->last_name;
        $delivery->phone = $request->phone;
        $delivery->email = $request->email;
        $delivery->dob = $request->dob;
        $delivery->gender = $request->gender;

        $delivery->current_address = $request->current_address;
        $delivery->city = $request->city;
        $delivery->state = $request->state;
        $delivery->country = $request->country;
        $delivery->pincode = $request->pincode;

        $delivery->employment_type = $request->employment_type;
        $delivery->joining_date = $request->joining_date;
        $delivery->assigned_area = $request->assigned_area;

        $delivery->vehicle_type = $request->vehicle_type;
        $delivery->vehical_no = $request->vehical_no;
        $delivery->driving_license_no = $request->driving_license_no;
        $delivery->driving_license = $request->driving_license;

        $delivery->police_verification = $request->police_verification;
        $delivery->police_certificate = $request->police_certificate;

        $delivery->govid = $request->govid;
        $delivery->idno = $request->idno;
        $delivery->adhar_pic = $request->adhar_pic;

        $delivery->bank_acc_no = $request->bank_acc_no;
        $delivery->bank_name = $request->bank_name;
        $delivery->ifsc_code = $request->ifsc_code;
        $delivery->passbook_pic = $request->passbook_pic;

        $delivery->save();

        return redirect()->route('delivery-man.index')->with('success', 'Delivery Man updated successfully.');
    }

    public function delete($id)
    {
        $delivery = DeliveryMan::findOrFail($id);
        $delivery->delete();

        return redirect()->route('delivery-man.index')->with('success', 'Delivery Man deleted successfully.');
    }
}
