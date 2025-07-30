@extends('e-commerce/layouts/master')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Order List</h4>
            </div>
            <div>
                <a href="{{ route('order.create')}}" class="btn btn-primary">Create Order</a>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <form action="#" method="get">
                            <div class="d-flex justify-content-between">
                                <div class="row">
                                    <div class="col-xl-10 col-md-10 col-sm-10">
                                        <div class="search-box">
                                            <input type="text" name="search" value="" class="form-control search" placeholder="Search Order Id">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary waves ripple-light">
                                                <i class="fa-solid fa-magnifying-glass "></i>

                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-arrow-up-z-a "></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Sort By Order Id</a></li>
                                            <li><a class="dropdown-item" href="#">Sort By Date</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#standard-modal">
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
                                                <h5>Order Source</h5>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Website
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mt-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault2">
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Store
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
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_customer_tab" data-bs-toggle="tab"
                                    href="#all_customer" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="active_customer_tab" data-bs-toggle="tab" href="#active_customer"
                                    role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Pending Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Placed Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Confirmed Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Processing </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Shipped </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Delivered </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Cancelled Order </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-2" id="banned_customers_tab" data-bs-toggle="tab"
                                    href="#banned_customers" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-sitemap-outline"></i></span>
                                    <span class="d-none d-sm-block">Return Order </span>
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
                                                            <th>Order Id</th>
                                                            <th>Quantity</th>
                                                            <th>Time</th>
                                                            <th>Customer Info</th>
                                                            <th>Product Details</th>
                                                            <th>Amount</th>
                                                            <th>Delivery</th>
                                                            <th>Order From</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr class="align-middle">
                                                            <td>#1001</td>
                                                            <td>2</td>
                                                            <td>2 days ago<br />
                                                                2025-04-15 05:40 PM</td>
                                                            <td>
                                                                Name: <br />
                                                                Phone:<br />
                                                                Email : N\A<br />
                                                                Country :<br />
                                                                City :<br />
                                                                Address :<br />
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">View All (2)</button>

                                                                <!-- Modals -->
                                                                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-light">
                                                                                <h5 class="modal-title">Product Info</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="card-body">
                                                                                    <div class="table-responsive table-card">
                                                                                        <table class="table table-hover table-centered align-middle table-nowrap">
                                                                                            <tbody id="product-info">
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                                                <img src="https://placehold.co/80x80" alt="Headphone" class="img-fluid d-block">
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <h5 class="fs-14 mb-0"><a href="#" class="text-reset">demo product1</a></h5>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <span class="text-muted fw-semibold">
                                                                                                            Attribute
                                                                                                        </span>

                                                                                                        <h5 class="fs-14 mb-0 mt-1">
                                                                                                            <span class="badge badge-soft-info"> black </span>
                                                                                                        </h5>

                                                                                                    </td>

                                                                                                    <td>
                                                                                                        <span class="text-muted fw-semibold">Amount</span>
                                                                                                        <h5 class="fs-14 mb-0 mt-1 fw-normal">₹99 </h5>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div>
                                                                    ₹3,493.0
                                                                </div>
                                                                <span
                                                                    class="badge bg-danger-subtle text-danger fw-semibold">Unpaid</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-success-subtle text-success fw-semibold">Placed</span>
                                                            </td>
                                                            <td>
                                                                Website
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('order.view') }}" aria-label="anchor"
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
                                                            <td>#1002</td>
                                                            <td>2</td>
                                                            <td>3 days ago<br />
                                                                2025-04-14 05:40 PM</td>
                                                            <td>
                                                                Name: <br />
                                                                Phone:<br />
                                                                Email : N\A<br />
                                                                Country :<br />
                                                                City :<br />
                                                                Address :<br />
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">View All (2)</button>

                                                                <!-- Modals -->
                                                                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-light">
                                                                                <h5 class="modal-title">Product Info</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="card-body">
                                                                                    <div class="table-responsive table-card">
                                                                                        <table class="table table-hover table-centered align-middle table-nowrap">
                                                                                            <tbody id="product-info">
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <div class="d-flex align-items-center">
                                                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                                                <img src="https://placehold.co/80x80" alt="Headphone" class="img-fluid d-block">
                                                                                                            </div>
                                                                                                            <div>
                                                                                                                <h5 class="fs-14 mb-0"><a href="#" class="text-reset">demo product1</a></h5>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <span class="text-muted fw-semibold">
                                                                                                            Attribute
                                                                                                        </span>

                                                                                                        <h5 class="fs-14 mb-0 mt-1">
                                                                                                            <span class="badge badge-soft-info"> black </span>
                                                                                                        </h5>

                                                                                                    </td>

                                                                                                    <td>
                                                                                                        <span class="text-muted fw-semibold">Amount</span>
                                                                                                        <h5 class="fs-14 mb-0 mt-1 fw-normal">₹99 </h5>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                            </div>
                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div>
                                                                    ₹5,499.0
                                                                </div>
                                                                <span
                                                                    class="badge bg-success-subtle text-success fw-semibold">Paid</span>
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="badge bg-success-subtle text-success fw-semibold">Placed</span>
                                                            </td>
                                                            <td>
                                                                Store
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('order.view') }}" aria-label="anchor"
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