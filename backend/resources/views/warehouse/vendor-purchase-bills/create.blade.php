@extends('warehouse/layouts/master')

@section('content')

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create Vendor Purchase Bills</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Vendor Purchase Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Purchase Bill No.',
                                        'name' => 'invoiceNo',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Purchase Bill No.',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    @include('components.form.select', [
                                    'label' => 'Vendor Name',
                                    'name' => 'vendor_name',
                                    'options' => ["0" => "--Select--","1" => "Saurabh", "2" => "Manish"]
                                    ])
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Purchase Date',
                                        'name' => 'purchase_date',
                                        'type' => 'date',
                                        'placeholder' => 'Enter Purchase Date',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Total Amount',
                                        'name' => 'amount',
                                        'type' => 'number',
                                        'placeholder' => 'Enter Total Amount',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Payment Status',
                                        'name' => 'payment_status',
                                        'options' => ["0" => "--Select--","1" => "Active", "2" => "Inactive"]
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Notes/Remarks',
                                        'name' => 'notes',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Notes/Remarks',
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Attachment',
                                        'name' => 'attachment',
                                        'type' => 'file',
                                        ])
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-start">
                                        <a href="{{ route('vendor.index') }}" class="btn btn-primary">
                                            Submit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection