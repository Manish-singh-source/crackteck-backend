<?php

namespace App\Http\Controllers\Api;

use App\Models\Engineer;
use App\Models\DeliveryMan;
use App\Models\SalesPerson;
use App\Models\Customer;
use App\Models\EcommerceProduct;
use App\Models\Product;
use App\Models\EcommerceOrder;
use App\Models\EcommerceOrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

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

    //Sales Person and Customer
    public function listProducts(Request $request)
    {
        $roleValidated = Validator::make($request->all(), ([
            'role_id' => 'required|in:3,4',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }

        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'customers' || $staffRole == 'sales_person') {

            if ($request->filled('search')) {
                $products = EcommerceProduct::where('product_name', 'like', "%{$request->search}%")->get();
            } else {
                $products = EcommerceProduct::get();
            }

            return response()->json(['products' => $products], 200);
        }
    }

    public function product(Request $request, $product_id)
    {
        $roleValidated = Validator::make($request->all(), ([
            'role_id' => 'required|in:3,4',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }

        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'customers' || $staffRole == 'sales_person') {
            $product = EcommerceProduct::find($product_id);

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }
            return response()->json(['product' => $product], 200);
        }
    }

    // Buy Product
    // role_id, product_id, quantity
    public function buyProduct(Request $request, $product_id)
    {
        // return response()->json(['message' => $request->all()], 501);
        $roleValidated = Validator::make($request->all(), ([
            'role_id' => 'required|in:4',
            'quantity' => 'required|integer|min:1',
            'customer_id' => 'required',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }

        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'customers') {
            $product = EcommerceProduct::find($product_id);

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            // Store Order in Order Table 
            $customer = Customer::with('address')->where('id', $request->customer_id)->first();
            if (!$customer) {
                return response()->json(['message' => 'Customer not found'], 404);
            }

            $quantity = $request->quantity;
            $price = $product->selling_price;
            $total = $quantity * $price;

            $order = EcommerceOrder::create([
                'user_id' => 1,
                'customer_id' => $request->customer_id,
                'order_number' => 'ORD-' . date('YmdHis') . '-' .$request->customer_id,
                'order_source' => 'buy_now',
                'email' => $customer->email,
                
                'shipping_first_name' => $customer->first_name,
                'shipping_last_name' => $customer->last_name,
                'shipping_country' => $customer->address->country,
                'shipping_state' => $customer->address->state,
                'shipping_city' => $customer->address->city,
                'shipping_zipcode' => $customer->address->pincode,
                'shipping_address_line_1' => $customer->address->address,
                'shipping_address_line_2' => $customer->address->address2,
                'shipping_phone' => $customer->phone,
                'billing_same_as_shipping' => true,
                'billing_first_name' => $customer->first_name,
                'billing_last_name' => $customer->last_name,
                'billing_country' => $customer->country,
                'billing_state' => $customer->address->state,
                'billing_city' => $customer->address->city,
                'billing_zipcode' => $customer->address->pincode,
                'billing_address_line_1' => $customer->address->address,
                'billing_address_line_2' => $customer->address->address2,
                'billing_phone' => $customer->phone, 
                'payment_method' => 'cod',
                'card_name' => null,
                'card_last_four' => null,
                'card_expiry' => null,
                'subtotal' => $total,
                'shipping_charges' => 0,
                'discount_amount' => 0,
                'coupon_code' => null,
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            EcommerceOrderItem::create([
                'ecommerce_order_id' => $order->id,
                'ecommerce_product_id' => $product->id,
                'product_name' => $product->product_name,
                'product_sku' => $product->sku,
                'product_image' => $product->main_product_image,
                'unit_price' => $product->selling_price,
                'quantity' => $quantity,
                'total_price' => $total,
                'hsn_sac_code' => $product->hsn_code,
                'tax_percentage' => $product->tax ?? 18,
                'taxable_value' => $total,  // Total price before tax
                'igst_amount' => 0,  // IGST amount
                'final_amount' => $total,  // Total price after tax
                'shipping_charges' => 0,  // Individual item shipping charges
                'free_shipping' => true,
            ]);

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'quantity' => $quantity,
                'price' => $price,
                'total' => $total,
                'message' => 'Order placed successfully!'
            ], 200);
        }
    }

    public function listOrders(Request $request)
    {
        $roleValidated = Validator::make($request->all(), ([
            'customer_id' => 'required',
            'role_id' => 'required|in:4',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }

        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'customers') {
            $orders = EcommerceOrder::with('orderItems')->where('customer_id', $request->customer_id)->get();
            return response()->json(['orders' => $orders], 200);
        }
    }

    // Engineer 

    public function allListProducts(Request $request)
    {

        $roleValidated = Validator::make($request->all(), ([
            'role_id' => 'required|in:1',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }

        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'engineer') {
            if ($request->filled('search')) {
                $products = Product::where('product_name', 'like', "%{$request->search}%")->get();
            } else {
                $products = Product::get();
            }

            return response()->json(['products' => $products], 200);
        }
    }

    public function allProduct(Request $request, $product_id)
    {

        $roleValidated = Validator::make($request->all(), ([
            'role_id' => 'required|in:1',
        ]));

        if ($roleValidated->fails()) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $roleValidated->errors()], 422);
        }

        $staffRole = $this->getRoleId($request->role_id);

        if (!$staffRole) {
            return response()->json(['success' => false, 'message' => 'Invalid role_id provided.'], 400);
        }

        if ($staffRole == 'engineer') {
            $product = Product::find($product_id);

            if (!$product) {
                return response()->json(['message' => 'Product not found'], 404);
            }
            return response()->json(['product' => $product], 200);
        }
    }
}
