@extends('e-commerce/layouts/master')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Categories List</h4>
                </div>
                {{-- <div>
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
                </div> --}}

                <div>
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".attribute">Create
                        Parent Categories</button>
                    <!-- Modals -->
                    <div class="modal fade attribute" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">Add Parent Categories</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <form action="{{ route('parent.category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="mx-3 py-3">
                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'Parent Categories',
                                                    'name' => 'parent_categories',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Parent Categories',
                                                ])
                                            </div>

                                            <div class="mb-3">
                                                @include('components.form.select', [
                                                    'label' => 'Status',
                                                    'name' => 'status',
                                                    'options' => [
                                                        '0' => '--Select--',
                                                        'Active' => 'Active',
                                                        'Inactive' => 'Inactive',
                                                    ],
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-md btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-md btn-success">Add Parent</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target=".attribute-value">Add Sub Categories</button>

                    <!-- Modals -->
                    <div class="modal fade attribute-value" tabindex="-1" role="dialog"
                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">Add Sub Categories</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <form action="{{ route('sub.category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="row mx-2 py-3">
                                            <div class="mb-3 col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Parent Name',
                                                    'name' => 'parent_category_id',
                                                    'options' =>
                                                        ['' => 'Select Attribute'] +
                                                        $parentCategorie->pluck('parent_categories', 'id')->toArray(),
                                                    'model' => old(
                                                        'parent_category_id',
                                                        $attribute->parent_category_id ?? null),
                                                ])
                                            </div>

                                            <div class="mb-3 col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Sub Categorie',
                                                    'name' => 'sub_categorie',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Sub Categorie',
                                                ])
                                            </div>

                                            <div class="mb-3 col-6">
                                                <div class="">
                                                    @include('components.form.input', [
                                                        'label' => 'Feature Image',
                                                        'name' => 'feature_image',
                                                        'type' => 'file',
                                                    ])
                                                </div>
                                            </div>

                                            <div class="mb-3 col-6">
                                                <div class="">
                                                    @include('components.form.input', [
                                                        'label' => 'Icon Image',
                                                        'name' => 'icon_image',
                                                        'type' => 'file',
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-md btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-md btn-success">Add Sub Categorie</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
                                                    class="form-control search" placeholder="Search Category">
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
                                                    <h5>Top Category</h5>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
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
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault2">
                                                                        Inactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5>Category Status</h5>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mt-3">
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault1">
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
                                                                    <label class="form-check-label"
                                                                        for="flexRadioDefault2">
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
                                                            <th>Parent Category</th>
                                                            <th>Top Category</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($parentCategorie as $parentCategorie)
                                                            <tr>
                                                                <td>{{ $parentCategorie->id }}</td>
                                                                <td>{{ $parentCategorie->parent_categories }}</td>

                                                                <td>
                                                                    <a href="#" class="text-success">
                                                                        <i class="fa-solid fa-check-double"></i>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <span
                                                                        class="badge fw-semibold {{ $parentCategorie->status === 'Active' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                                                        {{ $parentCategorie->status }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a aria-label="anchor"
                                                                        href="{{ route('categorie.view', $parentCategorie->id) }}"
                                                                        class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="View">
                                                                        <i
                                                                            class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                    </a>
                                                                    <a aria-label="anchor"
                                                                        href="{{ route('variant.update', $parentCategorie->id) }}"
                                                                        class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-original-title="Edit"
                                                                        data-bs-target=".attribute-edit">
                                                                        <i
                                                                            class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                    </a>
                                                                    <form style="display: inline-block"
                                                                        action="{{ route('category.delete', $parentCategorie->id) }}"
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
                                                                {{-- <td>
                                                                    <a aria-label="anchor"
                                                                        href="{{ route('category.edit', $parentCategorie->id) }}"
                                                                        class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="Edit">
                                                                        <i
                                                                            class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                    </a>
                                                                </td> --}}
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
