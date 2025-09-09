@extends('crm/layouts/master')

@section('content')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quotation</h4>
            </div>

        </div>

        <!-- End Main Widgets -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <form action="#" method="get">
                            <div class="d-flex justify-content-between">
                                <div class="row">
                                    <div class="col-xl-10 col-md-10 col-sm-10">
                                        <div class="search-box">
                                            <input type="text" name="search" value="" class="form-control search" placeholder="Search Quotation Id">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary waves ripple-light">
                                                <!-- <span class="d-none d-md-inline-flex"> Search </span> -->
                                                <i class="fa-solid fa-magnifying-glass "></i>

                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <!-- <span class="d-none d-md-inline-flex"> Sort </span> -->
                                            <i class="fa-solid fa-arrow-up-z-a "></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Sort By Lead Id</a></li>
                                            <li><a class="dropdown-item" href="#">Sort By Quotation Id</a></li>
                                            <li><a class="dropdown-item" href="#">Sort By Created Date</a></li>
                                            <li><a class="dropdown-item" href="#">Sort By Updated Date</a></li>
                                            <!-- <li><a class="dropdown-item" href="#">Sort By Ratings</a></li>  -->
                                        </ul>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">
                                            <!-- <span class="d-none d-md-inline-flex"> Filters </span> -->
                                            <i class="fa-solid fa-filter "></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="standard-modalLabel">Filters</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body px-3 py-md-2">
                                                <h5>Status</h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Draft
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="hardware">
                                                                <label class="form-check-label" for="hardware">
                                                                    Sent
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="ossupport">
                                                                <label class="form-check-label" for="ossupport">
                                                                    Accepted
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="networking">
                                                                <label class="form-check-label" for="networking">
                                                                    Viewed
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="networking">
                                                                <label class="form-check-label" for="networking">
                                                                    Rejected
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active p-2" onclick="showSection()" id="all_services_tab" data-bs-toggle="tab"
                                        href="#all_services" role="tab">
                                        <span class="d-block d-sm-none"><i
                                                class="mdi mdi-information"></i></span>
                                        <span class="d-none d-sm-block">Quotation List</span>
                                    </a>
                                </li>
                            </ul>
                            <div>
                                <a href="{{ route('quotation.create') }}" id="mySection" class="btn btn-primary">Create Quotation</a>
                            </div>
                        </div>

                        <div class="tab-content text-muted">
                            <div class="tab-pane active show pt-4" id="all_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>

                                                        <tr>
                                                            <th>Lead ID</th>
                                                            <th>Quotation ID</th>
                                                            <th>Client Name</th>
                                                            <th>Status</th>
                                                            <th>Created Date</th>
                                                            <th>Updated Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($quotations as $quotation)
                                                        <tr>
                                                            <td>
                                                                <a href="">
                                                                    {{ $quotation->lead_id }}
                                                                </a>
                                                            </td>
                                                            <td>{{ $quotation->quote_id }}</td>
                                                            <td>{{ $quotation->lead->first_name }} {{ $quotation->lead->last_name }}</td>
                                                            <td>{{ $quotation->lead->status }}</td>
                                                            <td>{{ $quotation->created_at->format('d M Y') }}</td>
                                                            <td>{{ $quotation->updated_at->format('d M Y') }}</td>
                                                            <td>
                                                                <a aria-label="anchor" href="{{ route('quotation.view', $quotation->id) }}"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor" href=""
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show pt-4" id="pending_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Service Id</th>
                                                            <th>User</th>
                                                            <th>AMC Plan</th>
                                                            <th>Duration (Months)</th>
                                                            <th>Start Date</th>
                                                            <!-- <th>Product Info</th> -->
                                                            <th>Created By</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div>2 weeks ago</div>
                                                                <div>2025-04-04 06:09 PM</div>
                                                            </td>
                                                            <td>
                                                                <a href="">
                                                                    #1001
                                                                </a>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>Standard</td>
                                                            <td>6</td>
                                                            <td>2025-04-04 06:09 PM</td>

                                                            <td>Operation Manager - username</td>
                                                            <td>
                                                                <span class="badge bg-success-subtle text-success fw-semibold">Approved</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href=""
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div>1 weeks ago</div>
                                                                <div>2025-04-04 06:09 PM</div>
                                                            </td>
                                                            <td>
                                                                <a href="">
                                                                    #1002
                                                                </a>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>Standard</td>
                                                            <td>12</td>
                                                            <td>2025-04-04 06:09 PM</td>

                                                            <td>
                                                                Super Admin - username
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-danger-subtle text-danger fw-semibold">Pending</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href=""
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div>3 days ago</div>
                                                                <div>2025-04-04 06:09 PM</div>
                                                            </td>
                                                            <td>
                                                                <a href="">
                                                                    #1003
                                                                </a>
                                                            </td>
                                                            <td>John Doe</td>
                                                            <td>Standard</td>
                                                            <td>12</td>
                                                            <td>2025-04-04 06:09 PM</td>

                                                            <td>
                                                                Customer - John Doe
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-warning-subtle text-warning fw-semibold">Rejected</span>
                                                            </td>
                                                            <td>
                                                                <a aria-label="anchor" href=""
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                                <a aria-label="anchor"
                                                                    class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                                    <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
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
                            </div>
                            <div class="tab-pane show pt-4" id="approved_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Seller/Deliveryman/User</th>
                                                            <th>Method</th>
                                                            <th>Amount</th>
                                                            <th>Charge</th>
                                                            <th>Receivable</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        <tr>
                                                            <td class="border-bottom-0" colspan="100">
                                                                <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                                                    <div class="py-4 text-center">
                                                                        <lord-icon src="" trigger="loop" colors="primary:#405189,secondary:#0ab39c" class="loader-icon">
                                                                        </lord-icon>
                                                                        <h5 class="mt-4">
                                                                            Sorry! No Result Found
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show pt-4" id="rejected_services" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Seller/Deliveryman/User</th>
                                                            <th>Method</th>
                                                            <th>Amount</th>
                                                            <th>Charge</th>
                                                            <th>Receivable</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        <tr>
                                                            <td class="border-bottom-0" colspan="100">
                                                                <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                                                    <div class="py-4 text-center">
                                                                        <lord-icon src="" trigger="loop" colors="primary:#405189,secondary:#0ab39c" class="loader-icon">
                                                                        </lord-icon>
                                                                        <h5 class="mt-4">
                                                                            Sorry! No Result Found
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->


@endsection