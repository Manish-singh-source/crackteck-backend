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
                        <li class="breadcrumb-item active" aria-current="page">Enginner</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Enginner</li>
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
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="" placeholder="Enter Date of Birth" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="gender" class="form-label">Gender</label>
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
                                <form method="post" id="branch-form">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="address" class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                            <input type="text" name="address" id="address" class="form-control" value="" required="" placeholder="Enter Address 1">
                                        </div>

                                        <div class="col-6">
                                            <label for="address2" class="form-label">Address Line 2</label>
                                            <input type="text" name="address2" id="address2" class="form-control" value="" placeholder="Enter Address 2">
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
                                </form>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Bank Account Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <form method="post" id="branch-form">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="bank_acc_holder_name" class="form-label">Bank Account Holder Name <span class="text-danger">*</span></label>
                                            <input type="text" name="bank_acc_holder_name" id="bank_acc_holder_name" class="form-control" value="" required="" placeholder="Enter Bank Account Holder Name">
                                        </div>

                                        <div class="col-6">
                                            <label for="bank_acc_number" class="form-label">Bank Account Number<span class="text-danger">*</span></label>
                                            <input type="text" name="bank_acc_number" id="bank_acc_number" class="form-control" value="" placeholder="Enter Bank Account Number">
                                        </div>

                                        <div class="col-6">
                                            <label for="bank_name" class="form-label">Bank Name<span class="text-danger">*</span></label>
                                            <input type="text" required="" name="bank_name" id="bank_name" class="form-control" value="" placeholder="Enter Bank Name">
                                        </div>

                                        <div class="col-6">
                                            <label for="ifsc_code" class="form-label">IFSC Code <span class="text-danger">*</span></label>
                                            <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="" placeholder="Enter IFSC Code" required="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Police Verification Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <form method="post" id="branch-form">
                                    <div class="row g-3">

                                        <div class="col-6">
                                            <label for="policeVerification" class="form-label">Police Verification:</label>
                                            <select id="policeVerification" class="form-control" name="police_verification" required>
                                                <option value="">Select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for="policeVerificationStatus" class="form-label">Police Verification Status:</label>
                                            <select id="policeVerificationStatus" class="form-control" name="police_verification_status" required>
                                                <option value="">Select</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for="policeCertificate" class="form-label">Upload Police Verification Document:</label>
                                            <input type="file" id="policeCertificate" class="form-control" name="police_certificate" accept=".pdf,.jpg,.png" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Employment Details:
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="country_id" class="form-label">Designation <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Network Engineer">Network Engineer</option>
                                            <option value="Hardware Technician">Hardware Technician</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country_id" class="form-label">Department <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Installation">Installation</option>
                                            <option value="Maintenance">Maintenance</option>
                                            <option value="Support">Support</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="company_name" id="company_name" class="form-control" value="" required="" placeholder="Enter Company Name">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Skill Details:
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="country_id" class="form-label">Primary Skills <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Network Engineer">Network Engineer</option>
                                            <option value="Hardware Technician">Hardware Technician</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country_id" class="form-label">Department <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Installation">Installation</option>
                                            <option value="Maintenance">Maintenance</option>
                                            <option value="Support">Support</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="company_name" class="form-label">Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="company_name" id="company_name" class="form-control" value="" required="" placeholder="Enter Company Name">
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
                            <a href="engineers.php" class="btn btn-success w-sm waves ripple-light">
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
        $(".branch-section").hide();

        $("#branch-form").on("submit", function(e) {
            e.preventdefault();
            let formData = e.serialize();
            console.log(formData);
        });
    });
</script>
<?php include('layouts/footer.php') ?>