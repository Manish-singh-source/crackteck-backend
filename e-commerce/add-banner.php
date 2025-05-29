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
                        <h5 class="card-title mb-0">Create Banner</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="lang-tab-content-en" role="tabpanel" aria-labelledby="lang-tab-en">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="banner_title">
                                                                Title
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input id="banner_title" type="text" name="banner_title" class="form-control" placeholder="Enter title" value="" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<div class="col-12">
                                <div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="lang-tab-content-en" role="tabpanel" aria-labelledby="lang-tab-en">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="banner_description">
                                                               Button URL
                                                            </label>
                                                            <input id="banner_description" type="text" name="banner_description" class="form-control" placeholder="Enter URL" value="" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="lang-tab-content-en" role="tabpanel" aria-labelledby="lang-tab-en">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="banner_description">
                                                                Description
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input id="banner_description" type="text" name="banner_description" class="form-control" placeholder="Enter description" value="" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="logo" class="form-label">Choose Banner
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" class="form-control" id="logo" name="logo">
                                            <div class="text-danger mt-2">Supported File : jpg,png,jpeg and size 1280x960 Pixels</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" name="status" id="status" required="">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
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