<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Task, Meeting & Visit Scheduler</h4>
            </div>

        </div>

        <!-- End Main Widgets -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <form action="#" method="get">
                            <div class="row g-3">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="search-box">
                                        <input type="text" name="search" value="" class="form-control search" placeholder="Search by client, meeting Id">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-3 col-6">
                                    <div>
                                        <select class="form-select" name="type" id="">

                                            <option selected="" value="0">
                                                All
                                            </option>
                                            <option value="1">
                                                Laptops
                                            </option>
                                            <option value="2">
                                                Computers
                                            </option>
                                            <option value="3">
                                                Accessories
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-3 col-6">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-100 waves ripple-light"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-3 col-6">
                                    <div>
                                        <a href="#" class="btn btn-danger w-100 waves ripple-light"> <i class="ri-refresh-line me-1 align-bottom"></i>
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active p-2" onclick="showSection()" id="all_services_tab" data-bs-toggle="tab"
                                        href="#all_services" role="tab">
                                        <span class="d-block d-sm-none"><i
                                                class="mdi mdi-information"></i></span>
                                        <span class="d-none d-sm-block">Upcoming</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link p-2" onclick="showSection()" id="all_services_tab" data-bs-toggle="tab"
                                        href="#all_services" role="tab">
                                        <span class="d-block d-sm-none"><i
                                                class="mdi mdi-information"></i></span>
                                        <span class="d-none d-sm-block">Today</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link p-2" onclick="showSection()" id="all_services_tab" data-bs-toggle="tab"
                                        href="#all_services" role="tab">
                                        <span class="d-block d-sm-none"><i
                                                class="mdi mdi-information"></i></span>
                                        <span class="d-none d-sm-block">Completed</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link p-2" onclick="showSection()" id="all_services_tab" data-bs-toggle="tab"
                                        href="#all_services" role="tab">
                                        <span class="d-block d-sm-none"><i
                                                class="mdi mdi-information"></i></span>
                                        <span class="d-none d-sm-block">Missed</span>
                                    </a>
                                </li>
                            </ul>
                            <div>
                                <a href="create-meet.php" id="mySection" class="btn btn-primary">Create Meeting</a>
                            </div>
                        </div>

                        <div class="tab-content text-muted">
                            <div class="tab-pane active show pt-4" id="all_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Lead Id</th>
                                                            <th>Meeting ID</th>
                                                            <th>Title</th>
                                                            <th>Type</th>
                                                            <th>Date & Time</th>
                                                            <th>Location</th>
                                                            <th>Assigned Rep</th>
                                                            <th>Engineer (if any)</th>
                                                            <th>Status</th>
                                                            <th>Follow-up Task</th>
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
                                                            <td>M001</td>
                                                            <td>Product Demo</td>
                                                            <td>Onsite Demo</td>
                                                            <td>May 30, 2025 – 11:00 AM</td>
                                                            <td>ABC Corp HQ</td>
                                                            <td>Sarah Johnson</td>
                                                            <td>-</td>
                                                            <td>Scheduled</td>
                                                            <td>Send proposal after demo </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-meet.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="create-meet.php"
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
                                                            <td><a href="view-leads.php">
                                                                    L-002
                                                                </a></td>
                                                            <td>M002</td>
                                                            <td>Discovery Call</td>
                                                            <td>Virtual Meeting</td>
                                                            <td>May 31, 2025 – 2:00 PM</td>
                                                            <td>Zoom Link</td>
                                                            <td>Mike Green</td>
                                                            <td>-</td>
                                                            <td>Cancelled</td>
                                                            <td>Create solution brief </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-meet.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1 border-0 disabled"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="create-meet.php"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1 border-0 disabled"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row border-0 disabled"
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
                                                            <td>M003</td>
                                                            <td>POC Setup</td>
                                                            <td>Technical Visit</td>
                                                            <td>June 3, 2025 – 10:00 AM</td>
                                                            <td>ABC Corp Data Center</td>
                                                            <td>Ravi Sharma</td>
                                                            <td>-</td>
                                                            <td>Scheduled</td>
                                                            <td>Collect feedback from client </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-meet.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="create-meet.php"
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
                                                                <a href="view-leads.php">
                                                                    L-004
                                                                </a>
                                                            </td>
                                                            <td>M004</td>
                                                            <td>Quarterly Review</td>
                                                            <td>Business Meeting</td>
                                                            <td>June 5, 2025 – 1:00 PM</td>
                                                            <td>FastTech Office</td>
                                                            <td>Lisa Fernandez</td>
                                                            <td>-</td>
                                                            <td>Confirmed</td>
                                                            <td>Prepare Q2 report </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-meet.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="create-meet.php"
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
                                                                <a href="view-leads.php">
                                                                    L-005
                                                                </a>
                                                            </td>
                                                            <td>M005</td>
                                                            <td>Support Handover</td>
                                                            <td>Virtual Meeting</td>
                                                            <td>June 7, 2025 – 3:00 PM</td>
                                                            <td>Microsoft Teams</td>
                                                            <td>Peter Wang</td>
                                                            <td>Emily Rao</td>
                                                            <td>Pending</td>
                                                            <td>Finalize SLA document </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-meet.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a> 
                                                                <a aria-label="anchor" href="create-meet.php"
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