<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetController extends Controller
{
    //
    public function index()
    {
        $meet = Meet::all();
        return view('/crm/meets/index', compact('meet'));
        // return view('/crm/meets/index');
    }

    public function create()
    {
        return view('/crm/meets/create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'lead_id' => 'required',
            'meet_title' => 'required|min:3',
            'client_name' => 'required|min:3',
            'meeting_type' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $meet = new Meet();
        $meet->lead_id = $request->lead_id;
        $meet->meet_title = $request->meet_title;
        $meet->client_name = $request->client_name;
        $meet->meeting_type = $request->meeting_type;
        $meet->date = $request->date;
        $meet->time = $request->time;
        $meet->location = $request->location;
        $meet->attachment = $request->attachment;
        $meet->meetAgenda = $request->meetAgenda;
        $meet->followUp = $request->followUp;
        $meet->status = $request->status;

        $meet->save();

        if (!$meet) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('meets.index')->with('success', 'Meets added successfully.');
    }

    public function view($id)
    {
        $meet = Meet::find($id);
        return view('/crm/meets/view', compact('meet'));
    }

    public function edit($id)
    {
        $meet = Meet::find($id);
        return view('/crm/meets/edit', compact('meet'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'lead_id' => 'required',
            'meet_title' => 'required|min:3',
            'client_name' => 'required|min:3',
            'meeting_type' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());

        $meet = Meet::findOrFail($id);
        $meet->lead_id = $request->lead_id;
        $meet->meet_title = $request->meet_title;
        $meet->client_name = $request->client_name;
        $meet->meeting_type = $request->meeting_type;
        $meet->date = $request->date;
        $meet->time = $request->time;
        $meet->location = $request->location;
        $meet->attachment = $request->attachment;
        $meet->meetAgenda = $request->meetAgenda;
        $meet->followUp = $request->followUp;
        $meet->status = $request->status;

        $meet->save();

        return redirect()->route('meets.index')->with('success', 'Meets updated successfully.');
    }

    public function delete($id)
    {
        $meet = Meet::findOrFail($id);
        $meet->delete();

        return redirect()->route('meets.index')->with('success', 'Meets deleted successfully.');
    }
}
