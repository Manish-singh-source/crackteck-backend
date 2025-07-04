<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Transaction log List</h4>
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
                                    <span class="d-none d-sm-block">User Transactions</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Seller Transactions</span>
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
                                                            <th>Date</th>
                                                            <th>Customer</th>
                                                            <th>Transaction ID</th>
                                                            <th>Amount</th>
                                                            <th>Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    2 weeks ago
                                                                </div>
                                                                <div>
                                                                    2025-04-04 06:09 PM
                                                                </div>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>CGSYOUGOG4XHTM</td>
                                                            <td>
                                                                <div class="text-success">
                                                                    +2890 INR
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-success">
                                                                    +2890 INR
                                                                </div>
                                                                Order balance added for order number cartuser7658831
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    1 week ago
                                                                </div>
                                                                <div>
                                                                    2025-04-14 06:09 PM
                                                                </div>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>CGSYOUGOG4XHTM</td>
                                                            <td>
                                                                <div class="text-danger">
                                                                    -2890 INR
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-danger">
                                                                    -2890 INR
                                                                </div>
                                                                Order balance added for order number cartuser7658831
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