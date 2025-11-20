<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Meet;
use App\Models\Task;
use App\Models\Lead;

class DashboardController extends Controller
{
    //
    //sales dashboard
    public function index(Request $request){
        $validated = request()->validate([
            // validation rules if any
            'user_id' => 'required',
        ]);
        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }
        // Todays Task List
        $tasks = Meet::where('user_id', $validated['user_id'])
            ->whereDate('created_at', today())
            ->get();

            //total leads = 10
            //Completed Leads = 5
            //Rejected Leads = 2
            //Pending Leads = 3

            $leads = Lead::where('user_id', $validated['user_id'])
            ->get();
            $completed_leads = Lead::where('user_id', $validated['user_id'])
            ->where('status', 'Completed')
            ->get();
            $rejected_leads = Lead::where('user_id', $validated['user_id'])
            ->where('status', 'Rejected')
            ->get();
            $pending_leads = Lead::where('user_id', $validated['user_id'])
            ->where('status', 'Pending')
            ->get();
            $qualified_leads = Lead::where('user_id', $validated['user_id'])
            ->where('status', 'Qualified')
            ->get();
            $converted_leads = Lead::where('user_id', $validated['user_id'])
            ->where('status', 'Converted')
            ->get();

        
        return response()->json(['tasks' => $tasks, 'leads' => $leads, 'completed_leads' => $completed_leads, 'rejected_leads' => $rejected_leads, 'pending_leads' => $pending_leads, 'qualified_leads' => $qualified_leads, 'converted_leads' => $converted_leads], 200);

    }
    //sales dashboard overview

  
   

}
