@extends('warehouse/layouts/master')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="pb-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Track Product</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div>
                            <form action="#" method="POST" id="service-form" enctype="multipart/form-data">
                                <div class="row g-3 align-items-end">
                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Tracking (Product) Id',
                                        'name' => 'product_id',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Product Id',
                                        ])
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-md btn-primary btn-xl px-4 fs-6 text-light waves ripple-light">View</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card service-info">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Product Details
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="responsive-datatable"
                            class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Quantity</th>
                                    <th>Rack No</th>
                                    <th>Level No</th>
                                    <th>Position No</th>
                                    <th>Stored Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/80x80" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            Headphone
                                        </div>
                                    </td>
                                    <td>
                                        Computer
                                    </td>
                                    <td>
                                        Sony
                                    </td>
                                    <td>50</td>
                                    <td>12</td>
                                    <td>13</td>
                                    <td>11</td>
                                    <td>2025-04-04 06:09 PM</td>
                                    <td>
                                        <a aria-label="anchor" href="{{ route('product-list.view') }}"
                                            class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                            data-bs-toggle="tooltip" data-bs-original-title="View">
                                            <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                        </a>
                                        <a aria-label="anchor" href="{{ route('product-list.edit') }}"
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
    </div> <!-- container-fluid -->
</div> <!-- content -->

<script>
    $(document).ready(function() {
        $(".service-info").hide();

        $("#service-form").on('submit', function(e) {
            e.preventDefault();
            $(".service-info").show();
        })
    });
</script>


@endsection