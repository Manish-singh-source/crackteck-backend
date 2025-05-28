<?php
$contain = "Add Customer";
include('layouts/header.php') ?>

<div class="content">


    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quotation</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Quotation</li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Personal Information
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-6">
                                        <label for="clientName" class="form-label">Client Name</label>
                                        <select class="form-control" name="clientName" id="clientName">
                                            <option selected disabled>-- Select Client --</option>
                                            <option value="">Saurabh</option>
                                            <option value="">Manish</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="quoteId" class="form-label">Quotation ID <span class="text-danger">*</span></label>
                                        <input type="text" name="quoteId" id="quoteId" class="form-control" value="QTN-1001" required="" placeholder="Enter Quotation ID">
                                    </div>

                                    <div class="col-6">
                                        <label for="quoteDate" class="form-label">Quotation Date <span class="text-danger">*</span></label>
                                        <input type="date" name="quoteDate" id="quoteDate" class="form-control" value="" required="" placeholder="">
                                    </div>

                                    <div class="col-6">
                                        <label for="expiryDate" class="form-label">Expiration Date <span class="text-danger">*</span></label>
                                        <input type="date" required="" name="expiryDate" id="expiryDate" class="form-control" value="" placeholder="">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Itemized Products/Services
                                </h5>
                            </div>

                            <div class="card-body">
                                <form method="post" id="branch-form">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label for="item_desc" class="form-label">Item Description<span class="text-danger">*</span></label>
                                            <input type="text" name="item_desc" id="item_desc" class="form-control" value="" required="" placeholder="Item Description">
                                        </div>
                                        <div class="col-6">
                                            <label for="hsn_code" class="form-label">HSN Code <span class="text-danger">*</span></label>
                                            <input type="text" name="hsn_code" id="hsn_code" class="form-control" value="" required="" placeholder="HSN Code Auto Filled">
                                        </div>

                                        <div class="col-6">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control" value="" placeholder="Enter Quantity">
                                        </div>

                                        <div class="col-6">
                                            <label for="unit_price" class="form-label">Unit Price<span class="text-danger">*</span></label>
                                            <input type="text" required="" name="unit_price" id="unit_price" class="form-control" value="" placeholder="Enter Unit Price">
                                        </div>

                                        <div class="col-6">
                                            <label for="tax" class="form-label">Tax <span class="text-danger">*</span></label>
                                            <input type="text" name="tax" id="tax" class="form-control" value="" placeholder="Enter Tax" required="">
                                        </div>

                                        <div class="col-6">
                                            <label for="total_value" class="form-label">Total Value <span class="text-danger">*</span></label>
                                            <input type="text" name="total_value" id="total_value" class="form-control" value="" required="" placeholder="Total Value(Auto Calculated)">
                                        </div>

                                        <div class="col-12">
                                            <div class="text-end">
                                                <input type="submit" value="Add" class="btn btn-success">
                                                <!-- <button type="submit" class="btn btn-success">
                                                    Add
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card branch-section">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Products/Services Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-borderless dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            
                                            <th>Item Description</th>
                                            <th>HSN Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Tax (%) </th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td>Laptop</td>
                                            <td>
                                                8471
                                            </td>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                50,000
                                            </td>
                                            <td>
                                                18
                                            </td>
                                            <td>1,18,000</td>
                                            <td>
                                                <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        
                                        <tr class="align-middle">
                                            <td>Software Support</td>
                                            <td>
                                                9983
                                            </td>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                10,000
                                            </td>
                                            <td>
                                                18
                                            </td>
                                            <td>
                                                11,800
                                            </td>
                                            <td>
                                                <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button> -->
                            <a href="quotation-pdf.php" class="btn btn-success w-sm waves ripple-light">Submit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>