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
                        <h5 class="card-title mb-0">Create Customer</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div>
                            <form action="customers.php" method="POST" enctype="multipart/form-data">
                                
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" value="" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="text" required="" name="password" id="password" class="form-control" value="" placeholder="Enter Password">
                                    </div>


                                    <div class="col-6">
                                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control" value="" placeholder="Enter Address" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" value="" placeholder="Enter City" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="country_id" class="form-label">Country <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option selected value="India">India</option>
                                            <option selected value="India">India</option>
                                            <option selected value="India">India</option>
                                            <option selected value="India">India</option>
                                            <option selected value="India">India</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                        <input type="text" name="state" id="state" class="form-control" value="" placeholder="Enter State" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="zip" class="form-label">Zip <span class="text-danger">*</span></label>
                                        <input type="text" name="zip" id="zip" class="form-control" value="" placeholder="Enter Zip" required="">
                                    </div>

                                    <div class="col-6">
                                        <label for="image" class="form-label">Image </label>
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Enter Zip">
                                    </div>

                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-md btn-success btn-xl px-4 fs-6 text-light waves ripple-light">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>