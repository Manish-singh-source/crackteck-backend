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
                        <h5 class="card-title mb-0">Create Category</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xl-12">
                                <div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="lang-tab-content-en" role="tabpanel" aria-labelledby="lang-tab-en">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="category_name">
                                                                Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input id="category_name" type="text" name="category_name" class="form-control" placeholder="Enter Name" value="" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="row g-3">

                                    <div class="col-lg-6" id="parent-cat">
                                        <div class="mb-2">
                                            <label for="parent_category" class="form-label">Parent Category </label>
                                            <select class="form-select" name="parent_category" id="parent_category">
                                                <option selected disabled value=""> -- Select -- </option>
                                                <option value="5">Laptops</option>
                                                <option value="4">Computers</option>
                                                <option value="2">Biometrics</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="category_image" class="form-label">Feature Image <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="category_image" name="category_image" required="">
                                            <div class="text-danger mt-2">Supported File : jpg,png,jpeg and size 200x200 Pixels</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="image_icon" class="form-label">Icon Image <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="image_icon" name="image_icon" required="">
                                            <div class="text-danger mt-2">Supported File : jpg,png,jpeg and size 200x200 Pixels</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="mb-2">
                                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                            <select class="form-select" name="status" id="status" required="">
                                                <option selected disabled value=""> -- Select -- </option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-start mt-4">
                                    <button type="submit" class="btn btn-success">
                                        Add
                                    </button>
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