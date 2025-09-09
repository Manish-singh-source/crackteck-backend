@extends('warehouse/layouts/master')

@section('content')

<div class="content">


    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Stock Reports</li>
                        <li class="breadcrumb-item active" aria-current="page">Add  Stock Reports</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="py-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                             Stock Reports Information
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Requested By',
                                        'name' => 'requested_by',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Name and Department',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Date of Request',
                                        'name' => 'request_date',
                                        'type' => 'date',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Item Name',
                                        'name' => 'item_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Item Name',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Quantity',
                                        'name' => 'quantity',
                                        'type' => 'number',
                                        'placeholder' => 'Enter Quantity',
                                        ])
                                    </div>

                                    <div class="col-12">
                                        <label for="reason" class="form-label">Reason / Justification <span class="text-danger">*</span></label>
                                        <textarea name="reason" id="reason" class="form-control" rows="3" placeholder="Enter Reason or Justification" required></textarea>
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Urgency Level',
                                        'name' => 'urgency',
                                        'options' => ["0" => "--Select--","1" => "Low", "2" => "Medium", "3" => "High"]
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Approval Status',
                                        'name' => 'approval_status',
                                        'options' => ["0" => "--Select--","1" => "Pending", "2" => "Approved", "3" => "Rejected"]
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Final Status',
                                        'name' => 'final_status',
                                        'options' => ["0" => "--Select--","1" => "Purchased", "2" => "Issued from Stock"]
                                        ])
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="{{ route('stock-request.index') }}" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </a>
                            <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // $(".branch-section").hide();

            $("#branch-form").on("submit", function(e) {
                e.preventdefault();
                let formData = e.serialize();
                console.log(formData);
            });
        });
    </script>


@endsection