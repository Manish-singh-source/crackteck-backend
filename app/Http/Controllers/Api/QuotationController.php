<?php

namespace App\Http\Controllers\Api;

use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\QuotationResource;
use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
      //
    //   I want quotation list with there products details
    public function index(Request $request){
        $validated = Validator::make($request->all(),([
            // validation rules if any
            'user_id' => 'required',
        ]));

        if ($validated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $validated->errors()], 422);
        }
        
        $validated = $validated->validated();

        $quotations = Quotation::with('products')->where('user_id', $validated['user_id'])->paginate();

        if ($quotations->isEmpty()) {
            return response()->json(['message' => 'No quotations found'], 404);
        }

        return QuotationResource::collection($quotations);
    }

    public function store(Request $request) {
        $validated = Validator::make($request->all(),([
            // validation rules if any
            'user_id' => 'required',
            'lead_id' => 'required',
            'quote_id' => 'required',
            'quote_date' => 'required',
            'expiry_date' => 'required',
        ]));

        if ($validated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $validated->errors()], 422);
        }        

        $Quotation = Quotation::create($validated);

        if (!$Quotation) {
            return response()->json(['message' => 'Quotation not created'], 500);
        }

        return new QuotationResource($Quotation);
    }

    public function show(Request $request, $lead_id) {
        $validated = Validator::make($request->all(),([
            // validation rules if any
            'user_id' => 'required',
        ]));

        if ($validated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $validated->errors()], 422);
        }

        $validated = $validated->validated();
        
        $Quotation = Quotation::where('user_id', $validated['user_id'])->find($lead_id);


        if (!$Quotation) {
            return response()->json(['message' => 'Quotation not found'], 404);
        }

        return new QuotationResource($Quotation);
    }

    public function update(Request $request, $Quotation_id) {
        $validated = Validator::make($request->all(),([
            // validation rules if any
            'user_id' => 'required',
        ]));

        if ($validated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $validated->errors()], 422);
        }

        $Quotation = Quotation::where('user_id', $validated['user_id'])->where('id', $Quotation_id)->update($request->all());

        return response()->json(['Quotation' => $Quotation], 200);
    }

    public function destroy(Request $request, $lead_id) {
        $validated = Validator::make($request->all(),([
            // validation rules if any
            'user_id' => 'required',
        ]));
        
        if ($validated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $validated->errors()], 422);
        }

        Quotation::where('user_id', $validated['user_id'])->where('id', $lead_id)->delete();

        return response()->json(['message' => 'Follow Up deleted successfully'], 200);
    }
}
