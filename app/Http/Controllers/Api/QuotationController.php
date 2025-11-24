<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuotationResource;
use Illuminate\Http\Request;
use App\Models\Quotation;

class QuotationController extends Controller
{
      //
    public function index(Request $request){
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $Quotation = Quotation::where('user_id', $validated['user_id'])->paginate();

        return QuotationResource::collection($Quotation);
    }

    public function store(Request $request) {
        $validated = request()->validate([
            'user_id' => 'required',
            'lead_id' => 'required',
            'quote_id' => 'required',
            'quote_date' => 'required',
            'expiry_date' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $Quotation = Quotation::create($validated);

        if (!$Quotation) {
            return response()->json(['message' => 'Quotation not created'], 500);
        }

        return new QuotationResource($Quotation);
    }

    public function show(Request $request, $lead_id) {
        $validated = request()->validate([
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $Quotation = Quotation::where('user_id', $validated['user_id'])->find($lead_id);

        if (!$Quotation) {
            return response()->json(['message' => 'Quotation not found'], 404);
        }

        return new QuotationResource($Quotation);
    }

    public function update(Request $request, $Quotation_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        $Quotation = Quotation::where('user_id', $validated['user_id'])->where('id', $Quotation_id)->update($request->all());

        return response()->json(['Quotation' => $Quotation], 200);
    }

    public function destroy(Request $request, $lead_id) {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        Quotation::where('user_id', $validated['user_id'])->where('id', $lead_id)->delete();

        return response()->json(['message' => 'Follow Up deleted successfully'], 200);
    }
}
