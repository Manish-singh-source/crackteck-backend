@extends('e-commerce/layouts/master')

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
                        <h5 class="card-title mb-0">Edit Banner</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Title',
                                'name' => 'banner_title',
                                'type' => 'text',
                                'placeholder' => 'Enter Title',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Button URL',
                                'name' => 'banner_url',
                                'type' => 'text',
                                'placeholder' => 'Enter URL',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Description',
                                'name' => 'banner_description',
                                'type' => 'text',
                                'placeholder' => 'Enter Description',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Choose Banner',
                                'name' => 'logo',
                                'type' => 'file',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.select', [
                                'label' => 'Status',
                                'name' => 'status',
                                'options' => ["1" => "Active", "2" => "Inactive"]
                                ])
                            </div>

                            <div class="text-start mt-4">
                                <a href="{{ route('website.banner.index') }}" class="btn btn-success">
                                    Add
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

@endsection