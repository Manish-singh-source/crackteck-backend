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
                                            Date
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
                                <div class="col-12">
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>