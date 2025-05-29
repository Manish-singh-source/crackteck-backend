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
                        <li class="breadcrumb-item active" aria-current="page">Leads</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Leads</li>
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
                                            Personal Information
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <!-- Existing Fields -->
                                    <div class="col-4">
                                        <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" value="" required placeholder="Enter First Name">
                                    </div>

                                    <div class="col-4">
                                        <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" value="" required placeholder="Enter Last Name">
                                    </div>

                                    <div class="col-4">
                                        <label for="phone" class="form-label">Phone number <span class="text-danger">*</span></label>
                                        <input type="text" required name="phone" id="phone" class="form-control" value="" placeholder="Enter Phone number">
                                    </div>

                                    <div class="col-4">
                                        <label for="email" class="form-label">E-mail address <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" value="" placeholder="Enter Email id" required>
                                    </div>

                                    <div class="col-4">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="" placeholder="Enter Date of Birth">
                                    </div>

                                    <div class="col-4">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <!-- Lead Management Fields -->
                                    <div class="col-4">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter Company Name">
                                    </div>

                                    <div class="col-4">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Designation">
                                    </div>

                                    <div class="col-4">
                                        <label for="industry_type" class="form-label">Industry Type</label>
                                        <select class="form-control" name="industry_type" id="industry_type">
                                            <option selected disabled>-- Select Industry --</option>
                                            <option value="Pharma">Pharma</option>
                                            <option value="School">School</option>
                                            <option value="Manufacturing">Manufacturing</option>
                                            <!-- Add more as needed -->
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="source" class="form-label">Source</label>
                                        <select class="form-control" name="source" id="source">
                                            <option selected disabled>-- Select Source --</option>
                                            <option value="Referral">Referral</option>
                                            <option value="Website">Website</option>
                                            <option value="Walk-in">Walk-in</option>
                                            <option value="Event">Event</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="requirement_type" class="form-label">Requirement Type</label>
                                        <select class="form-control" name="requirement_type" id="requirement_type">
                                            <option selected disabled>-- Select Requirement --</option>
                                            <option value="Servers">Servers</option>
                                            <option value="CCTV">CCTV</option>
                                            <option value="Biometric">Biometric</option>
                                            <option value="Networking">Networking</option>
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label for="budget_range" class="form-label">Budget Range</label>
                                        <input type="text" name="budget_range" id="budget_range" class="form-control" placeholder="e.g., 10K-50K">
                                    </div>

                                    <div class="col-4">
                                        <label for="urgency" class="form-label">Urgency</label>
                                        <select class="form-control" name="urgency" id="urgency">
                                            <option selected disabled>-- Select Urgency --</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
<!-- 
                                    <div class="col-4">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" name="region" id="region" class="form-control" placeholder="Enter Region">
                                    </div> -->

                                    <!-- <div class="col-4">
                                        <label for="assigned_to" class="form-label">Assigned To</label>
                                        <input type="text" name="assigned_to" id="assigned_to" class="form-control" placeholder="Enter Salesperson Name or ID">
                                    </div> -->

                                    <div class="col-4">
                                        <label for="status" class="form-label">Lead Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option selected disabled>-- Select Status --</option>
                                            <option value="New">New</option>
                                            <option value="Contacted">Contacted</option>
                                            <option value="Qualified">Qualified</option>
                                            <option value="Quoted">Quoted</option>
                                            <option value="Converted">Converted</option>
                                            <option value="Lost">Lost</option>
                                        </select>
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