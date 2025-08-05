@extends('warehouse/layouts/master')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Rack</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Rack Details</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('rack.update', $warehouse_rack->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-3 pb-3">
                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            @include('components.form.input', [
                                                'label' => 'Warehouse_id',
                                                'name' => 'warehouse_id',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Rack Name',
                                                'model' => $warehouse_rack,
                                            ])
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div>
                                            @include('components.form.input', [
                                                'label' => 'Rack Name',
                                                'name' => 'rack_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Rack Name',
                                                'model' => $warehouse_rack,
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
                                                'model' => $warehouse_rack,
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
                                                'model' => $warehouse_rack,
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
                                                'model' => $warehouse_rack,
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
                                                'model' => $warehouse_rack,
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
                                                'model' => $warehouse_rack,
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
                                                'model' => $warehouse_rack,
                                            ])
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-start">
                                            {{-- <a href="{{ route('rack.index') }}" class="btn btn-success">
                                                Add
                                            </a> --}}
                                            <button type="submit" class="btn btn-success">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
