<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Create Staff</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="staff.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Your Name" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="username" class="form-label"> User Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="user_name" value="" class="form-control" placeholder="Enter your Username" id="username">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="phone" class="form-label">
                                            Phone Number
                                        </label>
                                        <input type="text" name="phone" value="" class="form-control" placeholder="0XXXXXXX" id="phone">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="email" class="form-label">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="email" name="email" value="" class="form-control" placeholder="example@gamil.com" id="email">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="password" class="form-label">
                                            Password <span class="text-danger">* (Minimum 5 Character Required!!)</span>
                                        </label>
                                        <input required="" type="password" name="password" value="" class="form-control" placeholder="*************" id="password">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="confirmPassword" class="form-label">
                                            Confirm Password <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="password" name="password_confirmation" value="" class="form-control" placeholder="*************" id="confirmPassword">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="role" class="form-label">
                                            Roles <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" required="" name="role" id="role">
                                            <option value="">--Select A Role</option>

                                            <option value="1">
                                                Admin
                                            </option>
                                            <option value="4">
                                                Manager
                                            </option>
                                            <option value="5">
                                                Technician
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Address
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your address" id="address">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="image" class="form-label">
                                            Image <span class="text-danger">
                                                (150x150)
                                            </span>
                                        </label>
                                        <input data-size="150x150" type="file" class="preview form-control w-100" name="image" id="image">
                                    </div>
                                    <div id="image-preview-section">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-success">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>