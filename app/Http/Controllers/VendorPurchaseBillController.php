<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorPurchaseBillRequest;
use App\Models\VendorPurchaseBill;

class VendorPurchaseBillController extends Controller
{
    /**
     * Display a listing of the vendor purchase bills.
     */
    public function index()
    {
        $vendorPurchaseBills = VendorPurchaseBill::orderBy('created_at', 'desc')->get();
        return view('/warehouse/vendor-purchase-bills/index', compact('vendorPurchaseBills'));
    }

    /**
     * Show the form for creating a new vendor purchase bill.
     */
    public function create()
    {
        return view('/warehouse/vendor-purchase-bills/create');
    }

    /**
     * Store a newly created vendor purchase bill in storage.
     */
    public function store(StoreVendorPurchaseBillRequest $request)
    {
        $validatedData = $request->validated();

        // Handle file upload
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/vendor-purchase-bills'), $filename);
            $validatedData['attachment'] = 'uploads/vendor-purchase-bills/' . $filename;
        }

        VendorPurchaseBill::create($validatedData);

        return redirect()->route('vendor.index')->with('success', 'Vendor Purchase Bill created successfully.');
    }

    /**
     * Display the specified vendor purchase bill.
     */
    public function view($id)
    {
        $vendorPurchaseBill = VendorPurchaseBill::findOrFail($id);
        return view('/warehouse/vendor-purchase-bills/view', compact('vendorPurchaseBill'));
    }

    /**
     * Show the form for editing the specified vendor purchase bill.
     */
    // public function edit($id)
    // {
    //     $vendorPurchaseBill = VendorPurchaseBill::findOrFail($id);
    //     return view('/warehouse/vendor-purchase-bills/edit', compact('vendorPurchaseBill'));
    // }

    public function edit($id)
    {
        $vendorPurchaseBill = VendorPurchaseBill::find($id);

        if (!$vendorPurchaseBill) {
            return redirect()->route('vendor.index')->with('error', 'Record not found.');
        }

        return view('/warehouse/vendor-purchase-bills/edit', compact('vendorPurchaseBill'));
    }

    /**
     * Update the specified vendor purchase bill in storage.
     */
    public function update(StoreVendorPurchaseBillRequest $request, $id)
    {
        $vendorPurchaseBill = VendorPurchaseBill::findOrFail($id);
        $validatedData = $request->validated();

        // Handle file upload
        if ($request->hasFile('attachment')) {
            // Delete old file if exists
            if ($vendorPurchaseBill->attachment && file_exists(public_path($vendorPurchaseBill->attachment))) {
                unlink(public_path($vendorPurchaseBill->attachment));
            }

            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/vendor-purchase-bills'), $filename);
            $validatedData['attachment'] = 'uploads/vendor-purchase-bills/' . $filename;
        }

        $vendorPurchaseBill->update($validatedData);

        return redirect()->route('vendor.index')->with('success', 'Vendor Purchase Bill updated successfully.');
    }

    /**
     * Remove the specified vendor purchase bill from storage.
     */
    public function destroy($id)
    {
        $vendorPurchaseBill = VendorPurchaseBill::findOrFail($id);

        // Delete attachment file if exists
        if ($vendorPurchaseBill->attachment && file_exists(public_path($vendorPurchaseBill->attachment))) {
            unlink(public_path($vendorPurchaseBill->attachment));
        }

        $vendorPurchaseBill->delete();

        return redirect()->route('vendor.index')->with('success', 'Vendor Purchase Bill deleted successfully.');
    }
}
