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
                                            <label class="form-label" for="coupon_code">
                                                Coupon Code <span class="text-danger">*</span>
                                            </label>
                                            <input name="coupon_code" id="coupon_code" type="text" class="form-control" value="" placeholder="Enter Coupon Code" required="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="coupon_title">
                                                Coupon Title<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="coupon_title" name="coupon_title" required="" value="" placeholder='e.g., "Summer Sale 20% OFF"'>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label for="coupon_description" class="form-label"> Coupon Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="coupon_description" class="form-control text-editor" name="coupon_description" placeholder="Enter Coupon Description"></textarea>
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
                                            <label for="discount_type" class="form-label">Discount Type<span class="text-danger">*</span></label>
                                            <select required="" name="discount_type" id="discount_type" class="form-select w-100">
                                                <option selected disabled value="">-- Select --</option>
                                                <option value="">Percentage</option>
                                                <option value="2">Fixed Amount</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="discount_value">
                                                Discount Value <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="discount_value" name="discount_value" required="" value="" placeholder="e.g., 20% or ₹500">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="max_discount_value">
                                                Maximum Discount Amount <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="max_discount_value" name="max_discount_value" required="" value="" placeholder="Maximum Discount Amount">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="cost_price">
                                                Purchase Price (Cost Price) <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="cost_price" name="cost_price" required="" value="" placeholder="Product Purchase Price (Cost Price)">
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
                                        <label for="min_purchase_amount" class="form-label">Minimum Purchase Amount<span class="text-danger">*</span></label>
                                        <input name="min_purchase_amount" id="min_purchase_amount" type="text" class="form-control" value="" placeholder="Enter e.g., ₹2000 minimum order" required="">
                                    </div>



                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="apply_categories" class="form-label">Applicable Categories<span class="text-danger">*</span></label>
                                        <select required="" name="apply_categories" id="apply_categories" class="form-select w-100">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="1">Category 1</option>
                                            <option value="2">Category 2</option>
                                            <option value="3">Category 3</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="product_search" class="form-label">
                                            Product Search <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="product_search" id="product_search" class="form-control" placeholder="Search product name or SKU" required>
                                            <button type="button" class="btn btn-outline-primary">
                                                Browse Product
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                        </div> -->
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
                                    <label for="start_date" class="form-label">Start Date<span class="text-danger">*</span></label>
                                    <input name="start_date" id="start_date" type="date" class="form-control" value="" placeholder="Enter Start Date" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="end_date" class="form-label">End Date<span class="text-danger">*</span></label>
                                    <input name="end_date" id="end_date" type="date" class="form-control" value="" placeholder="Enter End Date" required="">
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
                                    <label for="total_usage" class="form-label">Total Usage Limit<span class="text-danger">*</span></label>
                                    <input name="total_usage" id="total_usage" type="text" class="form-control" value="" placeholder="e.g., first 100 users only" required="">
                                </div>
                                <div class="mb-3">
                                    <label for="per_customer_usage" class="form-label">Usage Limit Per Customer<span class="text-danger">*</span></label>
                                    <input name="per_customer_usage" id="per_customer_usage" type="text" class="form-control" value="" placeholder="e.g., 1 time per customer" required="">
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
                                    <label for="stock_status" class="form-label">Stock Status<span class="text-danger">*</span></label>
                                    <select required="" name="stock_status" id="stock_status" class="form-select w-100">
                                        <option selected disabled value="">-- Select --</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
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