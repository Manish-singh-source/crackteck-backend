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
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Product Basic Information
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-xl-6 col-lg-12">
                                        <div>
                                            <label class="form-label" for="name">
                                                Product title <span class="text-danger">*</span>
                                            </label>
                                            <input name="name" id="name" type="text" class="form-control" value="" placeholder="Enter product title" required="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label class="form-label" for="price">
                                                Regular price <span class="text-danger">*</span>
                                            </label>
                                            <input step="any" type="number" class="form-control" id="price" name="price" required="" value="" placeholder="Product price">
                                        </div>
                                    </div>



                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label class="form-label" for="discount_percentage">
                                                Discount Percentage(%)
                                            </label>

                                            <input type="number" class="form-control discount_percentage" id="discount_percentage" name="discount_percentage" value="0" placeholder="Discount Percentage">

                                            <div class="text-danger" id="dicountAmount">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label for="minimum_purchase_qty" class="form-label">Purchase Quantity (Min) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="minimum_purchase_qty" id="minimum_purchase_qty" value="1" placeholder="Min qty should be 1" required="">
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            <label for="maximum_purchase_qty" class="form-label">Purchase Quantity (Max) <span class="text-danger">*</span></label>
                                            <input type="number" value="0" class="form-control" name="maximum_purchase_qty" id="maximum_purchase_qty" placeholder="Max qty unlimited number" required="">
                                        </div>
                                    </div>

                                    <div class="col-12 text-editor-area">

                                        <div class="text-editor-area">
                                            <div class="text-editor-area">
                                                <label for="mail-composer" class="form-label"> Short Description
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea id="mail-composer" class="form-control text-editor" name="details" rows="5" placeholder="Enter Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="text-editor-area">
                                        <div class="text-editor-area">
                                            <label for="mail-composer" class="form-label"> Product Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="mail-composer" class="form-control text-editor" name="details" rows="5" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Product Gallery
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 mb-2">
                                        <div>
                                            <label for="featured_image" class="form-label">Thumbnail Image <span class="text-danger">*</span></label>
                                            <input type="file" name="featured_image" id="featured_image" class="form-control" required="">
                                            <div id="emailHelp" class="text-danger">Image Size Should Be
                                                800x650
                                            </div>
                                        </div>
                                        <div class="featured_img thumbnail">

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-xl-6 mb-2">
                                        <div>
                                            <label for="product_gallery_image" class="form-label">Gallery Image <span class="text-danger">*</span></label>
                                            <input type="file" name="gallery_image[]" id="product_gallery_image" class="form-control" multiple="" required="">
                                            <div class="text-danger">Image Size Should Be
                                                800x650
                                            </div>
                                            <div class="d-flex flex-wrap gap-2 gallery_img"></div>
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
                                    Status Section
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Product Status <span class="text-danger">*</span></label>
                                    <select class="form-select" id="status" name="status" required="">
                                        <option value="">Select One</option>
                                        <option selected="" value="0">New</option>
                                        <option value="1">Published</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" name="featured_status" value="2" id="status-switch">
                                        <label class="form-check-label" for="status-switch"> Todays Deal</label>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Product Categories
                                </h5>
                            </div>

                            <div class="card-body">

                                <div>
                                    <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select required="" name="category_id" id="category_id" class="form-select w-100" ->
                                        <option value="" data-select2-id="select2-data-7-j3bj">Select One</option>
                                        <option value="2" data-subcategory="[]">
                                            Laptops</option>
                                        <option value="4" data-subcategory="[]">
                                            Computers</option>
                                        <option value="5" data-subcategory="[]">
                                            AC</option>
                                    </select>
                                </div>

                                <div class="mt-2">
                                    <label for="subcategory_id" class="form-label">Sub Category</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-select">
                                        <option value="" data-select2-id="select2-data-5-gcfe">Select One</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Product Brand
                                </h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <label for="brand_id" class="form-label">Brand </label>
                                    <select name="brand_id" id="brand_id" class="form-select">
                                        <option value="">Select One</option>
                                        <option value="1">HP</option>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Product Warranty Policy
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted mb-2">
                                    Add Warranty Policy of Product
                                </p>

                                <textarea required="" class="form-control" name="warranty_policy" rows="5" placeholder="Enter warranty policy"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

<?php include('layouts/footer.php') ?>