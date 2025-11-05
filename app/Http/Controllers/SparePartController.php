<?php

namespace App\Http\Controllers;

use App\Models\SparePartRequest;
use App\Models\DeliveryMan;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    /**
     * Display a listing of all spare part requests.
     */
    public function index()
    {
        $sparePartRequests = SparePartRequest::with([
            'product',
            'engineer',
            'deliveryMan'
        ])
            ->orderBy('request_date', 'desc')
            ->get();

        return view('/warehouse/spare-parts-requests/index', compact('sparePartRequests'));
    }

    /**
     * Display a specific spare part request.
     */
    public function view($id)
    {
        $sparePartRequest = SparePartRequest::with([
            'product',
            'engineer',
            'deliveryMan', 
            'customerServiceRequest'
        ])->findOrFail($id);

        $deliveryMen = DeliveryMan::where('status', 'Active')->get();
        dd($sparePartRequest);
        return view('/warehouse/spare-parts-requests/view', compact('sparePartRequest', 'deliveryMen'));
    }

    /**
     * Assign a delivery man to a spare part request.
     */
    public function assignDeliveryMan(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'delivery_man_id' => 'required|exists:delivery_men,id',
            'approval_status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $sparePartRequest = SparePartRequest::findOrFail($id);
        $sparePartRequest->update([
            'quantity' => $request->quantity,
            'delivery_man_id' => $request->delivery_man_id,
            'approval_status' => $request->approval_status,
        ]);

        return redirect()->route('spare-parts.index', $id)
            ->with('success', 'Delivery man assigned successfully.');
    }
}
