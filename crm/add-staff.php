<?php
$contain = "Add Staff";
include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Staff</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Staff</li>
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
                                        <label for="name" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter First Name">
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
                                            <option selected value="India">Male</option>
                                            <option value="India">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="marital" class="form-label">Marital Status
                                            <span class="text-danger">*</span></label>
                                        <select class="form-control" name="marital" id="marital">
                                            <option selected value="Yes">Yes</option>
                                            <option value="No">No</option>
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
                                        <textarea name="current-address" id="current-address" class="form-control" value="" required="" placeholder="Enter Current Address" form="usrform">Enter Current Address...</textarea>
                                    </div>

                                    <div class="col-6">
                                        <label for="permanent-address" class="form-label">Permanent Address </label>
                                        <textarea name="permanent-address" id="permanent-address" class="form-control" value="" placeholder="Enter Permanent Address" form="usrform">Enter Permanent Address...</textarea>
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
                                        <label for="pincode" class="form-label">Pincode<span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" id="pincode" class="form-control" value="" required="" placeholder="Enter Pincode">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Job Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Employee ID <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Employee ID">
                                    </div>

                                    <div class="col-6">
                                        <label for="Department" class="form-label">Department <span class="text-danger">*</span></label>
                                        <select class="form-control" name="Department" id="Department">
                                            <option selected value="">Sales</option>
                                            <option value="">Support</option>
                                            <option value="">Management</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="name" class="form-label">Designation/Position <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Designation/Position">
                                    </div>

                                    <div class="col-6">
                                        <label for="name" class="form-label">Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Joining Date">
                                    </div>

                                    <div class="col-6">
                                        <label for="Department" class="form-label">Shift Timing <span class="text-danger">*</span></label>
                                        <select class="form-control" name="Department" id="Department">
                                            <option selected value="">Morning Shift</option>
                                            <option value="">Afternoon Shift</option>
                                            <option value="">Night Shift</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="name" class="form-label">Work Location <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Work Location">
                                    </div>

                                    <div class="col-6">
                                        <label for="name" class="form-label">Supervisor/Manager Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Supervisor/Manager Name">
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                        </div>
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
                                        <label for="pic" class="form-label">Upload ID Document (Image/PDF) <span class="text-danger">*</span></label>
                                        <input type="file" name="pic" id="pic" class="form-control" value="" required="" placeholder="Upload ID Document">
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Other Information:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        <label for="pic" class="form-label">Upload Profile Photo <span class="text-danger">*</span></label>
                                        <input type="file" name="pic" id="pic" class="form-control" value="" required="" placeholder="Upload Profile Photo">
                                    </div>

                                    <div class="">
                                        <label for="name" class="form-label">Emergency Contact Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Emergency Contact Name">
                                    </div>

                                    <div class="">
                                        <label for="name" class="form-label">Emergency Contact Number <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Emergency Contact Number">
                                    </div>

                                    <div class="">
                                        <label for="payment-mode" class="form-label">Employment Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="payment-mode" id="payment-mode">
                                            <option selected value=""> Active</option>
                                            <option value="">Inactive</option>
                                            <option value="">Resigned</option>
                                            <option value="">Terminated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Salary Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        <label for="name" class="form-label">Salary Amount <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Salary Amount">
                                    </div>

                                    <div class="">
                                        <label for="payment-mode" class="form-label">Payment Mode <span class="text-danger">*</span></label>
                                        <select class="form-control" name="payment-mode" id="payment-mode">
                                            <option selected value=""> Bank Transfer</option>
                                            <option value="">Cash</option>
                                            <option value="">Cheque</option>
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="name" class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Bank Account Number">
                                    </div>

                                    <div class="">
                                        <label for="name" class="form-label">Bank Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Bank Name">
                                    </div>

                                    <div class="">
                                        <label for="name" class="form-label">IFSC Code <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="" placeholder="Enter IFSC Code">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>