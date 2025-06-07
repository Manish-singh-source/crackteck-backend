<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Expenses</h4>
            </div>
            <div>
                <a href="add-expense.php" class="btn btn-primary">Add Expense</a>
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
                                    <span class="d-none d-sm-block">All Expenses</span>
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
                                                            <td>Expense Type</td>
                                                            <td>Date</td>
                                                            <td>Amount</td>
                                                            <td>Paid To</td>
                                                            <td>Payment Mode</td>
                                                            <td>Remarks</td>
                                                            <td>Upload Bill Copy</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="align-middle">
                                                            <td>Fuel</td>
                                                            <td>2025-06-03</td>
                                                            <td>₹1,200</td>
                                                            <td>Shell Petrol Pump</td>
                                                            <td>Cash</td>
                                                            <td>Office van refueling</td>
                                                            <td>
                                                                <a href="#" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                                            </td>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td>Travel</td>
                                                            <td>2025-06-01</td>
                                                            <td>₹3,500</td>
                                                            <td>Rajesh Kumar</td>
                                                            <td> UPI</td>
                                                            <td> Client meeting in Pune</td>
                                                            <td>
                                                                <a href="#" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td> Rent</td>
                                                            <td> 2025-06-01</td>
                                                            <td> ₹25,000</td>
                                                            <td> Building Owner</td>
                                                            <td> Bank Transfer</td>
                                                            <td> Monthly office rent</td>
                                                            <td>
                                                                <a href="#" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td> Salary</td>
                                                            <td> 2025-06-05</td>
                                                            <td> ₹40,000</td>
                                                            <td> Priya Mehta</td>
                                                            <td> Bank Transfer</td>
                                                            <td> June salary</td>
                                                            <td>
                                                                <a href="#" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
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