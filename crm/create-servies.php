<?php include('layouts/header.php') ?>

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create Servies</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Service Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-4">
                                    <label for="product_type" class="form-label">Service Type <span class="text-danger">*</span></label>
                                    <select required="" name="product_type" id="product_type" class="form-select w-100">
                                        <option selected disabled>-- Select Service Type --</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                    </select>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Customer Type
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter Customer Type" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="firstname" class="form-label">
                                            First Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="firstname" value="" class="form-control" placeholder="Enter Your First Name" id="firstname">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="firstname" class="form-label">
                                            Last Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="firstname" value="" class="form-control" placeholder="Enter Your Last Name" id="firstname">
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
                                            Address Line 1
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your address" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Address Line 2
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your address" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Country
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Country" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            State
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your State" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            City
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your City" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            Pin Code
                                        </label>
                                        <input type="text" name="address" value="" class="form-control" placeholder="Enter your Pin Code" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="address" class="form-label">
                                            DOB
                                        </label>
                                        <input type="date" name="address" value="" class="form-control" placeholder="" id="address">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="gender" class="form-label">
                                            Gender
                                        </label>
                                        <select name="gender" id="gender" class="form-select w-100">
                                            <option selected disabled>-- Select Gender --</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
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
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
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
                            </div>
                        </form>
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
                                        <label for="serial_no" class="form-label">
                                            Issue type
                                        </label>
                                        <input type="text" name="serial_no" value="" class="form-control" id="serial_no">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        <label for="serial_no" class="form-label">
                                            Issue Description
                                        </label>
                                        <textarea name="" class="form-control" id=""></textarea>
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


            </div>
            <div class="col-lg-12">
                <div class="text-start mb-3">
                    <a href="service-request.php" class="btn btn-success w-sm waves ripple-light">
                        Submit
                    </a>
                    <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                            Submit
                        </button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>