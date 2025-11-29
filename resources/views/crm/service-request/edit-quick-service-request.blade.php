@extends('crm/layouts/master')

@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Quick Service Request</h4>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <form action="{{ route('service-request.update-quick-service-request', $request->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Request Header -->
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Request #QSR-{{ str_pad($request->id, 4, '0', STR_PAD_LEFT) }}</h5>
                                    <div>
                                        @if ($request->status == 'completed')
                                            <span class="badge bg-success">Completed</span>
                                        @elseif($request->status == 'processing')
                                            <span class="badge bg-info">Processing</span>
                                        @elseif($request->status == 'active')
                                            <span class="badge bg-primary">Active</span>
                                        @elseif($request->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($request->status == 'cancel')
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Details (Read Only) -->
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Customer Details (Read Only)</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-xl-4 col-lg-6">
                                        <label class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" value="{{ $request->customer->first_name ?? '' }} {{ $request->customer->last_name ?? '' }}" readonly>
                                    </div>
                                    <div class="col-xl-4 col-lg-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" value="{{ $request->customer->phone ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="col-xl-4 col-lg-6">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" value="{{ $request->customer->email ?? 'N/A' }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Service Details (Read Only) -->
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Quick Service Details (Read Only)</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-xl-6 col-lg-6">
                                        <label class="form-label">Service Name</label>
                                        <input type="text" class="form-control" value="{{ $request->quickService->name ?? 'N/A' }}" readonly>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <label class="form-label">Service Price</label>
                                        <input type="text" class="form-control" value="₹{{ number_format($request->quickService->service_price ?? 0, 2) }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Request Status & Product Details (Editable) -->
                        <div class="card mt-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Request Status & Product Details</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Status -->
                                    <div class="col-xl-4 col-lg-6">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="pending" {{ old('status', $request->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ old('status', $request->status) == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="active" {{ old('status', $request->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="completed" {{ old('status', $request->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancel" {{ old('status', $request->status) == 'cancel' ? 'selected' : '' }}>Cancel</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Product Name -->
                                    <div class="col-xl-4 col-lg-6">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror"
                                            value="{{ old('product_name', $request->product_name) }}" placeholder="Enter Product Name">
                                        @error('product_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Model No -->
                                    <div class="col-xl-4 col-lg-6">
                                        <label for="model_no" class="form-label">Model No</label>
                                        <input type="text" name="model_no" id="model_no" class="form-control @error('model_no') is-invalid @enderror"
                                            value="{{ old('model_no', $request->model_no) }}" placeholder="Enter Model No">
                                        @error('model_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- SKU -->
                                    <div class="col-xl-4 col-lg-6">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror"
                                            value="{{ old('sku', $request->sku) }}" placeholder="Enter SKU">
                                        @error('sku')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- HSN -->
                                    <div class="col-xl-4 col-lg-6">
                                        <label for="hsn" class="form-label">HSN</label>
                                        <input type="text" name="hsn" id="hsn" class="form-control @error('hsn') is-invalid @enderror"
                                            value="{{ old('hsn', $request->hsn) }}" placeholder="Enter HSN">
                                        @error('hsn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Brand -->
                                    <div class="col-xl-4 col-lg-6">
                                        <label for="brand" class="form-label">Brand</label>
                                        <input type="text" name="brand" id="brand" class="form-control @error('brand') is-invalid @enderror"
                                            value="{{ old('brand', $request->brand) }}" placeholder="Enter Brand">
                                        @error('brand')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Issue Description -->
                                    <div class="col-12">
                                        <label for="issue" class="form-label">Issue Description</label>
                                        <textarea name="issue" id="issue" rows="4" class="form-control @error('issue') is-invalid @enderror"
                                            placeholder="Describe the issue...">{{ old('issue', $request->issue) }}</textarea>
                                        @error('issue')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Product Image -->
                                    <div class="col-12">
                                        <label for="image" class="form-label">Product Image</label>
                                        @if($request->image)
                                            <div class="mb-2">
                                                <img src="{{ asset($request->image) }}" alt="Current Product Image" class="img-thumbnail" style="max-width: 200px;">
                                                <p class="text-muted small mt-1">Current Image</p>
                                            </div>
                                        @endif
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                        <small class="text-muted">Upload a new image to replace the current one (optional)</small>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('service-request.view-quick-service-request', $request->id) }}" class="btn btn-secondary">
                                        <i class="mdi mdi-arrow-left"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="mdi mdi-content-save"></i> Update Request
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
