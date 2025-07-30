@extends('e-commerce/layouts/master')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Send Mail To Subscribers</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Subject',
                                        'name' => 'subject',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Subject',
                                        ])
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-editor-area">
                                        <div class="text-editor-area">
                                            <label for="mail-composer" class="form-label"> Body
                                                <span class="text-danger">*</span>
                                            </label>
                                            <!-- <textarea id="mail-composer" class="form-control text-editor" name="details" rows="5" placeholder="Enter Description"></textarea> -->
                                            <div id="quill-editor1" style="height: 300px;">
                                                <h1>Hello World</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-start">
                                        <button class="btn btn-sm btn-primary">
                                            Send
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