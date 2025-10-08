@extends('e-commerce/layouts/master')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Coupon</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="py-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <form action="{{ route('coupon.update', $coupon->id) }}" method="POST" id="couponEditForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Coupon Basic Details:
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-12 mb-2">
                                        <div>
                                            @include('components.form.input', [
                                            'label' => 'Coupon Code',
                                            'name' => 'coupon_code',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Coupon Code',
                                            'model' => $coupon
                                            ])
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            @include('components.form.input', [
                                            'label' => 'Coupon Title',
                                            'name' => 'coupon_title',
                                            'type' => 'text',
                                            'placeholder' => 'Summer Sale 20% OFF',
                                            'model' => $coupon
                                            ])
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label for="coupon_description" class="form-label"> Coupon Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="coupon_description" class="form-control @error('coupon_description') is-invalid @enderror" name="coupon_description" placeholder="Enter Coupon Description">{{ old('coupon_description', $coupon->coupon_description) }}</textarea>
                                            @error('coupon_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Discount Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        @include('components.form.select', [
                                        'label' => 'Discount Type',
                                        'name' => 'discount_type',
                                        'options' => ["percentage" => "Percentage", "fixed_amount" => "Fixed Amount"],
                                        'model' => $coupon
                                        ])
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            @include('components.form.input', [
                                            'label' => 'Discount Value',
                                            'name' => 'discount_value',
                                            'type' => 'number',
                                            'placeholder' => 'Enter Discount Value',
                                            ])
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            @include('components.form.input', [
                                            'label' => 'Maximum Discount Amount',
                                            'name' => 'max_discount_value',
                                            'type' => 'number',
                                            'placeholder' => 'Enter Maximum Discount Amount',
                                            ])
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            @include('components.form.input', [
                                            'label' => 'Purchase Price (Cost Price)',
                                            'name' => 'cost_price',
                                            'type' => 'number',
                                            'placeholder' => 'Product Purchase Price (Cost Price)',
                                            ])
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Usage Conditions:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        @include('components.form.input', [
                                        'label' => 'Minimum Purchase Amount',
                                        'name' => 'min_purchase_amount',
                                        'type' => 'number',
                                        'placeholder' => 'Enter Minimum Purchase Amount',
                                        ])
                                    </div>



                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        @include('components.form.select', [
                                        'label' => 'Applicable Categories',
                                        'name' => 'apply_categories',
                                        'options' => ["0" => "--Select--", "1" => "Category 1", "2" => "Category 2"]
                                        ])
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <label for="product_search" class="form-label">
                                            Product Search <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="product_search" id="product_search" class="form-control" placeholder="Search product name or SKU" required>
                                            <button type="button" class="btn btn-outline-primary">
                                                Browse Product
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                        </div> -->
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Validity Period:
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    @include('components.form.input', [
                                    'label' => 'Start Date',
                                    'name' => 'start_date',
                                    'type' => 'date',
                                    'placeholder' => 'Enter Start Date',
                                    ])
                                </div>
                                <div class="mt-3 mb-3">
                                    @include('components.form.input', [
                                    'label' => 'End Date',
                                    'name' => 'end_date',
                                    'type' => 'date',
                                    'placeholder' => 'Enter End Date',
                                    ])
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Usage Limits
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class=" mb-3">
                                    @include('components.form.input', [
                                    'label' => 'Total Usage Limit',
                                    'name' => 'total_usage',
                                    'type' => 'text',
                                    'placeholder' => 'e.g., first 100 users only',
                                    ])
                                </div>
                                <div class="mb-3">
                                    @include('components.form.input', [
                                    'label' => 'Usage Limit Per Customer',
                                    'name' => 'per_customer_usage',
                                    'type' => 'text',
                                    'placeholder' => 'e.g., 1 time per customer',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Status
                                </h5>
                            </div>

                            <div class="card-body">
                                @include('components.form.select', [
                                'label' => 'Stock Status',
                                'name' => 'stock_status',
                                'options' => ["0" => "--Select--", "1" => "Active", "2" => "Inactive"]
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Update Coupon
                            </button>
                            <a href="{{ route('coupon.index') }}" class="btn btn-secondary w-sm waves ripple-light ms-2">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div> <!-- container-fluid -->
</div> <!-- content -->

@endsection