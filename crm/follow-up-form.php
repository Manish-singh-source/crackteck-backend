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
                        <li class="breadcrumb-item active" aria-current="page">Follow-Up</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Follow-Up</li>
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
                                        <h5 class="card-title mb-0">Follow-Up Information</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="status" class="form-label">Lead Id</label>
                                        <select name="status" id="status" class="form-control">
                                            <option> -- Select Lead --</option>
                                            <option>L-001</option>
                                            <option>L-002</option>
                                            <option>L-003</option>
                                            <option>L-004</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="client_name" class="form-label">Client Name <span class="text-danger">*</span></label>
                                        <input type="text" name="client_name" id="client_name" class="form-control" placeholder="Enter Client Name" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="contact" class="form-label">Contact Number <span class="text-danger">*</span></label>
                                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Contact Number" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                                    </div>

                                    <div class="col-6">
                                        <label for="followup_date" class="form-label">Follow-Up Date <span class="text-danger">*</span></label>
                                        <input type="date" name="followup_date" id="followup_date" class="form-control" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="followup_time" class="form-label">Follow-Up Time <span class="text-danger">*</span></label>
                                        <input type="time" name="followup_time" id="followup_time" class="form-control" required>
                                    </div>

                                    <div class="col-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option>Pending</option>
                                            <option>Done</option>
                                            <option>Rescheduled</option>
                                            <option>Cancelled</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="remarks" class="form-label">Remarks</label>
                                        <textarea name="remarks" id="remarks" class="form-control" rows="3" placeholder="Enter any remarks"></textarea>
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


                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="follow-up.php" class="btn btn-success w-sm waves ripple-light">
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