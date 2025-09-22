<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\EcommerceProduct;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index()
    {
        $orders = Order::with(['product.warehouseProduct', 'customer'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('e-commerce.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        return view('e-commerce.order.create');
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:ecommerce_products,id',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0.01',
            'invoice_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $data = $request->only(['product_id', 'customer_id', 'amount']);

            // Handle file upload
            if ($request->hasFile('invoice_file')) {
                $file = $request->file('invoice_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('invoices', $filename, 'public');
                $data['invoice_file'] = $path;
            }

            $order = Order::create($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully!',
                'redirect' => route('order.index')
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating order: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit($id)
    {
        $order = Order::with(['product.warehouseProduct', 'customer'])->findOrFail($id);
        return view('e-commerce.order.edit', compact('order'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:ecommerce_products,id',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0.01',
            'invoice_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $data = $request->only(['product_id', 'customer_id', 'amount']);

            // Handle file upload
            if ($request->hasFile('invoice_file')) {
                // Delete old file if exists
                if ($order->invoice_file && Storage::disk('public')->exists($order->invoice_file)) {
                    Storage::disk('public')->delete($order->invoice_file);
                }

                $file = $request->file('invoice_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('invoices', $filename, 'public');
                $data['invoice_file'] = $path;
            }

            $order->update($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order updated successfully!',
                'redirect' => route('order.index')
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating order: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);

            // Delete associated file if exists
            if ($order->invoice_file && Storage::disk('public')->exists($order->invoice_file)) {
                Storage::disk('public')->delete($order->invoice_file);
            }

            $order->delete();

            return response()->json([
                'success' => true,
                'message' => 'Order deleted successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('Error deleting order: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the order: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search products for Ajax autocomplete
     */
    public function searchProducts(Request $request)
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $products = EcommerceProduct::with(['warehouseProduct.brand'])
            ->whereHas('warehouseProduct', function ($q) use ($query) {
                $q->where('product_name', 'LIKE', "%{$query}%")
                  ->orWhere('sku', 'LIKE', "%{$query}%")
                  ->where('status', 'active');
            })
            ->where('ecommerce_status', 'active')
            ->limit(10)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->warehouseProduct->product_name,
                    'sku' => $product->warehouseProduct->sku,
                    'brand' => $product->warehouseProduct->brand->brand_title ?? 'N/A',
                    'price' => $product->warehouseProduct->selling_price,
                    'display' => $product->warehouseProduct->product_name . ' (' . $product->warehouseProduct->sku . ')'
                ];
            });

        return response()->json($products);
    }

    /**
     * Search customers for Ajax autocomplete
     */
    public function searchCustomers(Request $request)
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $customers = Customer::where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('first_name', 'LIKE', "%{$query}%")
                  ->orWhere('last_name', 'LIKE', "%{$query}%")
                  ->orWhere('email', 'LIKE', "%{$query}%")
                  ->orWhere('phone', 'LIKE', "%{$query}%")
                  ->orWhere('company_name', 'LIKE', "%{$query}%");
            })
            ->limit(10)
            ->get()
            ->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'name' => $customer->first_name . ' ' . $customer->last_name,
                    'email' => $customer->email,
                    'phone' => $customer->phone,
                    'company_name' => $customer->company_name,
                    'company_addr' => $customer->company_addr,
                    'gst_no' => $customer->gst_no,
                    'pan_no' => $customer->pan_no,
                    'display' => $customer->first_name . ' ' . $customer->last_name . ' (' . $customer->email . ')'
                ];
            });

        return response()->json($customers);
    }

    /**
     * Legacy view method for backward compatibility
     */
    public function view()
    {
        return view('e-commerce.order.view');
    }
}
