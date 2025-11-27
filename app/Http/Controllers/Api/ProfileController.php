<?php

namespace App\Http\Controllers\Api;

use App\Models\Engineer;
use App\Models\DeliveryMan;
use App\Models\SalesPerson;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\CustomerAddressDetails;

class ProfileController extends Controller
{
    //
    protected function getModelByRoleId($roleId)
    {
        return [
            1 => Engineer::class,
            2 => DeliveryMan::class,
            3 => SalesPerson::class,
            4 => Customer::class,
        ][$roleId] ?? null;
    }

    protected function getRoleId($roleId)
    {
        return [
            1 => 'engineer',
            2 => 'delivery_man',
            3 => 'sales_person',
            4 => 'customers',
        ][$roleId] ?? null;
    }

    public function index(Request $request)
    {
        $validated = request()->validate([
            // validation rules if any
            'role_id' => 'required|in:1,2,3,4',
            'user_id' => 'required',
        ]);

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $model = $this->getModelByRoleId($request->role_id);
        if (!$model) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($model == Customer::class) {
            $user = Customer::with('address')->where('id', $validated['user_id'])->first();
        } else {
            $user = $model::where('id', $validated['user_id'])->first();
        }

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found with the provided phone number.'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request)
    {

        $validated = Validator::make($request->all(),[
            // validation rules if any
            'role_id' => 'required|in:1,2,3,4',
            'user_id' => 'required',
        ]);
        
        $validated = $validated->validated();
        // return response()->json(['message' => $request->all()], 501);
        
        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }
        if (!$request->role_id) {
            return response()->json(['message' => 'Role ID is required'], 400);
        }
        

        if ($request->role_id == 4) {
            // return  response()->json(['message' => $request->address], 501);
            $user = Customer::findOrFail($validated['user_id']);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->pan_no = $request->pan_no;

            $user->company_name = $request->company_name;
            $user->company_addr = $request->company_addr;
            $user->gst_no = $request->gst_no;
            $user->customer_type = $request->customer_type;
            $user->save();  

            $userAddress = CustomerAddressDetails::where('customer_id', $validated['user_id'])->first();
            if (!$userAddress) {
                $userAddress = new CustomerAddressDetails();
                $userAddress->customer_id = $validated['user_id'];
            }
            $userAddress->branch_name = $request->branch_name;
            $userAddress->address = $request->address;
            $userAddress->address2 = $request->address2;
            $userAddress->city = $request->city;
            $userAddress->state = $request->state;
            $userAddress->country = $request->country;
            $userAddress->pincode = $request->pincode;
            $userAddress->save();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not updated.'], 404);
            }
            return response()->json(['user' => $user], 200);
        }
        
        $model = $this->getModelByRoleId($request->role_id);
        if (!$model) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }
        
        $user = $model::findOrFail($validated['user_id']);
        $user->update($request->all());
        
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not updated.'], 404);
        }
        return response()->json(['user' => $user], 200);
    }
}
