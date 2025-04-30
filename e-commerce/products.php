<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Products List</h4>
            </div>
            <div>
                <a href="add-product.php" class="btn btn-primary">Add New Product</a>
                <!-- <button class="btn btn-primary">Add New Product</button> -->
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
                                    <span class="d-none d-sm-block">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Trashed Products</span>
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
                                                            <th>Product</th>
                                                            <th>Categories - Sold Item</th>
                                                            <th>Info</th>
                                                            <th>Top Item - Todays Deal</th>
                                                            <th>Time - Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr class="align-middle">
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <img src="./assets/images/products/headphone.png" alt="Headphone" width="100px" class="img-fluid d-block">
                                                                    </div>
                                                                    <div>
                                                                        <div>
                                                                            Headphone
                                                                        </div>
                                                                        <div>
                                                                            Brand: Sony
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-primary-subtle text-primary fw-semibold">Electronics</span>
                                                                <div>
                                                                    Total Sold: 2
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    Regular price : ₹100.0
                                                                </div>
                                                                <div>
                                                                    Discount Price : ₹97.0
                                                                </div>
                                                                <div>
                                                                    <a href="#" class="text-primary">
                                                                        Best Selling Item - Yes
                                                                    </a>
                                                                </div>
                                                                <div>
                                                                    <a href="#" class="text-danger">
                                                                        Suggested Item - No
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="text-success">
                                                                    Yes
                                                                </a>
                                                                <span>|</span>
                                                                <a href="#" class="text-danger">
                                                                    No
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    17 Apr 2025
                                                                </div>
                                                                <span
                                                                    class="badge bg-success-subtle text-success fw-semibold">Published</span>
                                                            </td>
                                                            <td>
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
                                                                    class="btn btn-icon btn-sm bg-danger-subtle"
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