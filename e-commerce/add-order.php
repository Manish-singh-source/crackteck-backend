<?php
$contain = "Add Customer";
include('layouts/header.php') ?>

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
                                        <label for="serial_number" class="form-label">Product Serial No <span class="text-danger">*</span></label>
                                        <input type="text" name="serial_number" id="serial_number" class="form-control" value="" required="" placeholder="Enter Product Serial Number">
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
                                    <a href="./product-detail.php" class="btn btn-sm btn-primary">View More</a>
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
                                        <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" value="" required="" placeholder="Enter First Name">
                                    </div>

                                    <div class="col-6">
                                        <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" value="" required="" placeholder="Enter Last Name">
                                    </div>

                                    <div class="col-6">
                                        <label for="phone" class="form-label">Phone number <span class="text-danger">*</span></label>
                                        <input type="text" required="" name="phone" id="phone" class="form-control" value="" placeholder="Enter Phone number">
                                    </div>

                                    <div class="col-6">
                                        <label for="email" class="form-label">E-mail address <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="" placeholder="Enter Email id" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="" placeholder="Enter Date of Birth" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option selected disabled>-- Select --</option>
                                            <option value="">Male</option>
                                            <option value="">Female</option>
                                        </select>
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
                                        <label for="city" class="form-label">City<span class="text-danger">*</span></label>
                                        <input type="text" required="" name="city" id="city" class="form-control" value="" placeholder="Enter City">
                                    </div>

                                    <div class="col-6">
                                        <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                        <input type="text" name="state" id="state" class="form-control" value="" placeholder="Enter State" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                        <input type="text" name="country" id="country" class="form-control" value="" required="" placeholder="Enter Country">
                                    </div>

                                    <div class="col-6">
                                        <label for="pincode" class="form-label">Pincode<span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" id="pincode" class="form-control" value="" required="" placeholder="Enter Pincode">
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
                                        <label for="country_id" class="form-label">Customer Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Retail">Retail</option>
                                            <option value="Wholesale">Wholesale</option>
                                            <option value="Corporate">Corporate</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" name="company_name" id="company_name" class="form-control" value="" required="" placeholder="Enter Company Name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="company_addr" class="form-label">Company Address <span class="text-danger">*</span></label>
                                        <input type="text" name="company_addr" id="company_addr" class="form-control" value="" required="" placeholder="Enter Company Address">
                                    </div>

                                    <div class="mb-3">
                                        <label for="gst" class="form-label">GST Number <span class="text-danger">*</span></label>
                                        <input type="text" name="gst" id="gst" class="form-control" value="" required="" placeholder="Enter GST Number">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pan" class="form-label">PAN Number <span class="text-danger">*</span></label>
                                        <input type="text" required="" name="pan" id="pan" class="form-control" value="" placeholder="Enter PAN Number">
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
                                        <label for="pic" class="form-label">Profile Picture Upload <span class="text-danger">*</span></label>
                                        <input type="file" name="pic" id="pic" class="form-control" value="" required="" placeholder="Profile Picture Upload">
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
                            <a href="orders.php" class="btn btn-success w-sm waves ripple-light">
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
<?php include('layouts/footer.php') ?>