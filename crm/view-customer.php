<?php include('layouts/header.php') ?>

<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">

            <div class="col-xxl-3 col-xl-4 col-lg-5">
                <div class="card sticky-side-div">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">
                                Customer Details
                            </h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="px-3">
                            <div class="profile-section-image">
                                <img src="./assets/images/users/user.jpg" alt="Customer Profile Image" style="width: 150px; height:150px" class="img-thumbnail">
                            </div>
                            <div class="mt-3">
                                <h6 class="mb-0">John Doe</h6>
                                <p>Joining Date 26 Mar, 2025 04:24 PM</p>
                            </div>
                        </div>

                        <div class="p-3 bg-body rounded">
                            <h6 class="mb-3 fw-bold">Customer Information</h6>

                            <ul class="list-group">
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Full Name
                                    </span>
                                    <span class="font-weight-bold">John Doe</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Username
                                    </span>
                                    <span class="font-weight-bold">John</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Email
                                    </span>
                                    <span class="font-weight-bold text-break">example@gmail.com</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Phone
                                    </span>
                                    <span class="font-weight-bold">9988557755</span>
                                </li>

                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Status
                                    </span>

                                    <span class="badge badge-pill bg-success">Active</span>
                                </li>
                            </ul>

                            <ul class="mt-4 list-group">
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Address
                                    </span>
                                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, tenetur.</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        City
                                    </span>
                                    <span>Kandivali</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        State
                                    </span>
                                    <span>Maharashtra</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Country
                                    </span>
                                    <span>India</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                    <span class="fw-semibold">
                                        Pincode
                                    </span>
                                    <span>400 067</span>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9 col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">
                                Current AMC
                            </h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive mb-2">
                            <table class="table table-hover table-nowrap align-middle">
                                <thead class="text-muted table-light">
                                    <tr class="text-uppercase">
                                        <th>AMC ID</th>
                                        <th>Service Id</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody class="list form-check-all">
                                    <tr>
                                        <td data-label="Order Number - Time">
                                            crackteck1001
                                        </td>
                                        <td data-label="Status">
                                            <span>#1001</span>
                                        </td>
                                        <td data-label="Status">
                                            <span>15-May-2025</span>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge badge-soft-success">Active</span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0 flex-grow-1">
                                Orders
                            </h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive mb-2">
                            <table class="table table-hover table-nowrap align-middle">
                                <thead class="text-muted table-light">
                                    <tr class="text-uppercase">
                                        <th>Order Id</th>
                                        <th>Quantity</th>
                                        <th>Time</th>
                                        <th>Customer Info</th>
                                        <th>Product Details</th>
                                        <th>Amount</th>
                                        <th>Delivery</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">

                                    <tr class="align-middle">
                                        <td>#1001</td>
                                        <td>2</td>
                                        <td>2 days ago<br />
                                            2025-04-15 05:40 PM</td>
                                        <td>
                                            Name: <br />
                                            Phone:<br />
                                            Email : N\A<br />
                                            Country :<br />
                                            City :<br />
                                            Address :<br />
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">View All (2)</button>

                                            <!-- Modals -->
                                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light">
                                                            <h5 class="modal-title">Product Info</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <div class="table-responsive table-card">
                                                                    <table class="table table-hover table-centered align-middle table-nowrap">
                                                                        <tbody id="product-info">
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                            <img src="https://placehold.co/80x80" alt="Headphone" class="img-fluid d-block">
                                                                                        </div>
                                                                                        <div>
                                                                                            <h5 class="fs-14 mb-0"><a href="#" class="text-reset">demo product1</a></h5>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <span class="text-muted fw-semibold">
                                                                                        Attribute
                                                                                    </span>

                                                                                    <h5 class="fs-14 mb-0 mt-1">
                                                                                        <span class="badge badge-soft-info"> black </span>
                                                                                    </h5>

                                                                                </td>

                                                                                <td>
                                                                                    <span class="text-muted fw-semibold">Amount</span>
                                                                                    <h5 class="fs-14 mb-0 mt-1 fw-normal">₹99 </h5>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                ₹3,493.0
                                            </div>
                                            <span
                                                class="badge bg-danger-subtle text-danger fw-semibold">Unpaid</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-success-subtle text-success fw-semibold">Placed</span>
                                        </td>
                                        <td>
                                            <a href="order-detail.php" aria-label="anchor"
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

        </div>

    </div>
</div> <!-- content -->

<?php include('layouts/footer.php') ?>