<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Delivery Men List</h4>
            </div>
            <div>
                <a href="add-delivery-man.php" class="btn btn-primary">Add New Delivery Man</a>
                <!-- <button class="btn btn-primary">Add New Customer</button> -->
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <form action="#" method="get">
                            <div class="d-flex justify-content-between">
                                <div class="row">
                                    <div class="col-xl-10 col-md-10 col-sm-10">
                                        <div class="search-box">
                                            <input type="text" name="search" value="" class="form-control search" placeholder="Search Products">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary waves ripple-light">
                                                <!-- <span class="d-none d-md-inline-flex"> Search </span> -->
                                                <i class="fa-solid fa-magnifying-glass "></i>

                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- <span class="d-none d-md-inline-flex"> Sort </span> -->
                                            <i class="fa-solid fa-arrow-up-z-a "></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Sort By Name</a></li>
                                            <li><a class="dropdown-item" href="#">Sort By Ratings</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">
                                            <!-- <span class="d-none d-md-inline-flex"> Filters </span> -->
                                            <i class="fa-solid fa-filter "></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="standard-modalLabel">Filters</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body px-3 py-md-2">
                                                <h5>KYC Status</h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Verified
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Unveried
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="card-body pt-0">
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_customer_tab" data-bs-toggle="tab"
                                    href="#all_customer" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Delivery Men</span>
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
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Contact Number</th>
                                                            <th>Number of Orders</th>
                                                            <th>Balance</th>
                                                            <th>KYC</th>
                                                            <th>Ratings</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Sarah Wilson</td>
                                                            <td>sarah</td>
                                                            <td>sarah@gmail.com</td>
                                                            <td>9876543211</td>
                                                            <td>
                                                                <a href="delivery-orders.php">2</a>
                                                            </td>
                                                            <td>₹2999</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <span class="form-check form-switch">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" role="switch"
                                                                            id="flexSwitchCheckChecked">
                                                                        <label class="form-check-label"
                                                                            for="flexSwitchCheckChecked"></label>
                                                                    </span>
                                                                    <span>-</span>
                                                                    <span class="badge bg-danger-subtle text-danger fw-semibold">Unverified</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span>5</span>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle">
                                                                    <i class="mdi mdi-star fs-14 text-warning"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-delivery-man.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="add-delivery-man.php"
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
                                                            <td>Michael Brown</td>
                                                            <td>michael</td>
                                                            <td>michael@gmail.com</td>
                                                            <td>9876543210</td>
                                                            <td>
                                                                <a href="delivery-orders.php">1</a>
                                                            </td>
                                                            <td>₹999</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <span class="form-check form-switch">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" role="switch"
                                                                            id="flexSwitchCheckChecked" checked>
                                                                        <label class="form-check-label"
                                                                            for="flexSwitchCheckChecked"></label>
                                                                    </span>
                                                                    <span>-</span>
                                                                    <span class="badge bg-success-subtle text-success fw-semibold">Verified</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span>3</span>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle">
                                                                    <i class="mdi mdi-star fs-14 text-warning"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked" checked>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-delivery-man.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="add-delivery-man.php"
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
                                                            <td>Emily Davis</td>
                                                            <td>emily</td>
                                                            <td>emily@gmail.com</td>
                                                            <td>9876543210</td>
                                                            <td>
                                                                <a href="delivery-orders.php">3</a>
                                                            </td>
                                                            <td>₹2499</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <span class="form-check form-switch">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" role="switch"
                                                                            id="flexSwitchCheckChecked">
                                                                        <label class="form-check-label"
                                                                            for="flexSwitchCheckChecked"></label>
                                                                    </span>
                                                                    <span>-</span>
                                                                    <span class="badge bg-danger-subtle text-danger fw-semibold">Unverified</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span>4</span>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle">
                                                                    <i class="mdi mdi-star fs-14 text-warning"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked">
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-delivery-man.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="add-delivery-man.php"
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
                                                            <td>John Smith</td>
                                                            <td>john</td>
                                                            <td>john@gmail.com</td>
                                                            <td>9876543210</td>
                                                            <td>
                                                                <a href="delivery-orders.php">2</a>
                                                            </td>
                                                            <td>₹1999</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-1">
                                                                    <span class="form-check form-switch">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" role="switch"
                                                                            id="flexSwitchCheckChecked" checked>
                                                                        <label class="form-check-label"
                                                                            for="flexSwitchCheckChecked"></label>
                                                                    </span>
                                                                    <span>-</span>
                                                                    <span class="badge bg-success-subtle text-success fw-semibold">Verified</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span>5</span>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle">
                                                                    <i class="mdi mdi-star fs-14 text-warning"></i>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="form-check form-switch mb-2">
                                                                    <input class="form-check-input"
                                                                        type="checkbox" role="switch"
                                                                        id="flexSwitchCheckChecked" checked>
                                                                    <label class="form-check-label"
                                                                        for="flexSwitchCheckChecked"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-delivery-man.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="add-delivery-man.php"
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

                            </div><!-- end Experience -->

                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>