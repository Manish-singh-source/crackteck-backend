@extends('e-commerce/layouts/master')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Brand List</h4>
                </div>
                <div>
                    <a href="{{ route('brand.create') }}" class="btn btn-primary">Add New Brand</a>
                    <!-- <button class="btn btn-primary">Add New Brand</button> -->
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
                                                    class="form-control search" placeholder="Search Brand">
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
                                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-arrow-up-z-a "></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Sort By Name</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xl-6 col-md-6 col-sm-6 col-6 btn-group" role="group">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#standard-modal">
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
                                                    <h5>Top Brand</h5>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Active
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault2">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Inactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5>Brand Status</h5>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Active
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault2">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Inactive
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
                            <div class="tab-content text-muted">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr. No.</th>
                                                            <th>Name</th>
                                                            <th>Top Brand</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($brand as $brand)
                                                            <tr>
                                                                <td>{{ $brand->id }}</td>
                                                                <td>{{ $brand->brand_title }}</td>
                                                                <td>
                                                                    <a href="#" class="text-success">
                                                                        <i class="fa-solid fa-check-double"></i>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="badge fw-semibold {{ $brand->status === 'Active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                                                        {{ $brand->status }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a aria-label="anchor"
                                                                        href="{{ route('brand.edit', $brand->id) }}"
                                                                        class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="Edit">
                                                                        <i
                                                                            class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                    </a>
                                                                    <form style="display: inline-block"
                                                                        action="{{ route('brand.delete', $brand->id) }}"
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
                            </div> <!-- Tab panes -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
