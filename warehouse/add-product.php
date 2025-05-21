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

                <form action="product-detail.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm">
                                            <h5 class="card-title mb-0">
                                                Basic Product Information
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label class="form-label" for="product_name">
                                                    Product Name <span class="text-danger">*</span>
                                                </label>
                                                <input name="product_name" id="product_name" type="text" class="form-control" value="" placeholder="Enter Product Name" required="">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label class="form-label" for="sku">
                                                    SKU <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="sku" name="sku" required="" value="" placeholder="Product SKU Code">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                <label for="brand" class="form-label">Brand <span class="text-danger">*</span></label>
                                                <select class="form-select" id="brand" name="brand" required="">
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="">TP-Link</option>
                                                    <option value="">Cisco</option>
                                                    <option value=""> D-Link</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label class="form-label" for="model">
                                                    Model No <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="model" name="model" required="" value="" placeholder="Product Model No.">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                                <select class="form-select" id="category" name="category" required="">
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="">TP-Link</option>
                                                    <option value="">Cisco</option>
                                                    <option value=""> D-Link</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                <label for="subcategory" class="form-label">Subcategory</label>
                                                <select class="form-select" id="subcategory" name="subcategory" required="">
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="">TP-Link</option>
                                                    <option value="">Cisco</option>
                                                    <option value=""> D-Link</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card pb-4">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Product Details
                                    </h5>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div>
                                                <label for="short_details" class="form-label">Short Description <span class="text-danger">*</span></label>
                                                <!-- <textarea id="short_details" class="form-control text-editor" name="short_details" placeholder="Enter Description"></textarea> -->
                                                <div id="quill-editor" style="height: 300px;">
                                                    <h1>Hello World</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div>
                                                <label for="full_details" class="form-label">Full Description<span class="text-danger">*</span></label>
                                                <!-- <textarea id="full_details" class="form-control text-editor" name="full_details" placeholder="Enter Full Description"></textarea> -->
                                                <div id="quill-editor1" style="height: 300px;">
                                                    <h1>Hello World</h1>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div>
                                                <label for="tech_specs" class="form-label">Technical Specifications<span class="text-danger">*</span></label>
                                                <!-- 
                                            <textarea id="tech_specs" class="form-control text-editor" name="tech_specs" placeholder="Enter Specifications"></textarea>
                                            -->
                                        </div>
                                        <div id="quill-editor2" style="height: 300px;">
                                            <h1>Hello World</h1>
                                            <p><br></p>
                                            <h4>This is an simple editable area</h4>
                                            <p><br></p>
                                            <ol>
                                                <li>
                                                    Select a text to reveal the toolbar.
                                                </li>
                                                <li>
                                                    Edit rich document on-the-fly, so elastic!
                                                </li>
                                            </ol>
                                            <br>
                                            <p>Preset build with <code>snow</code> theme, and some common formats.</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="warranty" class="form-label">With Installation<span class="text-danger">*</span></label>
                                            <input type="checkbox" id="warranty" name="warranty" value="yes">
                                        </div>
                                    </div>
                                    <div class="col-xl-12  col-lg-6">
                                        <div class="mb-3">
                                            <label for="warranty" class="form-label">Warranty</label>
                                            <input type="text" class="form-control" id="warranty" name="warranty" required="" value="" placeholder="Enter Warranty">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                            <div class="card pb-4">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Pricing
                                    </h5>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="cost_price" class="form-label">Cost Price <span class="text-danger">*</span></label>
                                                <input name="cost_price" id="cost_price" type="text" class="form-control" value="" placeholder="Enter Cost Price" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="selling_price" class="form-label">Selling Price <span class="text-danger">*</span></label>
                                                <input name="selling_price" id="selling_price" type="text" class="form-control" value="" placeholder="Enter Selling Price" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="discount_price" class="form-label">Discount Price <span class="text-danger">*</span></label>
                                                <input name="discount_price" id="discount_price" type="text" class="form-control" value="" placeholder="Enter Discount Price" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="tax" class="form-label">Tax (%) <span class="text-danger">*</span></label>
                                                <input name="tax" id="tax" type="text" class="form-control" value="" placeholder="Enter Tax" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="final_price" class="form-label">Final Price (after discount) </label>
                                                <input name="final_price" id="final_price" type="text" class="form-control" value="" placeholder="Enter Final Price" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card pb-4">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Inventory
                                    </h5>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                                                <input name="stock" id="stock" type="text" class="form-control" value="" placeholder="Enter Stock Quantity" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="stock_status" class="form-label">Stock Status <span class="text-danger">*</span></label>
                                                <select class="form-select" id="stock_status" name="stock_status" required="">
                                                    <option selected disabled value="">-- Select --</option>
                                                    <option value="">In Stock</option>
                                                    <option value="">Out of Stock</option>
                                                    <option value="">Pre-order</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="min_order_qty" class="form-label">Minimum Order Qty<span class="text-danger">*</span></label>
                                                <input name="min_order_qty" id="min_order_qty" type="number" class="form-control" value="" placeholder="Enter Minimum Order Quantity" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="max_order_qty" class="form-label">Maximum Order Qty<span class="text-danger">*</span></label>
                                                <input name="max_order_qty" id="max_order_qty" type="number" class="form-control" value="" placeholder="Enter Maximum Order Quantity" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card pb-4">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        SEO
                                    </h5>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="meta_title" class="form-label">Meta Title</label>
                                                <input name="meta_title" id="meta_title" type="text" class="form-control" value="" placeholder="Enter Meta Title" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="meta_description" class="form-label">Meta Description</label>
                                                <input name="meta_description" id="meta_description" type="text" class="form-control" value="" placeholder="Enter Meta Description" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                                <input name="meta_keywords" id="meta_keywords" type="text" class="form-control" value="" placeholder="Enter Meta Keywords" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="url_slug" class="form-label">Product URL Slug</label>
                                                <input name="url_slug" id="url_slug" type="text" class="form-control" value="" placeholder="Enter Product URL Slug" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Rack Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 pb-3">
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label for="status" class="form-label">Warehouse Name <span class="text-danger">*</span></label>
                                                <select required="" name="status" id="status" class="form-select w-100" disabled>
                                                    <option value="" selected disabled>-- Select Warehouse --</option>
                                                    <option value="0" selected>ABC-1234</option>
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
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                        </div> -->
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Images and Media:
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="main_image" class="form-label">Main Product Image<span class="text-danger">*</span></label>
                                        <input type="file" name="main_image" id="main_image" class="form-control" required="">
                                        <div id="emailHelp" class="text-danger">Image Size Should Be
                                            800x650
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="additional_images" class="form-label">Additional Product Images<span class="text-danger">*</span></label>
                                        <input type="file" name="additional_images" id="additional_images" class="form-control" required="" multiple>
                                        <div id="emailHelp" class="text-danger">Image Size Should Be
                                            800x650
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="datasheet_doc" class="form-label">Product Datasheet or Manual <span class="text-danger">*</span></label>
                                        <input type="file" name="datasheet_doc" id="datasheet_doc" class="form-control" required="">
                                        <div id="emailHelp" class="text-danger">Image Size Should Be
                                            800x650
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Product Variations
                                    </h5>
                                </div>

                                <div class="card-body">

                                    <div>
                                        <label for="color_options" class="form-label">Color Options <span class="text-danger">*</span></label>
                                        <select required="" name="color_options" id="color_options" class="form-select w-100">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="1">Black</option>
                                            <option value="2">White</option>
                                            <option value="3">Grey</option>
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label for="size_options" class="form-label">Size/Length Options <span class="text-danger">*</span></label>
                                        <select required="" name="size_options" id="size_options" class="form-select w-100">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="1">Black</option>
                                            <option value="2">White</option>
                                            <option value="3">Grey</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Status
                                    </h5>
                                </div>

                                <div class="card-body">

                                    <div>
                                        <label for="product_status" class="form-label">Product Status <span class="text-danger">*</span></label>
                                        <select required="" name="product_status" id="product_status" class="form-select w-100">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Shipping Details
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Product Weight (kg/gms) <span class="text-danger">*</span></label>
                                        <input name="weight" id="weight" type="text" class="form-control" value="" placeholder="Enter Weight" required="">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="dimensions" class="form-label">Product Dimensions (L × W × H cm/mm)<span class="text-danger">*</span></label>
                                        <input name="dimensions" id="dimensions" type="text" class="form-control" value="" placeholder="Enter Dimension" required="">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="featured_image" class="form-label">Shipping Class<span class="text-danger">*</span></label>
                                        <select class="form-select" id="warranty" name="warranty" required="">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="">Light</option>
                                            <option value="">Heavy</option>
                                            <option value="">Fragile</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">
                                        Other Information:
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="featured_image" class="form-label">Featured Product?<span class="text-danger">*</span></label>
                                        <select class="form-select" id="warranty" name="warranty" required="">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="featured_image" class="form-label">Tags<span class="text-danger">*</span></label>
                                        <select class="form-select" id="warranty" name="warranty" required="">
                                            <option selected disabled value="">-- Select --</option>
                                            <option value="">Best Seller</option>
                                            <option value="">High-Speed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="text-start mb-3">
                                <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                    Submit
                                </button> -->
                                <a type="submit" href="./product-detail.php" class="btn btn-success w-sm waves ripple-light">
                                    Submit
                                </a>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>