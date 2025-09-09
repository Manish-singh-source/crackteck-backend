@extends('crm/layouts/master')

@section('content')

<div class="content">


    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quotation</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Quotation</li>
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
                                            Personal Information
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <!-- <div class="col-6">
                                        <label for="clientName" class="form-label">Client Name</label>
                                        <select class="form-control" name="clientName" id="clientName">
                                            <option selected disabled>-- Select Client --</option>
                                            <option value="">Saurabh</option>
                                            <option value="">Manish</option>
                                        </select>
                                    </div> -->
                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Lead Id',
                                        'name' => 'lead_id',
                                        'options' => ["0" => "--Select Lead id--", "1" => "L-001", "2" => "L-002", "3" => "L-003", "4" => "L-004", "5" => "L-005"]
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Quotation ID',
                                        'name' => 'quoteId',
                                        'type' => 'text',
                                        'placeholder' => 'QTN-1001',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Quotation Date',
                                        'name' => 'quoteDate',
                                        'type' => 'date',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Expiration Date',
                                        'name' => 'expiryDate',
                                        'type' => 'date',
                                        ])
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Itemized Products/Services
                                </h5>
                            </div>

                            <div class="card-body">
                                <form method="post" id="branch-form">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            @include('components.form.input', [
                                            'label' => 'Item Description',
                                            'name' => 'item_desc',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Item Description',
                                            ])
                                        </div>
                                        <div class="col-6">
                                            @include('components.form.input', [
                                            'label' => 'HSN Code',
                                            'name' => 'hsn_code',
                                            'type' => 'text',
                                            'placeholder' => 'HSN Code Auto Filled',
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

                                        <div class="col-6">
                                            @include('components.form.input', [
                                            'label' => 'Unit Price',
                                            'name' => 'unit_price',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Unit Price',
                                            ])
                                        </div>

                                        <div class="col-6">
                                            @include('components.form.input', [
                                            'label' => 'Tax',
                                            'name' => 'tax',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Tax',
                                            ])
                                        </div>
                                        
                                        <div class="col-6">
                                            @include('components.form.input', [
                                            'label' => 'Total Value',
                                            'name' => 'total_value',
                                            'type' => 'text',
                                            'placeholder' => 'Enter Total Value(Auto Calculated)',
                                            ])
                                        </div>

                                        <div class="col-12">
                                            <div class="text-end">
                                                <input type="submit" value="Add" class="btn btn-success">
                                                <!-- <button type="submit" class="btn btn-success">
                                                    Add
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card branch-section">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Products/Services Information
                                </h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-borderless dt-responsive nowrap">
                                    <thead>
                                        <tr>

                                            <th>Item Description</th>
                                            <th>HSN Code</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Tax (%) </th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td>Laptop</td>
                                            <td>
                                                8471
                                            </td>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                50,000
                                            </td>
                                            <td>
                                                18
                                            </td>
                                            <td>1,18,000</td>
                                            <td>
                                                <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr class="align-middle">
                                            <td>Software Support</td>
                                            <td>
                                                9983
                                            </td>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                10,000
                                            </td>
                                            <td>
                                                18
                                            </td>
                                            <td>
                                                11,800
                                            </td>
                                            <td>
                                                <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle delete-row" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button> -->
                            <a href="{{ route('quotation.index') }}" class="btn btn-success w-sm waves ripple-light">Submit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection