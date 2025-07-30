<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    //
    public function index()
    {
        $job = Job::all();
        $engineer = Engineer::all();
        return view('/crm/jobs/index', compact('job','engineer'));
    }

    public function create()
    {
        return view('/crm/jobs/create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'customer_type' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:users,email',
            'dob' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $job = new Job();
        $job->customer_type = $request->customer_type;
        $job->first_name = $request->first_name;
        $job->last_name = $request->last_name;
        $job->phone = $request->phone;
        $job->email = $request->email;
        $job->dob = $request->dob;

        $job->address = $request->address;
        $job->address2 = $request->address2;
        $job->country = $request->country;
        $job->state = $request->state;
        $job->city = $request->city;
        $job->pin_code = $request->pin_code;

        $job->company_name = $request->company_name;
        $job->company_address = $request->company_address;
        $job->gst_no = $request->gst_no;
        $job->pan_no = $request->pan_no;
        $job->profile_img = $request->profile_img;
        $job->image = $request->image;
        $job->priority_level = $request->priority_level;

        $job->product_name = $request->product_name;
        $job->product_type = $request->product_type;
        $job->product_brand = $request->product_brand;
        $job->model_no = $request->model_no;
        $job->serial_no = $request->serial_no;
        $job->purchase_date = $request->purchase_date;
        $job->image2 = $request->image2;
        $job->issue_type = $request->issue_type;
        $job->description = $request->description;

        $job->save();

        if (!$job) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('jobs.index')->with('success', 'Job added successfully.');
    }

    public function view($id)
    {
        $job = Job::find($id);
        return view('crm/jobs/view', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::find($id);
        return view('crm/jobs/edit', compact('job'));
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
