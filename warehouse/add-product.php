<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add New Product</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="product_name" class="form-label">
                                            Product Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="product_name" value="" class="form-control" placeholder="Enter Product Name" id="product_name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="product_type" class="form-label">
                                            Product Type <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="product_type" value="" class="form-control" placeholder="Enter Product Type" id="product_type">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="brand" class="form-label">
                                            Brand <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="brand" value="" class="form-control" placeholder="Enter Brand" id="brand">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="module_no" class="form-label">
                                            Module Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="module_no" value="" class="form-control" placeholder="Enter Module Number" id="module_no">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="serial_no" class="form-label">
                                            Serial Number <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="serial_no" value="" class="form-control" placeholder="Enter Serial Number" id="serial_no">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="product_image" class="form-label">
                                            Image <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="file" name="product_image" value="" class="form-control" id="product_image">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="quantity" class="form-label">
                                            Quantity <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="quantity" value="" class="form-control" placeholder="Enter Quantity" id="quantity">
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Rack Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="status" class="form-label">Warehouse Id <span class="text-danger">*</span></label>
                                        <select required="" name="status" id="status" class="form-select w-100">
                                            <option value="" selected disabled>-- Select Warehouse --</option>
                                            <option value="0">ABC-1234</option>
                                            <option value="1">ABC-1235</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Rack Name <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Rack Name" id="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Zone Area <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Zone Area" id="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Rack No <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Rack No" id="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Level No <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Level No" id="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="name" class="form-label">
                                            Position No <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="text" name="name" value="" class="form-control" placeholder="Enter Position No" id="name">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="price" class="form-label">
                                            Expiry Date <span class="text-danger">*</span>
                                        </label>
                                        <input required="" type="date" name="price" value="" class="form-control" placeholder="Enter Price" id="price">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select required="" name="status" id="status" class="form-select w-100">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
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