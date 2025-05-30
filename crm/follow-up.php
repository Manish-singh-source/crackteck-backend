<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Follow-Up List</h4>
            </div>
            <div>
                <a href="follow-up-form.php" class="btn btn-primary">Follow-Up Form</a>
                <!-- <button class="btn btn-primary">Add New Customer</button> -->
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pt-0">
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_customer_tab" data-bs-toggle="tab"
                                    href="#all_customer" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Follow-Up</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Active Customer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Banned Customer</span>
                                </a>
                            </li> -->
                        </ul>

                        <div class="tab-content text-muted">

                            <div class="tab-pane active show pt-4" id="all_customer" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Lead Id</th>
                                                            <th>Client Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Email</th>
                                                            <th>Follow-Up Date</th>
                                                            <th>Follow-Up Time</th>
                                                            <th>Status</th>
                                                            <th>Remarks</th>
                                                            <th>Created By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-001
                                                                </a>
                                                            </td>
                                                            <td>Amit Sharma</td>
                                                            <td>9876543210</td>
                                                            <td>amit@example.com</td>
                                                            <td>2025-05-28</td>
                                                            <td>11:00 AM</td>
                                                            <td><span class="badge bg-danger-subtle text-danger fw-semibold">Pending</span></td>
                                                            <td>Interested in Mac support service</td>
                                                            <td>Admin</td>
                                                            <td>
                                                                <a href="view-followup.php" class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-warning-subtle me-1" href="follow-up-form.php"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-002
                                                                </a>
                                                            </td>
                                                            <td>Amit Sharma</td>
                                                            <td>9876543210</td>
                                                            <td>amit@example.com</td>
                                                            <td>2025-05-28</td>
                                                            <td>11:00 AM</td>
                                                            <td><span class="badge bg-danger-subtle text-danger fw-semibold">Pending</span></td>
                                                            <td>Interested in Mac support service</td>
                                                            <td>Admin</td>
                                                            <td>
                                                                <a href="view-followup.php" class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-warning-subtle me-1" href="follow-up-form.php"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-003
                                                                </a>
                                                            </td>
                                                            <td>Amit Sharma</td>
                                                            <td>9876543210</td>
                                                            <td>amit@example.com</td>
                                                            <td>2025-05-28</td>
                                                            <td>11:00 AM</td>
                                                            <td><span class="badge bg-danger-subtle text-danger fw-semibold">Pending</span></td>
                                                            <td>Interested in Mac support service</td>
                                                            <td>Admin</td>
                                                            <td>
                                                                <a href="view-followup.php" class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-warning-subtle me-1" href="follow-up-form.php"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-004
                                                                </a>
                                                            </td>
                                                            <td>Amit Sharma</td>
                                                            <td>9876543210</td>
                                                            <td>amit@example.com</td>
                                                            <td>2025-05-28</td>
                                                            <td>11:00 AM</td>
                                                            <td><span class="badge bg-danger-subtle text-danger fw-semibold">Pending</span></td>
                                                            <td>Interested in Mac support service</td>
                                                            <td>Admin</td>
                                                            <td>
                                                                <a href="view-followup.php" class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-warning-subtle me-1" href="follow-up-form.php"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-danger-subtle delete-row"
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

                            </div><!-- end Experience -->

                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>