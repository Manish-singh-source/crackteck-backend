@extends('warehouse/layouts/master')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Vendor Purchase Bills</h4>
            </div>
            <div>
                <a href="{{ route('vendor.create') }}" class="btn btn-primary">Add Vendor Bill</a>
            </div>
        </div>


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
                <div class="card">
                    <div class="card-body pt-0">
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_customer_tab" data-bs-toggle="tab"
                                    href="#all_customer" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Invoices</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content text-muted">

                            <div class="tab-pane active show pt-4" id="all_customer" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Purchase Bill No</th>
                                                            <th>Vendor Name</th>
                                                            <th>Purchase Date</th>
                                                            <th>Total Amount</th>
                                                            <th>Payment Status</th>
                                                            <th>Notes/Remarks</th>
                                                            <th>Attachment</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($vendorPurchaseBills as $bill)
                                                        <tr class="align-middle">
                                                            <td>{{ $bill->purchase_bill_no }}</td>
                                                            <td>{{ $bill->vendor_name }}</td>
                                                            <td>{{ $bill->purchase_date->format('Y-m-d') }}</td>
                                                            <td>{{ $bill->formatted_total_amount }}</td>
                                                            <td>
                                                                <span class="badge {{ $bill->payment_status_badge_class }} fw-semibold">
                                                                    {{ $bill->payment_status }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $bill->notes ?? '-' }}</td>
                                                            <td>
                                                                @if($bill->attachment)
                                                                    <a href="{{ $bill->attachment_url }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                                                @else
                                                                    <span class="text-muted">No attachment</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href="{{ route('vendor.view', $bill->id) }}"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href="{{ route('vendor.edit', $bill->id) }}"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil fs-14 text-warning"></i>
                                                                </a>
                                                                <form action="{{ route('vendor.destroy', $bill->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this vendor purchase bill?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" aria-label="anchor"
                                                                        class="btn btn-icon btn-sm bg-danger-subtle"
                                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                        <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="8" class="text-center">No vendor purchase bills found.</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end Experience -->

                        </div> <!-- Tab panes -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->


@endsection