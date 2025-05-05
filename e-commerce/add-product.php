<?php 
$contain = "Add Product";
include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="py-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
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
                                            <label class="form-label" for="name">
                                                Product Name <span class="text-danger">*</span>
                                            </label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label class="form-label" for="price">
                                                SKU <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="sku" name="sku" required="" value="" placeholder="Product sku code">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div class="mb-3">
                                            <label for="brand" class="form-label">Brand <span class="text-danger">*</span></label>
                                            <select class="form-select" id="brand" name="brand" required="">
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
                                            <input type="text" class="form-control" id="model" name="model" required="" value="" placeholder="Product Model no">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Category <span class="text-danger">*</span></label>
                                            <select class="form-select" id="category" name="category" required="">
                                                <option value="">TP-Link</option>
                                                <option value="">Cisco</option>
                                                <option value=""> D-Link</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label for="mail-composer" class="form-label"> Subcategory
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" placeholder="Enter Description"></textarea>
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
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Short Description <span class="text-danger">*</span></label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Full Description<span class="text-danger">*</span></label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Technical Specifications<span class="text-danger">*</span></label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="mb-3">
                                            <label for="warranty" class="form-label">Warranty <span class="text-danger">*</span></label>
                                            <select class="form-select" id="warranty" name="warranty" required="">
                                                <option value="">1 Year</option>
                                                <option value="">2 Years</option>
                                            </select>
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
                                            <label for="featured_image" class="form-label">Cost Price <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Selling Price <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Discount Price <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Tax (%) <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Final Price (after discount) <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
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
                                            <label for="featured_image" class="form-label">Stock <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Stock Status <span class="text-danger">*</span></label>
                                            <select class="form-select" id="warranty" name="warranty" required="">
                                                <option value="">In Stock</option>
                                                <option value="">Out of Stock</option>
                                                <option value="">Pre-order</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Minimum Order Qty<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="number" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Maximum Order Qty<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="number" class="form-control" value="" placeholder="Enter product name" required="">
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
                                            <label for="featured_image" class="form-label">Meta Title <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Meta Description <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Meta Keywords<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Product URL Slug <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                SEO Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category Meta Title<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category Meta Description<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category Meta Keywords<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Category URL Slug<span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                        </div>
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
                                    <label for="status" class="form-label">Main Product Image<span class="text-danger">*</span></label>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control" required="">
                                    <div id="emailHelp" class="text-danger">Image Size Should Be
                                        800x650
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Additional Product Images<span class="text-danger">*</span></label>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control" required="">
                                    <div id="emailHelp" class="text-danger">Image Size Should Be
                                        800x650
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Product Datasheet or Manual <span class="text-danger">*</span></label>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control" required="">
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
                                    <label for="category_id" class="form-label">Color Options <span class="text-danger">*</span></label>
                                    <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                        <option value="" data-select2-id="select2-data-7-j3bj">Black</option>
                                        <option value="2" data-subcategory="[]">
                                            White</option>
                                        <option value="4" data-subcategory="[]">
                                            Grey</option>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="category_id" class="form-label">Size/Length Options <span class="text-danger">*</span></label>
                                    <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                        <option value="" data-select2-id="select2-data-7-j3bj">Black</option>
                                        <option value="2" data-subcategory="[]">
                                            White</option>
                                        <option value="4" data-subcategory="[]">
                                            Grey</option>
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
                                    <label for="category_id" class="form-label">Product Status <span class="text-danger">*</span></label>
                                    <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                        <option value="" data-select2-id="select2-data-7-j3bj">Active</option>
                                        <option value="2" data-subcategory="[]">
                                            Inactive</option>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <label for="category_id" class="form-label">Created Date <span class="text-danger">*</span></label>
                                    <input type="date" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Start Date">
                                </div>

                                <div class="mt-3">
                                    <label for="category_id" class="form-label">Updated Date<span class="text-danger">*</span></label>
                                    <input type="date" name="name" id="name" class="form-control" value="" required="" placeholder="Enter Start Date">
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
                                    <label for="featured_image" class="form-label">Product Weight (kg/gms) <span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="featured_image" class="form-label">Product Dimensions (L × W × H cm/mm)<span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product name" required="">
                                </div>
                                <div class="mt-3 mb-3">
                                    <label for="featured_image" class="form-label">Shipping Class<span class="text-danger">*</span></label>
                                    <select class="form-select" id="warranty" name="warranty" required="">
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
                                        <option value="">Yes</option>
                                        <option value="">No</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="featured_image" class="form-label">Tags<span class="text-danger">*</span></label>
                                    <select class="form-select" id="warranty" name="warranty" required="">
                                        <option value="">Best Seller</option>
                                        <option value="">High-Speed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>