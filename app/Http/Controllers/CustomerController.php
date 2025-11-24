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
        // Filter to show only CRM customers (Retail, Wholesale, Corporate, AMC Customer)
        $customers = Customer::with('branches')
            // ->crm()
            ->get();
        // dd($customers);
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

            // Branch details - validate array of branches
            'branches' => 'required|array|min:1',
            'branches.*.branch_name' => 'required|min:3',
            'branches.*.address' => 'required',
            'branches.*.city' => 'required',
            'branches.*.state' => 'required',
            'branches.*.country' => 'required',
            'branches.*.pincode' => 'required|min:6',
            'primary_branch' => 'required|integer|min:0'
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
        // Set customer type based on request, defaulting to AMC Customer if not specified
        $customer->customer_type = $request->customer_type ? $request->customer_type : 'AMC Customer';
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

        // Save multiple branches
        $primaryBranchIndex = $request->primary_branch;

        foreach ($request->branches as $index => $branchData) {
            $customer_address = new CustomerAddressDetails();
            $customer_address->customer_id = $customer->id;
            $customer_address->branch_name = $branchData['branch_name'];
            $customer_address->address = $branchData['address'];
            $customer_address->address2 = $branchData['address2'] ?? null;
            $customer_address->city = $branchData['city'];
            $customer_address->state = $branchData['state'];
            $customer_address->country = $branchData['country'];
            $customer_address->pincode = $branchData['pincode'];
            $customer_address->is_primary = ($index == $primaryBranchIndex);
            $customer_address->save();
        }

        if (!$customer) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('customer.index')->with('success', 'Customer added successfully.');
    }

    public function view($id)
    {
        $customer = Customer::with('branches')->find($id);
        $customer_address = CustomerAddressDetails::where('customer_id', $id)->get();
        return view('/crm/customer/view', compact('customer', 'customer_address'));
    }

    public function edit($id)
    {
        $customer = Customer::with('branches')->find($id);
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
            'gender' => 'required',

            // Branch details - validate array of branches
            'branches' => 'required|array|min:1',
            'branches.*.branch_name' => 'required|min:3',
            'branches.*.address' => 'required',
            'branches.*.city' => 'required',
            'branches.*.state' => 'required',
            'branches.*.country' => 'required',
            'branches.*.pincode' => 'required|min:6',
            'primary_branch' => 'required|integer|min:0'
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

        // Handle multiple branches update
        $primaryBranchIndex = $request->primary_branch;
        $existingBranchIds = [];

        foreach ($request->branches as $index => $branchData) {
            if (isset($branchData['id']) && $branchData['id']) {
                // Update existing branch
                $customer_address = CustomerAddressDetails::findOrFail($branchData['id']);
                $existingBranchIds[] = $branchData['id'];
            } else {
                // Create new branch
                $customer_address = new CustomerAddressDetails();
                $customer_address->customer_id = $customer->id;
            }

            $customer_address->branch_name = $branchData['branch_name'];
            $customer_address->address = $branchData['address'];
            $customer_address->address2 = $branchData['address2'] ?? null;
            $customer_address->city = $branchData['city'];
            $customer_address->state = $branchData['state'];
            $customer_address->country = $branchData['country'];
            $customer_address->pincode = $branchData['pincode'];
            $customer_address->is_primary = ($index == $primaryBranchIndex);
            $customer_address->save();

            if (!isset($branchData['id']) || !$branchData['id']) {
                $existingBranchIds[] = $customer_address->id;
            }
        }

        // Delete branches that were removed
        CustomerAddressDetails::where('customer_id', $customer->id)
            ->whereNotIn('id', $existingBranchIds)
            ->delete();

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
        // Filter to show only E-commerce customers
        $customers = Customer::with('branches')
            ->ecommerce()
            ->get();
        return view('/e-commerce/customer/index', compact('customers'));
    }

    public function ec_create()
    {
        return view('/e-commerce/customer/create');
    }

    public function ec_store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // Personal details
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'phone' => 'nullable|min:10',
            'email' => 'required|email|unique:customers,email',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:0,1',

            // Address details (optional for e-commerce customers)
            'address' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'pincode' => 'nullable|min:6',

            // Business details (optional for e-commerce customers)
            'company_name' => 'nullable',
            'company_addr' => 'nullable',
            'gst_no' => 'nullable',
            'pan_no' => 'nullable'
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
        $customer->gender = $request->gender == '1' ? 'male' : 'female';
        $customer->customer_type = 'E-commerce Customer'; // Fixed customer type for e-commerce
        $customer->company_name = $request->company_name;
        $customer->company_addr = $request->company_addr;
        $customer->gst_no = $request->gst_no;
        $customer->pan_no = $request->pan_no;
        $customer->status = 'active';
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
        return redirect()->route('ec.customer.index')->with('success', 'Customer added successfully.');
    }

    public function ec_view($id)
    {
        $customer = Customer::find($id);
        $customer_address = CustomerAddressDetails::where('customer_id', $id)->get();
        return view('/e-commerce/customer/view', compact('customer', 'customer_address'));
    }

    public function ec_edit($id)
    {
        $customer = Customer::find($id);
        $customer_address = CustomerAddressDetails::where('customer_id', $id)->get();
        return view('/e-commerce/customer/edit', compact('customer', 'customer_address'));
    }

    public function ec_update(Request $request, $id)
    {
        // dd($request);
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

        return redirect()->route('ec.customer.index')->with('success', 'Customer updated successfully.');
    }

    public function ec_delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('ec.customer.index')->with('success', 'Customer deleted successfully.');
    }

}
