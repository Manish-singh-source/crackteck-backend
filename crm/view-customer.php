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
                        <div class="table-responsive mb-4">
                            <table class="table table-hover table-nowrap align-middle">
                                <thead class="text-muted table-light">
                                    <tr class="text-uppercase">
                                        <th>AMC ID</th>
                                        <th>Products</th>
                                        <th>Products</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody class="list form-check-all">
                                    <tr>
                                        <td data-label="Order Number - Time">
                                            crackteck1001
                                        </td>

                                        <td data-label="Status">
                                            <span class="badge badge-soft-warning">Shipped</span>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge badge-soft-warning">Shipped</span>
                                        </td>
                                        <td data-label="Status">
                                            <span class="badge badge-soft-warning">Shipped</span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="mt-3">
                            <h6 class="fw-bold mb-3">Customer Information Update</h6>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-xl-4">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" value="Technofra" required="">
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" value="manish@technofra.com" required="">
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control" value="police chowky" placeholder="Enter Address" required="">
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" value="Mumbai" placeholder="Enter City" required="">
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="country_id" class="form-label">Country <span class="text-danger">*</span></label>


                                        <select class="select2 select2-hidden-accessible form-control" name="country_id" id="country_id" data-select2-id="select2-data-country_id" tabindex="-1" aria-hidden="true">
                                            <option value="1"> Afghanistan</option>
                                            <option value="2"> Åland Islands</option>
                                            <option value="3"> Albania</option>
                                            <option value="4"> Algeria</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                        <input type="text" name="state" id="state" class="form-control" value="Maharashtra" placeholder="Enter State" required="">
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="zip" class="form-label">Zip <span class="text-danger">*</span></label>
                                        <input type="text" name="zip" id="zip" class="form-control" value="400067" placeholder="Enter Zip" required="">
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select py-2 px-4 d-flex" name="status" id="status">
                                            <option value="1" selected="">Active</option>
                                            <option value="0">Banned</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-md btn-success btn-xl px-4 fs-6 text-light">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div> <!-- content -->

<?php include('layouts/footer.php') ?>