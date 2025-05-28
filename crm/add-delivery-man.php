<?php
$contain = "Add Delivery Man";
include('layouts/header.php') ?>

<div class="content">

    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Delivery</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Delivery</li>
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
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="">Male</option>
                                            <option value="">Female</option>
                                            <option value="">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Address Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="current-address" class="form-label">Current Address <span class="text-danger">*</span></label>
                                        <textarea name="current-address" id="current-address" class="form-control" value="" required="" placeholder="Enter Current Address"></textarea>
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


                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Work Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="employment-type" class="form-label">Employment Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="employment-type" id="employment-type">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="">Full-time</option>
                                            <option value="">Part-time</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="joining_date" class="form-label">Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="joining_date" id="joining_date" class="form-control" value="" required="" placeholder="Enter Joining Date">
                                    </div>

                                    <div class="col-6">
                                        <label for="assigned-area" class="form-label">Assigned Area/Zone <span class="text-danger">*</span></label>
                                        <select class="form-control" name="assigned-area" id="assigned-area">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="ABC">ABC</option>
                                            <option value="DEF">DEF</option>
                                        </select>
                                    </div>
<!-- 
                                    <div class="col-6">
                                        <label for="delivery_mode" class="form-label">Delivery Mode <span class="text-danger">*</span></label>
                                        <select class="form-control" name="delivery_mode" id="delivery_mode">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Walking">Walking</option>
                                            <option value="Bike">Bike</option>
                                            <option value="Van">Van</option>
                                            <option value="Truck">Truck</option>
                                        </select>
                                    </div> -->
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Vehicle Information
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-6">
                                        <label for="vehicle_type" class="form-label">Vehicle Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="vehicle_type" id="vehicle_type">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Bike">Bike</option>
                                            <option value="Scooter">Scooter</option>
                                            <option value="Car">Car</option>
                                            <option value="Van">Van</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="vehical_no" class="form-label">Vehicle Number <span class="text-danger">*</span></label>
                                        <input type="text" name="vehical_no" id="vehical_no" class="form-control" value="" required="" placeholder="Enter Vehicle Number">
                                    </div>

                                    <div class="col-6">
                                        <label for="driving_license_no" class="form-label">Driving License Number <span class="text-danger">*</span></label>
                                        <input type="text" name="driving_license_no" id="driving_license_no" class="form-control" value="" required="" placeholder="Enter Driving License Number">
                                    </div>

                                    <div class="col-6">
                                        <label for="driving_license" class="form-label">Upload Driving License (Image/PDF) <span class="text-danger">*</span></label>
                                        <input type="file" name="driving_license" id="driving_license" class="form-control" value="" required="" placeholder="Upload Driving License">
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
                                    Identity Proof
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        <label for="govid" class="form-label">Government ID Type <span class="text-danger">*</span></label>
                                        <input type="text" name="govid" id="govid" class="form-control" value="" required="" placeholder="Enter Government ID Type">
                                    </div>

                                    <div class="">
                                        <label for="idno" class="form-label">ID Number <span class="text-danger">*</span></label>
                                        <input type="text" name="idno" id="idno" class="form-control" value="" required="" placeholder="Enter ID Number">
                                    </div>

                                    <div class="">
                                        <label for="adhar-pic" class="form-label">Upload ID Document (Image/PDF) <span class="text-danger">*</span></label>
                                        <input type="file" name="adhar-pic" id="adhar-pic" class="form-control" value="" required="" placeholder="Upload ID Document">
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Bank Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        <label for="bank_acc_no" class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                                        <input type="text" name="bank_acc_no" id="bank_acc_no" class="form-control" value="" required="" placeholder="Enter Bank Account Number">
                                    </div>

                                    <div class="">
                                        <label for="bank_name" class="form-label">Bank Name <span class="text-danger">*</span></label>
                                        <input type="text" name="bank_name" id="bank_name" class="form-control" value="" required="" placeholder="Enter Bank Name">
                                    </div>

                                    <div class="">
                                        <label for="ifsc_code" class="form-label">IFSC Code <span class="text-danger">*</span></label>
                                        <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="" required="" placeholder="Enter IFSC Code">
                                    </div>

                                    <div class="">
                                        <label for="passbook-pic" class="form-label">Upload Document Photo <span class="text-danger">*</span></label>
                                        <input type="file" name="passbook-pic" id="passbook-pic" class="form-control" value="" required="" placeholder="Upload Document Photo">
                                    </div>

                                    <div class="">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status">
                                            <option selected disabled>-- Select --</option>
                                            <option value=""> Active</option>
                                            <option value="">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
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

<?php include('layouts/footer.php') ?>