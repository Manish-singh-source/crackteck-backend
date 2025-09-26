@extends('e-commerce/layouts/master')

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="pb-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Parent Category: {{ $parentCategorie->parent_categories }}</h4>
                </div>
                <div>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Back to Categories</a>
                </div>
            </div>

            <!-- Parent Category Edit Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Parent Category</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.update', $parentCategorie->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                            'label' => 'Category Name',
                                            'name' => 'parent_categories',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Category Name',
                                            'model' => $parentCategorie,
                                            'required' => true,
                                        ])
                                    </div>
                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                            'label' => 'Category URL',
                                            'name' => 'url',
                                            'type' => 'url',
                                            'placeholder' => 'Enter Category URL',
                                            'model' => $parentCategorie,
                                            'required' => true,
                                        ])
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="category_image" class="form-label">Category Image</label>
                                        <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*">
                                        <small class="text-muted">Upload category image (JPEG, PNG, JPG, GIF - Max: 2MB)</small>
                                        @if($parentCategorie->category_image)
                                            <div class="mt-2">
                                                <img src="{{ asset($parentCategorie->category_image) }}" alt="Current Image" style="width: 100px; height: 100px; object-fit: cover;" class="rounded">
                                                <small class="d-block text-muted">Current Image</small>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                            'label' => 'Sort Order',
                                            'name' => 'sort_order',
                                            'type' => 'number',
                                            'placeholder' => 'Enter Sort Order',
                                            'model' => $parentCategorie,
                                            'min' => '0',
                                        ])
                                    </div>
                                    <div class="col-lg-6">
                                        @include('components.form.select', [
                                            'label' => 'General Status',
                                            'name' => 'status',
                                            'options' => [
                                                'Active' => 'Active',
                                                'Inactive' => 'Inactive',
                                            ],
                                            'model' => $parentCategorie,
                                            'required' => true,
                                        ])
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-switch mt-4">
                                            <input class="form-check-input" type="checkbox" id="category_status_ecommerce"
                                                   name="category_status_ecommerce" value="1"
                                                   {{ $parentCategorie->category_status_ecommerce ? 'checked' : '' }}>
                                            <label class="form-check-label" for="category_status_ecommerce">
                                                Show on E-commerce Website
                                            </label>
                                            <small class="d-block text-muted">Enable to display this category on the frontend website</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-start mt-4">
                                    <button type="submit" class="btn btn-success">Update Parent Category</button>
                                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Child Categories Management -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Child Categories</h5>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addChildModal">
                                Add Child Category
                            </button>
                        </div>
                        <div class="card-body">
                            @if($subCategories->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Child Name</th>
                                                <th>Feature Image</th>
                                                <th>Icon Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subCategories as $subCategory)
                                                <tr>
                                                    <td>{{ $subCategory->id }}</td>
                                                    <td>{{ $subCategory->sub_categorie }}</td>
                                                    <td>
                                                        @if($subCategory->feature_image)
                                                            <img src="{{ asset($subCategory->feature_image) }}"
                                                                 alt="{{ $subCategory->sub_categorie }}"
                                                                 style="width: 40px; height: 40px; object-fit: cover;"
                                                                 class="rounded">
                                                        @else
                                                            <span class="text-muted">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($subCategory->icon_image)
                                                            <img src="{{ asset($subCategory->icon_image) }}"
                                                                 alt="{{ $subCategory->sub_categorie }}"
                                                                 style="width: 40px; height: 40px; object-fit: cover;"
                                                                 class="rounded">
                                                        @else
                                                            <span class="text-muted">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm me-1"
                                                                onclick="editChild({{ $subCategory->id }})"
                                                                data-bs-toggle="tooltip" title="Edit">
                                                            <i class="mdi mdi-pencil-outline"></i>
                                                        </button>
                                                        <form style="display: inline-block"
                                                              action="{{ route('child.category.delete', $subCategory->id) }}"
                                                              method="POST"
                                                              onsubmit="return confirm('Are you sure you want to delete this child category?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                    data-bs-toggle="tooltip" title="Delete">
                                                                <i class="mdi mdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <p class="text-muted">No child categories found for this parent category.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addChildModal">
                                        Add First Child Category
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->

    <!-- Add Child Category Modal -->
    <div class="modal fade" id="addChildModal" tabindex="-1" aria-labelledby="addChildModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addChildModalLabel">Add Child Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sub.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="parent_category_id" value="{{ $parentCategorie->id }}">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                @include('components.form.input', [
                                    'label' => 'Child Category Name',
                                    'name' => 'sub_categorie',
                                    'type' => 'text',
                                    'placeholder' => 'Enter Child Category Name',
                                    'required' => true,
                                ])
                            </div>
                            <div class="col-6">
                                <label for="feature_image" class="form-label">Feature Image</label>
                                <input type="file" class="form-control" id="feature_image" name="feature_image" accept="image/*">
                                <small class="text-muted">Upload feature image (JPEG, PNG, JPG, GIF - Max: 2MB)</small>
                            </div>
                            <div class="col-6">
                                <label for="icon_image" class="form-label">Icon Image</label>
                                <input type="file" class="form-control" id="icon_image" name="icon_image" accept="image/*">
                                <small class="text-muted">Upload icon image (JPEG, PNG, JPG, GIF - Max: 2MB)</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Child Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Child Category Modal -->
    <div class="modal fade" id="editChildModal" tabindex="-1" aria-labelledby="editChildModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editChildModalLabel">Edit Child Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editChildForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="parent_category_id" value="{{ $parentCategorie->id }}">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="edit_sub_categorie" class="form-label">Child Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_sub_categorie" name="sub_categorie" required>
                            </div>
                            <div class="col-6">
                                <label for="edit_feature_image" class="form-label">Feature Image</label>
                                <input type="file" class="form-control" id="edit_feature_image" name="feature_image" accept="image/*">
                                <small class="text-muted">Upload feature image (JPEG, PNG, JPG, GIF - Max: 2MB)</small>
                                <div id="current_feature_image" class="mt-2"></div>
                            </div>
                            <div class="col-6">
                                <label for="edit_icon_image" class="form-label">Icon Image</label>
                                <input type="file" class="form-control" id="edit_icon_image" name="icon_image" accept="image/*">
                                <small class="text-muted">Upload icon image (JPEG, PNG, JPG, GIF - Max: 2MB)</small>
                                <div id="current_icon_image" class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Child Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function editChild(id) {
            // Fetch child category data via AJAX
            $.ajax({
                url: `/e-commerce/get-child-category-data/${id}`,
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        const data = response.data;

                        // Set the form action URL
                        document.getElementById('editChildForm').action = `/e-commerce/update-child-categorie/${id}`;

                        // Set the current values
                        document.getElementById('edit_sub_categorie').value = data.sub_categorie;

                        // Clear previous image previews
                        document.getElementById('current_feature_image').innerHTML = '';
                        document.getElementById('current_icon_image').innerHTML = '';

                        // Set image previews if images exist
                        if (data.feature_image_url) {
                            document.getElementById('current_feature_image').innerHTML = `
                                <img src="${data.feature_image_url}" alt="Current Feature Image"
                                     style="width: 80px; height: 80px; object-fit: cover;" class="rounded">
                                <small class="d-block text-muted">Current Feature Image</small>
                            `;
                        }

                        if (data.icon_image_url) {
                            document.getElementById('current_icon_image').innerHTML = `
                                <img src="${data.icon_image_url}" alt="Current Icon Image"
                                     style="width: 80px; height: 80px; object-fit: cover;" class="rounded">
                                <small class="d-block text-muted">Current Icon Image</small>
                            `;
                        }

                        // Show the modal
                        new bootstrap.Modal(document.getElementById('editChildModal')).show();
                    }
                },
                error: function(xhr) {
                    console.error('Error fetching child category data:', xhr.responseText);
                    toastr.error('Failed to load child category data');
                }
            });
        }

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
    @endpush
@endsection
