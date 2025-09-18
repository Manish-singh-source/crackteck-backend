@extends('warehouse/layouts/master')

@section('content')

<div class="content">

    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Vendor Purchase Bill</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Vendor Purchase Details</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('vendor.update', $vendorPurchaseBill->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-3 pb-3">

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Purchase Bill No.',
                                        'name' => 'purchase_bill_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Purchase Bill No.',
                                        'value' => old('purchase_bill_no', $vendorPurchaseBill->purchase_bill_no),
                                        'required' => true,
                                        'model' => $vendorPurchaseBill,
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Vendor Name',
                                        'name' => 'vendor_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Vendor Name',
                                        'value' => old('vendor_name', $vendorPurchaseBill->vendor_name),
                                        'required' => true,
                                        'model' => $vendorPurchaseBill,
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Purchase Date',
                                        'name' => 'purchase_date',
                                        'type' => 'date',
                                        'placeholder' => 'Enter Purchase Date',
                                        'value' => old('purchase_date', $vendorPurchaseBill->purchase_date->format('Y-m-d')),
                                        'required' => true,
                                        'model' => $vendorPurchaseBill,
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Total Amount',
                                        'name' => 'total_amount',
                                        'type' => 'number',
                                        'step' => '0.01',
                                        'placeholder' => 'Enter Total Amount',
                                        'value' => old('total_amount', $vendorPurchaseBill->total_amount),
                                        'required' => true,
                                        'model' => $vendorPurchaseBill,
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Payment Status',
                                        'name' => 'payment_status',
                                        'options' => [
                                            '' => '--Select Payment Status--',
                                            'Pending' => 'Pending',
                                            'Complete' => 'Complete',
                                            'Reject' => 'Reject',
                                            'Partially Paid' => 'Partially Paid'
                                        ],
                                        'selected' => old('payment_status', $vendorPurchaseBill->payment_status),
                                        'required' => true,
                                        'model' => $vendorPurchaseBill,
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
                                        'value' => old('notes', $vendorPurchaseBill->notes),
                                        'model' => $vendorPurchaseBill,
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Attachment',
                                        'name' => 'attachment',
                                        'type' => 'file',
                                        'accept' => '.pdf,.doc,.docx,.jpg,.jpeg,.png'
                                        ])
                                        <small class="text-muted">Allowed formats: PDF, DOC, DOCX, JPG, JPEG, PNG (Max: 5MB)</small>
                                        @if($vendorPurchaseBill->attachment)
                                            <div class="mt-2">
                                                <small class="text-info">Current file: 
                                                    <a href="{{ $vendorPurchaseBill->attachment_url }}" target="_blank">View Current Attachment</a>
                                                </small>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                        <a href="{{ route('vendor.index') }}" class="btn btn-secondary ms-2">
                                            Cancel
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
