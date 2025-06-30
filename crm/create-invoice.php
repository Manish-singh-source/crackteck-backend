<?php include('layouts/header.php') ?>

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create Sales Invoice</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Invoice Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="invoiceNo" class="form-label">
                                            Quotation ID <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="invoiceNo" value="" class="form-control" placeholder="Enter Quotation ID   " id="invoiceNo">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="invoiceNo" class="form-label">
                                            Invoice No. <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="invoiceNo" value="" class="form-control" placeholder="Enter Invoice No" id="invoiceNo">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
                                    <select required="" name="clientName" id="clientName" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="saurabh">Saurabh</option>
                                        <option value="manish">Manish</option>
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="date" class="form-label">
                                            Bill Date
                                        </label>
                                        <input type="date" name="date" value="" class="form-control" placeholder="" id="date">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="date" class="form-label">
                                            Bill Due Date
                                        </label>
                                        <input type="date" name="date" value="" class="form-control" placeholder="" id="date">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="amount" class="form-label">
                                            Total Amount
                                        </label>
                                        <input type="text" name="amount" value="" class="form-control" placeholder="Enter Total Paid Amount" id="amount">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="amount" class="form-label">
                                            Paid Amount
                                        </label>
                                        <input type="text" name="amount" value="" class="form-control" placeholder="Enter Total Paid Amount" id="amount">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <label for="payStatus" class="form-label">Payment Status <span class="text-danger">*</span></label>
                                    <select required="" name="payStatus" id="payStatus" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Unpaid</option>
                                        <option value="Partially Paid">Partially Paid</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="remarks" class="form-label">
                                            Notes/Remarks
                                        </label>
                                        <input type="text" name="remarks" value="" class="form-control" placeholder="Enter Notes/Remarks" id="remarks">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="attachment" class="form-label">
                                            Attachment
                                        </label>
                                        <input data-size="150x150" type="file" class="preview form-control w-100" name="attachment" id="attachment">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="product_name" class="form-label">
                                            Product Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="product_name" value="" class="form-control" placeholder="Dell Inspiron 15 Laptop Windows 11" id="product_name">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="product_type" class="form-label">Product Type <span class="text-danger">*</span></label>
                                    <select required="" name="product_type" id="product_type" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Accessories">Accessories</option>
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="brand" class="form-label">
                                            Product Brand <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="brand" value="" class="form-control" placeholder="Dell, HP, Asus" id="brand">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="model_no" class="form-label">
                                            Model Number
                                        </label>
                                        <input type="text" name="model_no" value="" class="form-control" placeholder="Inspiron 3511" id="model_no">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="serial_no" class="form-label">
                                            Serial Number
                                        </label>
                                        <input type="text" name="serial_no" value="" class="form-control" placeholder="B0BB7FQBBS" id="serial_no">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="purchase_date" class="form-label">
                                            Purchase Date
                                        </label>
                                        <input type="date" name="purchase_date" value="" class="form-control" placeholder="Enter Purchase Date" id="purchase_date">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="image" class="form-label">
                                            Image
                                        </label>
                                        <input data-size="150x150" type="file" class="preview form-control w-100" name="image" id="image">
                                    </div>
                                    <div id="image-preview-section">

                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="serial_no" class="form-label">
                                            Issue type
                                        </label>
                                        <input type="text" name="serial_no" value="" class="form-control" id="serial_no">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="serial_no" class="form-label">
                                            Issue Description
                                        </label>
                                        <textarea name="" class="form-control" id=""></textarea>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <table
                            class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Modal Number</th>
                                    <th>Serial Number</th>
                                    <th>Purchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/100x100" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Headphone
                                        </div>
                                    </td>
                                    <td>
                                        Computer
                                    </td>
                                    <td>
                                        Sony
                                    </td>
                                    <td>
                                        Inspiron 3511
                                    </td>
                                    <td>
                                        B0BB7FQBBS
                                    </td>
                                    <td>2025-04-04 06:09 PM</td>
                                    <td>
                                        <a aria-label="anchor"
                                            class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                            data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="text-end ">
                    <a href="./quotation-pdf.php" type="submit" class="btn btn-primary">
                        Submit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>