<?php include('layouts/header.php') ?>

<div class="content">

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
                        <h5 class="card-title mb-0">Create Brand</h5>
                    </div>

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
                                                            <label class="form-label" for="brand_title">
                                                                Title
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input id="brand_title" type="text" name="brand_title" class="form-control" placeholder="Enter title" value="" required="">
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
                                            <label for="logo" class="form-label">Logo
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" class="form-control" id="logo" name="logo">
                                            <div class="text-danger mt-2">Supported File : jpg,png,jpeg and size 220x220 Pixels</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" name="status" id="status" required="">
                                            <option selected disabled>-- Select --</option>
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