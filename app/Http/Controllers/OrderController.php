<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\EcommerceProduct;
use App\Models\Customer;
use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index()
    {
        $orders = Order::with(['product.warehouseProduct', 'customer', 'deliveryMan'])
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
     * Remove multiple orders from storage.
     */
    public function bulkDestroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_ids' => 'required|array|min:1',
            'order_ids.*' => 'required|integer|exists:orders,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid order selection.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            $orderIds = $request->order_ids;
            $deletedCount = 0;
            $errors = [];

            foreach ($orderIds as $orderId) {
                try {
                    $order = Order::find($orderId);

                    if ($order) {
                        // Delete associated file if exists
                        if ($order->invoice_file && Storage::disk('public')->exists($order->invoice_file)) {
                            Storage::disk('public')->delete($order->invoice_file);
                        }

                        $order->delete();
                        $deletedCount++;
                    }
                } catch (\Exception $e) {
                    $errors[] = "Failed to delete order ID {$orderId}: " . $e->getMessage();
                    Log::error("Error deleting order {$orderId}: " . $e->getMessage());
                }
            }

            DB::commit();

            if ($deletedCount > 0) {
                $message = $deletedCount === 1
                    ? '1 order deleted successfully!'
                    : "{$deletedCount} orders deleted successfully!";

                if (!empty($errors)) {
                    $message .= ' However, some orders could not be deleted.';
                }

                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'deleted_count' => $deletedCount,
                    'errors' => $errors
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No orders were deleted.',
                    'errors' => $errors
                ], 400);
            }

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in bulk delete: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting orders: ' . $e->getMessage()
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
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::with(['product.warehouseProduct', 'customer', 'deliveryMan'])
            ->findOrFail($id);

        // Get all Indian cities for the dropdown
        $indianCities = [
            'Mumbai', 'Delhi', 'Bangalore', 'Hyderabad', 'Ahmedabad', 'Chennai', 'Kolkata',
            'Surat', 'Pune', 'Jaipur', 'Lucknow', 'Kanpur', 'Nagpur', 'Indore', 'Thane',
            'Bhopal', 'Visakhapatnam', 'Pimpri-Chinchwad', 'Patna', 'Vadodara', 'Ghaziabad',
            'Ludhiana', 'Agra', 'Nashik', 'Faridabad', 'Meerut', 'Rajkot', 'Kalyan-Dombivli',
            'Vasai-Virar', 'Varanasi', 'Srinagar', 'Aurangabad', 'Dhanbad', 'Amritsar',
            'Navi Mumbai', 'Allahabad', 'Ranchi', 'Howrah', 'Coimbatore', 'Jabalpur'
        ];

        return view('e-commerce.order.view', compact('order', 'indianCities'));
    }

    /**
     * Get delivery men by city for AJAX request
     */
    public function getDeliveryMenByCity($city)
    {
        $deliveryMen = DeliveryMan::where('city', $city)
            ->where('status', 'Active')
            ->select('id', 'first_name', 'last_name', 'current_address')
            ->get();

        return response()->json($deliveryMen);
    }

    /**
     * Assign delivery man to order
     */
    public function assignDeliveryMan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'delivery_man_id' => 'required|exists:delivery_men,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $order = Order::findOrFail($id);
            $order->delivery_man_id = $request->delivery_man_id;
            $order->status = 'Assigned';
            $order->save();

            $deliveryMan = DeliveryMan::find($request->delivery_man_id);

            return response()->json([
                'success' => true,
                'message' => 'Delivery man assigned successfully',
                'delivery_man' => [
                    'name' => $deliveryMan->full_name,
                    'address' => $deliveryMan->current_address
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to assign delivery man'
            ], 500);
        }
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:Pending,Assigned,Out for Delivery,Delivered',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $order = Order::findOrFail($id);
            $order->status = $request->status;
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Order status updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update order status'
            ], 500);
        }
    }

    /**
     * Generate and download PDF invoice for an order
     */
    public function generateInvoice($id)
    {
        try {
            // Fetch order with all related data
            $order = Order::with([
                'product.warehouseProduct',
                'customer.address',
                'deliveryMan'
            ])->findOrFail($id);

            // Calculate tax and totals
            $subtotal = $order->amount;
            $taxRate = 18; // Default GST rate - you can make this configurable
            $taxAmount = ($subtotal * $taxRate) / 100;
            $total = $subtotal + $taxAmount;

            // Prepare data for the invoice template
            $invoiceData = [
                'order' => $order,
                'invoice_number' => 'INV-' . str_pad($order->id, 6, '0', STR_PAD_LEFT),
                'invoice_date' => $order->created_at->format('d/m/Y'),
                'subtotal' => $subtotal,
                'tax_rate' => $taxRate,
                'tax_amount' => $taxAmount,
                'total' => $total,
                'amount_in_words' => $this->convertNumberToWords($total),
                'company' => [
                    'name' => 'CrackTeck Solutions Pvt. Ltd.',
                    'address' => 'Tech Park, Mumbai - 400001',
                    'gstin' => '27AABCC1234M1Z2',
                    'phone' => '+91 98765 43210',
                    'email' => 'info@crackteck.com'
                ]
            ];

            // Generate PDF
            $pdf = Pdf::loadView('invoice', $invoiceData);

            // Set paper size and orientation
            $pdf->setPaper('A4', 'portrait');

            // Set options for better rendering
            $pdf->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => false,
                'defaultFont' => 'Arial'
            ]);

            // Generate filename
            $filename = 'invoice-' . str_pad($order->id, 6, '0', STR_PAD_LEFT) . '.pdf';

            // Return PDF download response
            return $pdf->download($filename);

        } catch (\Exception $e) {
            Log::error('Error generating invoice: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to generate invoice. Please try again.');
        }
    }

    /**
     * Convert number to words (Indian format)
     */
    private function convertNumberToWords($number)
    {
        $number = (int) $number;

        if ($number == 0) {
            return 'Zero Rupees Only';
        }

        $words = [
            0 => '', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five',
            6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine', 10 => 'Ten',
            11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen', 20 => 'Twenty',
            30 => 'Thirty', 40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty', 70 => 'Seventy',
            80 => 'Eighty', 90 => 'Ninety'
        ];

        $result = '';

        if ($number >= 10000000) { // Crores
            $crores = intval($number / 10000000);
            $result .= $this->convertHundreds($crores, $words) . ' Crore ';
            $number %= 10000000;
        }

        if ($number >= 100000) { // Lakhs
            $lakhs = intval($number / 100000);
            $result .= $this->convertHundreds($lakhs, $words) . ' Lakh ';
            $number %= 100000;
        }

        if ($number >= 1000) { // Thousands
            $thousands = intval($number / 1000);
            $result .= $this->convertHundreds($thousands, $words) . ' Thousand ';
            $number %= 1000;
        }

        if ($number >= 100) { // Hundreds
            $hundreds = intval($number / 100);
            $result .= $words[$hundreds] . ' Hundred ';
            $number %= 100;
        }

        if ($number >= 20) {
            $tens = intval($number / 10) * 10;
            $result .= $words[$tens] . ' ';
            $number %= 10;
        }

        if ($number > 0) {
            $result .= $words[$number] . ' ';
        }

        return trim($result) . ' Rupees Only';
    }

    /**
     * Helper method to convert hundreds
     */
    private function convertHundreds($number, $words)
    {
        $result = '';

        if ($number >= 100) {
            $hundreds = intval($number / 100);
            $result .= $words[$hundreds] . ' Hundred ';
            $number %= 100;
        }

        if ($number >= 20) {
            $tens = intval($number / 10) * 10;
            $result .= $words[$tens] . ' ';
            $number %= 10;
        }

        if ($number > 0) {
            $result .= $words[$number] . ' ';
        }

        return trim($result);
    }
}
