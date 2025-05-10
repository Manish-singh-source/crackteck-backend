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
                                        <label for="warehouse_name" class="form-label">
                                            Warehouse Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="warehouse_name" value="" class="form-control" placeholder="Enter Warehouse Name" id="warehouse_name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="warehouse_type" class="form-label">Warehouse Type <span class="text-danger">*</span></label>
                                        <select required="" name="warehouse_type" id="warehouse_type" class="form-select w-100">
                                            <option value="0"> -- Select --</option>
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
                                        <label for="warehouse_addr1" class="form-label">
                                            Address Line 1 <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="warehouse_addr1" value="" class="form-control" placeholder="Enter Address Line 1" id="warehouse_addr1">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="warehouse_addr2" class="form-label">
                                            Address Line 2 <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="warehouse_addr2" value="" class="form-control" placeholder="Enter Address Line 2" id="warehouse_addr2">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                        <select required="" name="city" id="city" class="form-select w-100">
                                            <option value="0"> -- Select City --</option>
                                            <option value="0">Mumbai</option>
                                            <option value="1">Thane</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                        <select required="" name="state" id="state" class="form-select w-100">
                                            <option value="0"> -- Select State --</option>
                                            <option value="0">Maharashtra</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                        <select required="" name="country" id="country" class="form-select w-100">
                                            <option value="0"> -- Select Country --</option>
                                            <option value="0">India</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="pincode" class="form-label">
                                            Pin Code <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="pincode" value="" class="form-control" placeholder="Enter Pincode" id="pincode">
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
                                        <label for="contact_person_name" class="form-label">
                                            Contact Person Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="contact_person_name" value="" class="form-control" placeholder="Enter Contact Person Name" id="contact_person_name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="phone_number" class="form-label">
                                            Phone Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="phone_number" value="" class="form-control" placeholder="Enter Phone Number" id="phone_number">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="alternate_phone_number" class="form-label">
                                            Alternate Phone Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="alternate_phone_number" value="" class="form-control" placeholder="Enter Alternate Phone Number" id="alternate_phone_number">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="email" class="form-label">
                                            Email Address <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="email" value="" class="form-control" placeholder="Enter Email Address" id="email">
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
                                        <label for="working_hours" class="form-label">
                                            Working Hours <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="working_hours" value="" class="form-control" placeholder="E.g. 9AM - 6PM" id="working_hours">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="working_days" class="form-label">
                                            Working Days <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="working_days" value="" class="form-control" placeholder="Monday - Sunday" id="working_days">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="max-store-capacity" class="form-label">
                                            Maximum Storage Capacity <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="max-store-capacity" value="" class="form-control" placeholder="Enter Maximum Storage Capacity" id="max-store-capacity">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="supported_operations" class="form-label">Supported Operations <span class="text-danger">*</span></label>
                                        <select required="" name="supported_operations" id="supported_operations" class="form-select w-100">
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
                                        <label for="zone_conf" class="form-label">Zone Configuration <span class="text-danger">*</span></label>
                                        <select required="" name="zone_conf" id="zone_conf" class="form-select w-100">
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
                                        <label for="gst_no" class="form-label">
                                            GST Number/Tax ID <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="gst_no" value="" class="form-control" placeholder="Enter GST Number/Tax ID" id="gst_no">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="licence_no" class="form-label">
                                            Licence/Permit Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="licence_no" value="" class="form-control" placeholder="Enter Licence/Permit Number" id="licence_no">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="licence_doc" class="form-label">
                                            Upload Licence Document <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="file" name="licence_doc" value="" class="form-control" placeholder="" id="licence_doc">
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
                                        <label for="default_warehouse" class="form-label">Default Warehouse <span class="text-danger">*</span></label>
                                        <select required="" name="default_warehouse" id="default_warehouse" class="form-select w-100">
                                            <option value="0"> -- Select --</option>
                                            <option value="0">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="0"> -- Select --</option>
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