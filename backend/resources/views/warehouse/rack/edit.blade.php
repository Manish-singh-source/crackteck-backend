@extends('warehouse/layouts/master')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Rack</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Rack Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        <label for="warehouse" class="form-label">Warehouse Id <span class="text-danger">*</span></label>
                                        <select required="" name="warehouse" id="warehouse" class="form-select w-100" disabled>
                                            <option value="">-- Select Warehouse --</option>
                                            <option value="0" selected>ABC-1234</option>
                                            <option value="1">ABC-1235</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Rack Name',
                                        'name' => 'rack_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Rack Name',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Zone Area',
                                        'name' => 'zone_area',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Zone Area',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Rack No',
                                        'name' => 'rack_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Rack No',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Level No',
                                        'name' => 'level_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Level No',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Position No',
                                        'name' => 'position_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Position No',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Floor',
                                        'name' => 'floor',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Floor No',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Quantity',
                                        'name' => 'quantity',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Quantity',
                                        ])
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-start">
                                        <a href="{{ route('rack.index') }}" class="btn btn-success">
                                            Add
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card service-info">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Rack List
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="responsive-datatable"
                            class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Warehouse Id</th>
                                    <th>Rack No</th>
                                    <th>Level No</th>
                                    <th>Position No</th>
                                    <th>Quantity</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>
                                        ABC-1234
                                    </td>
                                    <td>
                                        RACK-01
                                    </td>
                                    <td>T1</td>
                                    <td>7</td>
                                    <td>13</td>
                                    <td>2025-04-04 06:09 PM</td>
                                    <td>
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
                                <tr class="align-middle">
                                    <td>
                                        ABD-1235
                                    </td>
                                    <td>
                                        RACK-02
                                    </td>
                                    <td>T2</td>
                                    <td>8</td>
                                    <td>11</td>
                                    <td>2025-04-05 06:09 PM</td>
                                    <td>
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
    </div> <!-- container-fluid -->
</div> <!-- content -->


@endsection