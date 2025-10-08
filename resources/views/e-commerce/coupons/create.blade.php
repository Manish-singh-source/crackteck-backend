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
                        <li class="breadcrumb-item active" aria-current="page">Add Coupon</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="py-1 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0"></h4>
            </div>
        </div>


        <form action="{{ route('coupon.store') }}" method="POST" id="couponForm">
            @csrf
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
                                            ])
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 mb-2">
                                        <div>
                                            <label for="coupon_description" class="form-label"> Coupon Description
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea id="coupon_description" class="form-control text-editor" name="coupon_description" placeholder="Enter Coupon Description"></textarea>
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
                                        'options' => ["" => "--Select--", "percentage" => "Percentage", "fixed_amount" => "Fixed Amount"]
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
                                        <label for="categories" class="form-label">Applicable Categories (Optional)</label>
                                        <select name="categories[]" id="categories" class="form-select" multiple>
                                            @foreach($categories as $id => $name)
                                                <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Hold Ctrl/Cmd to select multiple categories. Leave empty to apply to all categories.</small>
                                        @error('categories')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-12 col-lg-12 mb-2">
                                        <label for="product_search" class="form-label">
                                            Product Search (Optional)
                                        </label>
                                        <div class="input-group mb-2">
                                            <input type="text" id="product_search" class="form-control" placeholder="Search product name or SKU">
                                            <button type="button" id="search_products" class="btn btn-outline-primary">
                                                Search Products
                                            </button>
                                        </div>

                                        <!-- Selected Products Display -->
                                        <div id="selected_products" class="border rounded p-2 bg-light" style="min-height: 60px;">
                                            <small class="text-muted">Selected products will appear here. Leave empty to apply to all products.</small>
                                        </div>

                                        <!-- Hidden inputs for selected products -->
                                        <div id="product_inputs"></div>
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
                                    'label' => 'Total Usage Limit (Optional)',
                                    'name' => 'total_usage_limit',
                                    'type' => 'number',
                                    'placeholder' => 'e.g., 100',
                                    ])
                                    <small class="text-muted">Leave empty for unlimited usage</small>
                                </div>
                                <div class="mb-3">
                                    @include('components.form.input', [
                                    'label' => 'Usage Limit Per Customer (Optional)',
                                    'name' => 'usage_limit_per_customer',
                                    'type' => 'number',
                                    'placeholder' => 'e.g., 1',
                                    ])
                                    <small class="text-muted">Leave empty for unlimited per customer</small>
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
                                'label' => 'Coupon Status',
                                'name' => 'status',
                                'options' => ["active" => "Active", "inactive" => "Inactive"]
                                ])
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="{{ route('coupon.index') }}" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->

@endsection