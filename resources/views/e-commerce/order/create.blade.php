@extends('e-commerce/layouts/master')

@section('content')

<div class="content">


    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Order</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Product Information
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3 align-items-end">
                                    <div class="col-6">
                                            @include('components.form.input', [
                                            'label' => 'Product Serial No',
                                            'name' => 'serial_number',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Product Serial Number',
                                            ])
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-primary view-product">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 product-details">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Product Basic Details
                                    </h5>
                                    <a href="{{ route('ec.product.view') }}" class="btn btn-sm btn-primary">View More</a>
                                    <!-- <button class="btn btn-sm btn-primary">Edit</button> -->
                                </div>
                            </div>

                            <div class="card-body">
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">SKU :
                                        </span>
                                        <span>
                                            #SKU-001
                                        </span>
                                    </li>

                                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Name :
                                        </span>
                                        <span>
                                            ZKTeco MB20 Biometric Attendance Device
                                        </span>
                                    </li>

                                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Brand :
                                        </span>
                                        <span>
                                            ZKTeco
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Model Number :
                                        </span>
                                        <span>
                                            MB20
                                        </span>
                                    </li>

                                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Category :
                                        </span>
                                        <span>
                                            Biometric Attendance & Access Control System
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Sub Category :
                                        </span>
                                        <span>
                                            Biometric Attendance & Access Control System
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

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
                                        'name' => 'firstname',
                                        'type' => 'text',
                                        'placeholder' => 'Enter First Name',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Last Name',
                                        'name' => 'lastname',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Last Name',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Phone number',
                                        'name' => 'phone',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Phone number',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'E-mail Id',
                                        'name' => 'email',
                                        'type' => 'email',
                                        'placeholder' => 'Enter Email id',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Date of Birth',
                                        'name' => 'dob',
                                        'type' => 'date',
                                        'placeholder' => 'Enter Date of Birth',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Gender',
                                        'name' => 'gender',
                                        'options' => ["0" => "--Select--", "1" => "Male", "2" => "Female"]
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Address Information
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="address" class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                        <textarea type="text" name="address" id="address" class="form-control" value="" required="" placeholder="Enter Address 1"></textarea>
                                    </div>

                                    <div class="col-6">
                                        <label for="address2" class="form-label">Address Line 2 (optional) <span class="text-danger">*</span></label>
                                        <textarea type="text" name="address2" id="address2" class="form-control" value="" required="" placeholder="Enter Address 2"></textarea>
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'City',
                                        'name' => 'city',
                                        'type' => 'text',
                                        'placeholder' => 'Enter City',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'State',
                                        'name' => 'state',
                                        'type' => 'text',
                                        'placeholder' => 'Enter State',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Country',
                                        'name' => 'country',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Country',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Pincode',
                                        'name' => 'pincode',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Pincode',
                                        ])
                                    </div>
                                </div>
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
                                        'name' => 'country_id',
                                        'options' => ["0" => "--Select--", "1" => "Retail", "2" => "Wholesale", "3" => "Corporate"]
                                        ])
                                    </div>

                                    <div class="mb-3">
                                        @include('components.form.input', [
                                        'label' => 'Company Name',
                                        'name' => 'company_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Company Name',
                                        ])
                                    </div>

                                    <div class="mb-3">
                                        @include('components.form.input', [
                                        'label' => 'Company Address',
                                        'name' => 'company_addr',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Company Address',
                                        ])
                                    </div>

                                    <div class="mb-3">
                                        @include('components.form.input', [
                                        'label' => 'GST Number',
                                        'name' => 'gst',
                                        'type' => 'text',
                                        'placeholder' => 'Enter GST Number',
                                        ])
                                    </div>

                                    <div class="mb-3">
                                        @include('components.form.input', [
                                        'label' => 'PAN Number',
                                        'name' => 'pan',
                                        'type' => 'text',
                                        'placeholder' => 'Enter PAN Number',
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
                                        'placeholder' => 'Profile Picture Upload',
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
                            <a href="{{ route('order.index') }}" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </a>
                            <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".product-details").hide();
        $(".view-product").on("click", function() {
            $(".product-details").show();
        });
    });
</script>

@endsection