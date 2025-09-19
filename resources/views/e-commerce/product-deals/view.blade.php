@extends('e-commerce/layouts/master')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Product Deal Details</h4>
                <p class="text-muted">View complete information about this product deal</p>
            </div>
            <div>
                <a href="{{ route('product-deals.edit', $productDeal) }}" class="btn btn-warning me-2">
                    <i class="fa fa-edit"></i> Edit Deal
                </a>
                <a href="{{ route('product-deals.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <div class="row">
            <!-- Deal Information Card -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fa fa-tag me-2"></i>{{ $productDeal->deal_title }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Product Information -->
                            <div class="col-md-6">
                                <h6 class="text-muted mb-3">Product Information</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        @if($productDeal->ecommerceProduct->warehouseProduct->main_product_image)
                                            <img src="{{ asset($productDeal->ecommerceProduct->warehouseProduct->main_product_image) }}" 
                                                 alt="{{ $productDeal->ecommerceProduct->warehouseProduct->product_name }}" 
                                                 style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                                        @else
                                            <div style="width: 80px; height: 80px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                                <i class="fa fa-image fa-2x text-muted"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="mb-1">{{ $productDeal->ecommerceProduct->warehouseProduct->product_name }}</h6>
                                        <p class="text-muted mb-1">
                                            <strong>Brand:</strong> {{ $productDeal->ecommerceProduct->warehouseProduct->brand->brand_title ?? 'N/A' }}
                                        </p>
                                        <p class="text-muted mb-0">
                                            <strong>SKU:</strong> {{ $productDeal->ecommerceProduct->warehouseProduct->sku ?? 'N/A' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Information -->
                            <div class="col-md-6">
                                <h6 class="text-muted mb-3">Pricing Details</h6>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center p-3 bg-light rounded">
                                            <h4 class="text-muted mb-1">₹{{ number_format($productDeal->original_price, 0) }}</h4>
                                            <small class="text-muted">Original Price</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center p-3 bg-success-subtle rounded">
                                            <h4 class="text-success mb-1">₹{{ number_format($productDeal->offer_price, 0) }}</h4>
                                            <small class="text-success">Offer Price</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <span class="badge bg-primary fs-6 px-3 py-2">
                                        {{ $productDeal->discount_display }} OFF
                                    </span>
                                    <div class="mt-2">
                                        <small class="text-success">
                                            <i class="fa fa-arrow-down"></i> 
                                            You save ₹{{ number_format($productDeal->savings_amount, 0) }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Deal Timeline -->
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="text-muted mb-2">Deal Period</h6>
                                <p class="mb-1">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i>
                                    <strong>Start:</strong> {{ $productDeal->start_date->format('M d, Y') }}
                                </p>
                                <p class="mb-0">
                                    <i class="fa fa-calendar-alt text-danger me-2"></i>
                                    <strong>End:</strong> {{ $productDeal->end_date->format('M d, Y') }}
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-muted mb-2">Time Remaining</h6>
                                @php
                                    $timeLeft = $productDeal->time_left;
                                    $badgeClass = 'bg-info';
                                    if (str_contains($timeLeft, 'Expired')) {
                                        $badgeClass = 'bg-danger';
                                    } elseif (str_contains($timeLeft, 'day')) {
                                        $badgeClass = 'bg-success';
                                    } elseif (str_contains($timeLeft, ':')) {
                                        $badgeClass = 'bg-warning';
                                    }
                                @endphp
                                <span class="badge {{ $badgeClass }} fs-6 px-3 py-2">{{ $timeLeft }}</span>
                            </div>
                            <div class="col-md-4">
                                <h6 class="text-muted mb-2">Status</h6>
                                @if($productDeal->status === 'active')
                                    <span class="badge bg-success fs-6 px-3 py-2">
                                        <i class="fa fa-check-circle me-1"></i>Active
                                    </span>
                                @else
                                    <span class="badge bg-danger fs-6 px-3 py-2">
                                        <i class="fa fa-times-circle me-1"></i>Inactive
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Panel -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fa fa-cogs me-2"></i>Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('product-deals.edit', $productDeal) }}" class="btn btn-warning">
                                <i class="fa fa-edit me-2"></i>Edit Deal
                            </a>
                            
                            @if($productDeal->status === 'active')
                                <form action="{{ route('product-deals.update', $productDeal) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="ecommerce_product_id" value="{{ $productDeal->ecommerce_product_id }}">
                                    <input type="hidden" name="deal_title" value="{{ $productDeal->deal_title }}">
                                    <input type="hidden" name="discount_type" value="{{ $productDeal->discount_type }}">
                                    <input type="hidden" name="discount_value" value="{{ $productDeal->discount_value }}">
                                    <input type="hidden" name="start_date" value="{{ $productDeal->start_date->format('Y-m-d') }}">
                                    <input type="hidden" name="end_date" value="{{ $productDeal->end_date->format('Y-m-d') }}">
                                    <input type="hidden" name="status" value="inactive">
                                    <button type="submit" class="btn btn-secondary w-100" onclick="return confirm('Are you sure you want to deactivate this deal?')">
                                        <i class="fa fa-pause me-2"></i>Deactivate Deal
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('product-deals.update', $productDeal) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="ecommerce_product_id" value="{{ $productDeal->ecommerce_product_id }}">
                                    <input type="hidden" name="deal_title" value="{{ $productDeal->deal_title }}">
                                    <input type="hidden" name="discount_type" value="{{ $productDeal->discount_type }}">
                                    <input type="hidden" name="discount_value" value="{{ $productDeal->discount_value }}">
                                    <input type="hidden" name="start_date" value="{{ $productDeal->start_date->format('Y-m-d') }}">
                                    <input type="hidden" name="end_date" value="{{ $productDeal->end_date->format('Y-m-d') }}">
                                    <input type="hidden" name="status" value="active">
                                    <button type="submit" class="btn btn-success w-100" onclick="return confirm('Are you sure you want to activate this deal?')">
                                        <i class="fa fa-play me-2"></i>Activate Deal
                                    </button>
                                </form>
                            @endif
                            
                            <form action="{{ route('product-deals.delete', $productDeal) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this deal? This action cannot be undone.')">
                                    <i class="fa fa-trash me-2"></i>Delete Deal
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Deal Statistics -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fa fa-chart-bar me-2"></i>Deal Statistics
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6">
                                <div class="border-end">
                                    <h4 class="text-primary mb-1">{{ $productDeal->discount_type === 'percentage' ? $productDeal->discount_value . '%' : '₹' . number_format($productDeal->discount_value, 0) }}</h4>
                                    <small class="text-muted">Discount</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4 class="text-success mb-1">₹{{ number_format($productDeal->savings_amount, 0) }}</h4>
                                <small class="text-muted">Savings</small>
                            </div>
                        </div>
                        <hr>
                        <div class="text-center">
                            <small class="text-muted">
                                Created: {{ $productDeal->created_at->format('M d, Y \a\t g:i A') }}
                            </small>
                        </div>
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
    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();
    
    // Auto-hide success alerts
    setTimeout(function() {
        $('.alert-success').fadeOut();
    }, 5000);
});
</script>
@endsection
