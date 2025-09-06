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
                        <form action="{{ route('website.banner.update', $website->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                             
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
                                            'model' => $website,
                                        ])
                                    </div>

                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                            'label' => 'Button URL',
                                            'name' => 'banner_url',
                                            'type' => 'text',
                                            'placeholder' => 'Enter URL',
                                            'model' => $website,
                                        ])
                                    </div>

                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                            'label' => 'Description',
                                            'name' => 'banner_description',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Description',
                                            'model' => $website,
                                        ])
                                    </div>

                                    <div class="col-lg-6">
                                        @include('components.form.input', [
                                            'label' => 'Choose Banner',
                                            'name' => 'website_banner',
                                            'type' => 'file',
                                            'model' => $website,
                                        ])
                                    </div>

                                    <div class="col-lg-6">
                                        @include('components.form.select', [
                                            'label' => 'Status',
                                            'name' => 'status',
                                            'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'],
                                            'model' => $website,
                                        ])
                                    </div>

                                    <div class="text-start mt-4">
                                        <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                            Add
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
