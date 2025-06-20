<?php include('layouts/header.php') ?>

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create AMC</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="firstname" class="form-label">
                                            First Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="firstname" value="" class="form-control" placeholder="Enter Your Name" id="firstname">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="firstname" class="form-label">
                                            List Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="firstname" value="" class="form-control" placeholder="Enter Your Name" id="firstname">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="phone" class="form-label">
                                            Phone Number
                                        </label>
                                        <input type="text" name="phone" value="" class="form-control" placeholder="0XXXXXXX" id="phone">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="email" class="form-label">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="email" name="email" value="" class="form-control" placeholder="example@gamil.com" id="email">
                                    </div>
                                </div>

                               
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            DOB
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Pin Code" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Gender
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Gender" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Customer Type
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Gender" id="address">
                                    </div>
                                </div>
                                <!-- <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                          Priority Level
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Priority Level" id="address">
                                    </div>
                                </div> -->
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Company Name
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your  Company Name" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Company Address
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Company Address" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            GST Number
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your GST Number" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            PAN Number
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your PAN Number" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Profile Image
                                        </label>
                                        <input type="file" name="address" value="" class="form-control" placeholder="Enter your PAN Number" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
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
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card pb-4">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">
                            Address/Branch Information
                        </h5>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="address" class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" value="" required="" placeholder="Enter Address 1">
                            </div>

                            <div class="col-6">
                                <label for="address2" class="form-label">Address Line 2</label>
                                <input type="text" name="address2" id="address2" class="form-control" value="" required="" placeholder="Enter Address 2">
                            </div>

                            <div class="col-6">
                                <label for="city" class="form-label">City<span class="text-danger">*</span></label>
                                <input type="text" required="" name="city" id="city" class="form-control" value="" placeholder="Enter City">
                            </div>

                            <div class="col-6">
                                <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                <input type="text" name="state" id="state" class="form-control" value="" placeholder="Enter State" required="">
                            </div>

                            <div class="col-6">
                                <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                <input type="text" name="country" id="country" class="form-control" value="" required="" placeholder="Enter Country">
                            </div>

                            <div class="col-6">
                                <label for="pincode" class="form-label">Pincode<span class="text-danger">*</span></label>
                                <input type="text" name="pincode" id="pincode" class="form-control" value="" required="" placeholder="Enter Pincode">
                            </div>
                            <div class="col-6">
                                <label for="pincode" class="form-label">Branch Name<span class="text-danger">*</span></label>
                                <input type="text" name="pincode" id="pincode" class="form-control" value="" required="" placeholder="Name of Branch">
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">
                            Branch Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Branch Name</th>
                                    <th>Address Line 1</th>
                                    <th>Address Line 2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Pincode</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="align-middle">
                                    <td>BO</td>
                                    <td>
                                        <div>
                                            Sanjay Nagar Jalji Pada Kandivali West
                                        </div>
                                    </td>
                                    <td>
                                        Ganesh Nagar
                                    </td>
                                    <td>
                                        Mumbai
                                    </td>
                                    <td>
                                        Maharashtra
                                    </td>
                                    <td>
                                        India
                                    </td>
                                    <td>400067</td>
                                    <td>
                                        <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>KD</td>
                                    <td>
                                        <div>
                                            Sanjay Nagar Jalji Pada Kandivali West
                                        </div>
                                    </td>
                                    <td>
                                        Ganesh Nagar
                                    </td>
                                    <td>
                                        Mumbai
                                    </td>
                                    <td>
                                        Maharashtra
                                    </td>
                                    <td>
                                        India
                                    </td>
                                    <td>400067</td>
                                    <td>
                                        <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                            <i class="mdi mdi-delete fs-14 text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="product_name" class="form-label">
                                            Product Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="product_name" value="" class="form-control" placeholder="Dell Inspiron 15 Laptop Windows 11" id="product_name">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="product_type" class="form-label">Product Type <span class="text-danger">*</span></label>
                                    <select required="" name="product_type" id="product_type" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="Computer">Computer</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Accessories">Accessories</option>
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="brand" class="form-label">
                                            Product Brand <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="brand" value="" class="form-control" placeholder="Dell, HP, Asus" id="brand">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="model_no" class="form-label">
                                            Model Number
                                        </label>
                                        <input type="text" name="model_no" value="" class="form-control" placeholder="Inspiron 3511" id="model_no">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="serial_no" class="form-label">
                                            Serial Number
                                        </label>
                                        <input type="text" name="serial_no" value="" class="form-control" placeholder="B0BB7FQBBS" id="serial_no">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="purchase_date" class="form-label">
                                            Purchase Date
                                        </label>
                                        <input type="date" name="purchase_date" value="" class="form-control" placeholder="Enter Purchase Date" id="purchase_date">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="image" class="form-label">
                                            Image
                                        </label>
                                        <input data-size="150x150" type="file" class="preview form-control w-100" name="image" id="image">
                                    </div>
                                    <div id="image-preview-section">

                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="image" class="form-label">
                                       Select Branch
                                        </label>
                                        <select name="branch" id="branch" class="form-select w-100">
                                            <option selected disabled>-- Select --</option>
                                            <option value="BO">BO</option>
                                            <option value="KD">KD</option>
                                        </select>
                                    </div>
                                    <div id="image-preview-section">

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <table
                            class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Modal Number</th>
                                    <th>Serial Number</th>
                                    <th>Purchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/100x100" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Headphone
                                        </div>
                                    </td>
                                    <td>
                                        Computer
                                    </td>
                                    <td>
                                        Sony
                                    </td>
                                    <td>
                                        Inspiron 3511
                                    </td>
                                    <td>
                                        B0BB7FQBBS
                                    </td>
                                    <td>2025-04-04 06:09 PM</td>
                                    <td>
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

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">AMC Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="service-request.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-4">
                                    <label for="amc_plan" class="form-label">Select Plan<span class="text-danger">*</span></label>
                                    <select required="" name="amc_plan" id="amc_plan" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Standard">Standard</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="plan_duration" class="form-label">Plan Duration <span class="text-danger">*</span></label>
                                    <select required="" name="plan_duration" id="plan_duration" class="form-select w-100">
                                        <option selected disabled>-- Select --</option>
                                        <option value="6">6 Months</option>
                                        <option value="12">1 Year</option>
                                        <option value="24">2 Years</option>
                                    </select>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="plan_start_date" class="form-label">
                                            Preffered Start Date
                                        </label>
                                        <input type="date" name="plan_start_date" value="" class="form-control" placeholder="Enter Purchase Date" id="plan_start_date">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="additional_notes" class="form-label">
                                            Priority Level
                                        </label>
                                        <select name="priority_level" id="priority_level" class="form-select w-100">
                                            <option selected disabled>-- Select --</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="additional_notes" class="form-label">
                                            Additional Notes
                                        </label>
                                        <input type="text" name="additional_notes" value="" class="form-control" placeholder="Additional Notes" id="additional_notes">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>