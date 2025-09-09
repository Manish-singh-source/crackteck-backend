@extends('e-commerce/layouts/master')

@section('content')
    <div class="content">


        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">{{ $parentCategorie->parent_categories }} Categorie</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".attribute-value">Add
                        Attribute Value</button>

                    <!-- Modals -->
                    <div class="modal fade attribute-value" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">Add Sub Categorie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <form action="{{ route('sub.category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="mx-3 py-3">
                                            <input type="hidden" name="parent_category_id" value="{{ $parentCategorie->id }}">
                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'Sub Categorie',
                                                    'name' => 'sub_categorie',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Sub Categorie',
                                                ])
                                            </div>

                                            <div class="mb-3">
                                                <div class="">
                                                    @include('components.form.input', [
                                                        'label' => 'Feature Image',
                                                        'name' => 'feature_image',
                                                        'type' => 'file',
                                                    ])
                                                </div>
                                            </div>

                                            <div class="mb-3">
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
                                        <button type="submit" class="btn btn-md btn-success">Add Attribue Value</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade attribute-value-edit" tabindex="-1" role="dialog"
                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h5 class="modal-title">Edit Attribute Value</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="p-2">
                                            <div class="mb-3">
                                                @include('components.form.input', [
                                                    'label' => 'Attribute Value',
                                                    'name' => 'attribute_value',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Attribute Value',
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-md btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-md btn-success">Add Attribue Value</button>
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
                                                            <th>Sub Categorie Value</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($subCategorie as $key=> $subCategorie)
                                                            <tr>
                                                                <td>{{ $key+1 }}</td>
                                                                <td>{{ $subCategorie->sub_categorie }}</td>
                                                                <td>
                                                                    <a aria-label="anchor"
                                                                        class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                                        data-bs-toggle="modal" data-bs-original-title="Edit"
                                                                        data-bs-target=".attribute-value-edit">
                                                                        <i
                                                                            class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                                                    </a>
                                                                    <a aria-label="anchor"
                                                                        class="btn btn-icon btn-sm bg-danger-subtle delete-row"
                                                                        data-bs-toggle="tooltip"
                                                                        data-bs-original-title="Delete">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
