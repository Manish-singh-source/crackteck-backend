<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">AMC Plans List</h4>
            </div>
            <div>
                <a href="add-plan.php" class="btn btn-primary">Add Plan</a>
                <!-- <button class="btn btn-primary">Add New Staff</button> -->
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pt-0">
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_active_tab" data-bs-toggle="tab"
                                    href="#all_active" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Plans</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link p-2" id="trashed_tab" data-bs-toggle="tab" href="#trashed"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Trashed Plans</span>
                                </a>
                            </li> -->
                        </ul>

                        <div class="tab-content text-muted">

                            <div class="tab-pane active show pt-4" id="all_active" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Plan Name</th>
                                                            <th>Plan Services</th>
                                                            <th>Plan Price</th>
                                                            <th>Status</th>
                                                            <th>Created By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Basic</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Preventive Maintenance (Quarterly)</li>
                                                                    <li>Remote Support (Mon–Fri, 10am–6pm)</li>
                                                                    <li>Hardware Inspection</li>
                                                                    <li>Router/Switch Health Check</li>
                                                                </ul>
                                                            </td>
                                                            <td>₹4,999/year</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked" checked>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Standard</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Preventive Maintenance (Bi-monthly)</li>
                                                                    <li>On-Site Support (4 visits/year)</li>
                                                                    <li>Network Performance Monitoring</li>
                                                                    <li>Software & Driver Updates</li>
                                                                </ul>
                                                            </td>
                                                            <td>₹9,999/year</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Premium</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Preventive Maintenance (Monthly)</li>
                                                                    <li>Unlimited Remote Support</li>
                                                                    <li>8 On-Site Visits/year</li>
                                                                    <li>Priority Response Time</li>
                                                                    <li>Firewall/Network Security Check</li>
                                                                </ul>
                                                            </td>
                                                            <td>₹14,999/year</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Custom Plan</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Tailored solutions</li>
                                                                    <li>24/7 Support Options</li>
                                                                    <li>Inventory Management</li>
                                                                    <li>Dedicated Engineer</li>
                                                                </ul>
                                                            </td>
                                                            <td>Contact Us</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end Experience -->

                            <div class="tab-pane pt-4" id="trashed" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Plan Name</th>
                                                            <th>Plan Services</th>
                                                            <th>Plan Price</th>
                                                            <th>Status</th>
                                                            <th>Created By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Basic</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Preventive Maintenance (Quarterly)</li>
                                                                    <li>Remote Support (Mon–Fri, 10am–6pm)</li>
                                                                    <li>Hardware Inspection</li>
                                                                    <li>Router/Switch Health Check</li>
                                                                </ul>
                                                            </td>
                                                            <td>₹4,999/year</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked" checked>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Standard</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Preventive Maintenance (Bi-monthly)</li>
                                                                    <li>On-Site Support (4 visits/year)</li>
                                                                    <li>Network Performance Monitoring</li>
                                                                    <li>Software & Driver Updates</li>
                                                                </ul>
                                                            </td>
                                                            <td>₹9,999/year</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Premium</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Preventive Maintenance (Monthly)</li>
                                                                    <li>Unlimited Remote Support</li>
                                                                    <li>8 On-Site Visits/year</li>
                                                                    <li>Priority Response Time</li>
                                                                    <li>Firewall/Network Security Check</li>
                                                                </ul>
                                                            </td>
                                                            <td>₹14,999/year</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Custom Plan</td>
                                                            <td>
                                                                <ul>
                                                                    <li>Tailored solutions</li>
                                                                    <li>24/7 Support Options</li>
                                                                    <li>Inventory Management</li>
                                                                    <li>Dedicated Engineer</li>
                                                                </ul>
                                                            </td>
                                                            <td>Contact Us</td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <a aria-label="anchor"
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
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end Experience -->
                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>