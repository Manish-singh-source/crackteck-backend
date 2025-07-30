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
                                                            <th>Item details</th>
                                                            <th>Total Amount</th>
                                                            <th>Payment Status</th>
                                                            <th>Notes/Remarks</th>
                                                            <th>Attachment</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="align-middle">
                                                            <td>PB-1001</td>
                                                            <td>Star Electronics</td>
                                                            <td>2025-06-01</td>
                                                            <td>10x LED Bulbs</td>
                                                            <td>59.00₹</td>
                                                            <td>
                                                                <span class="badge bg-success-subtle text-success fw-semibold">
                                                                    Paid
                                                                </span>
                                                            </td>
                                                            <td>Delivered in full</td>
                                                            <td><a href="proofs/michael-payment.pdf" target="_blank" class="btn btn-sm btn-outline-primary">View</a></td>
                                                            <td>
                                                                <a aria-label="anchor" href="{{ route('vendor.view') }}"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td>PB-1002</td>
                                                            <td>PrintWorld Pvt Ltd</td>
                                                            <td>2025-06-03</td>
                                                            <td>2x Laser Printers</td>
                                                            <td>336.00₹</td>
                                                            <td>
                                                                <span class="badge bg-danger-subtle text-danger fw-semibold">
                                                                    Unpaid
                                                                </span>
                                                            </td>
                                                            <td>Awaiting payment</td>
                                                            <td><a href="proofs/michael-payment.pdf" target="_blank" class="btn btn-sm btn-outline-primary">View</a></td>
                                                            <td>
                                                                <a aria-label="anchor" href="{{ route('vendor.view') }}"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td> PB-1003</td>
                                                            <td> GreenMart Supplies</td>
                                                            <td> 2025-06-05</td>
                                                            <td> 20x Eco Bags</td>
                                                            <td> 63.00₹</td>
                                                            <td>
                                                                <span class="badge bg-warning-subtle text-warning fw-semibold">
                                                                    Partially Paid
                                                                </span>
                                                            </td>
                                                            <td> Balance 30₹ pending</td>
                                                            <td> <a href="proofs/michael-payment.pdf" target="_blank" class="btn btn-sm btn-outline-primary">View</a></td>
                                                            <td>
                                                                <a aria-label="anchor" href="{{ route('vendor.view') }}"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">

                                                            <td> PB-1004</td>
                                                            <td> OfficeKart India</td>
                                                            <td> 2025-06-06</td>
                                                            <td> 5x Desk Chairs</td>
                                                            <td> 236.00₹</td>
                                                            <td>
                                                                <span class="badge bg-success-subtle text-success fw-semibold">
                                                                    Paid
                                                                </span>
                                                            </td>
                                                            <td> Good quality</td>
                                                            <td> <a href="proofs/michael-payment.pdf" target="_blank" class="btn btn-sm btn-outline-primary">View</a></td>
                                                            <td>
                                                                <a aria-label="anchor" href="{{ route('vendor.view') }}"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
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