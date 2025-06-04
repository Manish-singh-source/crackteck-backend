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
                        <li class="breadcrumb-item active" aria-current="page">Pincodes</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Pincode</li>
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
                                            Pincode
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-6">
                                        <label for="pincode" class="form-label">Pincode<span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" id="pincode" class="form-control" value="" required="" placeholder="Enter Pincode">
                                    </div>

                                    <div class="col-6">
                                        <label for="meetType" class="form-label">Delivery</label>
                                        <select class="form-control" name="meetType" id="meetType">
                                            <option selected disabled>-- Select Delivery Status --</option>
                                            <option value="">Active</option>
                                            <option value="">Inactive</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="status" class="form-label">Installation</label>
                                        <select class="form-control" name="status" id="status">
                                            <option selected disabled>-- Select Installation Status --</option>
                                            <option value="">Active</option>
                                            <option value="">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button> -->
                            <a href="pincodes.php" class="btn btn-success w-sm waves ripple-light">Submit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>