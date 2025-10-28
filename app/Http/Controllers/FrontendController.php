<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBanner;
use App\Models\ParentCategorie;
use App\Models\ProductDeal;
use App\Models\Collection;
use App\Models\Product;
use App\Models\AMC;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    /**
     * Display the frontend homepage with active banners, categories, deals, and collections
     */
    public function index()
    {
        // Get active banners ordered by sort_order
        $banners = WebsiteBanner::active()->ordered()->get();

        // Get active parent categories for e-commerce display, ordered by sort_order
        $categories = ParentCategorie::active()
            ->ecommerceActive()
            ->ordered()
            ->get();

        // Get active collections with their categories
        $collections = Collection::active()
            ->with('categories')
            ->orderBy('created_at', 'desc')
            ->limit(8) // Limit to 8 collections for homepage display
            ->get();


        // Get active deals that are currently running
        $activeDeals = ProductDeal::with([
                'dealItems.ecommerceProduct.warehouseProduct.brand',
                'dealItems.ecommerceProduct.warehouseProduct'
            ])
            ->where('status', 'active')
            ->where('offer_start_date', '<=', Carbon::now())
            ->where('offer_end_date', '>=', Carbon::now())
            ->orderBy('offer_start_date', 'desc')
            ->get();

        $products = Product::with(['brand', 'parentCategorie', 'subCategorie'])->get();
        // dd($products);  

        return view('frontend.index', compact('banners', 'categories', 'collections', 'activeDeals', 'products'));
    }

    /**
     * Display collection details page with associated products
     */
    public function collectionDetails($id)
    {
        // Get the collection with its categories
        $collection = Collection::active()
            ->with('categories')
            ->findOrFail($id);

        // Get all products that belong to categories in this collection
        $categoryIds = $collection->categories->pluck('id');

        $products = Product::whereIn('parent_category_id', $categoryIds)
            ->where('status', 1) // Only active products
            ->with(['brand', 'parentCategorie', 'subCategorie'])
            ->paginate(20);

        return view('frontend.collection-details', compact('collection', 'products'));
    }

    public function getProduct(Request $request)
    {

        $product = Product::with(['brand', 'parentCategorie', 'subCategorie'])->findOrFail($request->id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $product
        ]);
    }

    /**
     * Display AMC plans page with active plans grouped by type
     */
    public function amcPlans()
    {
        // Get active AMC plans grouped by plan type
        $monthlyPlans = AMC::where('status', 'Active')
            ->where('plan_type', 'Monthly')
            ->get();

            // dd($monthlyPlans);

        $annualPlans = AMC::where('status', 'Active')
            ->where('plan_type', 'Annually')
            ->get();


        return view('frontend.amc', compact('monthlyPlans', 'annualPlans'));
    }

    /**
     * Get product categories for AMC form dropdown
     */
    public function getProductCategories()
    {
        $categories = ParentCategorie::where('status', '1')
            ->select('id', 'parent_categories as name')
            ->orderBy('parent_categories')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    /**
     * Get brands for AMC form dropdown
     */
    public function getBrands()
    {
        $brands = Brand::select('id', 'brand_title as name')
            ->orderBy('brand_title')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $brands
        ]);
    }

    /**
     * Get AMC plans with durations for form dropdown
     */
    public function getAmcPlansData()
    {
        $plans = AMC::where('status', 'Active')
            ->select('id', 'plan_name', 'plan_type', 'duration', 'total_cost', 'description')
            ->orderBy('plan_type')
            ->orderBy('plan_name')
            ->get()
            ->groupBy('plan_type');

        return response()->json([
            'success' => true,
            'data' => $plans
        ]);
    }

    /**
     * Submit AMC service request form
     */
    public function submitAmcRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Step 1: Customer Details
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'customer_type' => 'required|string',

            // Step 3: Product Information
            'product_type' => 'required|string',
            'brand_name' => 'required|string',
            'model_number' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'purchase_date' => 'required|date',

            // Step 4: AMC Plan Selection
            'plan_type' => 'required|in:Monthly,Annually',
            'amc_plan_id' => 'required|exists:a_m_c_s,id',
            'plan_duration' => 'required|string',
            'preferred_start_date' => 'required|date',

            // Step 5: Additional Information
            'additional_notes' => 'nullable|string',
            'terms_agreed' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Generate unique service ID
            $serviceId = $this->generateServiceId();

            // Create AMC Service
            $amcService = new \App\Models\AmcService();
            $amcService->service_id = $serviceId;
            $amcService->first_name = $request->first_name;
            $amcService->last_name = $request->last_name;
            $amcService->phone = $request->phone;
            $amcService->email = $request->email;
            $amcService->customer_type = $request->customer_type;
            $amcService->company_name = $request->company_name;
            $amcService->gst_no = $request->gst_no;
            $amcService->pan_no = $request->pan_no;

            $amcService->plan_type = $request->plan_type;
            $amcService->amc_plan_id = $request->amc_plan_id;
            $amcService->plan_duration = $request->plan_duration;
            $amcService->plan_start_date = $request->preferred_start_date;
            $amcService->additional_notes = $request->additional_notes;
            $amcService->terms_agreed = $request->terms_agreed;
            $amcService->status = 'Pending';

            // Calculate plan end date based on duration
            $startDate = \Carbon\Carbon::parse($request->preferred_start_date);
            $amcService->plan_end_date = $this->calculateEndDate($startDate, $request->plan_duration);

            // Get plan cost for total amount
            $amcPlan = AMC::find($request->amc_plan_id);
            $amcService->total_amount = $amcPlan ? $amcPlan->total_cost : 0;

            $amcService->save();

            // Create company/branch details if provided
            if ($request->filled('company_name')) {
                $branch = new \App\Models\AmcBranch();
                $branch->amc_service_id = $amcService->id;
                $branch->branch_name = $request->branch_name;
                $branch->address_line1 = $request->address_line1 ?? '';
                $branch->address_line2 = $request->address_line2 ?? '';
                $branch->city = $request->city ?? '';
                $branch->state = $request->state ?? '';
                $branch->country = $request->country ?? 'India';
                $branch->pincode = $request->pin_code ?? '';
                $branch->save();
            }

            // Create product details
            $product = new \App\Models\AmcProduct();
            $product->amc_service_id = $amcService->id;
            $product->product_name = $request->product_name;
            $product->product_type = $request->product_type;
            $product->product_brand = $request->brand_name;
            $product->model_no = $request->model_number;
            $product->serial_no = $request->serial_number;
            $product->purchase_date = $request->purchase_date;
            $product->save();

            return response()->json([
                'success' => true,
                'message' => 'AMC service request submitted successfully!',
                'service_id' => $serviceId,
                'data' => $amcService
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate unique service ID
     */
    private function generateServiceId()
    {
        $year = date('Y');
        $lastService = \App\Models\AmcService::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $lastService ? (intval(substr($lastService->service_id, -4)) + 1) : 1;

        return 'SRV-' . $year . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Calculate plan end date based on duration
     */
    private function calculateEndDate($startDate, $duration)
    {
        $duration = strtolower($duration);

        if (strpos($duration, 'month') !== false) {
            $months = intval($duration);
            return $startDate->addMonths($months);
        } elseif (strpos($duration, 'year') !== false) {
            $years = intval($duration);
            return $startDate->addYears($years);
        }

        // Default to 1 year if duration format is unclear
        return $startDate->addYear();
    }

    public function storeContact(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        if (!$contact) {
            return back()->with('error', 'Something went wrong.');
        }
        return redirect()->route('contact')->with('success', 'Contact added successfully.');
    }
}
