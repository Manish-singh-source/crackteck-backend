<?php

namespace App\Http\Controllers;

use App\Models\ProductVariantAttribute;
use App\Models\ProductVariantAttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductVariantsController extends Controller
{
    //
    public function index()
    {
        $attributeName = ProductVariantAttribute::all();
        return view('/e-commerce/product-variants/index', compact('attributeName'));
    }

    public function view($id)
    {
        $attributeName = ProductVariantAttribute::findOrFail($id);
        $attributeValue = ProductVariantAttributeValue::where('attribute_id', $id)->get();
        return view('/e-commerce/product-variants/view', compact('attributeName', 'attributeValue'));
    }

    public function storeAttribute(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute_name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $attributeName = new ProductVariantAttribute();
        $attributeName->attribute_name = $request->attribute_name;
        $attributeName->status = $request->status;
        $attributeName->save();

        if (!$attributeName) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('variant.index')->with('success', 'Product Variant Attribute added successfully.');
    }

    public function storeAttributeValue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute_id' => 'required',
            'attribute_value' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $attributeValue = new ProductVariantAttributeValue();
        $attributeValue->attribute_id = $request->attribute_id;
        $attributeValue->attribute_value = $request->attribute_value;
        $attributeValue->save();

        if (!$attributeValue) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('variant.index')->with('success', 'Product Variant Attribute added successfully.');
    }

    public function deleteAttribute($id)
    {
        $attributeName = ProductVariantAttribute::findOrFail($id);
        $attributeName->delete();

        return redirect()->route('variant.index')->with('success', 'Product Variant deleted successfully.');
    }
}
