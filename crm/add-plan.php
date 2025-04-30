<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create New Plan</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Plan Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="amc-plans.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Plan Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Basic, Standard, etc." id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="price" class="form-label">
                                            Plan Price <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="price" value="" class="form-control" placeholder="Enter Price" id="price">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <label for="services" class="form-label">Plan Services</label>
                                    <textarea class="form-control" id="services" placeholder="Required example textarea" id="services" required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a message in the textarea.
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select required="" name="status" id="status" class="form-select w-100">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
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