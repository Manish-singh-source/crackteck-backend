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
                        <li class="breadcrumb-item active" aria-current="page">Client</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Client Receipts</li>
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
                                        <label for="clientName" class="form-label">Client Name <span class="text-danger">*</span></label>
                                        <input type="text" name="clientName" id="clientName" class="form-control" placeholder="Enter Client Name" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="amountReceived" class="form-label">Amount Received <span class="text-danger">*</span></label>
                                        <input type="number" name="amountReceived" id="amountReceived" class="form-control" placeholder="Enter Amount Received" required min="0" step="0.01">
                                    </div>

                                    <div class="col-6">
                                        <label for="paymentDate" class="form-label">Date <span class="text-danger">*</span></label>
                                        <input type="date" name="paymentDate" id="paymentDate" class="form-control" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="paymentMode" class="form-label">Payment Mode <span class="text-danger">*</span></label>
                                        <select name="paymentMode" id="paymentMode" class="form-control" required>
                                            <option value="" disabled selected>-- Select Payment Mode --</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank">Bank</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="UPI">UPI</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="linkedInvoice" class="form-label">Linked Invoice</label>
                                        <input type="text" name="linkedInvoice" id="linkedInvoice" class="form-control" placeholder="Enter Linked Invoice">
                                    </div>

                                    <div class="col-6">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <textarea name="remarks" id="remarks" class="form-control" placeholder="Enter Remarks" rows="2"></textarea>
                                    </div>

                                    <div class="col-6">
                                        <label for="uploadProof" class="form-label">Upload Proof</label>
                                        <input type="file" name="uploadProof" id="uploadProof" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>


                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="customers.php" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </a>
                            <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // $(".branch-section").hide();

        $("#branch-form").on("submit", function(e) {
            e.preventdefault();
            let formData = e.serialize();
            console.log(formData);
        });
    });
</script>
<?php include('layouts/footer.php') ?>