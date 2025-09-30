@extends('warehouse/layouts/master')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row pt-3">
                <div class="col-xl-8 mx-auto">

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    Warehouse Details
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush ">

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Id :
                                    </span>
                                    <span>
                                        {{ $warehouse->id }}
                                    </span>
                                </li>

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Name :
                                    </span>
                                    <span>
                                        {{ $warehouse->warehouse_name }}
                                    </span>
                                </li>

                                <li
                                    class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Type :
                                    </span>
                                    <span>
                                        {{ $warehouse->warehouse_type }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    Location Details
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">
                                        Address Line 1 :
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->warehouse_addr1 }}</span><br>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Address Line 2 :
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->warehouse_addr2 }}</span>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">City :

                                    </span>
                                    <span>{{ $warehouse->city }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">State :
                                    </span>
                                    <span>{{ $warehouse->state }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Country :
                                    </span>
                                    <span>{{ $warehouse->country }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Pin Code :
                                    </span>
                                    <span>{{ $warehouse->pincode }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    Contact Details
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">
                                        Contact Person Name :
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->contact_person_name }}</span><br>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Phone Number:
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->phone_number }}</span>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Alternate Phone Number :</span>
                                    <span>{{ $warehouse->alternate_phone_number }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">E-mail Address:
                                    </span>
                                    <span>{{ $warehouse->email }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    Operational Settings
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">
                                        Working Hours :
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->working_hours }}</span>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Working Days:
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->working_days }}</span>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Maximum Storage Capacity :</span>
                                    <span>{{ $warehouse->max_store_capacity }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Supported Operations:
                                    </span>
                                    <span>{{ $warehouse->supported_operations }}</span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Zone Configuration:
                                    </span>
                                    <span>{{ $warehouse->zone_conf }}</span>
                                </li>

                            </ul>
                        </div>
                    </div>


                </div>


                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">
                                    Legal/Compliance
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">
                                        GST Number/Tax ID :
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->gst_no }}</span>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Licence/Permit Number:
                                    </span>
                                    <span>
                                        <span>{{ $warehouse->licence_no }}</span>
                                    </span>
                                </li>

                                <li
                                    class="list-group-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <span class="fw-semibold text-break">Upload Licence Document:
                                    </span>
                                    <span>
                                        <span><a class="btn btn-primary btn-sm" href="#">View</a></span>
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <form action="{{ route('warehouse.updateStatus', $warehouse->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Default Warehouse
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div>
                                    <select required="" name="default_warehouse" class="form-select w-100">
                                        <option value="0" selected disabled>---- Select ----</option>
                                        <option value="1"
                                            {{ $warehouse->default_warehouse == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="2"
                                            {{ $warehouse->default_warehouse == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Status
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div>
                                    <select required="" name="status" class="form-select w-100">
                                        <option value="0" selected disabled>---- Select ----</option>
                                        <option value="1" {{ $warehouse->status == 1 ? 'selected' : '' }}>Verified
                                        </option>
                                        <option value="2" {{ $warehouse->status == 0 ? 'selected' : '' }}>
                                            Unverified</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-end pb-3">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>    
                </div>
            </div>

        </div>
    </div> <!-- content -->
@endsection
