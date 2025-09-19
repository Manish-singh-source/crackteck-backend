@extends('e-commerce/layouts/master')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Product Deal</h4>
            </div>
            <div>
                <a href="{{ route('product-deals.view', $productDeal) }}" class="btn btn-info me-2">
                    <i class="fa fa-eye"></i> View Deal
                </a>
                <a href="{{ route('product-deals.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Product Deal: {{ $productDeal->deal_title }}</h5>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('product-deals.update', $productDeal) }}" method="POST" id="productDealForm">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <!-- Product Selection -->
                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Select Product <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('ecommerce_product_id') is-invalid @enderror"
                                               placeholder="Search Product Name" id="productSearch" autocomplete="off"
                                               value="{{ $productDeal->ecommerceProduct->warehouseProduct->product_name }}">
                                        <button type="button" class="btn btn-secondary" id="browseProducts">
                                            <i class="fa fa-search"></i> Browse
                                        </button>
                                    </div>
                                    <input type="hidden" name="ecommerce_product_id" id="selectedProductId"
                                           value="{{ old('ecommerce_product_id', $productDeal->ecommerce_product_id) }}">
                                    <div id="productSearchResults" class="dropdown-menu w-100" style="display: none;"></div>
                                    @error('ecommerce_product_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deal Title -->
                                <div class="col-lg-6">
                                    @include('components.form.input', [
                                        'label' => 'Deal Title',
                                        'name' => 'deal_title',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Deal Title (e.g., Diwali Mega Offer)',
                                        'model' => $productDeal,
                                    ])
                                </div>

                                <!-- Original Price (Read-only) -->
                                <div class="col-lg-6">
                                    <label class="form-label">Original Price</label>
                                    <input type="text" class="form-control" id="originalPrice"
                                           value="₹{{ number_format($productDeal->original_price, 0) }}" readonly>
                                </div>

                                <!-- Discount Type -->
                                <div class="col-lg-6">
                                    <label class="form-label">Discount Type <span class="text-danger">*</span></label>
                                    <select class="form-select @error('discount_type') is-invalid @enderror" name="discount_type" id="discountType">
                                        <option value="">Select Discount Type</option>
                                        <option value="percentage" {{ old('discount_type', $productDeal->discount_type) == 'percentage' ? 'selected' : '' }}>By Percentage (%)</option>
                                        <option value="price" {{ old('discount_type', $productDeal->discount_type) == 'price' ? 'selected' : '' }}>By Price (₹)</option>
                                    </select>
                                    @error('discount_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Discount Value -->
                                <div class="col-lg-6">
                                    <label class="form-label">
                                        Discount Value <span class="text-danger">*</span>
                                        <span id="discountLabel">
                                            @if($productDeal->discount_type == 'percentage')
                                                (Enter percentage 0-100)
                                            @elseif($productDeal->discount_type == 'price')
                                                (Enter amount in ₹)
                                            @else
                                                (Select discount type first)
                                            @endif
                                        </span>
                                    </label>
                                    <input type="number" class="form-control @error('discount_value') is-invalid @enderror"
                                           name="discount_value" id="discountValue" placeholder="Enter discount value"
                                           step="0.01" min="0" value="{{ old('discount_value', $productDeal->discount_value) }}">
                                    @error('discount_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Offer Price (Auto-calculated) -->
                                <div class="col-lg-6">
                                    <label class="form-label">Offer Price (Auto-calculated)</label>
                                    <input type="text" class="form-control" id="offerPrice"
                                           value="₹{{ number_format($productDeal->offer_price, 0) }}" readonly>
                                </div>

                                <!-- Start Date -->
                                <div class="col-lg-6">
                                    @include('components.form.input', [
                                        'label' => 'Offer Start Date',
                                        'name' => 'start_date',
                                        'type' => 'date',
                                        'model' => $productDeal,
                                    ])
                                </div>

                                <!-- End Date -->
                                <div class="col-lg-6">
                                    @include('components.form.input', [
                                        'label' => 'Offer End Date',
                                        'name' => 'end_date',
                                        'type' => 'date',
                                        'model' => $productDeal,
                                    ])
                                </div>

                                <!-- Status -->
                                <div class="col-lg-6">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status', $productDeal->status) == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $productDeal->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Buttons -->
                                <div class="col-12">
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> Update Deal
                                        </button>
                                        <a href="{{ route('product-deals.view', $productDeal) }}" class="btn btn-info ms-2">
                                            <i class="fa fa-eye"></i> View Deal
                                        </a>
                                        <a href="{{ route('product-deals.index') }}" class="btn btn-secondary ms-2">
                                            <i class="fa fa-times"></i> Cancel
                                        </a>
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

@endsection

@section('script')
<script>
$(document).ready(function() {
    // Initialize with existing product data
    let selectedProduct = {
        id: {{ $productDeal->ecommerce_product_id }},
        name: "{{ $productDeal->ecommerceProduct->warehouseProduct->product_name }}",
        selling_price: {{ $productDeal->original_price }},
        brand: "{{ $productDeal->ecommerceProduct->warehouseProduct->brand->brand_title ?? 'N/A' }}",
        image: "{{ $productDeal->ecommerceProduct->warehouseProduct->main_product_image ?? '' }}"
    };

    let searchTimeout = null;

    // Product search functionality
    $('#productSearch').on('input', function() {
        const query = $(this).val();

        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }

        if (query.length >= 2) {
            searchTimeout = setTimeout(() => {
                searchProducts(query);
            }, 300);
        } else {
            $('#productSearchResults').hide();
        }
    });

    // Search products via AJAX
    function searchProducts(query) {
        $.ajax({
            url: '{{ route("product-deals.search-products") }}',
            method: 'GET',
            data: { search: query },
            success: function(products) {
                displaySearchResults(products);
            },
            error: function() {
                $('#productSearchResults').html('<div class="dropdown-item text-danger">Error searching products</div>').show();
            }
        });
    }

    // Display search results
    function displaySearchResults(products) {
        const resultsContainer = $('#productSearchResults');

        if (products.length === 0) {
            resultsContainer.html('<div class="dropdown-item text-muted">No products found</div>').show();
            return;
        }

        let html = '';
        products.forEach(product => {
            html += `
                <div class="dropdown-item product-item" data-product='${JSON.stringify(product)}' style="cursor: pointer;">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            ${product.image ? `<img src="${product.image}" alt="${product.name}" style="width: 40px; height: 40px; object-fit: cover;">` : '<div style="width: 40px; height: 40px; background: #f0f0f0; display: flex; align-items: center; justify-content: center;"><i class="fa fa-image"></i></div>'}
                        </div>
                        <div>
                            <div class="fw-semibold">${product.name}</div>
                            <small class="text-muted">Brand: ${product.brand} | Price: ₹${parseFloat(product.selling_price).toLocaleString()}</small>
                        </div>
                    </div>
                </div>
            `;
        });

        resultsContainer.html(html).show();
    }

    // Handle product selection
    $(document).on('click', '.product-item', function() {
        selectedProduct = JSON.parse($(this).attr('data-product'));

        $('#productSearch').val(selectedProduct.name);
        $('#selectedProductId').val(selectedProduct.id);
        $('#originalPrice').val('₹' + parseFloat(selectedProduct.selling_price).toLocaleString());
        $('#productSearchResults').hide();

        // Reset calculations
        calculateOfferPrice();
    });

    // Hide search results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('#productSearch, #productSearchResults').length) {
            $('#productSearchResults').hide();
        }
    });

    // Discount type change handler
    $('#discountType').on('change', function() {
        const discountType = $(this).val();
        const discountLabel = $('#discountLabel');
        const discountValue = $('#discountValue');

        if (discountType === 'percentage') {
            discountLabel.text('(Enter percentage 0-100)');
            discountValue.attr('max', '100').attr('placeholder', 'Enter percentage (e.g., 25)');
        } else if (discountType === 'price') {
            discountLabel.text('(Enter amount in ₹)');
            discountValue.removeAttr('max').attr('placeholder', 'Enter discount amount (e.g., 5000)');
        } else {
            discountLabel.text('(Select discount type first)');
            discountValue.attr('placeholder', 'Enter discount value');
        }

        calculateOfferPrice();
    });

    // Discount value change handler
    $('#discountValue').on('input', function() {
        calculateOfferPrice();
    });

    // Calculate offer price
    function calculateOfferPrice() {
        if (!selectedProduct) {
            $('#offerPrice').val('Select product first');
            return;
        }

        const originalPrice = parseFloat(selectedProduct.selling_price);
        const discountType = $('#discountType').val();
        const discountValue = parseFloat($('#discountValue').val()) || 0;

        if (!discountType || discountValue <= 0) {
            $('#offerPrice').val('₹' + originalPrice.toLocaleString());
            return;
        }

        let offerPrice = 0;
        let isValid = true;
        let errorMessage = '';

        if (discountType === 'percentage') {
            if (discountValue > 100) {
                isValid = false;
                errorMessage = 'Percentage cannot exceed 100%';
            } else {
                offerPrice = originalPrice - (originalPrice * discountValue / 100);
            }
        } else if (discountType === 'price') {
            if (discountValue > originalPrice) {
                isValid = false;
                errorMessage = 'Discount amount cannot exceed original price';
            } else {
                offerPrice = originalPrice - discountValue;
            }
        }

        if (!isValid) {
            $('#offerPrice').val(errorMessage).addClass('text-danger');
            return;
        }

        if (offerPrice < 0) {
            $('#offerPrice').val('Invalid: Negative price').addClass('text-danger');
            return;
        }

        $('#offerPrice').val('₹' + offerPrice.toLocaleString()).removeClass('text-danger');
    }

    // Form validation
    $('#productDealForm').on('submit', function(e) {
        let isValid = true;
        let errorMessages = [];

        // Check if product is selected
        if (!$('#selectedProductId').val()) {
            isValid = false;
            errorMessages.push('Please select a product');
        }

        // Check if offer price is valid
        const offerPriceText = $('#offerPrice').val();
        if (offerPriceText.includes('Invalid') || offerPriceText.includes('exceed') || offerPriceText.includes('Select')) {
            isValid = false;
            errorMessages.push('Please fix the offer price calculation');
        }

        // Check date validation
        const startDate = new Date($('#start_date').val());
        const endDate = new Date($('#end_date').val());

        if (startDate && endDate && startDate >= endDate) {
            isValid = false;
            errorMessages.push('End date must be after start date');
        }

        if (!isValid) {
            e.preventDefault();
            alert('Please fix the following errors:\n' + errorMessages.join('\n'));
        }
    });

    // Update end date minimum when start date changes
    $('#start_date').on('change', function() {
        const startDate = $(this).val();
        if (startDate) {
            $('#end_date').attr('min', startDate);
        }
    });

    // Initialize calculations on page load
    calculateOfferPrice();
});
</script>
@endsection