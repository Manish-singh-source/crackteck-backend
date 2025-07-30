@extends('crm/layouts/master')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="pb-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Leads</h4>
                </div>
                <div>
                    <a href="{{ route('leads.create') }}" class="btn btn-primary">Add New Leads</a>
                    <!-- <button class="btn btn-primary">Add New Customer</button> -->
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
                                                <input type="text" name="search" value=""
                                                    class="form-control search" placeholder="Search Lead Id">
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
                                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <!-- <span class="d-none d-md-inline-flex"> Sort </span> -->
                                                <i class="fa-solid fa-arrow-up-z-a "></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Sort By Lead Id</a></li>
                                                <li><a class="dropdown-item" href="#">Sort By Name</a></li>
                                                <!-- <li><a class="dropdown-item" href="#">Sort By Ratings</a></li>  -->
                                            </ul>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#standard-modal">
                                                <!-- <span class="d-none d-md-inline-flex"> Filters </span> -->
                                                <i class="fa-solid fa-filter "></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="standard-modal" tabindex="-1"
                                        aria-labelledby="standard-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="standard-modalLabel">Filters</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body px-3 py-md-2">
                                                    <h5>Industry Type</h5>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Pharma
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="hardware">
                                                                    <label class="form-check-label" for="hardware">
                                                                        Retail
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="ossupport">
                                                                    <label class="form-check-label" for="ossupport">
                                                                        Manufacturer
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="networking">
                                                                    <label class="form-check-label" for="networking">
                                                                        Healthcare
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5>Status</h5>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
                                                                        New
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault2">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault2">
                                                                        Lost
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="qualified">
                                                                    <label class="form-check-label" for="qualified">
                                                                        Qualified
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="unqualified">
                                                                    <label class="form-check-label" for="unqualified">
                                                                        Unqualified
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
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
                                        <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                                        <span class="d-none d-sm-block">All Leads</span>
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
                                                                <th>Lead Id</th>
                                                                <th>Customer Name</th>
                                                                <th>Contact No</th>
                                                                <th>Company Name</th>
                                                                <th>Industry</th>
                                                                <th>Source</th>
                                                                <th>Requirement</th>
                                                                <th>Budget</th>
                                                                <th>Urgency</th>
                                                                <th>Status</th>
                                                                <th>Created By</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($lead as $lead)
                                                                <tr>
                                                                    <td>{{ $lead->id }}</td>
                                                                    <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                                                                    <td>{{ $lead->phone }}</td>
                                                                    <td>{{ $lead->company_name }}</td>
                                                                    <td>{{ $lead->industry_type }}</td>
                                                                    <td>{{ $lead->source }}</td>
                                                                    <td>{{ $lead->requirement_type }}</td>
                                                                    <td>{{ $lead->budget_range }}</td>
                                                                    <td>{{ $lead->urgency }}</td>
                                                                    <td>{{ $lead->status }}</td>
                                                                    <td>Raj Patel</td>

                                                                    <td>
                                                                        <a aria-label="anchor"
                                                                            href="{{ route('leads.view', $lead->id) }}"
                                                                            class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="View">
                                                                            <i
                                                                                class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                        </a>
                                                                        <a aria-label="anchor"
                                                                            href="{{ route('leads.edit', $lead->id) }}"
                                                                            class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <i
                                                                                class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                        </a>
                                                                        <form style="display: inline-block"
                                                                            action="{{ route('leads.delete', $lead->id) }}"
                                                                            method="POST"
                                                                            onsubmit="return confirm('Are you sure?')">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="Delete"><i
                                                                                    class="mdi mdi-delete fs-14 text-danger"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
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
