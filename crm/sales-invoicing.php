<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Sales Invoicing</h4>
            </div>
            <div>
                <a href="create-invoice.php" class="btn btn-primary">Add Invoice</a>
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
                                    <span class="d-none d-sm-block">All Invoices</span>
                                </a>
                            </li>
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
                                                            <th>Invoice No</th>
                                                            <th>Client Name</th>
                                                            <th>Date</th>
                                                            <th>Item details</th>
                                                            <th>Total Amount</th>
                                                            <th>Payment Status</th>
                                                            <th>Notes/Remarks</th>
                                                            <th>Attachment</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="align-middle">
                                                            <td>INV-001</td>
                                                            <td>John Enterprises</td>
                                                            <td>2025-06-01</td>
                                                            <td>5x Landing Pages Design</td>
                                                            <td>1,250₹</td>
                                                            <td>Paid</td>
                                                            <td>Delivered on time</td>
                                                            <td>invoice\_INV001.pdf</td>
                                                            <td>
                                                                <a aria-label="anchor" href="delivery-order-detail.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td>INV-002</td>
                                                            <td>GreenTech Ltd.</td>
                                                            <td>2025-06-03</td>
                                                            <td>Website Maintenance Plan</td>
                                                            <td>600₹</td>
                                                            <td>Unpaid</td>
                                                            <td>Payment due in 7 days</td>
                                                            <td>invoice\_INV002.pdf</td>
                                                            <td>
                                                                <a aria-label="anchor" href="delivery-order-detail.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td>INV-003</td>
                                                            <td>Nova Media</td>
                                                            <td>2025-06-05</td>
                                                            <td>SEO & Blog Services</td>
                                                            <td>950₹</td>
                                                            <td>Partially Paid</td>
                                                            <td>Balance: 250₹</td>
                                                            <td>invoice\_INV003.pdf</td>
                                                            <td>
                                                                <a aria-label="anchor" href="delivery-order-detail.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td>INV-004</td>
                                                            <td>Alpha Foods</td>
                                                            <td>2025-06-06</td>
                                                            <td>Social Media Campaign</td>
                                                            <td>1,800₹</td>
                                                            <td>Paid</td>
                                                            <td>Excellent client</td>
                                                            <td>invoice\_INV004.pdf</td>
                                                            <td>
                                                                <a aria-label="anchor" href="delivery-order-detail.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
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

                            </div><!-- end Experience -->

                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>