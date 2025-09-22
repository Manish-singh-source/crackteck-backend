@extends('e-commerce/layouts/master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h4>
            </div>
        </div>

        <!-- Success/Error Messages -->
        <div id="alert-container"></div>

        <form id="orderForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- Product Selection Card -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">Product Selection</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="product_search" class="form-label">Search Product <span class="text-danger">*</span></label>
                                        <input type="text" id="product_search" class="form-control" 
                                               value="{{ $order->product->warehouseProduct->product_name ?? '' }}" 
                                               placeholder="Type to search products..." autocomplete="off">
                                        <input type="hidden" id="product_id" name="product_id" value="{{ $order->product_id }}" required>
                                        <div id="product_suggestions" class="dropdown-menu w-100" style="display: none;"></div>
                                        <div class="invalid-feedback" id="product_id_error"></div>
                                    </div>
                                    
                                    <!-- Selected Product Details -->
                                    <div id="selected_product" style="{{ $order->product ? 'display: block;' : 'display: none;' }}">
                                        <div class="alert alert-info">
                                            <h6>Selected Product:</h6>
                                            <p class="mb-1"><strong>Name:</strong> <span id="selected_product_name">{{ $order->product->warehouseProduct->product_name ?? '' }}</span></p>
                                            <p class="mb-1"><strong>SKU:</strong> <span id="selected_product_sku">{{ $order->product->warehouseProduct->sku ?? '' }}</span></p>
                                            <p class="mb-1"><strong>Brand:</strong> <span id="selected_product_brand">{{ $order->product->warehouseProduct->brand->brand_title ?? 'N/A' }}</span></p>
                                            <p class="mb-0"><strong>Price:</strong> ₹<span id="selected_product_price">{{ $order->product->warehouseProduct->selling_price ?? '' }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Information Card -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <h5 class="card-title mb-0">Customer Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="customer_search" class="form-label">Search Customer <span class="text-danger">*</span></label>
                                        <input type="text" id="customer_search" class="form-control" 
                                               value="{{ $order->customer->first_name ?? '' }} {{ $order->customer->last_name ?? '' }}" 
                                               placeholder="Type to search customers..." autocomplete="off">
                                        <input type="hidden" id="customer_id" name="customer_id" value="{{ $order->customer_id }}" required>
                                        <div id="customer_suggestions" class="dropdown-menu w-100" style="display: none;"></div>
                                        <div class="invalid-feedback" id="customer_id_error"></div>
                                    </div>
                                    
                                    <!-- Customer Details (Auto-filled) -->
                                    <div id="customer_details" style="{{ $order->customer ? 'display: block;' : 'display: none;' }}">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" id="customer_name" class="form-control" 
                                                       value="{{ $order->customer->first_name ?? '' }} {{ $order->customer->last_name ?? '' }}" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" id="customer_email" class="form-control" 
                                                       value="{{ $order->customer->email ?? '' }}" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Phone</label>
                                                <input type="text" id="customer_phone" class="form-control" 
                                                       value="{{ $order->customer->phone ?? '' }}" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Company</label>
                                                <input type="text" id="customer_company" class="form-control" 
                                                       value="{{ $order->customer->company_name ?? '' }}" readonly>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Address</label>
                                                <textarea id="customer_address" class="form-control" rows="2" readonly>{{ $order->customer->company_addr ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Upload Card -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">Invoice Upload</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="invoice_file" class="form-label">Invoice File</label>
                                    <input type="file" id="invoice_file" name="invoice_file" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                                    <div class="form-text">Accepted formats: PDF, JPG, PNG (Max: 2MB). Leave empty to keep current file.</div>
                                    <div class="invalid-feedback" id="invoice_file_error"></div>
                                    
                                    @if($order->invoice_file)
                                        <div class="mt-2">
                                            <small class="text-muted">Current file: </small>
                                            <a href="{{ asset('storage/' . $order->invoice_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-file-alt me-1"></i> View Current Invoice
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Amount Card -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">Order Amount</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" id="amount" name="amount" class="form-control" 
                                               step="0.01" min="0.01" value="{{ $order->amount }}" 
                                               placeholder="0.00" required>
                                    </div>
                                    <div class="invalid-feedback" id="amount_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="col-12">
                        <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success me-2" id="submitBtn">
                                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true" style="display: none;"></span>
                                Update Order
                            </button>
                            <a href="{{ route('order.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    let productSearchTimeout;
    let customerSearchTimeout;

    // Product Search Autocomplete
    $('#product_search').on('input', function() {
        const query = $(this).val();

        clearTimeout(productSearchTimeout);

        if (query.length < 2) {
            $('#product_suggestions').hide();
            return;
        }

        productSearchTimeout = setTimeout(function() {
            $.ajax({
                url: '/api/search-product',
                method: 'GET',
                data: { q: query },
                success: function(data) {
                    let suggestions = '';
                    data.forEach(function(product) {
                        suggestions += `<a href="#" class="dropdown-item product-suggestion" data-id="${product.id}" data-name="${product.name}" data-sku="${product.sku}" data-brand="${product.brand}" data-price="${product.price}">${product.display}</a>`;
                    });

                    if (suggestions) {
                        $('#product_suggestions').html(suggestions).show();
                    } else {
                        $('#product_suggestions').html('<div class="dropdown-item-text">No products found</div>').show();
                    }
                }
            });
        }, 300);
    });

    // Product Selection
    $(document).on('click', '.product-suggestion', function(e) {
        e.preventDefault();
        const product = $(this);

        $('#product_search').val(product.data('name'));
        $('#product_id').val(product.data('id'));
        $('#selected_product_name').text(product.data('name'));
        $('#selected_product_sku').text(product.data('sku'));
        $('#selected_product_brand').text(product.data('brand'));
        $('#selected_product_price').text(product.data('price'));

        $('#selected_product').show();
        $('#product_suggestions').hide();

        // Auto-fill amount with product price
        $('#amount').val(product.data('price'));
    });

    // Customer Search Autocomplete
    $('#customer_search').on('input', function() {
        const query = $(this).val();

        clearTimeout(customerSearchTimeout);

        if (query.length < 2) {
            $('#customer_suggestions').hide();
            return;
        }

        customerSearchTimeout = setTimeout(function() {
            $.ajax({
                url: '/api/search-customer',
                method: 'GET',
                data: { q: query },
                success: function(data) {
                    let suggestions = '';
                    data.forEach(function(customer) {
                        suggestions += `<a href="#" class="dropdown-item customer-suggestion"
                            data-id="${customer.id}"
                            data-name="${customer.name}"
                            data-email="${customer.email}"
                            data-phone="${customer.phone}"
                            data-company="${customer.company_name}"
                            data-address="${customer.company_addr}">${customer.display}</a>`;
                    });

                    if (suggestions) {
                        $('#customer_suggestions').html(suggestions).show();
                    } else {
                        $('#customer_suggestions').html('<div class="dropdown-item-text">No customers found</div>').show();
                    }
                }
            });
        }, 300);
    });

    // Customer Selection
    $(document).on('click', '.customer-suggestion', function(e) {
        e.preventDefault();
        const customer = $(this);

        $('#customer_search').val(customer.data('name'));
        $('#customer_id').val(customer.data('id'));
        $('#customer_name').val(customer.data('name'));
        $('#customer_email').val(customer.data('email'));
        $('#customer_phone').val(customer.data('phone'));
        $('#customer_company').val(customer.data('company'));
        $('#customer_address').val(customer.data('address'));

        $('#customer_details').show();
        $('#customer_suggestions').hide();
    });

    // Hide suggestions when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#product_search, #product_suggestions').length) {
            $('#product_suggestions').hide();
        }
        if (!$(e.target).closest('#customer_search, #customer_suggestions').length) {
            $('#customer_suggestions').hide();
        }
    });

    // Form Submission
    $('#orderForm').on('submit', function(e) {
        e.preventDefault();

        // Clear previous errors
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        $('#alert-container').empty();

        const submitBtn = $('#submitBtn');
        const spinner = submitBtn.find('.spinner-border');

        submitBtn.prop('disabled', true);
        spinner.show();

        const formData = new FormData(this);

        $.ajax({
            url: '{{ route("order.update", $order->id) }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#alert-container').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${response.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);

                    setTimeout(function() {
                        window.location.href = response.redirect;
                    }, 1500);
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;

                    Object.keys(errors).forEach(function(field) {
                        const input = $(`#${field}`);
                        const errorDiv = $(`#${field}_error`);

                        input.addClass('is-invalid');
                        errorDiv.text(errors[field][0]);
                    });
                } else {
                    const message = xhr.responseJSON?.message || 'An error occurred while updating the order.';
                    $('#alert-container').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `);
                }
            },
            complete: function() {
                submitBtn.prop('disabled', false);
                spinner.hide();
            }
        });
    });
});
</script>

@endsection
