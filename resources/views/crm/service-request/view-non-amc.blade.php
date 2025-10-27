@extends('crm/layouts/master')

@section('content')

<style>
    #popupOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #popupOverlay img {
        max-width: 90%;
        max-height: 90%;
        box-shadow: 0 0 10px #fff;
    }

    #popupOverlay .closeBtn {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        color: white;
        cursor: pointer;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-xl-10 mx-auto">
                
                <!-- Customer Details Card -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Non-AMC Service Request Details</h5>
                            <div>
                                <span class="fw-bold text-dark">#SRV-{{ str_pad($service->id, 4, '0', STR_PAD_LEFT) }}</span>
                                @if($service->status == 'Completed')
                                    <span class="badge bg-success ms-2">Completed</span>
                                @elseif($service->status == 'In Progress')
                                    <span class="badge bg-primary ms-2">In Progress</span>
                                @elseif($service->status == 'Pending')
                                    <span class="badge bg-warning ms-2">Pending</span>
                                @elseif($service->status == 'Cancelled')
                                    <span class="badge bg-danger ms-2">Cancelled</span>
                                @else
                                    <span class="badge bg-secondary ms-2">{{ $service->status }}</span>
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
                                        <span>{{ $service->full_name }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Contact No:</span>
                                        <span>{{ $service->phone }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Email:</span>
                                        <span>{{ $service->email }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">DOB:</span>
                                        <span>{{ $service->dob ? $service->dob->format('d M Y') : 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Gender:</span>
                                        <span>{{ $service->gender ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Customer Type:</span>
                                        <span>{{ $service->customer_type ?? 'N/A' }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Company Name:</span>
                                        <span>{{ $service->company_name ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">GST No:</span>
                                        <span>{{ $service->gst_no ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">PAN No:</span>
                                        <span>{{ $service->pan_no ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Created By:</span>
                                        <span>{{ $service->creator->name ?? 'System' }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Created At:</span>
                                        <span>{{ $service->created_at->format('d M Y, h:i A') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div class="row mt-3">
                            <div class="col-12">
                                <h6 class="fw-semibold mb-2">Address:</h6>
                                <p class="text-muted">{{ $service->full_address }}</p>
                            </div>
                        </div>

                        <!-- Images Section -->
                        <div class="row mt-3">
                            @if($service->profile_image)
                            <div class="col-md-6">
                                <h6 class="fw-semibold mb-2">Profile Image:</h6>
                                <img src="{{ asset('uploads/crm/non-amc/profiles/' . $service->profile_image) }}" 
                                     alt="Profile" class="img-thumbnail" style="max-width: 200px; cursor: pointer;"
                                     onclick="openPopup(this.src)">
                            </div>
                            @endif
                            @if($service->customer_image)
                            <div class="col-md-6">
                                <h6 class="fw-semibold mb-2">Customer Image:</h6>
                                <img src="{{ asset('uploads/crm/non-amc/customers/' . $service->customer_image) }}" 
                                     alt="Customer" class="img-thumbnail" style="max-width: 200px; cursor: pointer;"
                                     onclick="openPopup(this.src)">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Service Details Card -->
                <div class="card mt-3">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Service Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Service Type:</span>
                                        <span class="badge bg-info">{{ $service->service_type }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Priority Level:</span>
                                        @if($service->priority_level == 'High')
                                            <span class="badge bg-danger">High</span>
                                        @elseif($service->priority_level == 'Medium')
                                            <span class="badge bg-warning">Medium</span>
                                        @else
                                            <span class="badge bg-success">Low</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Total Amount:</span>
                                        <span class="fw-bold text-success">₹{{ number_format($service->total_amount, 2) }}</span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex gap-3">
                                        <span class="fw-semibold">Total Products:</span>
                                        <span>{{ $service->products->count() }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @if($service->additional_notes)
                        <div class="row mt-3">
                            <div class="col-12">
                                <h6 class="fw-semibold mb-2">Additional Notes:</h6>
                                <p class="text-muted">{{ $service->additional_notes }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Products Card -->
                <div class="card mt-3">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Products</h5>
                    </div>
                    <div class="card-body">
                        @forelse($service->products as $index => $product)
                        <div class="border rounded p-3 mb-3">
                            <h6 class="fw-semibold mb-3">Product #{{ $index + 1 }}</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Product Name:</span>
                                            <span>{{ $product->product_name }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Product Type:</span>
                                            <span>{{ $product->product_type ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Brand:</span>
                                            <span>{{ $product->product_brand ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Model No:</span>
                                            <span>{{ $product->model_no ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Serial No:</span>
                                            <span>{{ $product->serial_no ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Purchase Date:</span>
                                            <span>{{ $product->purchase_date ? $product->purchase_date->format('d M Y') : 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Issue Type:</span>
                                            <span>{{ $product->issue_type ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Warranty Status:</span>
                                            <span class="badge bg-{{ $product->warranty_status == 'In Warranty' ? 'success' : 'secondary' }}">
                                                {{ $product->warranty_status ?? 'Unknown' }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            @if($product->issue_description)
                            <div class="row mt-2">
                                <div class="col-12">
                                    <h6 class="fw-semibold mb-2">Issue Description:</h6>
                                    <p class="text-muted">{{ $product->issue_description }}</p>
                                </div>
                            </div>
                            @endif

                            @if($product->product_image)
                            <div class="row mt-2">
                                <div class="col-12">
                                    <h6 class="fw-semibold mb-2">Product Image:</h6>
                                    <img src="{{ asset('uploads/crm/non-amc/products/' . $product->product_image) }}" 
                                         alt="Product" class="img-thumbnail" style="max-width: 200px; cursor: pointer;"
                                         onclick="openPopup(this.src)">
                                </div>
                            </div>
                            @endif
                        </div>
                        @empty
                        <p class="text-muted">No products added yet.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex gap-2">
                            <a href="{{ route('service-request.edit-non-amc', $service->id) }}" class="btn btn-warning">
                                <i class="mdi mdi-pencil"></i> Edit Service Request
                            </a>
                            <a href="{{ route('service-request.index') }}" class="btn btn-secondary">
                                <i class="mdi mdi-arrow-left"></i> Back to List
                            </a>
                            <form action="{{ route('service-request.delete-non-amc', $service->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Are you sure you want to delete this service request?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="mdi mdi-delete"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Image Popup Overlay -->
<div id="popupOverlay" onclick="closePopup()">
    <span class="closeBtn" onclick="closePopup()">&times;</span>
    <img id="popupImage" src="" alt="Popup Image">
</div>

<script>
    function openPopup(imageSrc) {
        document.getElementById('popupImage').src = imageSrc;
        document.getElementById('popupOverlay').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
    }
</script>

@endsection
