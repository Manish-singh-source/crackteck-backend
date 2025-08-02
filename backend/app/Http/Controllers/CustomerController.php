<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::all();
        return view('/crm/customer/index', compact('customers'));
    }

    public function create()
    {
        return view('/crm/customer/create');
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

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->dob = $request->dob;
        $customer->gender = $request->gender;
        $customer->customer_type = $request->customer_type;
        $customer->company_name = $request->company_name;
        $customer->company_addr = $request->company_addr;
        $customer->gst_no = $request->gst_no;
        $customer->pan_no = $request->pan_no;
        $customer->save();

        if (!$customer) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('customer.index')->with('success', 'Customer added successfully.');
    }

    public function view($id)
    {
        $customer = Customer::find($id);
        return view('/crm/customer/view', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('/crm/customer/edit', compact('customer'));
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

        $customer = Customer::findOrFail($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->dob = $request->dob;
        $customer->gender = $request->gender;
        $customer->customer_type = $request->customer_type;
        $customer->company_name = $request->company_name;
        $customer->company_addr = $request->company_addr;
        $customer->gst_no = $request->gst_no;
        $customer->pan_no = $request->pan_no;
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }

    public function ec_index()
    {
        return view('/e-commerce/customer/index');
    }

    public function ec_create()
    {
        return view('/e-commerce/customer/create');
    }

    public function ec_view()
    {
        return view('/e-commerce/customer/view');
    }

    public function ec_edit()
    {
        return view('/e-commerce/customer/edit');
    }

}
