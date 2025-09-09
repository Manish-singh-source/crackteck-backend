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
                        <h5 class="card-title mb-0">Create Category</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-lg-6">
                                <div class="">
                                    <label class="form-label">
                                        Select Product <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search or Enter Product Name" name="product_name" required>
                                        <button type="button" class="btn btn-secondary">
                                            Browse
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Deal Title',
                                'name' => 'deal_title',
                                'type' => 'text',
                                'placeholder' => 'Enter Deal Title',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Offer Price',
                                'name' => 'offer_price',
                                'type' => 'number',
                                'placeholder' => 'Enter Offer Price',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Discount (%)',
                                'name' => 'discount',
                                'type' => 'number',
                                'placeholder' => 'Enter Original Price (Optional)',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Original Price',
                                'name' => 'original_price',
                                'type' => 'number',
                                'placeholder' => 'Discount (%)',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Offer Start Date',
                                'name' => 'start_date',
                                'type' => 'date',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.input', [
                                'label' => 'Offer End Date',
                                'name' => 'end_date',
                                'type' => 'date',
                                ])
                            </div>

                            <div class="col-lg-6">
                                @include('components.form.select', [
                                'label' => 'Status',
                                'name' => 'status',
                                'options' => ["1" => "Active", "2" => "Inactive"]
                                ])
                            </div>

                            <div class="text-start">
                                <a href="{{ route('product-deals.index') }}" class="btn btn-success">
                                    Add Deal
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