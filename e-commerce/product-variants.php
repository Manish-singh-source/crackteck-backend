<?php include('layouts/header.php') ?>

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Attribite list</h4>
            </div>
            <div>
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".attribute">Create Attribute</button>
                <!-- Modals -->
                <div class="modal fade attribute" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h5 class="modal-title">Add Attribute</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="p-2">
                                        <div class="mb-3">
                                            <label for="uname" class="form-label">Name <span class="text-danger">*</span> </label>
                                            <input type="text" value="" class="form-control" id="uname" name="name" placeholder="Enter Name" required="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="ustatus" class="form-label">Status <span class="text-danger">*</span> </label>
                                            <select class="form-select" name="status" id="ustatus" required="">
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-md btn-success">Add Attribue</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".attribute-value">Add Attribute Value</button>

                <!-- Modals -->
                <div class="modal fade attribute-value" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h5 class="modal-title">Add Attribute Value</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="p-2">
                                        <div class="mb-3">
                                            <label for="ustatus" class="form-label">Attribute <span class="text-danger">*</span> </label>
                                            <select class="form-select" name="status" id="ustatus" required="">
                                                <option selected disabled value="0"> -- Select --</option>
                                                <option value="1">Attribute 1</option>
                                                <option value="2">Attribute 2</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="uname" class="form-label">Attribute Value<span class="text-danger">*</span> </label>
                                            <input type="text" value="" class="form-control" id="uname" name="name" placeholder="Enter Attribute Value" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-md btn-danger" data-bs-dismiss="modal">Cancel</button>
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
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Color</td>
                                                        <td>
                                                            <span class="badge bg-success-subtle text-success fw-semibold">Active</span>
                                                        </td>
                                                        <td>
                                                            <a aria-label="anchor" href="product-attribute-list.php"
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
                                                        <td>2</td>
                                                        <td>Size</td>
                                                        <td>
                                                            <span class="badge bg-danger-subtle text-danger fw-semibold">Inactive</span>
                                                        </td>
                                                        <td>
                                                            <a aria-label="anchor" href="product-attribute-list.php"
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
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 

<?php include('layouts/footer.php') ?>