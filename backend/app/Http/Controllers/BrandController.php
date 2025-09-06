<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    //
    public function index()
    {
        $brand = Brand::all();
        return view('e-commerce/brands/index', compact('brand'));
    }

    public function create()
    {
        return view('e-commerce/brands/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_title' => 'required',
            'logo' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $brand = new Brand();
        $brand->brand_title = $request->brand_title;
        
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
    
            $file->move(public_path('uploads/crm/brand/logo'), $filename);
            $brand->logo = 'uploads/crm/brand/logo/' . $filename;
        }

        $brand->status = $request->status;
        $brand->save();
        

        if (!$brand) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('brand.index')->with('success', 'Brand added successfully.');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('e-commerce/brands/edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'brand_title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $brand = Brand::findOrFail($id);
        $brand->brand_title = $request->brand_title;
        
        if ($request->hasFile('logo')) {

            // Only if updating profile 
            if ($brand->logo != '') {
                if (File::exists(public_path($brand->logo))) {
                    File::delete(public_path($brand->logo));
                }
            }
            // updating profile end

            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // dd($filename);
    
            $file->move(public_path('uploads/crm/brand/logo'), $filename);
            $brand->logo = 'uploads/crm/brand/logo/' . $filename;
        }

        $brand->status = $request->status;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully.');
    }
}
