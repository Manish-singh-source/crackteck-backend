@extends('warehouse/layouts/master')

@section('content')

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
                                                Vendor Information
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'PO Number',
                                                'name' => 'po_number',
                                                'type' => 'text',
                                                'placeholder' => 'Enter PO Number',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Vendor Name',
                                                'name' => 'vendor_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Vendor Name',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Invoice Number',
                                                'name' => 'invoice_number',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Invoice Number',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Invoice PDf/Image',
                                                'name' => 'invoice_file',
                                                'type' => 'file',
                                                'placeholder' => 'Upload Invoice PDF/Image',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Purchase Date',
                                                'name' => 'purchase_date',
                                                'type' => 'date',
                                                'placeholder' => 'Purchase Date',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Bill Due Date',
                                                'name' => 'bill_date',
                                                'type' => 'date',
                                                'placeholder' => 'Bill Due Date',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Bill Amount',
                                                'name' => 'bill_amount',
                                                'type' => 'number',
                                                'placeholder' => 'Enter Bill Amount',
                                                ])
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

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
                                                @include('components.form.input', [
                                                'label' => 'Product Name',
                                                'name' => 'product_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Product Name',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'HSN Code',
                                                'name' => 'hsn_code',
                                                'type' => 'text',
                                                'placeholder' => 'Product HSN Code',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'SKU',
                                                'name' => 'sku',
                                                'type' => 'text',
                                                'placeholder' => 'Product SKU Code',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                'label' => 'Brand',
                                                'name' => 'brand',
                                                'options' => ["0" => "--Select--","1" => "TP-Link", "2" => "Cisco", "3" => "D-Link"]
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Model No',
                                                'name' => 'model',
                                                'type' => 'text',
                                                'placeholder' => 'Product Model No.',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Serial No',
                                                'name' => 'serial',
                                                'type' => 'text',
                                                'placeholder' => 'Product Serial No.',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                'label' => 'Category',
                                                'name' => 'category',
                                                'options' => ["0" => "--Select--","1" => "TP-Link", "2" => "Cisco", "3" => "D-Link"]
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                'label' => 'Subcategory',
                                                'name' => 'subcategory',
                                                'options' => ["0" => "--Select--","1" => "TP-Link", "2" => "Cisco", "3" => "D-Link"]
                                                ])
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
                                        <div class="col-xl-12  col-lg-6">
                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                'label' => 'Brand Warranty',
                                                'name' => 'warranty',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Brand Warranty',
                                                ])
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
                                                @include('components.form.input', [
                                                'label' => 'Cost Price',
                                                'name' => 'cost_price',
                                                'type' => 'number',
                                                'placeholder' => 'Enter Cost Price',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Selling Price',
                                                'name' => 'selling_price',
                                                'type' => 'number',
                                                'placeholder' => 'Enter Selling Price',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Discount Price',
                                                'name' => 'discount_price',
                                                'type' => 'number',
                                                'placeholder' => 'Enter Discount Price',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Tax (%)',
                                                'name' => 'tax',
                                                'type' => 'number',
                                                'placeholder' => 'Enter Tax',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Final Price (after discount)',
                                                'name' => 'final_price',
                                                'type' => 'number',
                                                'placeholder' => 'Enter Final Price',
                                                ])
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
                                                @include('components.form.input', [
                                                'label' => 'Stock',
                                                'name' => 'stock',
                                                'type' => 'number',
                                                'placeholder' => 'Enter Stock Quantity',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <div>
                                                @include('components.form.select', [
                                                'label' => 'Stock Status',
                                                'name' => 'stock_status',
                                                'options' => ["0" => "--Select--","1" => "In Stock", "2" => "Out of Stock", "3" => "Pre-order"]
                                                ])
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
                                                @include('components.form.input', [
                                                'label' => 'Rack Name',
                                                'name' => 'rack_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Rack Name',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Zone Area',
                                                'name' => 'zone_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Zone Area',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Rack No',
                                                'name' => 'rack_no',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Rack No',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Level No',
                                                'name' => 'level_no',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Level No',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Position No',
                                                'name' => 'position_no',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Position No',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            <div>
                                                @include('components.form.input', [
                                                'label' => 'Expiry Date',
                                                'name' => 'expiry_date',
                                                'type' => 'date',
                                                'placeholder' => 'Enter Expiry Date',
                                                ])
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6">
                                            @include('components.form.select', [
                                            'label' => 'Status',
                                            'name' => 'status',
                                            'options' => ["0" => "--Select--","1" => "Active", "2" => "Inactive"]
                                            ])
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
                                        @include('components.form.input', [
                                        'label' => 'Main Product Image',
                                        'name' => 'main_image',
                                        'type' => 'file',
                                        'placeholder' => 'Upload Main Product Image',
                                        ])
                                        <div id="emailHelp" class="text-danger">Image Size Should Be
                                            800x650
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        @include('components.form.input', [
                                        'label' => 'Additional Product Images',
                                        'name' => 'additional_images',
                                        'type' => 'file',
                                        'placeholder' => 'Upload Additional Product Images',
                                        ])
                                        <div id="emailHelp" class="text-danger">Image Size Should Be
                                            800x650
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        @include('components.form.input', [
                                        'label' => 'Product Datasheet or Manual',
                                        'name' => 'datasheet_doc',
                                        'type' => 'file',
                                        'placeholder' => 'Upload Product Datasheet or Manual',
                                        ])
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
                                        @include('components.form.select', [
                                        'label' => 'Color Options',
                                        'name' => 'color_options',
                                        'options' => ["0" => "--Select--","1" => "Black", "2" => "White", "3" => "Grey"]
                                        ])
                                    </div>

                                    <div class="mt-3">
                                        @include('components.form.select', [
                                        'label' => 'Size/Length Options',
                                        'name' => 'size_options',
                                        'options' => ["0" => "--Select--","1" => "20", "2" => "30", "3" => "40"]
                                        ])
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
                                        @include('components.form.select', [
                                        'label' => 'Product Status',
                                        'name' => 'product_status',
                                        'options' => ["0" => "--Select--","1" => "Active", "2" => "Inactive"]
                                        ])
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12">
                            <div class="text-start mb-3">
                                <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                    Submit
                                </button> -->
                                <a type="submit" href="{{ route('products.index') }}" class="btn btn-success w-sm waves ripple-light">
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


@endsection