<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('/crm/access-control/staff/index', compact('users'));
    }

    public function create()
    {
        return view('/crm/access-control/staff/create');
    }

    public function view($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        return view('/crm/access-control/staff/view', compact('users', 'roles'));
    }

    public function assignRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|exists:roles,name',
        ]);

        $users = User::find($id);

        if (!$users) {
            return redirect()->route('roles.index')->with('error', 'User not found.');
        }

        $users->syncRoles($request->name);

        return redirect()->route('roles.index')->with('success', 'Role assigned successfully.');
    }
}
