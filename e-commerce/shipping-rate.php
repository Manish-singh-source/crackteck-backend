<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Shipping List</h4>
            </div>
            <div>
                <a href="add-shipping.php" class="btn btn-primary">Add Shipping</a>
                <!-- <button class="btn btn-primary">Create Coupon</button> -->
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="tab-content text-muted">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <table id="responsive-datatable"
                                                class="table table-striped table-borderless dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Shipping Title</th>
                                                        <th>Shipping Amount (₹)</th>
                                                        <th>Minimum Order Value (₹)</th>
                                                        <th>Maximum Order Value (₹)</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Standard Shipping</td>
                                                        <td>99</td>
                                                        <td>0</td>
                                                        <td>9999</td>
                                                        <td>
                                                            <span class="badge bg-success-subtle text-success fw-semibold">Active</span>
                                                        </td>
                                                        <td>
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
                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>