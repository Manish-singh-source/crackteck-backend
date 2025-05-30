<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Product List</h4>
            </div>
            <div>
                <a href="add-deals.php" class="btn btn-primary">Add New Product</a>
                <!-- <button class="btn btn-primary">Add New Category</button> -->
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
                                                        <th>Sr. No.</th>
                                                        <th>Product Name</th>
                                                        <th>Deal Title</th>
                                                        <th>Offer Price</th>
                                                        <th>Discount</th>
                                                        <th>Offer Period</th>
                                                        <th>Time Left</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Laptop Pro 15</td>
                                                        <td>Diwali Mega Offer</td>
                                                        <td>₹45,000</td>
                                                        <td>25%</td>
                                                        <td>Oct 10 - Oct 20</td>
                                                        <td>
                                                            <span class="badge bg-info text-dark fw-semibold">03:12:45</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-success-subtle text-success fw-semibold">Active</span>
                                                        </td>
                                                        <td>
                                                            <a aria-label="Edit"
                                                                class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                            </a>
                                                            <a aria-label="Delete"
                                                                class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>2</td>
                                                        <td>Smartwatch X</td>
                                                        <td>Flash Deal</td>
                                                        <td>₹1,999</td>
                                                        <td>50%</td>
                                                        <td>Oct 15 - Oct 18</td>
                                                        <td>
                                                            <span class="badge bg-warning text-dark fw-semibold">01:05:09</span>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-danger-subtle text-danger fw-semibold">Inactive</span>
                                                        </td>
                                                        <td>
                                                            <a aria-label="Edit"
                                                                class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                            </a>
                                                            <a aria-label="Delete"
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