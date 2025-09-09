@extends('crm/layouts/master')

@section('content')

<div class="content">

    <div class="container-fluid">
        <div class="pb-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create AMC</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'First Name',
                                        'name' => 'first_name',
                                        'type' => 'text',
                                        'placeholder' => "Enter Your First Name"
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Last Name',
                                        'name' => 'last_name',
                                        'type' => 'text',
                                        'placeholder' => "Enter Your Last Name"
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Phone Number',
                                        'name' => 'phone',
                                        'type' => 'text',
                                        'placeholder' => "Enter Your Phone Number"
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Email',
                                        'name' => 'email',
                                        'type' => 'email',
                                        'placeholder' => "Enter Email Id"
                                        ])
                                    </div>
                                </div>


                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Date Of Birth',
                                        'name' => 'dob',
                                        'type' => 'date',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Gender',
                                        'name' => 'gender',
                                        'options' => ["0" => "--Select Gender --", "1" => "Male", "2" => "Female"]
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Customer Type',
                                        'name' => 'customer_type',
                                        'options' => ["0" => "--Select --", "1" => "Type 1", "2" => "Type 2"]
                                        ])
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
                                        @include('components.form.input', [
                                        'label' => 'Company Name',
                                        'name' => 'company_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Your Company Name'
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Company Address',
                                        'name' => 'company_address',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Your Company Address'
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'GST Number',
                                        'name' => 'gst_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Your GST Number'
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'PAN Number',
                                        'name' => 'pan_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Your PAN Number'
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Profile Image',
                                        'name' => 'pic',
                                        'type' => 'file',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Image',
                                        'name' => 'image',
                                        'type' => 'file',
                                        ])

                                    </div>
                                    <div id="image-preview-section">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card pb-4">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">
                            Address/Branch Information
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                @include('components.form.input', [
                                'label' => 'Address Line 1',
                                'name' => 'address',
                                'type' => 'text',
                                'placeholder' => 'Enter Your Address Line 1'
                                ])
                            </div>

                            <div class="col-6">
                                @include('components.form.input', [
                                'label' => 'Address Line 2',
                                'name' => 'address2',
                                'type' => 'text',
                                'placeholder' => 'Enter Your Address Line 2'
                                ])
                            </div>

                            <div class="col-6">
                                @include('components.form.input', [
                                'label' => 'City',
                                'name' => 'city',
                                'type' => 'text',
                                'placeholder' => 'Enter Your City'
                                ])
                            </div>

                            <div class="col-6">
                                @include('components.form.input', [
                                'label' => 'State',
                                'name' => 'state',
                                'type' => 'text',
                                'placeholder' => 'Enter Your State'
                                ])
                            </div>

                            <div class="col-6">
                                @include('components.form.input', [
                                'label' => 'Country',
                                'name' => 'country',
                                'type' => 'text',
                                'placeholder' => 'Enter Your Country'
                                ])
                            </div>

                            <div class="col-6">
                                @include('components.form.input', [
                                'label' => 'Pincode',
                                'name' => 'pincode',
                                'type' => 'text',
                                'placeholder' => 'Enter Your Pincode'
                                ])
                            </div>
                            <div class="col-6">
                                @include('components.form.input', [
                                'label' => 'Branch Name',
                                'name' => 'branch_name',
                                'type' => 'text',
                                'placeholder' => 'Enter Your Branch Name'
                                ])
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">
                                        Add
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
                                    <th>Branch Name</th>
                                    <th>Address Line 1</th>
                                    <th>Address Line 2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Pincode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="align-middle">
                                    <td>BO</td>
                                    <td>
                                        <div>
                                            Sanjay Nagar Jalji Pada Kandivali West
                                        </div>
                                    </td>
                                    <td>
                                        Ganesh Nagar
                                    </td>
                                    <td>
                                        Mumbai
                                    </td>
                                    <td>
                                        Maharashtra
                                    </td>
                                    <td>
                                        India
                                    </td>
                                    <td>400067</td>
                                    <td>
                                        <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>KD</td>
                                    <td>
                                        <div>
                                            Sanjay Nagar Jalji Pada Kandivali West
                                        </div>
                                    </td>
                                    <td>
                                        Ganesh Nagar
                                    </td>
                                    <td>
                                        Mumbai
                                    </td>
                                    <td>
                                        Maharashtra
                                    </td>
                                    <td>
                                        India
                                    </td>
                                    <td>400067</td>
                                    <td>
                                        <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Product Name',
                                        'name' => 'product_name',
                                        'type' => 'text',
                                        'placeholder' => 'Dell Inspiron 15 Laptop Windows 11',
                                        ])
                                    </div>
                                </div>

                                <div class="col-4">
                                    @include('components.form.select', [
                                    'label' => 'Product Type',
                                    'name' => 'product_type',
                                    'options' => ["0" => "--Select --", "1" => "Computer", "2" => "Laptop", "3" => "Accessories"]
                                    ])
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Product Brand',
                                        'name' => 'product_brand',
                                        'type' => 'text',
                                        'placeholder' => 'Dell, HP, Asus',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Model Number',
                                        'name' => 'model_no',
                                        'type' => 'text',
                                        'placeholder' => 'Inspiron 3511',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Serial Number',
                                        'name' => 'serial_no',
                                        'type' => 'text',
                                        'placeholder' => 'B0BB7FQBBS',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Purchase Date',
                                        'name' => 'purchase_date',
                                        'type' => 'date',
                                        'placeholder' => 'Enter Purchase Date',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Product Image',
                                        'name' => 'purchase_img',
                                        'type' => 'file',
                                        ])
                                    </div>
                                    <div id="image-preview-section">

                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Select Branch',
                                        'name' => 'product_type',
                                        'options' => ["0" => "--Select --", "1" => "BO", "2" => "KD"]
                                        ])
                                    </div>
                                    <div id="image-preview-section">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <table
                            class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Modal Number</th>
                                    <th>Serial Number</th>
                                    <th>Purchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/100x100" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Headphone
                                        </div>
                                    </td>
                                    <td>
                                        Computer
                                    </td>
                                    <td>
                                        Sony
                                    </td>
                                    <td>
                                        Inspiron 3511
                                    </td>
                                    <td>
                                        B0BB7FQBBS
                                    </td>
                                    <td>2025-04-04 06:09 PM</td>
                                    <td>
                                        <a aria-label="anchor"
                                            class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">AMC Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-4">
                                    @include('components.form.select', [
                                    'label' => 'Select Plan',
                                    'name' => 'amc_plan',
                                    'options' => ["0" => "--Select --", "1" => "Basic", "2" => "Standard", "3" => "Premium"]
                                    ])
                                </div>

                                <div class="col-4">
                                    @include('components.form.select', [
                                    'label' => 'Plan Duration',
                                    'name' => 'plan_duration',
                                    'options' => ["0" => "--Select --", "1" => "6 Months", "2" => "1 Year", "3" => "2 Years"]
                                    ])
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Preffered Start Date',
                                        'name' => 'plan_start_date',
                                        'type' => 'date',
                                        'placeholder' => 'Enter Purchase Date',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                            'label' => 'Priority Level',
                                        'name' => 'priority_level',
                                        'options' => ["0" => "--Select --", "1" => "High", "2" => "Medium", "3" => "Low"]
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Additional Notes',
                                        'name' => 'additional_notes',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Additional Notes',
                                        ])
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-start">
                                        <a href="{{ route('service-request.index') }}" class="btn btn-primary">
                                            Submit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection