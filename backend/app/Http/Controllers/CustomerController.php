<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddressDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            // Personal details
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:customers,email',
            'dob' => 'required',
            'gender' => 'required',

            // Address details
            'branch_name' => 'required|min:3',
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required|min:6'
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
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($filename);
    
            $file->move(public_path('uploads/crm/customer/pic'), $filename);
            $customer->pic = 'uploads/crm/customer/pic/' . $filename;
        }
        $customer->save();

        // dd($customer);
        $customer_address = CustomerAddressDetails::where('customer_id', $customer->id)->first();
        if (!$customer_address) {
            $customer_address = new CustomerAddressDetails();
            $customer_address->customer_id = $customer->id;
        }
        $customer_address->branch_name = $request->branch_name;
        $customer_address->address = $request->address;
        $customer_address->address2 = $request->address2;
        $customer_address->city = $request->city;
        $customer_address->state = $request->state;
        $customer_address->country = $request->country;
        $customer_address->pincode = $request->pincode;
        $customer_address->save();

        if (!$customer) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('customer.index')->with('success', 'Customer added successfully.');
    }

    public function view($id)
    {
        $customer = Customer::find($id);
        $customer_address = CustomerAddressDetails::where('customer_id', $id)->get();
        return view('/crm/customer/view', compact('customer', 'customer_address'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $customer_address = CustomerAddressDetails::where('customer_id', $id)->get();
        return view('/crm/customer/edit', compact('customer', 'customer_address'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'required|digits:10',
            'email' => 'required|email|',
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
        if ($request->hasFile('pic')) {

            // Only if updating profile 
            if ($customer->pic != '') {
                if (File::exists(public_path($customer->pic))) {
                    File::delete(public_path($customer->pic));
                }
            }
            // updating profile end

            $file = $request->file('pic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($filename);
    
            $file->move(public_path('uploads/crm/customer/pic'), $filename);
            $customer->pic = 'uploads/crm/customer/pic/' . $filename;
        }
        $customer->save();

        $customer_address = new CustomerAddressDetails();
        $customer_address->customer_id = $customer->id;
        $customer_address->branch_name = $request->branch_name;
        $customer_address->address = $request->address;
        $customer_address->address2 = $request->address2;
        $customer_address->city = $request->city;
        $customer_address->state = $request->state;
        $customer_address->country = $request->country;
        $customer_address->pincode = $request->pincode;
        $customer_address->save();

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
