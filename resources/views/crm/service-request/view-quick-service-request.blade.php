@extends('crm/layouts/master')

@section('content')

    <style>
        .engineer-checkbox {
            margin-right: 10px;
        }

        .supervisor-badge {
            background-color: #ffc107;
            color: #000;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
            margin-left: 5px;
        }
    </style>

    <div class="content">
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-xl-8 mx-auto">

                    <!-- Customer Details Card -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Customer Details</h5>
                                <div>
                                    <span class="fw-bold text-dark">#QSR-{{ str_pad($request->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    @if ($request->status == 'completed')
                                        <span class="badge bg-success ms-2">Completed</span>
                                    @elseif($request->status == 'processing')
                                        <span class="badge bg-info ms-2">Processing</span>
                                    @elseif($request->status == 'active')
                                        <span class="badge bg-primary ms-2">Active</span>
                                    @elseif($request->status == 'pending')
                                        <span class="badge bg-warning ms-2">Pending</span>
                                    @elseif($request->status == 'cancel')
                                        <span class="badge bg-danger ms-2">Cancelled</span>
                                    @else
                                        <span class="badge bg-secondary ms-2">{{ ucfirst($request->status) }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Customer Name:</span>
                                            <span>{{ $request->customer->first_name ?? '' }} {{ $request->customer->last_name ?? '' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Contact No:</span>
                                            <span>{{ $request->customer->phone ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Email:</span>
                                            <span>{{ $request->customer->email ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">DOB:</span>
                                            <span>{{ $request->customer->dob }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Customer Type:</span>
                                            <span>{{ $request->customer->customer_type ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Company Name:</span>
                                            <span>{{ $request->customer->company_name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">GST No:</span>
                                            <span>{{ $request->customer->gst_no ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">PAN No:</span>
                                            <span>{{ $request->customer->pan_no ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Created At:</span>
                                            <span>{{ $request->created_at->format('d M Y, h:i A') }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Last Updated:</span>
                                            <span>{{ $request->updated_at->diffForHumans() }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Service Details Card -->
                    <div class="card mt-3">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Quick Service Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Service Name:</span>
                                            <span>{{ $request->quickService->name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Service Price:</span>
                                            <span class="fw-bold text-success">₹{{ number_format($request->quickService->service_price ?? 0, 2) }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Description:</span>
                                            <span>{{ $request->quickService->description ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details Card -->
                    {{-- <div class="card mt-3">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Product Information</h5>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Product Name:</span>
                                            <span>{{ $request->product_name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Model No:</span>
                                            <span>{{ $request->model_no ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Brand:</span>
                                            <span>{{ $request->brand ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">SKU:</span>
                                            <span>{{ $request->sku ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">HSN:</span>
                                            <span>{{ $request->hsn ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                @if($request->issue)
                                <div class="col-12 mt-3">
                                    <div class="border-top pt-3">
                                        <span class="fw-semibold">Issue Description:</span>
                                        <p class="mt-2 mb-0">{{ $request->issue }}</p>
                                    </div>
                                </div>
                                @endif
                                @if($request->image)
                                <div class="col-12 mt-3">
                                    <div class="border-top pt-3">
                                        <span class="fw-semibold">Product Image:</span>
                                        <div class="mt-2">
                                            <img src="{{ asset($request->image) }}" alt="Product Image" class="img-thumbnail" style="max-width: 300px;">
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div> --}}

                    {{-- Product Details Card --}}
                    <div class="card mt-3">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Product Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Product Name</th>
                                            <th>Model No</th>
                                            <th>SKU</th>
                                            <th>HSN</th>
                                            <th>Brand</th>
                                            <th>Issue</th>
                                        </tr>    
                                    </thead>
                                    <tbody>
                                        <tr>    
                                            <td>{{ $request->id }}</td>
                                            <td>{{ $request->product_name }}</td>
                                            <td>{{ $request->model_no }}</td>
                                            <td>{{ $request->sku }}</td>
                                            <td>{{ $request->hsn }}</td>
                                            <td>{{ $request->brand }}</td>
                                            <td>{{ $request->issue }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <!-- Assigned Engineers Display -->
                            @if ($request->activeAssignment)
                                <div class="card mt-3" id="assignedEngineersCard">
                                    <div class="card-header border-bottom-dashed bg-light">
                                        <h5 class="card-title mb-0">Assigned Engineers</h5>
                                    </div>
                                    <div class="card-body">
                                        @if ($request->activeAssignment->assignment_type === 'Individual')
                                            <!-- Individual Engineer Card -->
                                            <div class="border rounded p-3 bg-success-subtle">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1 fw-bold">
                                                            {{ $request->activeAssignment->engineer->first_name }}
                                                            {{ $request->activeAssignment->engineer->last_name }}
                                                        </h6>
                                                        <p class="mb-1 text-muted small">
                                                            <i class="mdi mdi-briefcase"></i>
                                                            {{ $request->activeAssignment->engineer->designation }}
                                                        </p>
                                                        <p class="mb-1 text-muted small">
                                                            <i class="mdi mdi-office-building"></i>
                                                            {{ $request->activeAssignment->engineer->department }}
                                                        </p>
                                                        <p class="mb-0 text-muted small">
                                                            <i class="mdi mdi-phone"></i>
                                                            {{ $request->activeAssignment->engineer->phone }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <span class="badge bg-success">Individual Assignment</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Group Assignment Card -->
                                            <div class="border rounded p-3 bg-info-subtle">
                                                <h6 class="mb-3 fw-bold">
                                                    <i class="mdi mdi-account-group"></i> Group:
                                                    {{ $request->activeAssignment->group_name }}
                                                    <span class="badge bg-info ms-2">{{ $request->activeAssignment->groupEngineers->count() }} Engineers</span>
                                                </h6>

                                                <div class="row">
                                                    @foreach ($request->activeAssignment->groupEngineers as $groupEngineer)
                                                        <div class="col-md-6 mb-3">
                                                            <div class="border rounded p-2 {{ $groupEngineer->pivot->is_supervisor ? 'bg-warning-subtle' : 'bg-white' }}">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-grow-1">
                                                                        <h6 class="mb-1 fw-semibold">
                                                                            {{ $groupEngineer->first_name }}
                                                                            {{ $groupEngineer->last_name }}
                                                                            @if ($groupEngineer->pivot->is_supervisor)
                                                                                <span class="supervisor-badge">SUPERVISOR</span>
                                                                            @endif
                                                                        </h6>
                                                                        <p class="mb-0 text-muted small">
                                                                            <i class="mdi mdi-briefcase"></i>
                                                                            {{ $groupEngineer->designation }} |
                                                                            <i class="mdi mdi-phone"></i>
                                                                            {{ $groupEngineer->phone }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        <div class="mt-3 text-muted small">
                                            <i class="mdi mdi-clock-outline"></i> Assigned on:
                                            {{ $request->activeAssignment->assigned_at->format('d M Y, h:i A') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="card mt-3">
                                <div class="card-body text-center">
                                    <a href="{{ route('service-request.edit-quick-service-request', $request->id) }}" class="btn btn-warning">
                                        <i class="mdi mdi-pencil"></i> Edit Request
                                    </a>
                                    <a href="{{ route('service-request.index') }}" class="btn btn-secondary">
                                        <i class="mdi mdi-arrow-left"></i> Back to List
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
