<?php

namespace App\Http\Controllers;

use App\Models\AMC;
use App\Models\AmcService;
use App\Models\AmcBranch;
use App\Models\AmcProduct;
use App\Models\NonAmcService;
use App\Models\NonAmcProduct;
use App\Models\Engineer;
use App\Models\AmcEngineerAssignment;
use App\Models\AmcGroupEngineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ServiceRequestController extends Controller
{

    public function generateServiceId()
    {
        $year = date('Y');
        $lastService = AmcService::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = $lastService ? (intval(substr($lastService->service_id, -4)) + 1) : 1;

        return 'SRV-' . $year . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }
    //
    public function index()
    {
        $amcServices = AmcService::with(['amcPlan', 'branches', 'products', 'creator'])
            ->orderBy('created_at', 'desc')
            ->get();

        $nonAmcServices = NonAmcService::with(['products', 'creator'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('/crm/service-request/index', compact('amcServices', 'nonAmcServices'));
    }

    public function create()
    {
        return view('/crm/service-request/create-servies');
    }

    public function view()
    {
        return view('/crm/service-request/view-service');
    }

    public function edit()
    {
        return view('/crm/service-request/edit-service');
    }

    public function create_amc()
    {
        $amcPlans = AMC::where('status', 'Active')->get();
        return view('/crm/service-request/create-amc', compact('amcPlans'));
    }

    public function store_amc(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'branches' => 'required|array|min:1',
            'branches.*.branch_name' => 'required|string',
            'branches.*.address_line1' => 'required|string',
            'branches.*.city' => 'required|string',
            'branches.*.state' => 'required|string',
            'branches.*.pincode' => 'required|string',
            'products' => 'required|array|min:1',
            'products.*.product_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            // Create AMC Service
            $amcService = new AmcService();
            $amcService->service_id = $this->generateServiceId();
            $amcService->first_name = $request->first_name;
            $amcService->last_name = $request->last_name;
            $amcService->phone = $request->phone;
            $amcService->email = $request->email;
            $amcService->dob = $request->dob;
            $amcService->gender = $request->gender;
            $amcService->customer_type = $request->customer_type;
            $amcService->company_name = $request->company_name;
            $amcService->company_address = $request->company_address;
            $amcService->gst_no = $request->gst_no;
            $amcService->pan_no = $request->pan_no;

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_profile.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/amc/profiles'), $filename);
                $amcService->profile_image = 'uploads/crm/amc/profiles/' . $filename;
            }

            // Handle customer image upload
            if ($request->hasFile('customer_image')) {
                $file = $request->file('customer_image');
                $filename = time() . '_customer.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/amc/customers'), $filename);
                $amcService->customer_image = 'uploads/crm/amc/customers/' . $filename;
            }

            // AMC Details
            $amcService->amc_plan_id = $request->amc_plan_id;
            $amcService->plan_duration = $request->plan_duration;
            $amcService->plan_start_date = $request->plan_start_date;

            // Calculate end date based on duration
            if ($request->plan_start_date && $request->plan_duration) {
                $startDate = \Carbon\Carbon::parse($request->plan_start_date);
                $duration = (int) filter_var($request->plan_duration, FILTER_SANITIZE_NUMBER_INT);
                $amcService->plan_end_date = $startDate->addMonths($duration)->format('Y-m-d');
            }

            $amcService->priority_level = $request->priority_level;
            $amcService->additional_notes = $request->additional_notes;
            $amcService->total_amount = $request->total_amount ?? 0;
            $amcService->status = 'Pending';
            $amcService->created_by = Auth::id();
            $amcService->save();

            // Create Branches
            $branchMapping = []; // maps client-side branch index -> saved branch id
            if ($request->has('branches')) {
                foreach ($request->branches as $branchData) {
                    $branch = new AmcBranch();
                    $branch->amc_service_id = $amcService->id;
                    $branch->branch_name = $branchData['branch_name'];
                    $branch->address_line1 = $branchData['address_line1'];
                    $branch->address_line2 = $branchData['address_line2'] ?? null;
                    $branch->city = $branchData['city'];
                    $branch->state = $branchData['state'];
                    $branch->country = $branchData['country'] ?? 'India';
                    $branch->pincode = $branchData['pincode'];
                    $branch->contact_person = $branchData['contact_person'] ?? null;
                    $branch->contact_no = $branchData['contact_no'] ?? null;
                    $branch->save();

                    // If the client sent a temporary index for this branch (used by JS), store mapping
                    if (isset($branchData['index'])) {
                        $branchMapping[$branchData['index']] = $branch->id;
                    }
                }
            }

            // Create Products
            if ($request->has('products')) {
                foreach ($request->products as $productData) {
                    $product = new AmcProduct();
                    $product->amc_service_id = $amcService->id;

                    // The client-side sends a temporary branch reference (index). Map it to real branch id if available.
                    $rawBranchRef = $productData['amc_branch_id'] ?? null;
                    if ($rawBranchRef !== null && isset($branchMapping[$rawBranchRef])) {
                        $product->amc_branch_id = $branchMapping[$rawBranchRef];
                    } else {
                        // If mapping not available, set null to avoid FK errors (controller validation will catch inconsistencies)
                        $product->amc_branch_id = null;
                    }

                    $product->product_name = $productData['product_name'];
                    $product->product_type = $productData['product_type'] ?? null;
                    $product->product_brand = $productData['product_brand'] ?? null;
                    $product->model_no = $productData['model_no'] ?? null;
                    $product->serial_no = $productData['serial_no'] ?? null;
                    $product->purchase_date = $productData['purchase_date'] ?? null;
                    $product->warranty_status = $productData['warranty_status'] ?? 'Out of Warranty';

                    // Handle product image upload
                    if (isset($productData['product_image']) && $productData['product_image'] instanceof \Illuminate\Http\UploadedFile) {
                        $file = $productData['product_image'];
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/crm/amc/products'), $filename);
                        $product->product_image = 'uploads/crm/amc/products/' . $filename;
                    }

                    $product->save();
                }
            }

            DB::commit();
            return redirect()->route('service-request.index')->with('success', 'AMC Request created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }


    public function view_amc($id)
    {
        $amcService = AmcService::with([
            'amcPlan',
            'branches',
            'products',
            'creator',
            'activeAssignment.engineer',
            'activeAssignment.supervisor',
            'activeAssignment.groupEngineers'
        ])->findOrFail($id);

        $engineers = Engineer::select('id', 'first_name', 'last_name', 'designation', 'department')
                            ->orderBy('first_name')
                            ->get();

        return view('/crm/service-request/view-amc', compact('amcService', 'engineers'));
    }

    public function edit_amc($id)
    {
        $amcService = AmcService::with(['branches', 'products'])->findOrFail($id);
        $amcPlans = AMC::where('status', 'Active')->get();
        return view('/crm/service-request/edit-amc', compact('amcService', 'amcPlans'));
    }

    public function update_amc(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $amcService = AmcService::findOrFail($id);

            // Update AMC Service
            $amcService->first_name = $request->first_name;
            $amcService->last_name = $request->last_name;
            $amcService->phone = $request->phone;
            $amcService->email = $request->email;
            $amcService->dob = $request->dob;
            $amcService->gender = $request->gender;
            $amcService->customer_type = $request->customer_type;
            $amcService->company_name = $request->company_name;
            $amcService->company_address = $request->company_address;
            $amcService->gst_no = $request->gst_no;
            $amcService->pan_no = $request->pan_no;

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                // Delete old image
                if ($amcService->profile_image && File::exists(public_path($amcService->profile_image))) {
                    File::delete(public_path($amcService->profile_image));
                }

                $file = $request->file('profile_image');
                $filename = time() . '_profile.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/amc/profiles'), $filename);
                $amcService->profile_image = 'uploads/crm/amc/profiles/' . $filename;
            }

            // Handle customer image upload
            if ($request->hasFile('customer_image')) {
                // Delete old image
                if ($amcService->customer_image && File::exists(public_path($amcService->customer_image))) {
                    File::delete(public_path($amcService->customer_image));
                }

                $file = $request->file('customer_image');
                $filename = time() . '_customer.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/amc/customers'), $filename);
                $amcService->customer_image = 'uploads/crm/amc/customers/' . $filename;
            }

            // AMC Details
            $amcService->amc_plan_id = $request->amc_plan_id;
            $amcService->plan_duration = $request->plan_duration;
            $amcService->plan_start_date = $request->plan_start_date;

            // Calculate end date based on duration
            if ($request->plan_start_date && $request->plan_duration) {
                $startDate = \Carbon\Carbon::parse($request->plan_start_date);
                $duration = (int) filter_var($request->plan_duration, FILTER_SANITIZE_NUMBER_INT);
                $amcService->plan_end_date = $startDate->addMonths($duration)->format('Y-m-d');
            }

            $amcService->priority_level = $request->priority_level;
            $amcService->additional_notes = $request->additional_notes;
            $amcService->total_amount = $request->total_amount ?? 0;
            $amcService->status = $request->status ?? $amcService->status;
            $amcService->save();

            // Update Branches - keep existing, add new
            $existingBranchIds = [];

            // Update existing branches
            if ($request->has('existing_branches')) {
                foreach ($request->existing_branches as $branchData) {
                    if (isset($branchData['id'])) {
                        $branch = AmcBranch::find($branchData['id']);
                        if ($branch && $branch->amc_service_id == $amcService->id) {
                            $existingBranchIds[] = $branch->id;
                            // Existing branches are kept as-is, no update needed
                        }
                    }
                }
            }

            // Add new branches
            if ($request->has('branches')) {
                foreach ($request->branches as $branchData) {
                    $branch = new AmcBranch();
                    $branch->amc_service_id = $amcService->id;
                    $branch->branch_name = $branchData['branch_name'];
                    $branch->address_line1 = $branchData['address_line1'];
                    $branch->address_line2 = $branchData['address_line2'] ?? null;
                    $branch->city = $branchData['city'];
                    $branch->state = $branchData['state'];
                    $branch->pincode = $branchData['pincode'];
                    $branch->contact_person = $branchData['contact_person'] ?? null;
                    $branch->contact_no = $branchData['contact_no'] ?? null;
                    $branch->save();

                    $existingBranchIds[] = $branch->id;
                }
            }

            // Delete branches that were removed
            $amcService->branches()->whereNotIn('id', $existingBranchIds)->delete();

            // Update Products - keep existing, add new
            $existingProductIds = [];

            // Keep existing products
            if ($request->has('existing_products')) {
                foreach ($request->existing_products as $productData) {
                    if (isset($productData['id'])) {
                        $product = AmcProduct::find($productData['id']);
                        if ($product && $product->amc_service_id == $amcService->id) {
                            $existingProductIds[] = $product->id;
                            // Existing products are kept as-is
                        }
                    }
                }
            }

            // Add new products
            if ($request->has('products')) {
                foreach ($request->products as $productData) {
                    $product = new AmcProduct();
                    $product->amc_service_id = $amcService->id;
                    $product->branch_id = $productData['branch_id'] ?? null;
                    $product->product_name = $productData['product_name'];
                    $product->product_type = $productData['product_type'] ?? null;
                    $product->product_brand = $productData['product_brand'] ?? null;
                    $product->model_no = $productData['model_no'] ?? null;
                    $product->serial_no = $productData['serial_no'] ?? null;
                    $product->purchase_date = $productData['purchase_date'] ?? null;
                    $product->warranty_status = $productData['warranty_status'] ?? null;
                    $product->save();

                    $existingProductIds[] = $product->id;
                }
            }

            // Delete products that were removed (and their images)
            $removedProducts = $amcService->products()->whereNotIn('id', $existingProductIds)->get();
            foreach ($removedProducts as $removedProduct) {
                if ($removedProduct->product_image && File::exists(public_path($removedProduct->product_image))) {
                    File::delete(public_path($removedProduct->product_image));
                }
            }
            $amcService->products()->whereNotIn('id', $existingProductIds)->delete();

            DB::commit();
            return redirect()->route('service-request.index')->with('success', 'AMC Request updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy_amc($id)
    {
        try {
            $amcService = AmcService::findOrFail($id);

            // Delete associated images
            if ($amcService->profile_image && File::exists(public_path($amcService->profile_image))) {
                File::delete(public_path($amcService->profile_image));
            }

            if ($amcService->customer_image && File::exists(public_path($amcService->customer_image))) {
                File::delete(public_path($amcService->customer_image));
            }

            // Delete product images
            foreach ($amcService->products as $product) {
                if ($product->product_image && File::exists(public_path($product->product_image))) {
                    File::delete(public_path($product->product_image));
                }
            }

            // Delete the AMC service (cascade will delete branches and products)
            $amcService->delete();

            return redirect()->route('service-request.index')->with('success', 'AMC Request deleted successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    // API method to fetch AMC plan details
    public function getAmcPlanDetails($id)
    {
        try {
            $amcPlan = AMC::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $amcPlan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Plan not found'
            ], 404);
        }
    }

    /**
     * Assign engineer(s) to AMC service
     */
    public function assignEngineer(Request $request)
    {
        // Remove engineer_id if assignment_type is Group to avoid validation error
        if ($request->assignment_type === 'Group') {
            $request->request->remove('engineer_id');
        }
        $validator = Validator::make($request->all(), [
            'amc_service_id' => 'required|exists:amc_services,id',
            'assignment_type' => 'required|in:Individual,Group',
            'engineer_id' => 'required_if:assignment_type,Individual|exists:engineers,id',
            'group_name' => 'required_if:assignment_type,Group',
            'engineer_ids' => 'required_if:assignment_type,Group|array',
            'engineer_ids.*' => 'exists:engineers,id',
            'supervisor_id' => 'required_if:assignment_type,Group|exists:engineers,id',
        ]);
        // Additional string validation for group_name only if Group assignment
        if ($request->assignment_type === 'Group' && isset($request->group_name) && !is_string($request->group_name)) {
            return response()->json([
                'success' => false,
                'message' => 'The group name must be a string.'
            ], 400);
        }

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        try {
            DB::beginTransaction();

            // Deactivate previous assignments
            AmcEngineerAssignment::where('amc_service_id', $request->amc_service_id)
                ->update(['status' => 'Inactive']);

            if ($request->assignment_type === 'Individual') {
                // Individual assignment
                $assignment = AmcEngineerAssignment::create([
                    'amc_service_id' => $request->amc_service_id,
                    'assignment_type' => 'Individual',
                    'engineer_id' => $request->engineer_id,
                    'status' => 'Active',
                    'assigned_at' => now(),
                ]);

                $engineer = Engineer::find($request->engineer_id);
                $message = 'Engineer ' . $engineer->first_name . ' ' . $engineer->last_name . ' assigned successfully';
            } else {
                // Group assignment
                $assignment = AmcEngineerAssignment::create([
                    'amc_service_id' => $request->amc_service_id,
                    'assignment_type' => 'Group',
                    'group_name' => $request->group_name,
                    'supervisor_id' => $request->supervisor_id,
                    'status' => 'Active',
                    'assigned_at' => now(),
                ]);

                // Add group members
                foreach ($request->engineer_ids as $engineerId) {
                    AmcGroupEngineer::create([
                        'assignment_id' => $assignment->id,
                        'engineer_id' => $engineerId,
                        'is_supervisor' => ($engineerId == $request->supervisor_id),
                    ]);
                }

                $message = 'Group "' . $request->group_name . '" assigned successfully with ' . count($request->engineer_ids) . ' engineers';
            }

            DB::commit();

            // Load relationships for response
            $assignment->load(['engineer', 'supervisor', 'groupEngineers']);

            return response()->json([
                'success' => true,
                'message' => $message,
                'assignment' => $assignment
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error assigning engineer: ' . $e->getMessage()
            ], 500);
        }
    }

    // ==================== Non-AMC Service Request CRUD Methods ====================

    public function create_non_amc()
    {
        return view('/crm/service-request/create-servies');
    }

    public function store_non_amc(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'products' => 'required|array|min:1',
            'products.*.product_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            // Create Non-AMC Service
            $nonAmcService = new NonAmcService();
            $nonAmcService->first_name = $request->first_name;
            $nonAmcService->last_name = $request->last_name;
            $nonAmcService->phone = $request->phone;
            $nonAmcService->email = $request->email;
            $nonAmcService->dob = $request->dob;
            $nonAmcService->gender = $request->gender;
            $nonAmcService->customer_type = $request->customer_type ?? 'Individual';

            // Address Information
            $nonAmcService->address_line1 = $request->address_line1;
            $nonAmcService->address_line2 = $request->address_line2;
            $nonAmcService->city = $request->city;
            $nonAmcService->state = $request->state;
            $nonAmcService->country = $request->country;
            $nonAmcService->pincode = $request->pincode;

            // Company Information
            $nonAmcService->company_name = $request->company_name;
            $nonAmcService->company_address = $request->company_address;
            $nonAmcService->gst_no = $request->gst_no;
            $nonAmcService->pan_no = $request->pan_no;

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_profile_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/non-amc/profiles'), $filename);
                $nonAmcService->profile_image = 'uploads/crm/non-amc/profiles/' . $filename;
            }

            // Handle customer image upload
            if ($request->hasFile('customer_image')) {
                $file = $request->file('customer_image');
                $filename = time() . '_customer_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/non-amc/customers'), $filename);
                $nonAmcService->customer_image = 'uploads/crm/non-amc/customers/' . $filename;
            }

            $nonAmcService->service_type = $request->service_type ?? 'Offline';
            $nonAmcService->priority_level = $request->priority_level;
            $nonAmcService->additional_notes = $request->additional_notes;
            $nonAmcService->total_amount = $request->total_amount ?? 0;
            $nonAmcService->status = 'Pending';
            $nonAmcService->created_by = Auth::id();
            $nonAmcService->save();

            // Create Products
            if ($request->has('products')) {
                foreach ($request->products as $productData) {
                    $product = new NonAmcProduct();
                    $product->non_amc_service_id = $nonAmcService->id;
                    $product->product_name = $productData['product_name'];
                    $product->product_type = $productData['product_type'] ?? null;
                    $product->product_brand = $productData['product_brand'] ?? null;
                    $product->model_no = $productData['model_no'] ?? null;
                    $product->serial_no = $productData['serial_no'] ?? null;
                    $product->purchase_date = $productData['purchase_date'] ?? null;
                    $product->issue_type = $productData['issue_type'] ?? null;
                    $product->issue_description = $productData['issue_description'] ?? null;
                    $product->warranty_status = $productData['warranty_status'] ?? 'Unknown';

                    // Handle product image upload
                    if (isset($productData['product_image']) && $productData['product_image'] instanceof \Illuminate\Http\UploadedFile) {
                        $file = $productData['product_image'];
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/crm/non-amc/products'), $filename);
                        $product->product_image = 'uploads/crm/non-amc/products/' . $filename;
                    }

                    $product->save();
                }
            }

            DB::commit();
            return redirect()->route('service-request.index')->with('success', 'Non-AMC Service Request created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }

    public function view_non_amc($id)
    {
        $service = NonAmcService::with(['products', 'creator'])->findOrFail($id);
        return view('/crm/service-request/view-non-amc', compact('service'));
    }

    public function edit_non_amc($id)
    {
        $service = NonAmcService::with(['products'])->findOrFail($id);
        return view('/crm/service-request/edit-non-amc', compact('service'));
    }

    public function update_non_amc(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $nonAmcService = NonAmcService::findOrFail($id);

            // Update Non-AMC Service
            $nonAmcService->first_name = $request->first_name;
            $nonAmcService->last_name = $request->last_name;
            $nonAmcService->phone = $request->phone;
            $nonAmcService->email = $request->email;
            $nonAmcService->dob = $request->dob;
            $nonAmcService->gender = $request->gender;
            $nonAmcService->customer_type = $request->customer_type ?? 'Individual';

            // Address Information
            $nonAmcService->address_line1 = $request->address_line1;
            $nonAmcService->address_line2 = $request->address_line2;
            $nonAmcService->city = $request->city;
            $nonAmcService->state = $request->state;
            $nonAmcService->country = $request->country;
            $nonAmcService->pincode = $request->pincode;

            // Company Information
            $nonAmcService->company_name = $request->company_name;
            $nonAmcService->company_address = $request->company_address;
            $nonAmcService->gst_no = $request->gst_no;
            $nonAmcService->pan_no = $request->pan_no;

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                // Delete old image
                if ($nonAmcService->profile_image && File::exists(public_path($nonAmcService->profile_image))) {
                    File::delete(public_path($nonAmcService->profile_image));
                }

                $file = $request->file('profile_image');
                $filename = time() . '_profile_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/non-amc/profiles'), $filename);
                $nonAmcService->profile_image = 'uploads/crm/non-amc/profiles/' . $filename;
            }

            // Handle customer image upload
            if ($request->hasFile('customer_image')) {
                // Delete old image
                if ($nonAmcService->customer_image && File::exists(public_path($nonAmcService->customer_image))) {
                    File::delete(public_path($nonAmcService->customer_image));
                }

                $file = $request->file('customer_image');
                $filename = time() . '_customer_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/crm/non-amc/customers'), $filename);
                $nonAmcService->customer_image = 'uploads/crm/non-amc/customers/' . $filename;
            }

            $nonAmcService->service_type = $request->service_type ?? 'Offline';
            $nonAmcService->priority_level = $request->priority_level;
            $nonAmcService->additional_notes = $request->additional_notes;
            $nonAmcService->total_amount = $request->total_amount ?? 0;
            $nonAmcService->status = $request->status ?? $nonAmcService->status;
            $nonAmcService->save();

            // Update Products - keep existing, add new
            $existingProductIds = [];

            // Update existing products
            if ($request->has('existing_products')) {
                foreach ($request->existing_products as $productData) {
                    if (isset($productData['id'])) {
                        $product = NonAmcProduct::find($productData['id']);
                        if ($product && $product->non_amc_service_id == $nonAmcService->id) {
                            $existingProductIds[] = $product->id;
                            // Existing products are kept as-is, no update needed
                        }
                    }
                }
            }

            // Add new products
            if ($request->has('products')) {
                foreach ($request->products as $productData) {
                    $product = new NonAmcProduct();
                    $product->non_amc_service_id = $nonAmcService->id;
                    $product->product_name = $productData['product_name'];
                    $product->product_type = $productData['product_type'] ?? null;
                    $product->product_brand = $productData['product_brand'] ?? null;
                    $product->model_no = $productData['model_no'] ?? null;
                    $product->serial_no = $productData['serial_no'] ?? null;
                    $product->purchase_date = $productData['purchase_date'] ?? null;
                    $product->issue_type = $productData['issue_type'] ?? null;
                    $product->issue_description = $productData['issue_description'] ?? null;
                    $product->warranty_status = $productData['warranty_status'] ?? 'Unknown';

                    // Handle product image upload
                    if (isset($productData['product_image']) && $productData['product_image'] instanceof \Illuminate\Http\UploadedFile) {
                        $file = $productData['product_image'];
                        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/crm/non-amc/products'), $filename);
                        $product->product_image = 'uploads/crm/non-amc/products/' . $filename;
                    }

                    $product->save();
                    $existingProductIds[] = $product->id;
                }
            }

            // Delete products that were removed (and their images)
            $removedProducts = $nonAmcService->products()->whereNotIn('id', $existingProductIds)->get();
            foreach ($removedProducts as $removedProduct) {
                if ($removedProduct->product_image && File::exists(public_path($removedProduct->product_image))) {
                    File::delete(public_path($removedProduct->product_image));
                }
            }
            $nonAmcService->products()->whereNotIn('id', $existingProductIds)->delete();

            DB::commit();
            return redirect()->route('service-request.index')->with('success', 'Non-AMC Service Request updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy_non_amc($id)
    {
        try {
            $nonAmcService = NonAmcService::findOrFail($id);

            // Delete associated images
            if ($nonAmcService->profile_image && File::exists(public_path($nonAmcService->profile_image))) {
                File::delete(public_path($nonAmcService->profile_image));
            }

            if ($nonAmcService->customer_image && File::exists(public_path($nonAmcService->customer_image))) {
                File::delete(public_path($nonAmcService->customer_image));
            }

            // Delete product images
            foreach ($nonAmcService->products as $product) {
                if ($product->product_image && File::exists(public_path($product->product_image))) {
                    File::delete(public_path($product->product_image));
                }
            }

            // Delete the service (products will be cascade deleted)
            $nonAmcService->delete();

            return redirect()->route('service-request.index')->with('success', 'Non-AMC Service Request deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting service request: ' . $e->getMessage());
        }
    }
}
