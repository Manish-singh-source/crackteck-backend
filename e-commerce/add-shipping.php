<?php
$contain = "Add Coupon";
include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                
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
                                            Shipping Basic Details:
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                    <!-- Shipping Title -->
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <label class="form-label" for="shipping_title">
                                            Shipping Title <span class="text-danger">*</span>
                                        </label>
                                        <input name="shipping_title" id="shipping_title" type="text" class="form-control" value="" placeholder="e.g., Standard Shipping" required>
                                    </div>

                                    <!-- Shipping Amount -->
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <label class="form-label" for="shipping_amount">
                                            Shipping Amount (₹) <span class="text-danger">*</span>
                                        </label>
                                        <input name="shipping_amount" id="shipping_amount" type="number" class="form-control" value="" placeholder="Enter amount" required>
                                    </div>

                                    <!-- Minimum Order Value -->
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <label class="form-label" for="min_order">
                                            Minimum Order Value (₹)
                                        </label>
                                        <input name="min_order" id="min_order" type="number" class="form-control" value="" placeholder="e.g., 500">
                                    </div>

                                    <!-- Maximum Order Value -->
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <label class="form-label" for="max_order">
                                            Maximum Order Value (₹)
                                        </label>
                                        <input name="max_order" id="max_order" type="number" class="form-control" value="" placeholder="e.g., 5000">
                                    </div>

                                   

                                    <!-- Status -->
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <label class="form-label" for="status">
                                            Status
                                        </label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
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
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>