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
                                    <h5 class="modal-title">Edit Sub Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <form id="editChildCategoryForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="parent_category_id" value="{{ $parentCategorie->id }}">
                                    <div class="modal-body">
                                        <div class="p-2">
                                            <div class="mb-3">
                                                <label for="edit_sub_categorie" class="form-label">Sub Category Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="edit_sub_categorie" name="sub_categorie" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_feature_image" class="form-label">Feature Image</label>
                                                <input type="file" class="form-control" id="edit_feature_image" name="feature_image" accept="image/*">
                                                <small class="text-muted">Upload feature image (JPEG, PNG, JPG, GIF - Max: 2MB)</small>
                                                <div id="current_feature_image_preview" class="mt-2"></div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit_icon_image" class="form-label">Icon Image</label>
                                                <input type="file" class="form-control" id="edit_icon_image" name="icon_image" accept="image/*">
                                                <small class="text-muted">Upload icon image (JPEG, PNG, JPG, GIF - Max: 2MB)</small>
                                                <div id="current_icon_image_preview" class="mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-md btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-md btn-success">Update Sub Category</button>
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
                                                                        data-bs-target=".attribute-value-edit"
                                                                        onclick="editChildCategory({{ $subCategorie->id }})">
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

    @push('scripts')
    <script>
        function editChildCategory(childId) {
            // Fetch child category data via AJAX
            $.ajax({
                url: `/e-commerce/get-child-category-data/${childId}`,
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        const data = response.data;

                        // Set form action URL
                        document.getElementById('editChildCategoryForm').action = `/e-commerce/update-child-categorie/${childId}`;

                        // Populate form fields
                        document.getElementById('edit_sub_categorie').value = data.sub_categorie;

                        // Clear and set image previews
                        const featurePreview = document.getElementById('current_feature_image_preview');
                        const iconPreview = document.getElementById('current_icon_image_preview');

                        featurePreview.innerHTML = '';
                        iconPreview.innerHTML = '';

                        if (data.feature_image_url) {
                            featurePreview.innerHTML = `
                                <img src="${data.feature_image_url}" alt="Current Feature Image"
                                     style="width: 80px; height: 80px; object-fit: cover;" class="rounded">
                                <small class="d-block text-muted">Current Feature Image</small>
                            `;
                        }

                        if (data.icon_image_url) {
                            iconPreview.innerHTML = `
                                <img src="${data.icon_image_url}" alt="Current Icon Image"
                                     style="width: 80px; height: 80px; object-fit: cover;" class="rounded">
                                <small class="d-block text-muted">Current Icon Image</small>
                            `;
                        }
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching child category data:', xhr.responseText);
                    toastr.error('Failed to load child category data');
                }
            });
        }
    </script>
    @endpush
@endsection
