<?php

namespace App\Http\Controllers\Api;

use App\Models\Engineer;
use App\Models\DeliveryMan;
use App\Models\SalesPerson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    protected function getModelByRoleId($roleId)
    {
        return [
            1 => SalesPerson::class,
            2 => Engineer::class,
            3 => DeliveryMan::class,
        ][$roleId] ?? null;
    }

    public function index(Request $request)
    {
        $validated = request()->validate([
            // validation rules if any
            'role_id' => 'required|in:1,2,3',
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $model = $this->getModelByRoleId($request->role_id);
        if (!$model) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        $user = $model::where('id', $validated['user_id'])->first();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found with the provided phone number.'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request)
    {
        $validated = request()->validate([
            // validation rules if any
            'role_id' => 'required|in:1,2,3',
            'user_id' => 'required',
        ]);
        
        $model = $this->getModelByRoleId($request->role_id);
        if (!$model) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }
        
        $user = $model::findOrFail($validated['user_id']);
        $user->address = $request->address;
        $user->save();
        
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not updated.'], 404);
        }
        return response()->json(['user' => $user], 200);
    }
}
