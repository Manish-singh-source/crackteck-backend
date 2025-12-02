@extends('crm/layouts/master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row py-3">

                <div class="col-12">
                    <div class="card sticky-side-div">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">
                                    Customer Details
                                </h5>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row d-flex">
                                <div class="col-6 px-3 d-flex">
                                    <div class="profile-section-image">
                                        <img src={{ $customer->pic ? asset($customer->pic) : asset('https://placehold.co/400') }}
                                            alt="Customer Profile Image" style="width: 150px; height:150px"
                                            class="img-thumbnail">
                                    </div>
                                    <div class="mx-3 d-flex flex-column justify-content-between">
                                        <div class="">
                                            <h1 class="mb-0">{{ $customer->first_name }} {{ $customer->last_name }}</h1>
                                            <p class="mb-0">Joining Date {{ $customer->created_at->format('d M Y') }}</p>
                                            <p class="mb-0">Total Branch {{ $customer->branches->count() }}</p>
                                        </div>

                                        <div class="d-flex gap-2 mt-3">
                                            <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            {{-- <button class="btn btn-sm btn-danger">Delete</button> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <ul class="list-group">
                                        <li
                                            class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                            <span class="fw-semibold">
                                                Email
                                            </span>
                                            <span class="font-weight-bold text-break">{{ $customer->email }}</span>
                                        </li>

                                        <li
                                            class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                            <span class="fw-semibold">
                                                Phone
                                            </span>
                                            <span class="font-weight-bold">{{ $customer->phone }}</span>
                                        </li>

                                        <li
                                            class="d-flex justify-content-between align-items-center flex-wrap gap-2 list-group-item">
                                            <span class="fw-semibold">
                                                Status
                                            </span>

                                            <span class="badge badge-pill bg-success">Active</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mt-3 p-3 rounded">
                                <div class="col-12">
                                    <h6 class="mb-3 fw-bold">Branch Information</h6>

                                    @if ($customer->branches && $customer->branches->count() > 0)
                                        <div class="row g-3">
                                            @foreach ($customer->branches as $branch)
                                                <div class="col-md-6"> {{-- 2 cards per row --}}
                                                    <div class="card mb-3 border-start border-primary border-3 h-100">
                                                        <div class="card-body">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-2">
                                                                <h6 class="card-title mb-0 text-primary">
                                                                    {{ $branch->branch_name }}</h6>
                                                                @if ($branch->is_primary)
                                                                    <span class="badge bg-success">Primary Branch</span>
                                                                @endif
                                                            </div>

                                                            <div class="row g-2">
                                                                <div class="col-12">
                                                                    <small class="text-muted">Address:</small>
                                                                    <p class="mb-1">{{ $branch->address }}</p>
                                                                    @if ($branch->address2)
                                                                        <p class="mb-1">{{ $branch->address2 }}</p>
                                                                    @endif
                                                                </div>

                                                                <div class="col-6">
                                                                    <small class="text-muted">City:</small>
                                                                    <p class="mb-0">{{ $branch->city }}</p>
                                                                </div>

                                                                <div class="col-6">
                                                                    <small class="text-muted">State:</small>
                                                                    <p class="mb-0">{{ $branch->state }}</p>
                                                                </div>

                                                                <div class="col-6">
                                                                    <small class="text-muted">Country:</small>
                                                                    <p class="mb-0">{{ $branch->country }}</p>
                                                                </div>

                                                                <div class="col-6">
                                                                    <small class="text-muted">Pincode:</small>
                                                                    <p class="mb-0">{{ $branch->pincode }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="alert alert-info">
                                            <i class="mdi mdi-information-outline"></i>
                                            No branch information available for this customer.
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">
                                    Services Source
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mb-2">
                                <table class="table table-hover table-nowrap align-middle">
                                    <thead class="text-muted table-light">
                                        <tr class="text-uppercase">
                                            <th>Sr. No.</th>
                                            <th>Service ID</th>
                                            <th>Service Type</th>
                                            <th>Source</th>
                                            <th>Date</th>
                                            {{-- <th>Product</th> --}}
                                            {{-- <th>Total Amount</th> --}}
                                            <th>Status</th>
                                            {{-- <th>Assigned Engineer</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="list form-check-all">
                                        @php
                                            $allServices = collect();

                                            // Add AMC Services
                                            foreach ($customer->amcServices as $service) {
                                                $allServices->push([
                                                    'type' => 'AMC Service',
                                                    'service_id' => $service->service_id,
                                                    'date' => $service->created_at,
                                                    'status' => $service->status,
                                                    'source' => 'amc_services',
                                                    'source_tag' => $service->source_type ?? 'AMC',
                                                    'route' => route('service-request.view-amc', $service->id),
                                                    'id' => $service->id
                                                ]);
                                            }

                                            // Add Non-AMC Services
                                            foreach ($customer->nonAmcServices as $service) {
                                                $serviceType = 'Non AMC Service';
                                                $sourceTag = 'Non AMC';

                                                if ($service->source_type === 'customer_installation_page') {
                                                    $serviceType = 'Installation Service';
                                                    $sourceTag = 'Installation';
                                                } elseif ($service->source_type === 'customer_repairing_page') {
                                                    $serviceType = 'Repairing Service';
                                                    $sourceTag = 'Repairing';
                                                }

                                                $allServices->push([
                                                    'type' => $serviceType,
                                                    'service_id' => 'NON-AMC-' . $service->id,
                                                    'date' => $service->requested_at ?? $service->created_at,
                                                    'status' => $service->status,
                                                    'source' => 'non_amc_services',
                                                    'source_tag' => $sourceTag,
                                                    'route' => route('service-request.view-non-amc', $service->id),
                                                    'id' => $service->id
                                                ]);
                                            }

                                            // Add Quick Services
                                            foreach ($customer->quickServiceRequests as $service) {
                                                $allServices->push([
                                                    'type' => 'Quick Service',
                                                    'service_id' => 'QSR-' . $service->id,
                                                    'date' => $service->created_at,
                                                    'status' => ucfirst($service->status),
                                                    'source' => 'quick_service_requests',
                                                    'source_tag' => 'Quick Service',
                                                    'route' => route('quick-service-requests.view', $service->id),
                                                    'id' => $service->id
                                                ]);
                                            }

                                            // Sort by date descending
                                            $allServices = $allServices->sortByDesc('date');
                                        @endphp

                                        @forelse ($allServices as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong>{{ $service['service_id'] }}</strong>
                                                </td>
                                                <td>
                                                    <span class="badge
                                                        @if($service['type'] === 'AMC Service') bg-primary
                                                        @elseif($service['type'] === 'Installation Service') bg-info
                                                        @elseif($service['type'] === 'Repairing Service') bg-warning
                                                        @elseif($service['type'] === 'Quick Service') bg-success
                                                        @else bg-secondary
                                                        @endif">
                                                        {{ $service['type'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{-- <small class="text-muted">{{ $service['source'] }}</small><br> --}}
                                                    <span class="badge bg-light text-dark">{{ $service['source_tag'] }}</span>
                                                </td>
                                                <td>
                                                    {{ $service['date']->format('d M Y, h:i A') }}
                                                </td>
                                                <td>
                                                    <span class="badge
                                                        @if(in_array($service['status'], ['Active', 'active', 'Completed', 'completed'])) bg-success
                                                        @elseif(in_array($service['status'], ['Pending', 'pending', 'processing'])) bg-warning
                                                        @elseif(in_array($service['status'], ['In Progress'])) bg-info
                                                        @else bg-danger
                                                        @endif">
                                                        {{ $service['status'] }}
                                                    </span>
                                                </td>
                                                
                                                <td>
                                                    <a href="{{ $service['route'] }}"
                                                        class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                        data-bs-toggle="tooltip" data-bs-original-title="View">
                                                        <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-4">
                                                    <i class="mdi mdi-information-outline"></i>
                                                    No service records found for this customer.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">
                                    Orders
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive mb-2">
                                <table class="table table-hover table-nowrap align-middle">
                                    <thead class="text-muted table-light">
                                        <tr class="text-uppercase">
                                            <th>Order Number</th>
                                            <th>Products & HSN</th>
                                            <th>Order Totals</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Invoice</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @php
                                            // Combine all orders
                                            $allOrders = collect();

                                            // Add E-commerce Orders
                                            foreach ($customer->allEcommerceOrders as $order) {
                                                $allOrders->push([
                                                    'type' => 'ecommerce',
                                                    'order' => $order,
                                                    'date' => $order->created_at
                                                ]);
                                            }

                                            // Add CRM Orders
                                            foreach ($customer->crmOrders as $order) {
                                                $allOrders->push([
                                                    'type' => 'crm',
                                                    'order' => $order,
                                                    'date' => $order->created_at
                                                ]);
                                            }

                                            // Sort by date descending
                                            $allOrders = $allOrders->sortByDesc('date');
                                        @endphp

                                        @forelse ($allOrders as $orderData)
                                            @if($orderData['type'] === 'ecommerce')
                                                @php $order = $orderData['order']; @endphp
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('order.view', $order->id) }}" class="fw-semibold link-primary">
                                                            #{{ $order->order_number }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="small">
                                                            @foreach($order->orderItems as $item)
                                                                <div class="mb-2 p-2 border rounded">
                                                                    <div class="fw-medium">{{ $item->product_name }}</div>
                                                                    <div class="text-muted">
                                                                        HSN/SAC: <span class="fw-medium">{{ $item->hsn_sac_code ?? 'N/A' }}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-between">
                                                                        <span>Qty: {{ $item->quantity }}</span>
                                                                        <span>₹{{ number_format($item->unit_price, 2) }}</span>
                                                                    </div>
                                                                    @if($item->igst_amount > 0)
                                                                        <div class="text-muted">Tax: ₹{{ number_format($item->igst_amount, 2) }}</div>
                                                                    @endif
                                                                    <div class="fw-medium">Total: ₹{{ number_format($item->total_price, 2) }}</div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="small">
                                                            <div>Subtotal: <span class="fw-medium">₹{{ number_format($order->subtotal, 2) }}</span></div>
                                                            @if($order->shipping_charges > 0)
                                                                <div>Shipping: <span class="fw-medium">₹{{ number_format($order->shipping_charges, 2) }}</span></div>
                                                            @endif
                                                            @if($order->discount_amount > 0)
                                                                <div class="text-success">Discount: -₹{{ number_format($order->discount_amount, 2) }}</div>
                                                            @endif
                                                            <div class="fw-bold text-success border-top pt-1">
                                                                Grand Total: ₹{{ number_format($order->total_amount, 2) }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($order->payment_method === 'mastercard' || $order->payment_method === 'visa')
                                                            <div>
                                                                <span class="badge bg-info">{{ ucfirst($order->payment_method) }}</span>
                                                                @if($order->card_last_four)
                                                                    <br><small class="text-muted">**** **** **** {{ $order->card_last_four }}</small>
                                                                @endif
                                                            </div>
                                                        @elseif($order->payment_method === 'cod')
                                                            <span class="badge bg-warning">Cash on Delivery</span>
                                                        @else
                                                            <span class="badge bg-secondary">{{ ucfirst($order->payment_method) }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $statusColors = [
                                                                'pending' => 'warning',
                                                                'confirmed' => 'info',
                                                                'processing' => 'primary',
                                                                'shipped' => 'primary',
                                                                'delivered' => 'success',
                                                                'cancelled' => 'danger'
                                                            ];
                                                            $statusColor = $statusColors[$order->status] ?? 'secondary';
                                                        @endphp
                                                        <span class="badge bg-{{ $statusColor }}">{{ ucfirst($order->status) }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('order.invoice', $order->id) }}"
                                                           class="btn btn-sm btn-outline-success" title="Download Invoice" target="_blank">
                                                            <i class="fas fa-file-pdf me-1"></i> PDF
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div>{{ $order->created_at->format('d M Y') }}</div>
                                                        <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('order.view', $order->id) }}"
                                                               class="btn btn-sm btn-outline-info" title="View">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @else
                                                @php $order = $orderData['order']; @endphp
                                                <tr>
                                                    <td>
                                                        <span class="fw-semibold">#CRM-{{ $order->id }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="small">
                                                            <div class="mb-2 p-2 border rounded">
                                                                <div class="fw-medium">{{ $order->product->product_name ?? 'N/A' }}</div>
                                                                <div class="d-flex justify-content-between">
                                                                    <span>Qty: {{ $order->quantity }}</span>
                                                                    <span>₹{{ number_format($order->amount, 2) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="small">
                                                            <div class="fw-bold text-success">
                                                                Total: ₹{{ number_format($order->amount, 2) }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-secondary">N/A</span>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-{{ $order->status === 'Delivered' ? 'success' : 'warning' }}">
                                                            {{ $order->status ?? 'Pending' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($order->invoice_file)
                                                            <a href="{{ asset($order->invoice_file) }}"
                                                               class="btn btn-sm btn-outline-success" title="Download Invoice" target="_blank">
                                                                <i class="fas fa-file-pdf me-1"></i> PDF
                                                            </a>
                                                        @else
                                                            <span class="text-muted">N/A</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div>{{ $order->created_at->format('d M Y') }}</div>
                                                        <small class="text-muted">{{ $order->created_at->format('h:i A') }}</small>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted">-</span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center text-muted py-4">
                                                    <i class="mdi mdi-information-outline"></i>
                                                    No orders found for this customer.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div> <!-- content -->

@endsection
