@extends('e-commerce/layouts/master')

@section('content')
    <div class="content">

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
                            <h5 class="card-title mb-0">Create Brand</h5>
                        </div>
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="lang-tab-content-en"
                                                    role="tabpanel" aria-labelledby="lang-tab-en">
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="">
                                                                    @include('components.form.input', [
                                                                        'label' => 'Title',
                                                                        'name' => 'brand_title',
                                                                        'type' => 'text',
                                                                        'placeholder' => 'Enter Title',
                                                                    ])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <div>
                                                    @include('components.form.input', [
                                                        'label' => 'Logo',
                                                        'name' => 'logo',
                                                        'type' => 'file',
                                                        'placeholder' => 'Enter Logo',
                                                    ])
                                                    <div class="text-danger mt-2">Supported File : jpg,png,jpeg and size
                                                        220x220 Pixels</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                @include('components.form.select', [
                                                    'label' => 'Status',
                                                    'name' => 'status',
                                                    'options' => ['Active' => 'Active', 'Inactive' => 'Inactive'],
                                                ])
                                            </div>
                                        </div>

                                        <div class="text-start mt-4">
                                            {{-- <a href="{{ route('brand.index') }}" class="btn btn-success">
                                                Add
                                            </a> --}}
                                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                                Submit
                                            </button>
                                        </div>
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
