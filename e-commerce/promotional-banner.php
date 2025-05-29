<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Promotional Banner List</h4>
            </div>
            <div>
                <a href="add-banner-promotional.php" class="btn btn-primary">Add New Banner</a>
                <!-- <button class="btn btn-primary">Add New Brand</button> -->
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
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Start Date/Time</th>
                                                        <th>End Date/Time</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <div style="width: 100px;">
                                                                <img src="./assets/images/gallery/1.jpg" alt="Promo Banner" class="w-100">
                                                            </div>
                                                        </td>
                                                        <td>Welcome To Crackteck</td>
                                                        <td>
                                                            Get 50% off on all premium features this month. Hurry up!
                                                        </td>
                                                        <td>2025-06-01 10:00 AM</td>
                                                        <td>2025-06-05 11:59 PM</td>
                                                        <td>
                                                            <span class="badge bg-success-subtle text-success fw-semibold">Active</span>
                                                        </td>
                                                        <td>
                                                            <a aria-label="Edit" class="btn btn-icon btn-sm bg-warning-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                            </a>
                                                            <a aria-label="Delete" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!-- Repeat for more banners -->
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