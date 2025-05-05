<?php
$contain = "Add Inventory";
include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Inventory</li>
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
                                            Product Identification:
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <div>
                                            <label class="form-label" for="name">
                                                Product Name <span class="text-danger">*</span>
                                            </label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="price">
                                                SKU Code<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="sku" name="sku" required="" value="" placeholder="Product SKU code">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div class="">
                                            <label for="brand" class="form-label">Brand Name<span class="text-danger">*</span></label>
                                            <select class="form-select" id="brand" name="brand" required="">
                                                <option value="">TP-Link</option>
                                                <option value="">Cisco</option>
                                                <option value=""> D-Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="model">
                                                Model No <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="model" name="model" required="" value="" placeholder="Product Model no">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="serial-no">
                                                Serial Number <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="serial-no" name="serial-no" required="" value="" placeholder="Product Serial Number">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="batch-no">
                                                Batch Number <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="batch-no" name="batch-no" required="" value="" placeholder="Product Batch Number">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div class="">
                                            <label for="status" class="form-label">Category <span class="text-danger">*</span></label>
                                            <select class="form-select" id="category" name="category" required="">
                                                <option value="">Router</option>
                                                <option value="">Switch</option>
                                                <option value="">Cable</option>
                                                <option value="">Tool</option>
                                                <option value="">Accessories</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label for="mail-composer" class="form-label"> Subcategory
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Purchase Information:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="name">
                                                Supplier/Vendor Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="name" name="name" required="" value="" placeholder="Product Supplier/Vendor Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="phone">
                                                Supplier Contact Info <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="phone" name="phone" required="" value="" placeholder="Product Supplier Contact Info">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="date">
                                                Purchase Date <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="date" name="date" required="" value="" placeholder="Product Purchase Date">
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
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="category_id" class="form-label">Stock Status<span class="text-danger">*</span></label>
                                        <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                            <option value="" data-select2-id="select2-data-7-j3bj">In Stock</option>
                                            <option value="2" data-subcategory="[]">Reserved</option>
                                            <option value="2" data-subcategory="[]">Out of Stock</option>
                                            <option value="2" data-subcategory="[]">Damaged</option>
                                            <option value="2" data-subcategory="[]">Returned</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Storage Location
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="category_id" class="form-label">Warehouse Location<span class="text-danger">*</span></label>
                                        <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                            <option value="" data-select2-id="select2-data-7-j3bj">Main Warehouse</option>
                                            <option value="2" data-subcategory="[]">
                                                Branch A</option>
                                            <option value="4" data-subcategory="[]">
                                                Branch B</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="featured_image" class="form-label">Shelf/Section/Rack Number<span class="text-danger">*</span></label>
                                        <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter Shelf/Section/Rack Number" required="">
                                    </div>
                                </div>
                            </div>

                        </div>



                        <!-- <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    SEO
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Meta Title <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Meta Description <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Meta Keywords<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Product URL Slug <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> -->

                        <!-- <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    SEO Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category Meta Title<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category Meta Description<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category Meta Keywords<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category URL Slug<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> -->

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
                                    Inventory/Stock Details:
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">Quantity Available<span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter Quantity Available" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="featured_image" class="form-label">Minimum Stock Level<span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter Minimum Stock Level" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="featured_image" class="form-label">Reorder Quantity<span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter Reorder Quantity" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="featured_image" class="form-label">Unit of Measurement<span class="text-danger">*</span></label>
                                    <select class="form-select" id="warranty" name="warranty" required="">
                                        <option value="">Piece</option>
                                        <option value="">Box</option>
                                        <option value="">Meter</option>
                                        <option value="">Set</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Additional Details
                                </h5>
                            </div>

                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="status" class="form-label">Upload Product Image<span class="text-danger">*</span></label>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control" required="">
                                </div>

                                <div class="mt-3 mb-3">
                                    <label for="featured_image" class="form-label">Description/Remarks<span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter Description/Remarks" required="">
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Warranty and Service:
                                </h5>
                            </div>

                            <div class="card-body">

                                <div>
                                    <label for="category_id" class="form-label">Warranty Period <span class="text-danger">*</span></label>
                                    <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                        <option value="" data-select2-id="select2-data-7-j3bj">1 year</option>
                                        <option value="2" data-subcategory="[]">
                                            2 years</option>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="category_id" class="form-label">Warranty Expiry Date<span class="text-danger">*</span></label>
                                    <input type="date" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Warranty Expiry Date">
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div> <!-- content -->

    <?php include('layouts/footer.php') ?>