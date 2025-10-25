@extends('crm/layouts/master')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="bradcrumb pt-3 ps-2 bg-light">
                <div class="row ">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">AMC Plan</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit AMC Plan</li>
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
                    <form action="{{ route('amc-plan.update', $amc->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <div class="row g-4 align-items-center">
                                            <div class="col-sm">
                                                <h5 class="card-title mb-0">
                                                    Plan Information
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row g-3 pb-3">
                                            <div class="col-xl-6 col-lg-6">
                                                <div>
                                                    @include('components.form.input', [
                                                        'label' => 'Plan Name',
                                                        'name' => 'plan_name',
                                                        'type' => 'text',
                                                        'placeholder' => 'Basic, Standard, etc.',
                                                        'model' => $amc,
                                                    ])
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6">
                                                <div>
                                                    @include('components.form.input', [
                                                        'label' => 'Plan Code',
                                                        'name' => 'plan_code',
                                                        'type' => 'text',
                                                        'placeholder' => 'Enter Code',
                                                        'model' => $amc,
                                                    ])
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Plan Type',
                                                    'name' => 'plan_type',
                                                    'options' => [
                                                        '0' => '--Select--',
                                                        'Hardware' => 'Hardware',
                                                        'Networking' => 'Networking',
                                                        'Software' => 'Software',
                                                        'Comprehensive' => 'Comprehensive',
                                                    ],
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                <label for="description" class="form-label">Description <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="description" id="description" class="form-control" required=""
                                                    placeholder="Enter Description">{{ $amc->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card pb-4">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Duration and Coverage:
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="row g-3">

                                            <div class="col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Contract Duration',
                                                    'name' => 'duration',
                                                    'options' => [
                                                        '0' => '--Select Duration--',
                                                        '6 months' => '6 months',
                                                        '1 year' => '1 year',
                                                        '2 years' => '2 years',
                                                        'Custom' => 'Custom',
                                                    ],
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Start Date',
                                                    'name' => 'start_date',
                                                    'type' => 'date',
                                                    'placeholder' => 'Enter Start Date',
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'End Date',
                                                    'name' => 'end_date',
                                                    'type' => 'date',
                                                    'placeholder' => 'Enter End Date',
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Number of Visits Included',
                                                    'name' => 'total_visits',
                                                    'type' => 'number',
                                                    'placeholder' => 'Enter Number of Visits Included',
                                                    'model' => $amc,
                                                ])
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Pricing Details:
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Plan Cost (₹)',
                                                    'name' => 'plan_cost',
                                                    'type' => 'number',
                                                    'placeholder' => 'Enter Plan Cost (₹)',
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Tax (%)',
                                                    'name' => 'tax',
                                                    'type' => 'number',
                                                    'placeholder' => 'Enter Tax (%)',
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Total Cost (₹) ',
                                                    'name' => 'total_cost',
                                                    'type' => 'number',
                                                    'placeholder' => 'Enter Total Cost (₹) ',
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Payment Terms',
                                                    'name' => 'pay_terms',
                                                    'options' => [
                                                        '0' => '--Select --',
                                                        'Full Payment' => 'Full Payment',
                                                        'Installments' => 'Installments',
                                                    ],
                                                    'model' => $amc,
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Services Included:
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="">
                                                @include('components.form.select', [
                                                    'label' => 'Support Type',
                                                    'name' => 'support_type',
                                                    'options' => [
                                                        '0' => '--Select --',
                                                        'Onsite' => 'Onsite',
                                                        'Remote' => 'Remote',
                                                        'Both' => 'Both',
                                                    ],
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="">
                                                <label for="replacement_policy" class="form-label">Replacement Policy
                                                </label>
                                                <textarea name="replacement_policy" id="replacement_policy" class="form-control"
                                                    placeholder="Enter Replacement Policy">{{ $amc->replacement_policy }}</textarea>
                                            </div>

                                            @php
                                                $items = json_decode($amc->items);
                                            @endphp
                                            <div class="">
                                                <h6 class="fs-15">List of Covered Items</h6>
                                                <div class="row">
                                                    <div class="col-6">
                                                        @foreach ($coveredItems as $item)
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ Str::slug($item->item_name) }}" id="{{ $item->id }}" name="items[]"
                                                                    @if (in_array(Str::slug($item->item_name), $items)) checked @endif>
                                                                <label class="form-check-label" for="{{ $item->id }}">
                                                                    {{ $item->item_name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Other Details:
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="">
                                                @include('components.form.input', [
                                                    'label' => 'Upload Plan Brochure',
                                                    'name' => 'brochure',
                                                    'type' => 'file',
                                                    'model' => $amc,
                                                ])
                                            </div>

                                            <div class="">
                                                <label for="tandc" class="form-label">Terms and Conditions {{ $amc->tandc }}<span
                                                        class="text-danger">*</span></label>
                                                <textarea name="tandc" id="tandc" class="form-control" placeholder="Enter Terms & Conditions"
                                                   >{{ $amc->tandc }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <h5 class="card-title mb-0">
                                            Status:
                                        </h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="">
                                                @include('components.form.select', [
                                                    'label' => 'Status',
                                                    'name' => 'status',
                                                    'options' => [
                                                        '0' => '--Select--',
                                                        'Active' => 'Active',
                                                        'Inactive' => 'Inactive',
                                                    ],
                                                    'model' => $amc,
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="text-start mb-3">
                                    {{-- <a href="{{ route('amc-plans.index') }}"
                                        class="btn btn-success w-sm waves ripple-light">
                                        Submit
                                    </a> --}}
                                    <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
