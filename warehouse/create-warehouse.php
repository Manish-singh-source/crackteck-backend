<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create New Warehouse</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Warehouse Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Warehouse Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Warehouse Name" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="status" class="form-label">Warehouse Type <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0">Storage Hub</option>
                                            <option value="1">Return Center</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Location Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Address Line 1 <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Address Line 1" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Address Line 2 <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Address Line 2" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="status" class="form-label">City <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select City --</option>
                                            <option value="0">Mumbai</option>
                                            <option value="1">Thane</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="status" class="form-label">State <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select State --</option>
                                            <option value="0">Maharashtra</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="status" class="form-label">Country <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select Country --</option>
                                            <option value="0">India</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Pin Code <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Pincode" id="name">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Contact Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Contact Person Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Contact Person Name" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Phone Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Phone Number" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Alternate Phone Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Alternate Phone Number" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Email Address <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Email Address" id="name">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Operational Settings</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Working Hours <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="E.g. 9AM - 6PM" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Working Days <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Monday - Sunday" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Maximum Storage Capacity <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="status" class="form-label">Supported Operations <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select Supported Operations --</option>
                                            <option value="0">Inbound</option>
                                            <option value="0">Outbound</option>
                                            <option value="0">Returns</option>
                                            <option value="0">QC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="status" class="form-label">Zone Configuration <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select Zone Configuration --</option>
                                            <option value="0">Receiving Zone</option>
                                            <option value="0">Pick Zone</option>
                                            <option value="0">Cold Storage</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Legal/Compliance</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-12">
                                    <div>
                                        <label for="name" class="form-label">
                                            GST Number/Tax ID <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter GST Number/Tax ID" id="name">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="name" class="form-label">
                                            Licence/Permit Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Licence/Permit Number" id="name">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="name" class="form-label">
                                            Upload Licence Document <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="file" name="name" value="" class="form-control" placeholder="" id="name">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">System Settings</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-12">
                                    <div>
                                        <label for="status" class="form-label">Default Warehouse <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select Country --</option>
                                            <option value="0">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select Country --</option>
                                            <option value="0">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-12 mb-3">
                <div class="text-start">
                    <button type="submit" class="btn btn-success">
                        Add
                    </button>
                </div>
            </div>

        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>