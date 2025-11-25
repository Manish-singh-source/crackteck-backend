<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Models\Meet;
use App\Models\FollowUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;

class DashboardController extends Controller
{
    //
    //sales dashboard
    public function index(Request $request)
    {
        
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);
        
        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }
        
        $meets = Meet::where('user_id', $validated['user_id'])->where('date', today())->get();
        $followup = FollowUp::where('user_id', $validated['user_id'])->where('followup_date', today())->get();

        return response()->json(['meets' => $meets, 'followup' => $followup], 200);
    }

    public function salesOverview(Request $request)
    {
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);
        
        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $lostLeads = Lead::where('user_id', $validated['user_id'])->where('status', 'Lost')->count();
        $newLeads = Lead::where('user_id', $validated['user_id'])->where('status', 'New')->count();
        $contactedLeads = Lead::where('user_id', $validated['user_id'])->where('status', 'Contacted')->count();
        $qualifiedLeads = Lead::where('user_id', $validated['user_id'])->where('status', 'Qualified')->count();
        $quotedLeads = Lead::where('user_id', $validated['user_id'])->where('status', 'Quoted')->count();

        return response()->json(['lost_leads' => $lostLeads, 'new_leads' => $newLeads, 'contacted_leads' => $contactedLeads, 'qualified_leads' => $qualifiedLeads, 'quoted_leads' => $quotedLeads], 200);
    }
}
