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

                    <form action="{{ route('product-list.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                                        'label' => 'Invoice PDF',
                                                        'name' => 'invoice_pdf',
                                                        'type' => 'file',
                                                        'placeholder' => 'Upload Invoice PDF',
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
                                                        'name' => 'bill_due_date',
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
                                                        'name' => 'brand_id',
                                                        'options' => ['' => '--Select Brand--'] + $brands->toArray(),
                                                    ])
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div>
                                                    @include('components.form.input', [
                                                        'label' => 'Model No',
                                                        'name' => 'model_no',
                                                        'type' => 'text',
                                                        'placeholder' => 'Product Model No.',
                                                    ])
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div>
                                                    @include('components.form.input', [
                                                        'label' => 'Serial No',
                                                        'name' => 'serial_no',
                                                        'type' => 'text',
                                                        'placeholder' => 'Product Serial No.',
                                                    ])
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div class="mb-3">
                                                    @include('components.form.select', [
                                                        'label' => 'Category',
                                                        'name' => 'parent_category_id',
                                                        'options' => ['' => '--Select Category--'] + $parentCategories->toArray(),
                                                    ])
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div class="mb-3">
                                                    @include('components.form.select', [
                                                        'label' => 'Subcategory',
                                                        'name' => 'sub_category_id',
                                                        'options' => ['' => '--Select Category First--'],
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
                                            <div class="col-12 mb-3">
                                                <div>
                                                    <label for="short_description" class="form-label">Short Description</label>
                                                    <div id="short-description-editor" style="height: 200px;"></div>
                                                    <input type="hidden" name="short_description" id="short_description">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div>
                                                    <label for="full_description" class="form-label">Full Description</label>
                                                    <div id="full-description-editor" style="height: 300px;"></div>
                                                    <input type="hidden" name="full_description" id="full_description">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div>
                                                    <label for="technical_specification" class="form-label">Technical Specifications</label>
                                                    <div id="technical-specification-editor" style="height: 300px;"></div>
                                                    <input type="hidden" name="technical_specification" id="technical_specification">
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-6">
                                                <div class="mb-3">
                                                    @include('components.form.input', [
                                                        'label' => 'Brand Warranty',
                                                        'name' => 'brand_warranty',
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
                                                        'label' => 'Final Price (Calculated)',
                                                        'name' => 'final_price',
                                                        'type' => 'number',
                                                        'placeholder' => 'Auto-calculated',
                                                        'readonly' => true,
                                                    ])
                                                    <small class="text-muted">This field is automatically calculated based on selling price, discount, and tax</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card pb-4">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Inventory Details
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <div>
                                                    @include('components.form.input', [
                                                        'label' => 'Stock Quantity',
                                                        'name' => 'stock_quantity',
                                                        'type' => 'number',
                                                        'placeholder' => 'Enter Stock Quantity',
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
                                            <div class="col-lg-6">
                                                @include('components.form.select', [
                                                    'label' => 'Warehouse',
                                                    'name' => 'warehouse_id',
                                                    'options' =>
                                                        ['' => 'Select Warehouse'] + $warehouses->toArray(),
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>

                                            <div class="col-lg-6">
                                                @include('components.form.select', [
                                                    'label' => 'Warehouse Rack',
                                                    'name' => 'warehouse_rack_name',
                                                    'options' => ['' => 'First select Warehouse'],
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>

                                            <div class="col-lg-6">
                                                @include('components.form.select', [
                                                    'label' => 'Zone Area',
                                                    'name' => 'zone_area_id',
                                                    'options' => ['' => 'First select Rack'],
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>

                                            <div class="col-lg-6">
                                                @include('components.form.select', [
                                                    'label' => 'Rack No',
                                                    'name' => 'rack_no_id',
                                                    'options' => ['' => 'First select Zone Area'],
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>

                                            <div class="col-lg-6">
                                                @include('components.form.select', [
                                                    'label' => 'Level No',
                                                    'name' => 'level_no_id',
                                                    'options' => ['' => 'First select Rack No'],
                                                    'model' => isset($product) ? $product : null,
                                                ])
                                            </div>

                                            <div class="col-lg-6">
                                                @include('components.form.select', [
                                                    'label' => 'Position No',
                                                    'name' => 'position_no_id',
                                                    'options' => ['' => 'First select Level No'],
                                                    'model' => isset($product) ? $product : null,
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
                                                'name' => 'main_product_image',
                                                'type' => 'file',
                                                'placeholder' => 'Upload Main Product Image',
                                            ])
                                            <div id="emailHelp" class="text-danger">Image Size Should Be
                                                800x650
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="additional_product_images" class="form-label">Additional Product Images</label>
                                            <input type="file" class="form-control" name="additional_product_images[]" multiple accept="image/*">
                                            <div class="text-danger">Image Size Should Be 800x650</div>
                                        </div>

                                        <div class="mb-3">
                                            @include('components.form.input', [
                                                'label' => 'Product Datasheet or Manual',
                                                'name' => 'datasheet_manual',
                                                'type' => 'file',
                                                'placeholder' => 'Upload Product Datasheet or Manual',
                                            ])
                                            <div class="text-danger">PDF files only</div>
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

                                        @foreach($variationAttributes as $attribute)
                                            <div class="mb-3">
                                                <label for="variation_{{ $attribute->id }}" class="form-label">{{ $attribute->attribute_name }}</label>
                                                <select
                                                    id="variation_{{ $attribute->id }}"
                                                    name="variations[{{ $attribute->id }}][]"
                                                    class="form-select w-100"
                                                    multiple>
                                                    @foreach($attribute->values as $value)
                                                        <option value="{{ $value->id }}">{{ $value->attribute_value }}</option>
                                                    @endforeach
                                                </select>
                                                <small class="text-muted">Hold Ctrl/Cmd to select multiple values</small>
                                            </div>
                                        @endforeach
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
                                                'name' => 'status',
                                                'options' => [
                                                    '' => '--Select--',
                                                    'Active' => 'Active',
                                                    'Inactive' => 'Inactive',
                                                ],
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-start mb-3">
                                    <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                        Submit
                                    </button>
                                    <a href="{{ route('products.index') }}"
                                        class="btn btn-danger w-sm waves ripple-light">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div> 

    <!-- Include Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Include Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Quill editors
            var shortDescriptionQuill = new Quill('#short-description-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image']
                    ]
                }
            });

            var fullDescriptionQuill = new Quill('#full-description-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image']
                    ]
                }
            });

            var technicalSpecificationQuill = new Quill('#technical-specification-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image']
                    ]
                }
            });

            // Update hidden inputs when form is submitted
            $('form').on('submit', function() {
                $('#short_description').val(shortDescriptionQuill.root.innerHTML);
                $('#full_description').val(fullDescriptionQuill.root.innerHTML);
                $('#technical_specification').val(technicalSpecificationQuill.root.innerHTML);
            });

            // Warehouse -> Racks
            $('select[name="warehouse_id"]').on('change', function() {
                var id = $(this).val();
                $.get('/warehouse-dependent?type=rack&id=' + id, function(data) {
                    console.log(data);
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

            // Zone -> Rack No
            $('select[name="zone_area_id"]').on('change', function() {
                var id = $(this).val();
                $.get('/warehouse-dependent?type=rack_no&id=' + id, function(data) {
                    var select = $('select[name="rack_no_id"]');
                    select.empty().append('<option value="">--Select Rack No--</option>');
                    $.each(data, function(key, value) {
                        select.append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            });

            // Rack No -> Level
            $('select[name="rack_no_id"]').on('change', function() {
                var id = $(this).val();
                $.get('/warehouse-dependent?type=level&id=' + id, function(data) {
                    var select = $('select[name="level_no_id"]');
                    select.empty().append('<option value="">--Select Level--</option>');
                    $.each(data, function(key, value) {
                        select.append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            });

            // Level -> Position
            $('select[name="level_no_id"]').on('change', function() {
                var id = $(this).val();
                $.get('/warehouse-dependent?type=position&id=' + id, function(data) {
                    var select = $('select[name="position_no_id"]');
                    select.empty().append('<option value="">--Select Position--</option>');
                    $.each(data, function(key, value) {
                        select.append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            });

            // AJAX SKU Validation
            let skuTimeout = null;
            $('#sku').on('input', function() {
                const sku = $(this).val().trim();
                const $input = $(this);
                const $feedback = $('#sku-ajax-feedback');

                // Clear previous timeout
                if (skuTimeout) {
                    clearTimeout(skuTimeout);
                }

                // Remove existing feedback
                $feedback.remove();
                $input.removeClass('is-invalid is-valid');

                if (sku.length >= 2) {
                    skuTimeout = setTimeout(() => {
                        $.ajax({
                            url: '{{ route("product-list.check-sku") }}',
                            method: 'GET',
                            data: { sku: sku },
                            success: function(response) {
                                if (response.valid) {
                                    $input.removeClass('is-invalid').addClass('is-valid');
                                    $input.after('<div id="sku-ajax-feedback" class="valid-feedback">' + response.message + '</div>');
                                } else {
                                    $input.removeClass('is-valid').addClass('is-invalid');
                                    $input.after('<div id="sku-ajax-feedback" class="invalid-feedback">' + response.message + '</div>');
                                }
                            },
                            error: function() {
                                $input.removeClass('is-valid').addClass('is-invalid');
                                $input.after('<div id="sku-ajax-feedback" class="invalid-feedback">Error checking SKU availability</div>');
                            }
                        });
                    }, 500);
                }
            });

            // ========================================
            // Task 2: Category-Dependent Subcategory Filtering
            // ========================================
            $('select[name="parent_category_id"]').on('change', function() {
                var parentId = $(this).val();
                var subcategorySelect = $('select[name="sub_category_id"]');

                // Clear current subcategory selection
                subcategorySelect.empty();

                if (!parentId) {
                    subcategorySelect.append('<option value="">--Select Category First--</option>');
                    return;
                }

                // Show loading state
                subcategorySelect.append('<option value="">Loading...</option>');

                // Fetch subcategories via AJAX
                $.ajax({
                    url: '/category-dependent',
                    method: 'GET',
                    data: { parent_id: parentId },
                    success: function(data) {
                        subcategorySelect.empty().append('<option value="">--Select Subcategory--</option>');
                        $.each(data, function(key, value) {
                            subcategorySelect.append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function() {
                        subcategorySelect.empty().append('<option value="">Error loading subcategories</option>');
                        console.error('Error fetching subcategories');
                    }
                });
            });

            // ========================================
            // Task 3: Real-time Pricing Calculation
            // ========================================
            function calculateFinalPrice() {
                var sellingPrice = parseFloat($('input[name="selling_price"]').val()) || 0;
                var discountPrice = parseFloat($('input[name="discount_price"]').val()) || 0;
                var taxPercentage = parseFloat($('input[name="tax"]').val()) || 0;

                // Validation: discount price cannot be greater than selling price
                if (discountPrice > sellingPrice && sellingPrice > 0) {
                    alert('Discount price cannot be greater than selling price');
                    $('input[name="discount_price"]').val('');
                    discountPrice = 0;
                }

                // Validation: tax percentage cannot exceed 100%
                if (taxPercentage > 100) {
                    alert('Tax percentage cannot exceed 100%');
                    $('input[name="tax"]').val('');
                    taxPercentage = 0;
                }

                // Calculate base price
                // If discount price is entered: base_price = selling_price - discount_price
                // Otherwise: base_price = selling_price
                var basePrice = discountPrice > 0 ? (sellingPrice - discountPrice) : sellingPrice;

                // Apply tax: final_price = base_price + (base_price * tax_percentage / 100)
                var finalPrice = basePrice + (basePrice * taxPercentage / 100);

                // Update final price field (rounded to 2 decimal places)
                $('input[name="final_price"]').val(finalPrice.toFixed(2));
            }

            // Attach event listeners to pricing fields
            $('input[name="selling_price"], input[name="discount_price"], input[name="tax"]').on('keyup change', function() {
                calculateFinalPrice();
            });

            // Calculate on page load if values exist
            calculateFinalPrice();

        });
    </script>
@endsection
