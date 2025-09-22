@extends('e-commerce/layouts/master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Order Details</h4>
            </div>
            <div>
                <a href="{{ route('order.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Orders
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">

                <!-- Customer Details Card -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Customer Details</h5>
                            <div class="fw-bold text-dark">Order ID: #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Customer Name:</span>
                                        <span>{{ $order->customer->first_name ?? 'N/A' }} {{ $order->customer->last_name ?? '' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Contact No:</span>
                                        <span>{{ $order->customer->phone ?? 'N/A' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Email:</span>
                                        <span>{{ $order->customer->email ?? 'N/A' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Customer Type:</span>
                                        <span>{{ $order->customer->customer_type ?? 'N/A' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Order Date:</span>
                                        <span>{{ $order->created_at->format('d M Y h:i A') }}</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Company Name:</span>
                                        <span>{{ $order->customer->company_name ?? 'N/A' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Company Address:</span>
                                        <span>{{ $order->customer->company_addr ?? 'N/A' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">GST No:</span>
                                        <span>{{ $order->customer->gst_no ?? 'N/A' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">PAN No:</span>
                                        <span>{{ $order->customer->pan_no ?? 'N/A' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Delivery:</span>
                                        <span>{{ $order->delivery ?? 'N/A' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Order Details Card -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Order Details</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    @if($order->product && $order->product->warehouseProduct && $order->product->warehouseProduct->main_product_image)
                                        <img src="{{ asset( $order->product->warehouseProduct->main_product_image) }}"
                                             alt="Product" class="rounded me-3" width="80" height="80">
                                    @else
                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                                             style="width: 80px; height: 80px;">
                                            <i class="fas fa-image text-muted fa-2x"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1">{{ $order->product->warehouseProduct->product_name ?? 'N/A' }}</h6>
                                        <small class="text-muted">SKU: {{ $order->product->warehouseProduct->sku ?? 'N/A' }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <span class="fw-semibold">Quantity:</span>
                                        <span>{{ $order->quantity ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <span class="fw-semibold">Amount:</span>
                                        <span class="fw-semibold text-success">₹{{ number_format($order->amount, 2) }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex justify-content-between">
                                        <span class="fw-semibold">Status:</span>
                                        <span>
                                            @php
                                                $statusColors = [
                                                    'Pending' => 'warning',
                                                    'Assigned' => 'info',
                                                    'Out for Delivery' => 'primary',
                                                    'Delivered' => 'success'
                                                ];
                                                $statusColor = $statusColors[$order->status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-{{ $statusColor }}">{{ $order->status }}</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @if($order->invoice_file)
                            <div class="mt-3 pt-3 border-top">
                                <h6 class="mb-2">Invoice File:</h6>
                                <a href="{{ asset('storage/' . $order->invoice_file) }}" target="_blank"
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-file-alt me-1"></i> View Invoice
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Right Column - Delivery Management -->
            <div class="col-xl-4">
                <!-- Delivery Man Location Card -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Delivery Man Location</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <select name="city" id="city-select" class="form-select w-100">
                            <option value="" selected disabled>---- Select City ----</option>
                            @foreach($indianCities as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Assign Delivery Man Card -->
                <div class="card" id="assign-delivery-man-card" style="display: none;">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Assign Delivery Man</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <select name="delivery_man_id" id="delivery-man-select" class="form-select w-100">
                            <option value="" selected disabled>---- Select Delivery Man ----</option>
                        </select>
                        <div class="text-end mt-3">
                            <button type="button" class="btn btn-primary" id="assign-delivery-man-btn">
                                <i class="fas fa-user-plus me-1"></i> Assign
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Assigned Delivery Man Card -->
                @if($order->deliveryMan)
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">Assigned Delivery Man</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 d-flex justify-content-between">
                                    <span class="fw-semibold">Name:</span>
                                    <span>{{ $order->deliveryMan->full_name }}</span>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between">
                                    <span class="fw-semibold">Phone:</span>
                                    <span>{{ $order->deliveryMan->phone }}</span>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between">
                                    <span class="fw-semibold">Address:</span>
                                    <span>{{ $order->deliveryMan->current_address }}</span>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between">
                                    <span class="fw-semibold">City:</span>
                                    <span>{{ $order->deliveryMan->city }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Status Management Card -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Status Management</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="status-select" class="form-label">Current Status</label>
                            <select name="status" id="status-select" class="form-select">
                                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Assigned" {{ $order->status == 'Assigned' ? 'selected' : '' }}>Assigned</option>
                                <option value="Out for Delivery" {{ $order->status == 'Out for Delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-success" id="update-status-btn">
                                <i class="fas fa-save me-1"></i> Update Status
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    const orderId = {{ $order->id }};

    // City selection change event
    $('#city-select').on('change', function() {
        const selectedCity = $(this).val();

        if (selectedCity) {
            // Show loading state
            $('#delivery-man-select').html('<option value="" disabled selected>Loading...</option>');
            $('#assign-delivery-man-card').show();

            // Fetch delivery men for selected city
            $.ajax({
                url: `/e-commerce/delivery-men-by-city/${selectedCity}`,
                method: 'GET',
                success: function(response) {
                    let options = '<option value="" selected disabled>---- Select Delivery Man ----</option>';

                    if (response.length > 0) {
                        response.forEach(function(deliveryMan) {
                            options += `<option value="${deliveryMan.id}">${deliveryMan.first_name} ${deliveryMan.last_name} - ${deliveryMan.current_address}</option>`;
                        });
                    } else {
                        options = '<option value="" disabled selected>No delivery men available in this city</option>';
                    }

                    $('#delivery-man-select').html(options);
                },
                error: function() {
                    $('#delivery-man-select').html('<option value="" disabled selected>Error loading delivery men</option>');
                    alert('Failed to load delivery men for the selected city');
                }
            });
        } else {
            $('#assign-delivery-man-card').hide();
        }
    });

    // Assign delivery man
    $('#assign-delivery-man-btn').on('click', function() {
        const deliveryManId = $('#delivery-man-select').val();

        if (!deliveryManId) {
            alert('Please select a delivery man');
            return;
        }

        // Show loading state
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Assigning...');

        $.ajax({
            url: `/e-commerce/order/${orderId}/assign-delivery-man`,
            method: 'POST',
            data: {
                delivery_man_id: deliveryManId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    alert('Delivery man assigned successfully!');
                    location.reload(); // Reload to show updated information
                } else {
                    alert('Failed to assign delivery man');
                }
            },
            error: function(xhr) {
                const message = xhr.responseJSON?.message || 'Failed to assign delivery man';
                alert(message);
            },
            complete: function() {
                $('#assign-delivery-man-btn').prop('disabled', false).html('<i class="fas fa-user-plus me-1"></i> Assign');
            }
        });
    });

    // Update status
    $('#update-status-btn').on('click', function() {
        const status = $('#status-select').val();

        // Show loading state
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Updating...');

        $.ajax({
            url: `/e-commerce/order/${orderId}/update-status`,
            method: 'POST',
            data: {
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    alert('Order status updated successfully!');
                    location.reload(); // Reload to show updated status
                } else {
                    alert('Failed to update order status');
                }
            },
            error: function(xhr) {
                const message = xhr.responseJSON?.message || 'Failed to update order status';
                alert(message);
            },
            complete: function() {
                $('#update-status-btn').prop('disabled', false).html('<i class="fas fa-save me-1"></i> Update Status');
            }
        });
    });
});
</script>

@endsection