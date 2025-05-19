<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Warehouses List</h4>
            </div>
            <div>
                <a href="create-warehouse.php" class="btn btn-primary">Create Warehouse</a>
            </div>
        </div>

 
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pt-0">

                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_amc_tab" data-bs-toggle="tab"
                                    href="#all_amc" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Warehouses</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content text-muted">
                            <div class="tab-pane active show pt-4" id="all_amc" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Name</th>
                                                            <th>Type</th>
                                                            <th>Address</th>
                                                            <th>Contact Person</th>
                                                            <th>Contact Detail</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                ABC-1234
                                                            </td>
                                                            <td>Main Warehouse</td>
                                                            <td>Storage Hub</td>
                                                            <td>Office No. 501, 5th Floor, Ghanshyam Enclave, Next To Laljipada Police Station, <br />Laljipada, Link Road, Kandivali (West), Mumbai - 400067. Maharashtra - India</td>
                                                            <td>Aakash</td>
                                                            <td>9988778855</td>
                                                            <td>
                                                                <span class="badge bg-danger-subtle text-danger fw-semibold">Unverified</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-warehouse.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>
                                                                ABD-1235
                                                            </td>
                                                            <td>Delhi Hub</td>
                                                            <td>Return Center</td>
                                                            <td>Office No. 501, 5th Floor, Ghanshyam Enclave, Next To Laljipada Police Station, <br />Laljipada, Link Road, Kandivali (West), Mumbai - 400067. Maharashtra - India</td>
                                                            <td>Sneha</td>
                                                            <td>9988778855</td>
                                                            <td>
                                                                <span class="badge bg-success-subtle text-success fw-semibold">Verified</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-warehouse.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->

    <?php include('layouts/footer.php') ?>