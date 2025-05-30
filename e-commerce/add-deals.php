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
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Select Product <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search or Enter Product Name" name="product_name" required>
                                        <button type="button" class="btn btn-secondary">
                                            Browse
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="deal_title">
                                        Deal Title <span class="text-danger">*</span>
                                    </label>
                                    <input id="deal_title" type="text" name="deal_title" class="form-control" placeholder="Enter Deal Title" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="offer_price">
                                        Offer Price <span class="text-danger">*</span>
                                    </label>
                                    <input id="offer_price" type="number" name="offer_price" class="form-control" placeholder="Enter Offer Price" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="discount">
                                        Discount (%) <span class="text-danger">*</span>
                                    </label>
                                    <input id="discount" type="number" name="discount" class="form-control" placeholder="Enter Discount %" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="original_price">
                                        Original Price
                                    </label>
                                    <input id="original_price" type="number" name="original_price" class="form-control" placeholder="Enter Original Price (Optional)">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="start_date">
                                        Offer Start Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="datetime-local" id="start_date" name="start_date" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="end_date">
                                        Offer End Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="datetime-local" id="end_date" name="end_date" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">
                                        Status <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="status" id="status" required>
                                        <option selected disabled value=""> -- Select -- </option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-start mt-4">
                                <button type="submit" class="btn btn-success">
                                    Add Deal
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>