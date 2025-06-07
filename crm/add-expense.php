<?php include('layouts/header.php') ?>

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create Vendor Payment</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Payment Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                
                                <div class="col-xl-4 col-lg-6">
                                    <label for="vendorName" class="form-label">Expense Type<span class="text-danger">*</span></label>
                                    <select required="" name="vendorName" id="vendorName" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="Fuel">Fuel</option>
                                        <option value="Travel">Travel</option>
                                        <option value="Rent">Rent</option>
                                        <option value="Salary">Salary</option>
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
                                            Amount
                                        </label>
                                        <input type="text" name="amount" value="" class="form-control" placeholder="Enter Total Paid Amount" id="amount">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="linkedBill" class="form-label">
                                            Paid To
                                        </label>
                                        <select required="" name="linkedBill" id="linkedBill" class="form-select w-100">
                                            <option selected disabled>-- Select --</option>
                                            <option value="Saurabh">Saurabh</option>
                                            <option value="Manish">Manish</option>
                                        </select>
                                        <!-- <input type="text" name="linkedBill" value="" class="form-control" placeholder="Enter Total Paid linkedBill" id="linkedBill"> -->
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <label for="payStatus" class="form-label">Payment Mode <span class="text-danger">*</span></label>
                                    <select required="" name="payStatus" id="payStatus" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Cheque">Cheque</option>
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
                                            Upload Bill Copy
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