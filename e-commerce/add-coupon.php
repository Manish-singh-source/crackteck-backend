<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Create Coupon</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="" class="form-control" placeholder="Enter coupon name" required="">
                                </div>

                                <div class="col-lg-6">
                                    <label for="code" class="form-label">Code <span class="text-danger">*</span></label>
                                    <input type="text" name="code" id="code" value="" class="form-control" placeholder="Enter coupon code" required="">
                                </div>

                                <div class="col-lg-6">
                                    <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                    <select class="form-select" name="type" id="type" required="">
                                        <option value="">Select One</option>
                                        <option value="1">Fixed</option>
                                        <option value="2">Percent</option>
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <label for="value" class="form-label">Value <span class="text-danger">*</span></label>
                                    <input value="" type="text" name="value" id="value" class="form-control" placeholder="Enter coupon value" required="">
                                </div>

                                <div class="col-lg-6">
                                    <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" id="start_date" value="" class="form-control" required="">
                                </div>

                                <div class="col-lg-6">
                                    <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
                                    <input type="date" name="end_date" id="end_date" value="" class="form-control" required="">
                                </div>

                                <div class="col-12">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" id="status" required="">
                                        <option value="1">Enable</option>
                                        <option value="2">Disable</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-success">
                                            Add
                                        </button>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>