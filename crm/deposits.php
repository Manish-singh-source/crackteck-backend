<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Deposit log list</h4>
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
                                    <span class="d-none d-sm-block">All Deposits</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Pending Deposits</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Approved Deposits</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Rejected Deposits</span>
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
                                                            <td>Deposit ID</td>
                                                            <td>Date</td>
                                                            <td>User Type</td>
                                                            <td>Depositor Name</td>
                                                            <td>Amount</td>
                                                            <td>Method</td>
                                                            <td>Status</td>
                                                            <td>Reference Note</td>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                        <tr>

                                                            <td>DEP001</td>
                                                            <td>2025-05-26</td>
                                                            <td>Customer</td>
                                                            <td>Ravi Kumar</td>
                                                            <td>\$500</td>
                                                            <td>Wallet Top-Up</td>
                                                            <td>
                                                                <span class="badge bg-success-subtle text-success fw-semibold">Completed</span>
                                                            </td>
                                                            <td>Monthly advance</td>

                                                        </tr>
                                                        <tr>

                                                            <td>DEP002</td>
                                                            <td>2025-05-26</td>
                                                            <td>Staff</td>
                                                            <td>Admin User</td>
                                                            <td>\$1,200</td>
                                                            <td>Bank Transfer</td>
                                                            <td>
                                                                <span class="badge bg-danger-subtle text-danger fw-semibold">Pending</span>
                                                            </td>
                                                            <td>Inventory fund</td>
                                                        </tr>
                                                        <tr>
                                                            <td>DEP003</td>
                                                            <td>2025-05-25</td>
                                                            <td>Customer</td>
                                                            <td>Sarah Khan</td>
                                                            <td>\$300</td>
                                                            <td>UPI</td>
                                                            <td>
                                                                <span class="badge bg-success-subtle text-success fw-semibold">Completed</span>
                                                            </td>
                                                            <td>AMC deposit</td>
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