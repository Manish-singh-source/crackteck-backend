@extends('warehouse/layouts/master')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Product Details</h4>
            </div>
            <div>
                <a href="{{ route('product-list.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Vendor Information -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Vendor Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">PO Number:</label>
                                    <p class="text-muted">{{ $product->po_number ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Vendor Name:</label>
                                    <p class="text-muted">{{ $product->vendor_name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Invoice Number:</label>
                                    <p class="text-muted">{{ $product->invoice_number ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Purchase Date:</label>
                                    <p class="text-muted">{{ $product->purchase_date ? $product->purchase_date->format('d M Y') : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Bill Due Date:</label>
                                    <p class="text-muted">{{ $product->bill_due_date ? $product->bill_due_date->format('d M Y') : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Bill Amount:</label>
                                    <p class="text-muted">{{ $product->bill_amount ? '₹' . number_format($product->bill_amount, 2) : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Basic Product Information -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Basic Product Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Product Name:</label>
                                    <p class="text-muted">{{ $product->product_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">SKU:</label>
                                    <p class="text-muted">{{ $product->sku }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">HSN Code:</label>
                                    <p class="text-muted">{{ $product->hsn_code ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Brand:</label>
                                    <p class="text-muted">{{ $product->brand->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Model No:</label>
                                    <p class="text-muted">{{ $product->model_no ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Serial No:</label>
                                    <p class="text-muted">{{ $product->serial_no ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Parent Category:</label>
                                    <p class="text-muted">{{ $product->parentCategorie->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Sub Category:</label>
                                    <p class="text-muted">{{ $product->subCategorie->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="fw-semibold">Short Description:</label>
                            <div class="text-muted">
                                {!! $product->short_description ?? 'N/A' !!}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-semibold">Full Description:</label>
                            <div class="text-muted">
                                {!! $product->full_description ?? 'N/A' !!}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="fw-semibold">Technical Specification:</label>
                            <div class="text-muted">
                                {!! $product->technical_specification ?? 'N/A' !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Information -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Pricing Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Cost Price:</label>
                                    <p class="text-muted">{{ $product->cost_price ? '₹' . number_format($product->cost_price, 2) : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Selling Price:</label>
                                    <p class="text-muted">{{ $product->selling_price ? '₹' . number_format($product->selling_price, 2) : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Discount Price:</label>
                                    <p class="text-muted">{{ $product->discount_price ? '₹' . number_format($product->discount_price, 2) : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Tax Rate:</label>
                                    <p class="text-muted">{{ $product->tax_rate ? $product->tax_rate . '%' : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inventory Information -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Inventory Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Stock Quantity:</label>
                                    <p class="text-muted">{{ $product->stock_quantity ?? 0 }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Stock Status:</label>
                                    <p class="text-muted">
                                        <span class="badge {{ $product->stock_status == 'In Stock' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->stock_status ?? 'Out of Stock' }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Minimum Stock Level:</label>
                                    <p class="text-muted">{{ $product->minimum_stock_level ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Maximum Stock Level:</label>
                                    <p class="text-muted">{{ $product->maximum_stock_level ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Reorder Level:</label>
                                    <p class="text-muted">{{ $product->reorder_level ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Reorder Quantity:</label>
                                    <p class="text-muted">{{ $product->reorder_quantity ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rack Details -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Rack Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Warehouse:</label>
                                    <p class="text-muted">{{ $product->warehouse->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Warehouse Rack:</label>
                                    <p class="text-muted">{{ $product->warehouseRack->name ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Rack Zone Area:</label>
                                    <p class="text-muted">{{ $product->rack_zone_area ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Rack No:</label>
                                    <p class="text-muted">{{ $product->rack_no ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Level No:</label>
                                    <p class="text-muted">{{ $product->level_no ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Position No:</label>
                                    <p class="text-muted">{{ $product->position_no ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Expiry Date:</label>
                                    <p class="text-muted">{{ $product->expiry_date ? $product->expiry_date->format('d M Y') : 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Rack Status:</label>
                                    <p class="text-muted">
                                        <span class="badge bg-info">{{ $product->rack_status ?? 'N/A' }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <!-- Product Images -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Product Images</h5>
                    </div>
                    <div class="card-body">
                        @if($product->main_product_image)
                            <div class="mb-3">
                                <label class="fw-semibold">Main Product Image:</label>
                                <div class="mt-2">
                                    <img src="{{ asset($product->main_product_image) }}" alt="Main Product Image" class="img-fluid rounded" style="max-height: 200px;">
                                </div>
                            </div>
                        @endif

                        @if($product->additional_product_images && count($product->additional_product_images) > 0)
                            <div class="mb-3">
                                <label class="fw-semibold">Additional Images:</label>
                                <div class="row mt-2">
                                    @foreach($product->additional_product_images as $image)
                                        <div class="col-6 mb-2">
                                            <img src="{{ asset($image) }}" alt="Additional Image" class="img-fluid rounded" style="max-height: 100px;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if($product->datasheet_manual)
                            <div class="mb-3">
                                <label class="fw-semibold">Datasheet/Manual:</label>
                                <div class="mt-2">
                                    <a href="{{ asset($product->datasheet_manual) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="mdi mdi-file-pdf-outline"></i> Download PDF
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Variations -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Product Variations</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Color Options:</label>
                                    <p class="text-muted">{{ $product->color_options ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Size Options:</label>
                                    <p class="text-muted">{{ $product->size_options ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Length Options:</label>
                                    <p class="text-muted">{{ $product->length_options ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Status -->
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <h5 class="card-title mb-0">Product Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Status:</label>
                                    <p class="text-muted">
                                        <span class="badge {{ $product->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->status ?? 'Inactive' }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Created Date:</label>
                                    <p class="text-muted">{{ $product->created_at->format('d M Y, h:i A') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="fw-semibold">Last Updated:</label>
                                    <p class="text-muted">{{ $product->updated_at->format('d M Y, h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div> <!-- content -->

@endsection