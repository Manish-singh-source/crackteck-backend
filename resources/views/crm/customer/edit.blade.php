@extends('crm/layouts/master')

@section('content')
    <div class="content">


        <div class="container-fluid">

            <div class="bradcrumb pt-3 ps-2 bg-light">
                <div class="row ">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="py-1 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0"></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <div class="row g-4 align-items-center">
                                            <div class="col-sm">
                                                <h5 class="card-title mb-0">
                                                    Personal Information
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'First Name',
                                                    'name' => 'first_name',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter First Name',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Last Name',
                                                    'name' => 'last_name',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Last Name',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Phone number',
                                                    'name' => 'phone',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Phone number',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'E-mail address',
                                                    'name' => 'email',
                                                    'type' => 'email',
                                                    'placeholder' => 'Enter Email id',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Date of Birth',
                                                    'name' => 'dob',
                                                    'type' => 'date',
                                                    'placeholder' => 'Enter Date of Birth',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Gender',
                                                    'name' => 'gender',
                                                    'options' => [
                                                        '0' => '--Select--',
                                                        'male' => 'Male',
                                                        'female' => 'Female',
                                                    ],
                                                    'model' => $customer,
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card pb-4">
                                    <div class="card-header border-bottom-dashed">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-0">
                                                Address/Branch Information
                                            </h5>
                                            <button type="button" class="btn btn-primary btn-sm" id="add-branch-btn">
                                                <i class="mdi mdi-plus"></i> Add Branch
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div id="branches-container">
                                            @if($customer->branches && $customer->branches->count() > 0)
                                                @foreach($customer->branches as $index => $branch)
                                                    <div class="branch-item border rounded p-3 mb-3" data-branch-index="{{ $index }}" data-branch-id="{{ $branch->id }}">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h6 class="mb-0 text-primary">Branch #{{ $index + 1 }}</h6>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="primary_branch" value="{{ $index }}" id="primary_{{ $index }}" {{ $branch->is_primary ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="primary_{{ $index }}">
                                                                        Primary Branch
                                                                    </label>
                                                                </div>
                                                                @if($customer->branches->count() > 1)
                                                                    <button type="button" class="btn btn-danger btn-sm remove-branch-btn">
                                                                        <i class="mdi mdi-delete"></i> Remove
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row g-3">
                                                            <input type="hidden" name="branches[{{ $index }}][id]" value="{{ $branch->id }}">
                                                            <div class="col-6">
                                                                <label for="branches_{{ $index }}_branch_name" class="form-label">Branch Name <span class="text-danger">*</span></label>
                                                                <input type="text" name="branches[{{ $index }}][branch_name]" id="branches_{{ $index }}_branch_name" class="form-control" placeholder="Enter Name of Branch" value="{{ $branch->branch_name }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="branches_{{ $index }}_address" class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                                                <input type="text" name="branches[{{ $index }}][address]" id="branches_{{ $index }}_address" class="form-control" placeholder="Enter Address Line 1" value="{{ $branch->address }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="branches_{{ $index }}_address2" class="form-label">Address Line 2</label>
                                                                <input type="text" name="branches[{{ $index }}][address2]" id="branches_{{ $index }}_address2" class="form-control" placeholder="Enter Address Line 2" value="{{ $branch->address2 }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="branches_{{ $index }}_city" class="form-label">City <span class="text-danger">*</span></label>
                                                                <input type="text" name="branches[{{ $index }}][city]" id="branches_{{ $index }}_city" class="form-control" placeholder="Enter City" value="{{ $branch->city }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="branches_{{ $index }}_state" class="form-label">State <span class="text-danger">*</span></label>
                                                                <input type="text" name="branches[{{ $index }}][state]" id="branches_{{ $index }}_state" class="form-control" placeholder="Enter State" value="{{ $branch->state }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="branches_{{ $index }}_country" class="form-label">Country <span class="text-danger">*</span></label>
                                                                <input type="text" name="branches[{{ $index }}][country]" id="branches_{{ $index }}_country" class="form-control" placeholder="Enter Country" value="{{ $branch->country }}">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="branches_{{ $index }}_pincode" class="form-label">Pincode <span class="text-danger">*</span></label>
                                                                <input type="text" name="branches[{{ $index }}][pincode]" id="branches_{{ $index }}_pincode" class="form-control" placeholder="Enter Pincode" value="{{ $branch->pincode }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <!-- Default empty branch if no branches exist -->
                                                <div class="branch-item border rounded p-3 mb-3" data-branch-index="0">
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <h6 class="mb-0 text-primary">Branch #1</h6>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="primary_branch" value="0" id="primary_0" checked>
                                                            <label class="form-check-label" for="primary_0">
                                                                Primary Branch
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-6">
                                                            <label for="branches_0_branch_name" class="form-label">Branch Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="branches[0][branch_name]" id="branches_0_branch_name" class="form-control" placeholder="Enter Name of Branch">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="branches_0_address" class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                                            <input type="text" name="branches[0][address]" id="branches_0_address" class="form-control" placeholder="Enter Address Line 1">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="branches_0_address2" class="form-label">Address Line 2</label>
                                                            <input type="text" name="branches[0][address2]" id="branches_0_address2" class="form-control" placeholder="Enter Address Line 2">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="branches_0_city" class="form-label">City <span class="text-danger">*</span></label>
                                                            <input type="text" name="branches[0][city]" id="branches_0_city" class="form-control" placeholder="Enter City">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="branches_0_state" class="form-label">State <span class="text-danger">*</span></label>
                                                            <input type="text" name="branches[0][state]" id="branches_0_state" class="form-control" placeholder="Enter State">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="branches_0_country" class="form-label">Country <span class="text-danger">*</span></label>
                                                            <input type="text" name="branches[0][country]" id="branches_0_country" class="form-control" placeholder="Enter Country">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="branches_0_pincode" class="form-label">Pincode <span class="text-danger">*</span></label>
                                                            <input type="text" name="branches[0][pincode]" id="branches_0_pincode" class="form-control" placeholder="Enter Pincode">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card branch-section">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Branch Information
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-borderless dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Branch Name</th>
                                                    <th>Address Line 1</th>
                                                    <th>Address Line 2</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Country</th>
                                                    <th>Pincode</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($customer_address as $customer_address)
                                                    
                                                <tr class="align-middle">
                                                    <td>{{ $customer->address->branch_name ?? 'Branch Not Found' }}</td>
                                                    <td>
                                                        <div>
                                                            {{ $customer->address->address ?? 'Address Not Found' }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $customer->address->address2 ?? 'Address2 Not Found' }}
                                                    </td>
                                                    <td>
                                                        {{ $customer->address->city ?? 'City Not Found' }}
                                                    </td>
                                                    <td>
                                                        {{ $customer->address->state ?? 'State Not Found' }}
                                                    </td>
                                                    <td>
                                                        {{ $customer->address->country ?? 'Country Not Found' }}
                                                    </td>
                                                    <td>{{ $customer->address->pincode ?? 'No State Found' }}</td>
                                                    <!-- <td>
                                                        <a aria-label="anchor"
                                                            class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                        </a>
                                                    </td> -->
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="text-start mb-3">
                                <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                    Submit
                                </button>
                            </div> -->
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Other Details:
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                    'label' => 'Customer Type',
                                                    'name' => 'customer_type',
                                                    'options' => [
                                                        '0' => '--Select--',
                                                        'Retail' => 'Retail',
                                                        'Wholesale' => 'Wholesale',
                                                        'Corporate' => 'Corporate',
                                                    ],
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'Company Name',
                                                    'name' => 'company_name',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Company Name',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'Company Address',
                                                    'name' => 'company_addr',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Company Address',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'GST Number',
                                                    'name' => 'gst_no',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter GST Number',
                                                    'model' => $customer,
                                                ])
                                            </div>

                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'PAN Number',
                                                    'name' => 'pan_no',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter PAN Number',
                                                    'model' => $customer,
                                                ])
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Other Optional:
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="row ">
                                            <div class=" mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'Profile Picture Upload',
                                                    'name' => 'pic',
                                                    'type' => 'file',
                                                ])
                                            </div>
                                            <!-- <div class="mb-3">
                                            <label for="pic" class="form-label">Profile Picture Upload <span class="text-danger">*</span></label>
                                            <input type="file" name="pic" id="pic" class="form-control" value="" required="" placeholder="Profile Picture Upload">
                                        </div> -->
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-start mb-3">
                                    {{-- <a href="{{ route('customer.index') }}"
                                        class="btn btn-success w-sm waves ripple-light">
                                        Submit
                                    </a> --}}
                                     <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                    Submit
                                </button> 
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let branchIndex = {{ $customer->branches ? $customer->branches->count() : 1 }};

            // Add new branch
            $('#add-branch-btn').click(function() {
                const branchHtml = `
                    <div class="branch-item border rounded p-3 mb-3" data-branch-index="${branchIndex}">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0 text-primary">Branch #${branchIndex + 1}</h6>
                            <div class="d-flex align-items-center gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="primary_branch" value="${branchIndex}" id="primary_${branchIndex}">
                                    <label class="form-check-label" for="primary_${branchIndex}">
                                        Primary Branch
                                    </label>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-branch-btn">
                                    <i class="mdi mdi-delete"></i> Remove
                                </button>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="branches_${branchIndex}_branch_name" class="form-label">Branch Name <span class="text-danger">*</span></label>
                                <input type="text" name="branches[${branchIndex}][branch_name]" id="branches_${branchIndex}_branch_name" class="form-control" placeholder="Enter Name of Branch">
                            </div>
                            <div class="col-6">
                                <label for="branches_${branchIndex}_address" class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                <input type="text" name="branches[${branchIndex}][address]" id="branches_${branchIndex}_address" class="form-control" placeholder="Enter Address Line 1">
                            </div>
                            <div class="col-6">
                                <label for="branches_${branchIndex}_address2" class="form-label">Address Line 2</label>
                                <input type="text" name="branches[${branchIndex}][address2]" id="branches_${branchIndex}_address2" class="form-control" placeholder="Enter Address Line 2">
                            </div>
                            <div class="col-6">
                                <label for="branches_${branchIndex}_city" class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" name="branches[${branchIndex}][city]" id="branches_${branchIndex}_city" class="form-control" placeholder="Enter City">
                            </div>
                            <div class="col-6">
                                <label for="branches_${branchIndex}_state" class="form-label">State <span class="text-danger">*</span></label>
                                <input type="text" name="branches[${branchIndex}][state]" id="branches_${branchIndex}_state" class="form-control" placeholder="Enter State">
                            </div>
                            <div class="col-6">
                                <label for="branches_${branchIndex}_country" class="form-label">Country <span class="text-danger">*</span></label>
                                <input type="text" name="branches[${branchIndex}][country]" id="branches_${branchIndex}_country" class="form-control" placeholder="Enter Country">
                            </div>
                            <div class="col-6">
                                <label for="branches_${branchIndex}_pincode" class="form-label">Pincode <span class="text-danger">*</span></label>
                                <input type="text" name="branches[${branchIndex}][pincode]" id="branches_${branchIndex}_pincode" class="form-control" placeholder="Enter Pincode">
                            </div>
                        </div>
                    </div>
                `;

                $('#branches-container').append(branchHtml);
                branchIndex++;
            });

            // Remove branch
            $(document).on('click', '.remove-branch-btn', function() {
                const branchItem = $(this).closest('.branch-item');
                const branchIndexToRemove = branchItem.data('branch-index');

                // If this was the primary branch, make the first remaining branch primary
                const wasPrimary = branchItem.find('input[name="primary_branch"]:checked').length > 0;

                branchItem.remove();

                if (wasPrimary) {
                    $('.branch-item:first input[name="primary_branch"]').prop('checked', true);
                }

                // Update branch numbers
                updateBranchNumbers();
            });

            function updateBranchNumbers() {
                $('.branch-item').each(function(index) {
                    $(this).find('h6').text(`Branch #${index + 1}`);
                });
            }
        });
    </script>
@endsection
