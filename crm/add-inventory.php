<?php
$contain = "Add Inventory";
include('layouts/header.php') ?>

<div class="content">


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
                                            <label class="form-label" for="product_name">
                                                Product Name <span class="text-danger">*</span>
                                            </label>
                                            <input name="product_name" id="product_name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="sku">
                                                SKU Code<span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="sku" name="sku" required="" value="" placeholder="Product SKU code">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div class="">
                                            <label for="brand" class="form-label">Brand Name<span class="text-danger">*</span></label>
                                            <select class="form-select" id="brand" name="brand" required="">
                                                <option selected disabled>-- Select --</option>
                                                <option value="">TP-Link</option>
                                                <option value="">Cisco</option>
                                                <option value=""> D-Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="model_no">
                                                Model No <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="model_no" name="model_no" required="" value="" placeholder="Product Model no">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="serial_no">
                                                Serial Number <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="serial_no" name="serial_no" required="" value="" placeholder="Product Serial Number">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="batch_no">
                                                Batch Number <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="batch_no" name="batch_no" required="" value="" placeholder="Product Batch Number">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div class="">
                                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                            <select class="form-select" id="category" name="category" required="">
                                                <option selected disabled>-- Select --</option>
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
                                            <label for="subcategory" class="form-label"> Subcategory
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="subcategory" class="form-control text-editor" name="subcategory" placeholder="Enter Description"></textarea>
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
                                            <label class="form-label" for="vendor_name">
                                                Supplier/Vendor Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="vendor_name" name="vendor_name" required="" value="" placeholder="Product Supplier/Vendor Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="vendor_phone">
                                                Supplier Contact Info <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="vendor_phone" name="vendor_phone" required="" value="" placeholder="Product Supplier Contact Info">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="vendor_date">
                                                Purchase Date <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="vendor_date" name="vendor_date" required="" value="" placeholder="Product Purchase Date">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label class="form-label" for="purchase_price">
                                                Purchase Price (Cost Price) <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="purchase_price" name="purchase_price" required="" value="" placeholder="Product Purchase Price (Cost Price)">
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
                                        <label for="stock_status" class="form-label">Stock Status<span class="text-danger">*</span></label>
                                        <select required="" name="stock_status" id="stock_status" class="form-select w-100" ->
                                            <option selected disabled>-- Select --</option>
                                            <option value="2">In Stock</option>
                                            <option value="2">Reserved</option>
                                            <option value="2">Out of Stock</option>
                                            <option value="2">Damaged</option>
                                            <option value="2">Returned</option>
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
                                        <label for="warehouse_location" class="form-label">Warehouse Location<span class="text-danger">*</span></label>
                                        <select required="" name="warehouse_location" id="warehouse_location" class="form-select w-100" >
                                            <option selected disabled>-- Select --</option>
                                            <option value="1">Main Warehouse</option>
                                            <option value="2">Branch A</option>
                                            <option value="3">Branch B</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="rack_number" class="form-label">Shelf/Section/Rack Number<span class="text-danger">*</span></label>
                                        <input name="rack_number" id="rack_number" type="text" class="form-control" value="" placeholder="Enter Shelf/Section/Rack Number" required="">
                                    </div>
                                </div>
                            </div>
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
                                    <label for="quantity" class="form-label">Quantity Available<span class="text-danger">*</span></label>
                                    <input name="quantity" id="quantity" type="text" class="form-control" value="" placeholder="Enter Quantity Available" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="min_stock" class="form-label">Minimum Stock Level<span class="text-danger">*</span></label>
                                    <input name="min_stock" id="min_stock" type="text" class="form-control" value="" placeholder="Enter Minimum Stock Level" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="units" class="form-label">Unit of Measurement<span class="text-danger">*</span></label>
                                    <select class="form-select" id="units" name="units" required="">
                                        <option selected disabled>-- Select --</option>
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
                                    <label for="product_image" class="form-label">Upload Product Image<span class="text-danger">*</span></label>
                                    <input type="file" name="product_image" id="product_image" class="form-control" required="">
                                </div>

                                <div class="mt-3 mb-3">
                                    <label for="description" class="form-label">Description/Remarks<span class="text-danger">*</span></label>
                                    <input name="description" id="description" type="text" class="form-control" value="" placeholder="Enter Description/Remarks" required="">
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
                                    <label for="warranty_period" class="form-label">Warranty Period <span class="text-danger">*</span></label>
                                    <select required="" name="warranty_period" id="warranty_period" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="1">1 year</option>
                                        <option value="2">2 years</option>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="warranty_expiry_date" class="form-label">Warranty Expiry Date<span class="text-danger">*</span></label>
                                    <input type="date" name="warranty_expiry_date" id="warranty_expiry_date" class="form-control" value="" required="" placeholder="Enter Warranty Expiry Date">
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
    </div>

    <?php include('layouts/footer.php') ?>