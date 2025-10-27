@extends('crm/layouts/master')

@section('content')

<div class="content">

    <div class="container-fluid">
        <div class="pb-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit AMC</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service-request.update-amc', $amcService->id) }}" method="POST" enctype="multipart/form-data" id="amcEditForm">
                            @csrf
                            @method('PUT')
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $amcService->first_name) }}" placeholder="Enter First Name" required>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $amcService->last_name) }}" placeholder="Enter Last Name" required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $amcService->phone) }}" placeholder="Enter Phone Number" required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $amcService->email) }}" placeholder="Enter Email" required>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="dob" class="form-label">Date Of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob', $amcService->dob ? $amcService->dob->format('Y-m-d') : '') }}">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" class="form-select">
                                            <option value="">--Select Gender--</option>
                                            <option value="Male" {{ old('gender', $amcService->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender', $amcService->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="customer_type" class="form-label">Customer Type</label>
                                        <select name="customer_type" id="customer_type" class="form-select">
                                            <option value="">--Select--</option>
                                            <option value="Individual" {{ old('customer_type', $amcService->customer_type) == 'Individual' ? 'selected' : '' }}>Individual</option>
                                            <option value="Business" {{ old('customer_type', $amcService->customer_type) == 'Business' ? 'selected' : '' }}>Business</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Priority Level
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Priority Level" id="address">
                                    </div>
                                </div> -->
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $amcService->company_name) }}" placeholder="Enter Company Name">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="company_address" class="form-label">Company Address</label>
                                        <input type="text" name="company_address" id="company_address" class="form-control" value="{{ old('company_address', $amcService->company_address) }}" placeholder="Enter Company Address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="gst_no" class="form-label">GST Number</label>
                                        <input type="text" name="gst_no" id="gst_no" class="form-control" value="{{ old('gst_no', $amcService->gst_no) }}" placeholder="Enter GST Number">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="pan_no" class="form-label">PAN Number</label>
                                        <input type="text" name="pan_no" id="pan_no" class="form-control" value="{{ old('pan_no', $amcService->pan_no) }}" placeholder="Enter PAN Number">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="pic" class="form-label">Profile Image</label>
                                        <input type="file" name="pic" id="pic" class="form-control">
                                        @if($amcService->pic)
                                            <small class="text-muted">Current: <a href="{{ asset($amcService->pic) }}" target="_blank">View Image</a></small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="image" class="form-label">Customer Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        @if($amcService->image)
                                            <small class="text-muted">Current: <a href="{{ asset($amcService->image) }}" target="_blank">View Image</a></small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card pb-4">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">
                            Address/Branch Information
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="row g-3" id="branchInputSection">
                            <div class="col-md-4">
                                <label for="branch_name_input" class="form-label">Branch Name</label>
                                <input type="text" id="branch_name_input" class="form-control" placeholder="Enter Branch Name">
                            </div>
                            <div class="col-md-4">
                                <label for="address_line1_input" class="form-label">Address Line 1</label>
                                <input type="text" id="address_line1_input" class="form-control" placeholder="Enter Address Line 1">
                            </div>
                            <div class="col-md-4">
                                <label for="address_line2_input" class="form-label">Address Line 2</label>
                                <input type="text" id="address_line2_input" class="form-control" placeholder="Enter Address Line 2">
                            </div>
                            <div class="col-md-3">
                                <label for="city_input" class="form-label">City</label>
                                <input type="text" id="city_input" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-md-3">
                                <label for="state_input" class="form-label">State</label>
                                <input type="text" id="state_input" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-md-3">
                                <label for="pincode_input" class="form-label">Pincode</label>
                                <input type="text" id="pincode_input" class="form-control" placeholder="Enter Pincode">
                            </div>
                            <div class="col-md-3">
                                <label for="contact_person_input" class="form-label">Contact Person</label>
                                <input type="text" id="contact_person_input" class="form-control" placeholder="Contact Person">
                            </div>
                            <div class="col-md-3">
                                <label for="contact_no_input" class="form-label">Contact No</label>
                                <input type="text" id="contact_no_input" class="form-control" placeholder="Contact Number">
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="button" class="btn btn-success" id="addBranchBtn">
                                        <i class="mdi mdi-plus"></i> Add Branch
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">
                            Branch Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Branch Name</th>
                                    <th>Address Line 1</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Pincode</th>
                                    <th>Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="branchTableBody">
                                @foreach($amcService->branches as $index => $branch)
                                <tr class="align-middle branch-row" data-branch-id="{{ $branch->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>{{ $branch->address_line1 }}</td>
                                    <td>{{ $branch->city }}</td>
                                    <td>{{ $branch->state }}</td>
                                    <td>{{ $branch->pincode }}</td>
                                    <td>{{ $branch->contact_person ?? '-' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-sm bg-danger-subtle removeBranchBtn" data-branch-id="{{ $branch->id }}">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </button>
                                    </td>
                                    <!-- Hidden inputs for existing branches -->
                                    <input type="hidden" name="existing_branches[{{ $index }}][id]" value="{{ $branch->id }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][branch_name]" value="{{ $branch->branch_name }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][address_line1]" value="{{ $branch->address_line1 }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][address_line2]" value="{{ $branch->address_line2 }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][city]" value="{{ $branch->city }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][state]" value="{{ $branch->state }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][pincode]" value="{{ $branch->pincode }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][contact_person]" value="{{ $branch->contact_person }}">
                                    <input type="hidden" name="existing_branches[{{ $index }}][contact_no]" value="{{ $branch->contact_no }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 pb-3" id="productInputSection">
                            <div class="col-md-4">
                                <label for="product_name_input" class="form-label">Product Name</label>
                                <input type="text" id="product_name_input" class="form-control" placeholder="Enter Product Name">
                            </div>
                            <div class="col-md-4">
                                <label for="product_type_input" class="form-label">Product Type</label>
                                <select id="product_type_input" class="form-select">
                                    <option value="">--Select--</option>
                                    <option value="Computer">Computer</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Accessories">Accessories</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="product_brand_input" class="form-label">Product Brand</label>
                                <input type="text" id="product_brand_input" class="form-control" placeholder="Dell, HP, Asus">
                            </div>
                            <div class="col-md-3">
                                <label for="model_no_input" class="form-label">Model Number</label>
                                <input type="text" id="model_no_input" class="form-control" placeholder="Model Number">
                            </div>
                            <div class="col-md-3">
                                <label for="serial_no_input" class="form-label">Serial Number</label>
                                <input type="text" id="serial_no_input" class="form-control" placeholder="Serial Number">
                            </div>
                            <div class="col-md-3">
                                <label for="purchase_date_input" class="form-label">Purchase Date</label>
                                <input type="date" id="purchase_date_input" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="warranty_status_input" class="form-label">Warranty Status</label>
                                <select id="warranty_status_input" class="form-select">
                                    <option value="">--Select--</option>
                                    <option value="Active">Active</option>
                                    <option value="Expired">Expired</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="branch_id_input" class="form-label">Select Branch</label>
                                <select id="branch_id_input" class="form-select">
                                    <option value="">--Select Branch--</option>
                                    @foreach($amcService->branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="product_image_input" class="form-label">Product Image</label>
                                <input type="file" id="product_image_input" class="form-control">
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="button" class="btn btn-success" id="addProductBtn">
                                        <i class="mdi mdi-plus"></i> Add Product
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Model Number</th>
                                    <th>Serial Number</th>
                                    <th>Branch</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="productTableBody">
                                @foreach($amcService->products as $index => $product)
                                <tr class="align-middle product-row" data-product-id="{{ $product->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_type ?? '-' }}</td>
                                    <td>{{ $product->product_brand ?? '-' }}</td>
                                    <td>{{ $product->model_no ?? '-' }}</td>
                                    <td>{{ $product->serial_no ?? '-' }}</td>
                                    <td>{{ $product->branch->branch_name ?? '-' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-sm bg-danger-subtle removeProductBtn" data-product-id="{{ $product->id }}">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </button>
                                    </td>
                                    <!-- Hidden inputs for existing products -->
                                    <input type="hidden" name="existing_products[{{ $index }}][id]" value="{{ $product->id }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][product_name]" value="{{ $product->product_name }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][product_type]" value="{{ $product->product_type }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][product_brand]" value="{{ $product->product_brand }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][model_no]" value="{{ $product->model_no }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][serial_no]" value="{{ $product->serial_no }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][purchase_date]" value="{{ $product->purchase_date ? $product->purchase_date->format('Y-m-d') : '' }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][warranty_status]" value="{{ $product->warranty_status }}">
                                    <input type="hidden" name="existing_products[{{ $index }}][branch_id]" value="{{ $product->branch_id }}">
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">AMC Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 pb-3">
                            <div class="col-md-4">
                                <label for="amc_plan_id" class="form-label">Select Plan <span class="text-danger">*</span></label>
                                <select name="amc_plan_id" id="amc_plan_id" class="form-select" required>
                                    <option value="">--Select Plan--</option>
                                    @foreach($amcPlans as $plan)
                                        <option value="{{ $plan->id }}"
                                            data-duration="{{ $plan->duration }}"
                                            data-amount="{{ $plan->amount }}"
                                            {{ old('amc_plan_id', $amcService->amc_plan_id) == $plan->id ? 'selected' : '' }}>
                                            {{ $plan->plan_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="plan_duration" class="form-label">Plan Duration</label>
                                <input type="text" name="plan_duration" id="plan_duration" class="form-control" value="{{ old('plan_duration', $amcService->plan_duration) }}" readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="plan_start_date" class="form-label">Preferred Start Date <span class="text-danger">*</span></label>
                                <input type="date" name="plan_start_date" id="plan_start_date" class="form-control" value="{{ old('plan_start_date', $amcService->plan_start_date ? $amcService->plan_start_date->format('Y-m-d') : '') }}" required>
                            </div>

                            <div class="col-md-4">
                                <label for="plan_end_date" class="form-label">Plan End Date</label>
                                <input type="date" name="plan_end_date" id="plan_end_date" class="form-control" value="{{ old('plan_end_date', $amcService->plan_end_date ? $amcService->plan_end_date->format('Y-m-d') : '') }}" readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="total_amount" class="form-label">Total Amount</label>
                                <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ old('total_amount', $amcService->total_amount) }}" step="0.01" readonly>
                            </div>

                            <div class="col-md-4">
                                <label for="priority_level" class="form-label">Priority Level</label>
                                <select name="priority_level" id="priority_level" class="form-select">
                                    <option value="">--Select--</option>
                                    <option value="High" {{ old('priority_level', $amcService->priority_level) == 'High' ? 'selected' : '' }}>High</option>
                                    <option value="Medium" {{ old('priority_level', $amcService->priority_level) == 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="Low" {{ old('priority_level', $amcService->priority_level) == 'Low' ? 'selected' : '' }}>Low</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="Pending" {{ old('status', $amcService->status) == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Active" {{ old('status', $amcService->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Expired" {{ old('status', $amcService->status) == 'Expired' ? 'selected' : '' }}>Expired</option>
                                    <option value="Cancelled" {{ old('status', $amcService->status) == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label for="additional_notes" class="form-label">Additional Notes</label>
                                <textarea name="additional_notes" id="additional_notes" class="form-control" rows="2" placeholder="Enter Additional Notes">{{ old('additional_notes', $amcService->additional_notes) }}</textarea>
                            </div>

                            <div class="col-12">
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="mdi mdi-content-save"></i> Update AMC Request
                                    </button>
                                    <a href="{{ route('service-request.index') }}" class="btn btn-secondary">
                                        <i class="mdi mdi-arrow-left"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    let branchCounter = {{ $amcService->branches->count() }};
    let productCounter = {{ $amcService->products->count() }};

    $(document).ready(function() {
        // AMC Plan selection - auto-fill duration and amount
        $('#amc_plan_id').change(function() {
            const selectedOption = $(this).find('option:selected');
            const duration = selectedOption.data('duration');
            const amount = selectedOption.data('amount');

            $('#plan_duration').val(duration || '');
            $('#total_amount').val(amount || '');

            // Calculate end date if start date is selected
            if ($('#plan_start_date').val()) {
                calculateEndDate();
            }
        });

        // Calculate end date when start date changes
        $('#plan_start_date').change(function() {
            calculateEndDate();
        });

        function calculateEndDate() {
            const startDate = $('#plan_start_date').val();
            const duration = $('#plan_duration').val();

            if (startDate && duration) {
                const start = new Date(startDate);
                const months = parseInt(duration);

                if (!isNaN(months)) {
                    start.setMonth(start.getMonth() + months);
                    const endDate = start.toISOString().split('T')[0];
                    $('#plan_end_date').val(endDate);
                }
            }
        }

        // Add Branch functionality
        $('#addBranchBtn').click(function() {
            const branchName = $('#branch_name_input').val();
            const addressLine1 = $('#address_line1_input').val();
            const addressLine2 = $('#address_line2_input').val();
            const city = $('#city_input').val();
            const state = $('#state_input').val();
            const pincode = $('#pincode_input').val();
            const contactPerson = $('#contact_person_input').val();
            const contactNo = $('#contact_no_input').val();

            if (!branchName || !addressLine1 || !city || !state || !pincode) {
                alert('Please fill all required branch fields');
                return;
            }

            branchCounter++;
            const row = `
                <tr class="align-middle branch-row">
                    <td>${branchCounter}</td>
                    <td>${branchName}</td>
                    <td>${addressLine1}</td>
                    <td>${city}</td>
                    <td>${state}</td>
                    <td>${pincode}</td>
                    <td>${contactPerson || '-'}</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-sm bg-danger-subtle removeBranchBtn">
                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                        </button>
                    </td>
                    <input type="hidden" name="branches[${branchCounter}][branch_name]" value="${branchName}">
                    <input type="hidden" name="branches[${branchCounter}][address_line1]" value="${addressLine1}">
                    <input type="hidden" name="branches[${branchCounter}][address_line2]" value="${addressLine2}">
                    <input type="hidden" name="branches[${branchCounter}][city]" value="${city}">
                    <input type="hidden" name="branches[${branchCounter}][state]" value="${state}">
                    <input type="hidden" name="branches[${branchCounter}][pincode]" value="${pincode}">
                    <input type="hidden" name="branches[${branchCounter}][contact_person]" value="${contactPerson}">
                    <input type="hidden" name="branches[${branchCounter}][contact_no]" value="${contactNo}">
                </tr>
            `;

            $('#branchTableBody').append(row);

            // Update branch dropdown in product section
            const branchOption = `<option value="${branchCounter}">${branchName}</option>`;
            $('#branch_id_input').append(branchOption);

            // Clear inputs
            $('#branch_name_input, #address_line1_input, #address_line2_input, #city_input, #state_input, #pincode_input, #contact_person_input, #contact_no_input').val('');
        });

        // Remove Branch
        $(document).on('click', '.removeBranchBtn', function() {
            if (confirm('Are you sure you want to remove this branch?')) {
                $(this).closest('tr').remove();
            }
        });

        // Add Product functionality
        $('#addProductBtn').click(function() {
            const productName = $('#product_name_input').val();
            const productType = $('#product_type_input').val();
            const productBrand = $('#product_brand_input').val();
            const modelNo = $('#model_no_input').val();
            const serialNo = $('#serial_no_input').val();
            const purchaseDate = $('#purchase_date_input').val();
            const warrantyStatus = $('#warranty_status_input').val();
            const branchId = $('#branch_id_input').val();
            const branchName = $('#branch_id_input option:selected').text();

            if (!productName || !branchId) {
                alert('Please enter product name and select a branch');
                return;
            }

            productCounter++;
            const row = `
                <tr class="align-middle product-row">
                    <td>${productCounter}</td>
                    <td>${productName}</td>
                    <td>${productType || '-'}</td>
                    <td>${productBrand || '-'}</td>
                    <td>${modelNo || '-'}</td>
                    <td>${serialNo || '-'}</td>
                    <td>${branchName}</td>
                    <td>
                        <button type="button" class="btn btn-icon btn-sm bg-danger-subtle removeProductBtn">
                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                        </button>
                    </td>
                    <input type="hidden" name="products[${productCounter}][product_name]" value="${productName}">
                    <input type="hidden" name="products[${productCounter}][product_type]" value="${productType}">
                    <input type="hidden" name="products[${productCounter}][product_brand]" value="${productBrand}">
                    <input type="hidden" name="products[${productCounter}][model_no]" value="${modelNo}">
                    <input type="hidden" name="products[${productCounter}][serial_no]" value="${serialNo}">
                    <input type="hidden" name="products[${productCounter}][purchase_date]" value="${purchaseDate}">
                    <input type="hidden" name="products[${productCounter}][warranty_status]" value="${warrantyStatus}">
                    <input type="hidden" name="products[${productCounter}][branch_id]" value="${branchId}">
                </tr>
            `;

            $('#productTableBody').append(row);

            // Clear inputs
            $('#product_name_input, #product_type_input, #product_brand_input, #model_no_input, #serial_no_input, #purchase_date_input, #warranty_status_input, #branch_id_input').val('');
        });

        // Remove Product
        $(document).on('click', '.removeProductBtn', function() {
            if (confirm('Are you sure you want to remove this product?')) {
                $(this).closest('tr').remove();
            }
        });
    });
</script>
@endsection