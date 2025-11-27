<?php

namespace App\Http\Controllers\Api;

use App\Models\Customer;
use App\Models\Engineer;
use App\Models\DeliveryMan;
use App\Models\SalesPerson;
use Illuminate\Http\Request;
use App\Models\EcommerceOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DeliveryOrderController extends Controller
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

    public function acceptOrder(Request $request)
    {
        //
        $validated = Validator::make($request->all(), [
            // validation rules if any
            'order_id' => 'required',
            'user_id' => 'required',
        ]);

        $validated = $validated->validated();

        if (!$validated['order_id']) {
            return response()->json(['message' => 'Order ID is required'], 400);
        }

        if (!$validated['user_id']) {
            return response()->json(['message' => 'User ID is required'], 400);
        }

        $acceptOrder = EcommerceOrder::where('id', $validated['order_id'])->first();
        if (!$acceptOrder) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        if ($acceptOrder->delivery_man_id != $validated['user_id']) {
            return response()->json(['message' => 'Order already accepted by another delivery man'], 400);
        }
        $acceptOrder->update(['status' => 'processing']);
        $acceptOrder->save();

        return response()->json(['message' => 'Order accepted successfully'], 200);
    }



    public function allOrders(Request $request) {
        $roleValidated = Validator::make($request->all(), ([
            'role_id' => 'required|in:2',
            'user_id' => 'required',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }
        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'delivery_man') {
            $orders = EcommerceOrder::with(['orderItems'])->where('delivery_man_id', $request->user_id);
            if ($request->filled('status')) {
                $orders->where('status', $request->status);
            }
            $orders = $orders->get();
            return response()->json(['orders' => $orders], 200);
        }
    }


    public function orderDetails(Request $request, $order_id)
    {
        $roleValidated = Validator::make($request->all(), ([
            'role_id' => 'required|in:2',
            'user_id' => 'required',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }

        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'delivery_man') {
            $order = EcommerceOrder::with(['orderItems'])->where('id', $order_id)->first();

            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }
            return response()->json(['order' => $order], 200);
        }
    }
}
