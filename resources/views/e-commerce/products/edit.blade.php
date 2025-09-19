@extends('e-commerce/layouts/master')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit E-commerce Product</h4>
                <p class="text-muted">Update product information for both warehouse and e-commerce</p>
            </div>
            <div>
                <a href="{{ route('ec.product.view', $product->id) }}" class="btn btn-secondary">View Product</a>
                <a href="{{ route('ec.product.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <form id="editProductForm" action="{{ route('ec.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-8">
                    <!-- Warehouse Product Information (Read-only) -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Warehouse Product Information</h5>
                            <p class="text-muted mb-0">This information comes from the linked warehouse product</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->product_name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Warehouse SKU</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->sku }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">E-commerce SKU <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku"
                                        placeholder="Enter unique SKU for e-commerce" value="{{ old('sku', $product->sku) }}">
                                    @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Brand</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->brand->brand_title ?? 'N/A' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Model No</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->model_no ?? 'N/A' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->parentCategorie->parent_categories ?? 'N/A' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Sub Category</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->subCategorie->sub_categorie ?? 'N/A' }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Stock Quantity</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->stock_quantity ?? 0 }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Selling Price</label>
                                    <input type="text" class="form-control" value="{{ $product->warehouseProduct->selling_price ? '₹' . number_format($product->warehouseProduct->selling_price, 2) : 'N/A' }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Information -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">SEO Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                           value="{{ old('meta_title', $product->meta_title) }}"
                                           placeholder="Enter meta title for SEO">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3"
                                              placeholder="Enter meta description for SEO">{{ old('meta_description', $product->meta_description) }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="meta_keywords">Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                           value="{{ old('meta_keywords', $product->meta_keywords) }}"
                                           placeholder="Enter meta keywords separated by commas">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="meta_product_url_slug">URL Slug</label>
                                    <input type="text" class="form-control" id="meta_product_url_slug" name="meta_product_url_slug"
                                           value="{{ old('meta_product_url_slug', $product->meta_product_url_slug) }}"
                                           placeholder="Enter URL slug (auto-generated if empty)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- E-commerce Descriptions -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">E-commerce Descriptions</h5>
                            <p class="text-muted mb-0">These descriptions are specific to e-commerce and can be different from warehouse descriptions</p>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="ecommerce_short_description">E-commerce Short Description</label>
                                    <textarea class="form-control" id="ecommerce_short_description" name="ecommerce_short_description" rows="3"
                                              placeholder="Enter short description for e-commerce">{{ old('ecommerce_short_description', $product->ecommerce_short_description) }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="ecommerce_full_description">E-commerce Full Description</label>
                                    <textarea class="form-control" id="ecommerce_full_description" name="ecommerce_full_description" rows="5"
                                              placeholder="Enter full description for e-commerce">{{ old('ecommerce_full_description', $product->ecommerce_full_description) }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="ecommerce_technical_specification">E-commerce Technical Specification</label>
                                    <textarea class="form-control" id="ecommerce_technical_specification" name="ecommerce_technical_specification" rows="5"
                                              placeholder="Enter technical specifications for e-commerce">{{ old('ecommerce_technical_specification', $product->ecommerce_technical_specification) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory & Order Management -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Inventory & Order Management</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="min_order_qty">Minimum Order Quantity</label>
                                    <input type="number" class="form-control" id="min_order_qty" name="min_order_qty"
                                           value="{{ old('min_order_qty', $product->min_order_qty) }}"
                                           placeholder="Enter minimum order quantity" min="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="max_order_qty">Maximum Order Quantity</label>
                                    <input type="number" class="form-control" id="max_order_qty" name="max_order_qty"
                                           value="{{ old('max_order_qty', $product->max_order_qty) }}"
                                           placeholder="Enter maximum order quantity" min="1">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="company_warranty">Company Warranty</label>
                                    <input type="text" class="form-control" id="company_warranty" name="company_warranty"
                                           value="{{ old('company_warranty', $product->company_warranty) }}"
                                           placeholder="Enter company warranty details">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Details -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Shipping Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="product_weight">Product Weight</label>
                                    <input type="text" class="form-control" id="product_weight" name="product_weight"
                                           value="{{ old('product_weight', $product->product_weight) }}"
                                           placeholder="e.g., 2.5 kg">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="product_dimensions">Product Dimensions</label>
                                    <input type="text" class="form-control" id="product_dimensions" name="product_dimensions"
                                           value="{{ old('product_dimensions', $product->product_dimensions) }}"
                                           placeholder="e.g., 30x20x15 cm">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="shipping_charges">Shipping Charges</label>
                                    <input type="number" step="0.01" class="form-control" id="shipping_charges" name="shipping_charges"
                                           value="{{ old('shipping_charges', $product->shipping_charges) }}"
                                           placeholder="Enter shipping charges">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="shipping_class">Shipping Class</label>
                                    <select class="form-select" id="shipping_class" name="shipping_class">
                                        <option value="">Select Shipping Class</option>
                                        <option value="Light" {{ old('shipping_class', $product->shipping_class) == 'Light' ? 'selected' : '' }}>Light</option>
                                        <option value="Heavy" {{ old('shipping_class', $product->shipping_class) == 'Heavy' ? 'selected' : '' }}>Heavy</option>
                                        <option value="Fragile" {{ old('shipping_class', $product->shipping_class) == 'Fragile' ? 'selected' : '' }}>Fragile</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Installation Options -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Installation Options</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Installation Options</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="installation_options[]" value="Basic Installation" id="basic_installation"
                                                       {{ (is_array(old('installation_options', $product->with_installation)) && in_array('Basic Installation', old('installation_options', $product->with_installation))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="basic_installation">
                                                    Basic Installation
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="installation_options[]" value="Advanced Installation" id="advanced_installation"
                                                       {{ (is_array(old('installation_options', $product->with_installation)) && in_array('Advanced Installation', old('installation_options', $product->with_installation))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="advanced_installation">
                                                    Advanced Installation
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="installation_options[]" value="Professional Setup" id="professional_setup"
                                                       {{ (is_array(old('installation_options', $product->with_installation)) && in_array('Professional Setup', old('installation_options', $product->with_installation))) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="professional_setup">
                                                    Professional Setup
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Tags -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Product Tags</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="product_tags">Product Tags</label>
                                    <input type="text" class="form-control" id="product_tags" name="product_tags"
                                           value="{{ old('product_tags', is_array($product->product_tags) ? implode(', ', $product->product_tags) : $product->product_tags) }}"
                                           placeholder="Enter tags separated by commas (e.g., bestseller, featured, new)">
                                    <small class="text-muted">Separate multiple tags with commas</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Product Images -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Product Images</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="product_images">Product Images</label>
                                <input type="file" class="form-control" id="product_images" name="product_images[]" multiple accept="image/*">
                                <small class="text-muted">Upload multiple images. Supported formats: JPG, PNG, GIF</small>
                            </div>
                            @if($product->product_images && is_array($product->product_images))
                                <div class="current-images">
                                    <label class="form-label">Current Images:</label>
                                    <div class="row">
                                        @foreach($product->product_images as $index => $image)
                                            <div class="col-6 mb-2">
                                                <div class="position-relative">
                                                    <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail" style="width: 100%; height: 80px; object-fit: cover;">
                                                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                            onclick="removeImage({{ $index }})" style="padding: 2px 6px; font-size: 10px;">
                                                        <i class="mdi mdi-close"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- E-commerce Status & Flags -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">E-commerce Status & Flags</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ecommerce_status">E-commerce Status</label>
                                <select class="form-select" id="ecommerce_status" name="ecommerce_status">
                                    <option value="draft" {{ old('ecommerce_status', $product->ecommerce_status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="active" {{ old('ecommerce_status', $product->ecommerce_status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('ecommerce_status', $product->ecommerce_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                               {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_featured">Featured</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="is_best_seller" name="is_best_seller" value="1"
                                               {{ old('is_best_seller', $product->is_best_seller) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_best_seller">Best Seller</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="is_suggested" name="is_suggested" value="1"
                                               {{ old('is_suggested', $product->is_suggested) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_suggested">Suggested</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="is_todays_deal" name="is_todays_deal" value="1"
                                               {{ old('is_todays_deal', $product->is_todays_deal) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_todays_deal">Today's Deal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sales Information -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Sales Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="total_sold">Total Sold</label>
                                <input type="number" class="form-control" id="total_sold" name="total_sold"
                                       value="{{ old('total_sold', $product->total_sold) }}"
                                       placeholder="Enter total sold quantity" min="0">
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save me-1"></i>
                                    Update Product
                                </button>
                                <a href="{{ route('ec.product.view', $product->id) }}" class="btn btn-secondary">
                                    <i class="mdi mdi-eye me-1"></i>
                                    View Product
                                </a>
                                <a href="{{ route('ec.product.index') }}" class="btn btn-outline-secondary">
                                    <i class="mdi mdi-arrow-left me-1"></i>
                                    Back to List
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
</div> <!-- content -->

@endsection

@section('scripts')
<script>
// Handle product tags input
document.getElementById('product_tags').addEventListener('input', function(e) {
    // Auto-format tags as user types
    let value = e.target.value;
    // Remove extra spaces and ensure proper comma separation
    value = value.replace(/\s*,\s*/g, ', ').replace(/,+/g, ',');
    if (value !== e.target.value) {
        e.target.value = value;
    }
});

// Handle installation options
document.querySelectorAll('input[name="installation_options[]"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        // You can add any additional logic here if needed
        console.log('Installation option changed:', this.value, this.checked);
    });
});

// Handle image removal
function removeImage(index) {
    if (confirm('Are you sure you want to remove this image?')) {
        // Create a hidden input to mark this image for removal
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'remove_images[]';
        hiddenInput.value = index;
        document.getElementById('editProductForm').appendChild(hiddenInput);

        // Hide the image container
        event.target.closest('.col-6').style.display = 'none';
    }
}

// Form validation
document.getElementById('editProductForm').addEventListener('submit', function(e) {
    let isValid = true;
    const requiredFields = ['meta_title', 'ecommerce_status'];

    requiredFields.forEach(function(fieldName) {
        const field = document.getElementById(fieldName);
        if (field && !field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else if (field) {
            field.classList.remove('is-invalid');
        }
    });

    if (!isValid) {
        e.preventDefault();
        alert('Please fill in all required fields.');
        return false;
    }

    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="mdi mdi-loading mdi-spin me-1"></i> Updating...';
    submitBtn.disabled = true;

    // Re-enable button after 10 seconds as fallback
    setTimeout(function() {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 10000);
});

// Auto-generate URL slug from meta title
document.getElementById('meta_title').addEventListener('input', function(e) {
    const slugField = document.getElementById('meta_product_url_slug');
    if (!slugField.value || slugField.dataset.autoGenerated === 'true') {
        const slug = e.target.value
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        slugField.value = slug;
        slugField.dataset.autoGenerated = 'true';
    }
});

// AJAX SKU Validation for E-commerce Product Edit
let skuTimeout = null;
$('#sku').on('input', function() {
    const sku = $(this).val().trim();
    const $input = $(this);
    const $feedback = $('#sku-ajax-feedback');
    const productId = '{{ $product->id }}'; // Current product ID

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
                url: '{{ route("ec.product.check-sku") }}',
                method: 'GET',
                data: {
                    sku: sku,
                    product_id: productId // Exclude current product from check
                },
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

// Mark slug as manually edited if user types in it
document.getElementById('meta_product_url_slug').addEventListener('input', function(e) {
    if (e.target.value) {
        e.target.dataset.autoGenerated = 'false';
    }
});
</script>
@endsection