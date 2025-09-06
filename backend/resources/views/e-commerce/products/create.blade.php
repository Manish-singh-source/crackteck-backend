@extends('e-commerce/layouts/master')

@section('content')
    <div class="content">

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
                                                <label class="form-label" for="product_name">
                                                    Product Name <span class="text-danger">*</span>
                                                </label>
                                                <input name="product_name" id="product_name" type="text"
                                                    class="form-control" placeholder="Enter Product Name" required="">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label class="form-label" for="sku">
                                                    SKU <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="sku" name="sku"
                                                    required="" placeholder="Product SKU Code">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                    'label' => 'Brand',
                                                    'name' => 'brand_title',
                                                    'options' => $brand,
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label class="form-label" for="model">
                                                    Model No <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="model" name="model"
                                                    required="" placeholder="Product Model No.">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label class="form-label" for="serial">
                                                    Product Serial No <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="serial" name="serial"
                                                    required="" placeholder="Product Serial No.">
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                <label class="form-label" for="serial">
                                                    Custom Serial No <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="serial" name="serial"
                                                    required="" placeholder="Custom Product Serial No.">
                                            </div>
                                        </div>

                                        {{-- <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                    'label' => 'Parent Category',
                                                    'name' => 'parent_category',
                                                    'options' => $parentCategorie,
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                    'label' => 'Sub Category',
                                                    'name' => 'sub_category',
                                                    'options' => $subcategorie,
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>
                                        </div> --}}

                                        <div class="col-lg-6">
                                            @include('components.form.select', [
                                                'label' => 'Parent Category',
                                                'name' => 'parent_category',
                                                'options' =>
                                                    ['' => 'Select Parent Category'] + $parentCategorie->toArray(),
                                                'model' => isset($product) ? $product : null,
                                            ])
                                        </div>

                                        <div class="col-lg-6">
                                            @include('components.form.select', [
                                                'label' => 'Sub Category',
                                                'name' => 'sub_category',
                                                'options' => ['' => 'First select parent category'],
                                                'model' => isset($product) ? $product : null,
                                            ])
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
                                                <label for="short_details" class="form-label">Short Description <span
                                                        class="text-danger">*</span></label>
                                                <div id="quill-editor" style="height: 300px;">
                                                    <p>A high-performance biometric device designed for secure and accurate
                                                        attendance tracking and access control.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div>
                                                <label for="full_details" class="form-label">Full Description<span
                                                        class="text-danger">*</span></label>
                                                <div id="quill-editor1" style="height: 300px;">
                                                    <p>A high-performance biometric device designed for secure and accurate
                                                        attendance tracking and access control. This compact and efficient
                                                        system uses fingerprint, face recognition, and/or RFID technology to
                                                        verify individual identity, helping organizations streamline
                                                        workforce management and enhance security.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div>
                                                <label for="tech_specs" class="form-label">Technical Specifications<span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <div id="quill-editor2" style="height: 300px;">
                                                <div>
                                                    <table class="table table-bordered" cellpadding="8" cellspacing="0"
                                                        style="width: 100%; border-collapse: collapse;">
                                                        <thead>
                                                            <tr style="background-color: #f2f2f2;">
                                                                <th>Specification</th>
                                                                <th>Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Identification Methods</td>
                                                                <td>Fingerprint, Face Recognition, RFID Card, PIN</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fingerprint Capacity</td>
                                                                <td>5,000 templates</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Face Capacity</td>
                                                                <td>1,000 templates</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Card Capacity</td>
                                                                <td>5,000 (125kHz RFID)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Transaction Storage</td>
                                                                <td>100,000 records</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Recognition Speed</td>
                                                                <td>≤ 0.5 seconds</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Display</td>
                                                                <td>2.8-inch TFT Color LCD</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Audio/Visual Indicators</td>
                                                                <td>Voice Prompt &amp; LED Notification</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Communication Interface</td>
                                                                <td>TCP/IP, USB Host, Wi-Fi (optional)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Access Control Interface</td>
                                                                <td>Door Sensor, Exit Button, Electric Lock, Alarm</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-6">
                                            <div class="row justify-content-end align-items-end">
                                                <div class="col-11">
                                                    <div class="mb-3">
                                                        <label for="warranty" class="form-label">With Installation</label>
                                                        <input type="text" class="form-control" id="warranty"
                                                            name="warranty">
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="mb-3">
                                                        <button class="btn btn-primary w-100 add-warranty">Add</button>
                                                    </div>
                                                </div>

                                                <table class="table mt-4" id="warrantyTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Installation Included</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Selected values will appear here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="col-xl-12  col-lg-6">
                                            <div class="mb-3">
                                                <label for="brand_warranty_details" class="form-label">Brand
                                                    Warranty</label>
                                                <input type="text" class="form-control" id="brand_warranty_details"
                                                    name="brand_warranty_details" required=""
                                                    placeholder="Enter Brand Warranty">
                                            </div>
                                        </div>

                                        <div class="col-xl-12  col-lg-6">
                                            <div class="mb-3">
                                                <label for="crackteck_warranty_details" class="form-label">Company
                                                    Warranty</label>
                                                <input type="text" class="form-control"
                                                    id="crackteck_warranty_details" name="crackteck_warranty_details"
                                                    required="" placeholder="Enter Our Company Warranty">
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
                                                <label for="cost_price" class="form-label">Cost Price <span
                                                        class="text-danger">*</span></label>
                                                <input name="cost_price" id="cost_price" type="text"
                                                    class="form-control" placeholder="Enter Cost Price" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="selling_price" class="form-label">Selling Price <span
                                                        class="text-danger">*</span></label>
                                                <input name="selling_price" id="selling_price" type="text"
                                                    class="form-control" placeholder="Enter Selling Price"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="discount_price" class="form-label">Discount Price <span
                                                        class="text-danger">*</span></label>
                                                <input name="discount_price" id="discount_price" type="text"
                                                    class="form-control" placeholder="Enter Discount Price"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="tax" class="form-label">Tax (%) <span
                                                        class="text-danger">*</span></label>
                                                <input name="tax" id="tax" type="text" class="form-control"
                                                    placeholder="Enter Tax" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="final_price" class="form-label">Final Price (after discount)
                                                </label>
                                                <input name="final_price" id="final_price" type="text"
                                                    class="form-control" placeholder="Enter Final Price" required="">
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
                                                <label for="stock" class="form-label">Stock <span
                                                        class="text-danger">*</span></label>
                                                <input name="stock" id="stock" type="text" class="form-control"
                                                    placeholder="Enter Stock" required="">
                                                <div id="emailHelp" class="text-danger">Stock Should Be Less Than 50</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="stock_status" class="form-label">Stock Status <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" id="stock_status" name="stock_status"
                                                    required="">
                                                    <option selected disabled>-- Select --</option>
                                                    <option>In Stock</option>
                                                    <option>Out of Stock</option>
                                                    <option>Pre-order</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="min_order_qty" class="form-label">Minimum Order Qty<span
                                                        class="text-danger">*</span></label>
                                                <input name="min_order_qty" id="min_order_qty" type="number"
                                                    class="form-control" placeholder="Enter Minimum Order Quantity"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="max_order_qty" class="form-label">Maximum Order Qty<span
                                                        class="text-danger">*</span></label>
                                                <input name="max_order_qty" id="max_order_qty" type="number"
                                                    class="form-control" placeholder="Enter Maximum Order Quantity"
                                                    required="">
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
                                                <label for="meta_title" class="form-label">Meta Title <span
                                                        class="text-danger">*</span></label>
                                                <input name="meta_title" id="meta_title" type="text"
                                                    class="form-control" placeholder="Enter Meta Title" required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="meta_description" class="form-label">Meta Description <span
                                                        class="text-danger">*</span></label>
                                                <input name="meta_description" id="meta_description" type="text"
                                                    class="form-control" placeholder="Enter Meta Description"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="meta_keywords" class="form-label">Meta Keywords<span
                                                        class="text-danger">*</span></label>
                                                <input name="meta_keywords" id="meta_keywords" type="text"
                                                    class="form-control" placeholder="Enter Meta Keywords"
                                                    required="">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                <label for="url_slug" class="form-label">Product URL Slug <span
                                                        class="text-danger">*</span></label>
                                                <input name="url_slug" id="url_slug" type="text"
                                                    class="form-control" placeholder="Enter Product URL Slug"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                        <label for="main_image" class="form-label">Main Product Image<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="main_image" id="main_image" class="form-control"
                                            required="">
                                        <div id="emailHelp" class="text-danger">Image Size Should Be
                                            800x650
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="additional_images" class="form-label">Additional Product Images<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="additional_images" id="additional_images"
                                            class="form-control" required="" multiple>
                                        <div id="emailHelp" class="text-danger">Image Size Should Be
                                            800x650
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="datasheet_doc" class="form-label">Product Datasheet or Manual <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="datasheet_doc" id="datasheet_doc"
                                            class="form-control" required="">
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
                                        <label for="color_options" class="form-label">Color Options <span
                                                class="text-danger">*</span></label>
                                        <select required="" name="color_options" id="color_options"
                                            class="form-select w-100">
                                            <option selected disabled>-- Select --</option>
                                            <option value="1">Black</option>
                                            <option value="2">White</option>
                                            <option value="3">Grey</option>
                                        </select>
                                    </div>

                                    <div class="mt-3">
                                        <label for="size_options" class="form-label">Size/Length Options <span
                                                class="text-danger">*</span></label>
                                        <select required="" name="size_options" id="size_options"
                                            class="form-select w-100">
                                            <option selected disabled>-- Select --</option>
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
                                        <label for="product_status" class="form-label">Product Status <span
                                                class="text-danger">*</span></label>
                                        <select required="" name="product_status" id="product_status"
                                            class="form-select w-100">
                                            <option disabled>-- Select --</option>
                                            <option selected value="1">Active</option>
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
                                        <label for="weight" class="form-label">Product Weight (kg/gms) <span
                                                class="text-danger">*</span></label>
                                        <input name="weight" id="weight" type="text" class="form-control"
                                            placeholder="Enter Weight" required="">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="dimensions" class="form-label">Product Dimensions (L × W × H
                                            cm/mm)<span class="text-danger">*</span></label>
                                        <input name="dimensions" id="dimensions" type="text" class="form-control"
                                            placeholder="Enter Dimension" required="">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="shipping_charges" class="form-label">Shipping Charges<span
                                                class="text-danger">*</span></label>
                                        <input name="shipping_charges" id="shipping_charges" type="text"
                                            class="form-control" placeholder="Enter Shipping Charges" required="">
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="featured_image" class="form-label">Shipping Class<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="warranty" name="warranty" required="">
                                            <option selected disabled>-- Select --</option>
                                            <option>Light</option>
                                            <option>Heavy</option>
                                            <option>Fragile</option>
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
                                        <label for="featured_image" class="form-label">Featured Product?<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="warranty" name="warranty" required="">
                                            <option selected disabled>-- Select --</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="featured_image" class="form-label">Tags<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="warranty" name="warranty" required="">
                                            <option selected disabled>-- Select --</option>
                                            <option>Best Seller</option>
                                            <option>High-Speed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="text-start mb-3">
                                <a href="{{ route('ec.product.index') }}" class="btn btn-success w-sm waves ripple-light">
                                    Submit
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->

    <script>
        $(document).ready(function() {
            // Add engineer to table
            $('#warrantyTable').hide();
            $(".add-warranty").on("click", function() {
                $('#warrantyTable').show();
                const warrantyValue = $('#warranty').val();
                const tableBody = $('#warrantyTable tbody');
                console.log(warrantyValue);
                const newRow = `
                            <tr>
                                <td>${warrantyValue}</td>
                                <td>
                                    <a aria-label="anchor" class="btn btn-icon btn-sm bg-warning-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                        <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                    </a>
                                    <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                        <i class="mdi mdi-delete fs-14 text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                console.log(warrantyValue);
                tableBody.append(newRow);
            });
        });


        $(document).ready(function() {
            $(".warranty-list").hide();

            $("#warranty").on('click', function() {
                if ($(this)[0].checked) {
                    $(".warranty-list").show();
                } else {
                    $(".warranty-list").hide();
                }
            });

            $("#reject-request").on('click', function() {
                $(this).parent().hide();
                $(".request-status").html("Rejected");
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            // Parent -> Sub
            $('select[name="parent_category"]').on('change', function() {
                var id = $(this).val();
                $.get('/parent-dependent?type=rack&id=' + id, function(data) {
                    var select = $('select[name="warehouse_rack_name"]');
                    select.empty().append('<option value="">--Select Rack--</option>');
                    $.each(data, function(key, value) {
                        select.append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            });

            // Rack -> Zone
            $('select[name="warehouse_rack_name"]').on('change', function() {
                var id = $(this).val();
                $.get('/warehouse-dependent?type=zone&id=' + id, function(data) {
                    var select = $('select[name="zone_area_id"]');
                    select.empty().append('<option value="">--Select Zone--</option>');
                    $.each(data, function(key, value) {
                        select.append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            });
        });
    </script>
@endsection
