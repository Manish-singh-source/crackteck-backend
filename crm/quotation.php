<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quotation</h4>
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
                                        <input type="text" name="search" value="" class="form-control search" placeholder="Search by client, quote Id, product">
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
                                        <span class="d-none d-sm-block">Quotation List</span>
                                    </a>
                                </li>
                            </ul>
                            <div>
                                <a href="create-quotation.php" id="mySection" class="btn btn-primary">Create Quotation</a>
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
                                                            <th>Lead ID</th>
                                                            <th>Quotation ID</th>
                                                            <th>Client Name</th>
                                                            <th>Status</th>
                                                            <th>Created Date</th>
                                                            <th>Updated Date</th>
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
                                                            <td>QTN-1001</td>
                                                            <td>John Doe Ltd.</td>
                                                            <td>Draft</td>
                                                            <td>2025-05-20</td>
                                                            <td>2025-05-20</td>
                                                            <td>
                                                                <!-- <a aria-label="anchor" href="view-detail.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a> -->
                                                                <a aria-label="anchor" href="create-quotation.php"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-002
                                                                </a>
                                                            </td>
                                                            <td>QTN-1002</td>
                                                            <td>Acme Corp.</td>
                                                            <td>Sent</td>
                                                            <td>2025-05-18</td>
                                                            <td>2025-05-19</td>

                                                            <td>
                                                                <a aria-label="anchor" href="create-quotation.php"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-003
                                                                </a>
                                                            </td>
                                                            <td>QTN-1003</td>
                                                            <td>XYZ Enterprises</td>
                                                            <td>Accepted</td>
                                                            <td>2025-05-15</td>
                                                            <td>2025-05-16</td>
                                                            <td>
                                                                <a aria-label="anchor" href="quotation-pdf.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-004
                                                                </a>
                                                            </td>
                                                            <td>QTN-1004</td>
                                                            <td>Tech Solutions</td>
                                                            <td>Viewed</td>
                                                            <td>2025-05-14</td>
                                                            <td>2025-05-14</td>
                                                            <td>
                                                                <a aria-label="anchor" href="create-quotation.php"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="view-leads.php">
                                                                    L-005
                                                                </a>
                                                            </td>
                                                            <td>QTN-1005</td>
                                                            <td>Global Ventures</td>
                                                            <td>Rejected</td>
                                                            <td>2025-05-12</td>
                                                            <td>2025-05-13</td>
                                                            <td>
                                                                <a aria-label="anchor" href="quotation-pdf.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
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
                            <div class="tab-pane show pt-4" id="pending_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Service Id</th>
                                                            <th>User</th>
                                                            <th>AMC Plan</th>
                                                            <th>Duration (Months)</th>
                                                            <th>Start Date</th>
                                                            <!-- <th>Product Info</th> -->
                                                            <th>Created By</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div>2 weeks ago</div>
                                                                <div>2025-04-04 06:09 PM</div>
                                                            </td>
                                                            <td>
                                                                <a href="view-detail.php">
                                                                    #1001
                                                                </a>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>Standard</td>
                                                            <td>6</td>
                                                            <td>2025-04-04 06:09 PM</td>

                                                            <td>Operation Manager - username</td>
                                                            <td>
                                                                <span class="badge bg-success-subtle text-success fw-semibold">Approved</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-detail.php"
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
                                                                <div>1 weeks ago</div>
                                                                <div>2025-04-04 06:09 PM</div>
                                                            </td>
                                                            <td>
                                                                <a href="view-detail.php">
                                                                    #1002
                                                                </a>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>Standard</td>
                                                            <td>12</td>
                                                            <td>2025-04-04 06:09 PM</td>

                                                            <td>
                                                                Super Admin - username
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-danger-subtle text-danger fw-semibold">Pending</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-detail.php"
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
                                                                <div>3 days ago</div>
                                                                <div>2025-04-04 06:09 PM</div>
                                                            </td>
                                                            <td>
                                                                <a href="view-detail.php">
                                                                    #1003
                                                                </a>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>Standard</td>
                                                            <td>12</td>
                                                            <td>2025-04-04 06:09 PM</td>

                                                            <td>
                                                                Customer - John Doe
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-warning-subtle text-warning fw-semibold">Rejected</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-detail.php"
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
                            <div class="tab-pane show pt-4" id="approved_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Seller/Deliveryman/User</th>
                                                            <th>Method</th>
                                                            <th>Amount</th>
                                                            <th>Charge</th>
                                                            <th>Receivable</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        <tr>
                                                            <td class="border-bottom-0" colspan="100">
                                                                <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                                                    <div class="py-4 text-center">
                                                                        <lord-icon src="" trigger="loop" colors="primary:#405189,secondary:#0ab39c" class="loader-icon">
                                                                        </lord-icon>
                                                                        <h5 class="mt-4">
                                                                            Sorry! No Result Found
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show pt-4" id="rejected_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Seller/Deliveryman/User</th>
                                                            <th>Method</th>
                                                            <th>Amount</th>
                                                            <th>Charge</th>
                                                            <th>Receivable</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        <tr>
                                                            <td class="border-bottom-0" colspan="100">
                                                                <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                                                    <div class="py-4 text-center">
                                                                        <lord-icon src="" trigger="loop" colors="primary:#405189,secondary:#0ab39c" class="loader-icon">
                                                                        </lord-icon>
                                                                        <h5 class="mt-4">
                                                                            Sorry! No Result Found
                                                                        </h5>
                                                                    </div>
                                                                </div>
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