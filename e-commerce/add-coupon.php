<?php
$contain = "Add Coupon";
include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Coupon</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
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
                                            Coupon Basic Details:
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <div>
                                            <label class="form-label" for="name">
                                                Coupon Code <span class="text-danger">*</span>
                                            </label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter Coupon Code " required="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="title">
                                                Coupon Title<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="title" name="title" required="" value="" placeholder='e.g., "Summer Sale 20% OFF"'>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label for="mail-composer" class="form-label"> Coupon Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" placeholder="Enter Coupon Description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Discount Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label for="category_id" class="form-label">Discount Type<span class="text-danger">*</span></label>
                                            <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                                <option value="" data-select2-id="select2-data-7-j3bj">Percentage</option>
                                                <option value="2" data-subcategory="[]">
                                                    Fixed Amount</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="text">
                                                Discount Value <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="text" name="text" required="" value="" placeholder="e.g., 20% or ₹500">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="text">
                                                Maximum Discount Amount <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="text" name="text" required="" value="" placeholder="Maximum Discount Amount">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="price">
                                                Purchase Price (Cost Price) <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="price" name="price" required="" value="" placeholder="Product Purchase Price (Cost Price)">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="invoiceno">
                                                Invoice Number <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="invoiceno" name="invoiceno" required="" value="" placeholder="Product Invoice Number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Usage Conditions:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="min" class="form-label">Minimum Purchase Amount<span class="text-danger">*</span></label>
                                        <input name="min" id="min" type="text" class="form-control" value="" placeholder="Enter e.g., ₹2000 minimum order" required="">
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="category_id" class="form-label">Applicable Products<span class="text-danger">*</span></label>
                                        <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                            <option value="" data-select2-id="select2-data-7-j3bj">A</option>
                                            <option value="2" data-subcategory="[]">
                                                B</option>
                                            <option value="4" data-subcategory="[]">
                                                C</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="category_id" class="form-label">Applicable Categories<span class="text-danger">*</span></label>
                                        <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                            <option value="" data-select2-id="select2-data-7-j3bj">A</option>
                                            <option value="2" data-subcategory="[]">
                                                B</option>
                                            <option value="4" data-subcategory="[]">
                                                C</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="category_id" class="form-label">Customer Eligibility<span class="text-danger">*</span></label>
                                        <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                            <option value="" data-select2-id="select2-data-7-j3bj">All Customers</option>
                                            <option value="2" data-subcategory="[]">
                                            New Customers</option>
                                            <option value="4" data-subcategory="[]">
                                            Existing Customers</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Validity Period:
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Start Date<span class="text-danger">*</span></label>
                                    <input name="date" id="name" type="date" class="form-control" value="" placeholder="Enter Start Date" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="date" class="form-label">End Date<span class="text-danger">*</span></label>
                                    <input name="date" id="name" type="date" class="form-control" value="" placeholder="Enter End Date" required="">
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Usage Limits
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class=" mb-3">
                                    <label for="use" class="form-label">Total Usage Limit<span class="text-danger">*</span></label>
                                    <input name="use" id="use" type="text" class="form-control" value="" placeholder="e.g., first 100 users only" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="limit" class="form-label">Usage Limit Per Customer<span class="text-danger">*</span></label>
                                    <input name="limit" id="limit" type="text" class="form-control" value="" placeholder="e.g., 1 time per customer" required="">
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Status
                                </h5>
                            </div>

                            <div class="card-body">

                                <div>
                                    <label for="category_id" class="form-label">Stock Status<span class="text-danger">*</span></label>
                                    <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                        <option value="" data-select2-id="select2-data-7-j3bj">Active</option>
                                        <option value="2" data-subcategory="[]">Inactive</option>
                                    </select>
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