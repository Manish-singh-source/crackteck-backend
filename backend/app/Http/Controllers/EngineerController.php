<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class EngineerController extends Controller
{
    //
    public function index()
    {
        $engineers = Engineer::all();
        return view('/crm/engineers/index', compact('engineers'));
    }

    public function create()
    {
        return view('/crm/engineers/create');
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

        $engineer = new Engineer();
        $engineer->first_name = $request->first_name;
        $engineer->last_name = $request->last_name;
        $engineer->phone = $request->phone;
        $engineer->email = $request->email;
        $engineer->dob = $request->dob;
        $engineer->gender = $request->gender;

        $engineer->address = $request->address;
        $engineer->address2 = $request->address2;
        $engineer->city = $request->city;
        $engineer->state = $request->state;
        $engineer->country = $request->country;
        $engineer->pincode = $request->pincode;

        $engineer->bank_acc_holder_name = $request->bank_acc_holder_name;
        $engineer->bank_acc_number = $request->bank_acc_number;
        $engineer->bank_name = $request->bank_name;
        $engineer->ifsc_code = $request->ifsc_code;

        $engineer->police_verification = $request->police_verification;
        $engineer->police_verification_status = $request->police_verification_status;
        $engineer->police_certificate = $request->police_certificate;

        $engineer->designation = $request->designation;
        $engineer->department = $request->department;
        $engineer->join_date = $request->join_date;

        $engineer->primary_skills = $request->primary_skills;
        $engineer->pic = $request->pic;

        $engineer->save();

        if (!$engineer) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('engineers.index')->with('success', 'Customer added successfully.');
    }

    public function view($id)
    {
        $engineer = Engineer::find($id);
        return view('crm/engineers/view', compact('engineer'));
    }

    public function edit($id)
    {
        $engineer = Engineer::find($id);
        return view('/crm/engineers/edit', compact('engineer'));
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

        $engineer = Engineer::findOrFail($id);
        $engineer->first_name = $request->first_name;
        $engineer->last_name = $request->last_name;
        $engineer->phone = $request->phone;
        $engineer->email = $request->email;
        $engineer->dob = $request->dob;
        $engineer->gender = $request->gender;

        $engineer->address = $request->address;
        $engineer->address2 = $request->address2;
        $engineer->city = $request->city;
        $engineer->state = $request->state;
        $engineer->country = $request->country;
        $engineer->pincode = $request->pincode;

        $engineer->bank_acc_holder_name = $request->bank_acc_holder_name;
        $engineer->bank_acc_number = $request->bank_acc_number;
        $engineer->bank_name = $request->bank_name;
        $engineer->ifsc_code = $request->ifsc_code;

        $engineer->police_verification = $request->police_verification;
        $engineer->police_verification_status = $request->police_verification_status;
        $engineer->police_certificate = $request->police_certificate;

        $engineer->designation = $request->designation;
        $engineer->department = $request->department;
        $engineer->join_date = $request->join_date;

        $engineer->primary_skills = $request->primary_skills;
        $engineer->pic = $request->pic;

        $engineer->save();

        return redirect()->route('engineers.index')->with('success', 'Engineer updated successfully.');
    }

    public function delete($id)
    {
        $engineer = Engineer::findOrFail($id);
        $engineer->delete();

        return redirect()->route('engineers.index')->with('success', 'Customer deleted successfully.');
    }
}
