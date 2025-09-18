@extends('warehouse/layouts/master')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Vendor Purchase Bill Details</h4>
            </div>
            <div>
                <a href="{{ route('vendor.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('vendor.edit', $vendorPurchaseBill->id) }}" class="btn btn-primary ms-2">Edit</a>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-xl-12 mx-auto">

                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Purchase Bill Details</h5>
                            <div class="fw-bold text-dark">Bill No: {{ $vendorPurchaseBill->purchase_bill_no }}</div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <!-- Left Column -->
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Purchase Bill No:</span>
                                        <span>{{ $vendorPurchaseBill->purchase_bill_no }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Vendor Name:</span>
                                        <span>{{ $vendorPurchaseBill->vendor_name }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Purchase Date:</span>
                                        <span>{{ $vendorPurchaseBill->purchase_date->format('d M Y') }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Total Amount:</span>
                                        <span class="fw-bold text-success">{{ $vendorPurchaseBill->formatted_total_amount }}</span>
                                    </li>

                                </ul>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Payment Status:</span>
                                        <span class="badge {{ $vendorPurchaseBill->payment_status_badge_class }} fw-semibold">
                                            {{ $vendorPurchaseBill->payment_status }}
                                        </span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-start gap-2 flex-wrap">
                                        <span class="fw-semibold">Notes/Remarks:</span>
                                        <span>{{ $vendorPurchaseBill->notes ?? 'No notes provided' }}</span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Attachment:</span>
                                        @if($vendorPurchaseBill->attachment)
                                            <a href="{{ $vendorPurchaseBill->attachment_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="mdi mdi-download me-1"></i>View/Download
                                            </a>
                                        @else
                                            <span class="text-muted">No attachment</span>
                                        @endif
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-2 flex-wrap">
                                        <span class="fw-semibold">Created Date:</span>
                                        <span>{{ $vendorPurchaseBill->created_at->format('d M Y, h:i A') }}</span>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection