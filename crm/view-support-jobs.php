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
                        <li class="breadcrumb-item active" aria-current="page">Assigned Jobs</li>
                        <li class="breadcrumb-item active" aria-current="page">Start Job</li>
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
                                            Start Job
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="status" class="form-label">Client Connected Via</label>
                                        <select name="status" id="status" class="form-control">
                                            <option> -- Select Connection --</option>
                                            <option>Call</option>
                                            <option>E-mail</option>
                                            <option>WhatsApp</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="meetTitle" class="form-label">Client Confirmation<span class="text-danger">*</span></label>
                                        <input type="text" name="meetTitle" id="meetTitle" class="form-control" value="" required="" placeholder="Enter Confirmation Details">
                                    </div>
                                    <div class="col-6">
                                        <label for="meetType" class="form-label">Remote Tool Used</label>
                                        <select class="form-control" name="meetType" id="meetType">
                                            <option selected disabled>-- Select Remote Tool --</option>
                                            <option value="">Anydesk</option>
                                            <option value="">Team Viewer</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <!-- 
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                            -->
                            <a href="#" class="btn btn-success w-sm waves ripple-light">Submit</a>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Job Details
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush ">

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Connected Via :
                                                </span>
                                                <span>
                                                    Call
                                                </span>
                                            </li>

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Client Confirmation :
                                                </span>
                                                <span>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, ut?
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush ">
                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Remote Tool Used :
                                                </span>
                                                <span>
                                                    Anydesk
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light">Perform Diagnosis</a>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Diagnosis Details
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="category3">
                                            <label class="form-check-label" for="category3">
                                                Windows/macOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="category2">
                                            <label class="form-check-label" for="category2">
                                                Network
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="category1">
                                            <label class="form-check-label" for="category1">
                                                Printer/Software
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col-6">
                                        <label for="meetType" class="form-label">Remote Tool Used:</label>
                                        <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>