<?php
$contain = "Add AMC Plan";
include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">AMC Plan</li>
                        <li class="breadcrumb-item active" aria-current="page">Add AMC Plan</li>
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
                                            Plan Information
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3 pb-3">
                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label for="plan_name" class="form-label">
                                                Plan Name <span class="text-danger">*</span>
                                            </label>
                                            <input required="" type="text" name="plan_name" value="" class="form-control" placeholder="Basic, Standard, etc." id="plan_name">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label for="Code" class="form-label">
                                                Plan Code <span class="text-danger">*</span>
                                            </label>
                                            <input required="" type="text" name="Code" value="" class="form-control" placeholder="Enter Code" id="Code">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="type" class="form-label">Plan Type <span class="text-danger">*</span></label>
                                        <select required="" name="type" id="type" class="form-select w-100">
                                            <option selected disabled>-- Select --</option>
                                            <option value="1">Hardware</option>
                                            <option value="1">Networking</option>
                                            <option value="1">Software</option>
                                            <option value="1">Comprehensive</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="form-control" value="" required="" placeholder="Enter Description" form="usrform"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Duration and Coverage:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-6">
                                        <label for="duration" class="form-label">Contract Duration <span class="text-danger">*</span></label>
                                        <select class="form-control" name="duration" id="duration">
                                            <option selected disabled>-- Select --</option>
                                            <option value=""> 6 months</option>
                                            <option value="">1 year</option>
                                            <option value="">2 years</option>
                                            <option value="">Custom</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="start-date" class="form-label">Start Date <span class="text-danger">*</span></label>
                                        <input type="date" name="start-date" id="start-date" class="form-control" value="" required="" placeholder="Enter Start Date">
                                    </div>

                                    <div class="col-6">
                                        <label for="end-date" class="form-label">End Date <span class="text-danger">*</span></label>
                                        <input type="date" name="end-date" id="end-date" class="form-control" value="" required="" placeholder="Enter End Date">
                                    </div>

                                    <div class="col-6">
                                        <label for="total-visits" class="form-label">Number of Visits Included <span class="text-danger">*</span></label>
                                        <input type="text" name="total-visits" id="total-visits" class="form-control" value="" required="" placeholder="Enter Number of Visits Included">
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Pricing Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="plan-cost" class="form-label">Plan Cost (₹) <span class="text-danger">*</span></label>
                                        <input type="text" name="plan-cost" id="plan-cost" class="form-control" value="" required="" placeholder="Enter Plan Cost (₹)">
                                    </div>

                                    <div class="col-6">
                                        <label for="tax" class="form-label">Tax (%) <span class="text-danger">*</span></label>
                                        <input type="text" name="tax" id="tax" class="form-control" value="" required="" placeholder="Enter Tax (%)">
                                    </div>

                                    <div class="col-6">
                                        <label for="total-cost" class="form-label">Total Cost (₹) <span class="text-danger">*</span></label>
                                        <input type="text" name="total-cost" id="total-cost" class="form-control" value="" required="" placeholder="Enter Total Cost (₹)">
                                    </div>

                                    <div class="col-6">
                                        <label for="pay-terms" class="form-label">Payment Terms <span class="text-danger">*</span></label>
                                        <select class="form-control" name="pay-terms" id="pay-terms">
                                            <option selected disabled>-- Select --</option>
                                            <option value=""> Full Payment</option>
                                            <option value="">Installments</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Services Included:
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        <label for="support-type" class="form-label">Support Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="support-type" id="support-type">
                                            <option selected disabled>-- Select --</option>
                                            <option value="">Onsite</option>
                                            <option value="">Remote</option>
                                            <option value="">Both</option>
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="replacement-policy" class="form-label">Replacement Policy </label>
                                        <textarea name="replacement-policy" id="replacement-policy" class="form-control" value="" placeholder="Enter replacement-policy" form="usrform"></textarea>
                                    </div>

                                    <div class="">
                                        <h6 class="fs-15">List of Covered Items</h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="cctv-n-security">
                                                    <label class="form-check-label" for="cctv-n-security">
                                                        CCTV & Security Systems
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="router-service">
                                                    <label class="form-check-label" for="router-service">
                                                        Router servicing
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="" id="computer-laptops">
                                                    <label class="form-check-label" for="computer-laptops">
                                                        Computers & Laptops
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="biometric-n-access-control">
                                                    <label class="form-check-label" for="biometric-n-access-control">
                                                        Biometric & Access Control
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Other Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        <label for="brochure" class="form-label">Upload Plan Brochure <span class="text-danger">*</span></label>
                                        <input type="file" name="brochure" id="brochure" class="form-control" value="" required="" placeholder="Upload Plan Brochure">
                                    </div>

                                    <div class="">
                                        <label for="tandc" class="form-label">Terms and Conditions <span class="text-danger">*</span></label>
                                        <textarea name="tandc" id="tandc" class="form-control" value="" placeholder="Enter Terms & Conditions" form="usrform"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Status:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option selected disabled>-- Select --</option>
                                            <option value="0">Active</option>
                                            <option value="1">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="amc-plans.php" class="btn btn-success w-sm waves ripple-light">
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


    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>