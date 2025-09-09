@extends('crm/layouts/master')

@section('content')
    <div class="content">


        <div class="container-fluid">

            <div class="bradcrumb pt-3 ps-2 bg-light">
                <div class="row ">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Meetings</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Meeting Details</li>
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
                    <form action="{{ route('meets.update', $meet->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <div class="row g-4 align-items-center">
                                            <div class="col-sm">
                                                <h5 class="card-title mb-0">
                                                    Meeting Scheduler
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Lead Id',
                                                    'name' => 'lead_id',
                                                    'options' => [
                                                        '0' => '--Select Lead id--',
                                                        'L-001' => 'L-001',
                                                        'L-002' => 'L-002',
                                                        'L-003' => 'L-003',
                                                        'L-004' => 'L-004',
                                                        'L-005' => 'L-005',
                                                    ],
                                                    'model' => $meet,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Meeting Title',
                                                    'name' => 'meet_title',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Meeting Title',
                                                    'model' => $meet,
                                                ])
                                            </div>

                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Client / Lead Name',
                                                    'name' => 'client_name',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Client / Lead Name',
                                                    'model' => $meet,
                                                ])
                                            </div>
                                            <div class="col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Meeting Type',
                                                    'name' => 'meeting_type',
                                                    'options' => [
                                                        '0' => '--Select Meeting Type--',
                                                        'Onsite Demo' => 'Onsite Demo',
                                                        'Virtual Meeting' => 'Virtual Meeting',
                                                        'Technical Visit' => 'Technical Visit',
                                                        'Business Meeting' => 'Business Meeting',
                                                    ],
                                                    'model' => $meet,
                                                ])
                                            </div>


                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Date',
                                                    'name' => 'date',
                                                    'type' => 'date',
                                                    'model' => $meet,
                                                ])
                                            </div>
                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Time',
                                                    'name' => 'time',
                                                    'type' => 'time',
                                                    'model' => $meet,
                                                ])
                                            </div>
                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Location / Meeting Link',
                                                    'name' => 'location',
                                                    'type' => 'text',
                                                    'placeholder' => 'Enter Location / Meeting Link',
                                                    'model' => $meet,
                                                ])
                                            </div>
                                            <div class="col-6">
                                                @include('components.form.input', [
                                                    'label' => 'Attachments',
                                                    'name' => 'attachment',
                                                    'type' => 'file',
                                                    'placeholder' => 'Enter Attachments',
                                                    'model' => $meet,
                                                ])
                                            </div>
                                            <!-- <div class="col-6">
                                                <label for="assignedSalesRep" class="form-label">Assigned Sales Rep</label>
                                                <select class="form-control" name="assignedSalesRep" id="assignedSalesRep">
                                                    <option selected disabled>-- Select Sales Rep --</option>
                                                    <option value="">John Doe</option>
                                                    <option value="">Mike Doe</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="engineer" class="form-label">Engineer (if any)</label>
                                                <select class="form-control" name="engineer" id="engineer">
                                                    <option selected disabled>-- Select Sales Rep --</option>
                                                    <option value="">John Doe</option>
                                                    <option value="">Mike Doe</option>
                                                </select>
                                            </div> -->
                                            <div class="col-6">
                                                <label for="meetAgenda" class="form-label">Meeting Agenda / Notes<span
                                                        class="text-danger">*</span></label>
                                                <textarea name="meetAgenda" id="meetAgenda" class="form-control"></textarea>
                                            </div>
                                            <div class="col-6">
                                                <label for="followUp" class="form-label">Follow-up Task<span
                                                        class="text-danger">*</span></label>
                                                <textarea name="followUp" id="followUp" class="form-control"></textarea>
                                            </div>
                                            <div class="col-6">
                                                @include('components.form.select', [
                                                    'label' => 'Status',
                                                    'name' => 'status',
                                                    'options' => [
                                                        '0' => '--Select Sales Rep--',
                                                        'Scheduled' => 'Scheduled',
                                                        'Confirmed' => 'Confirmed',
                                                        'Completed' => 'Completed',
                                                        'Cancelled' => 'Cancelled',
                                                    ],
                                                    'model' => $meet,
                                                ])
                                            </div>


                                            <!-- <div class="col-6">
                                                <label for="reminderSetting" class="form-label">Reminder Settings <span class="text-danger">*</span></label>
                                                <input type="date" required="" name="reminderSetting" id="reminderSetting" class="form-control" value="" placeholder="">
                                            </div>
                                            <div class="col-6">
                                                <label for="calendar" class="form-label">Calendar Sync <span class="text-danger">*</span></label>
                                                <input type="date" required="" name="calendar" id="calendar" class="form-control" value="" placeholder="">
                                            </div> -->

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="text-start mb-3">
                                     <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                        Submit
                                    </button> 
                                    {{-- <a href="{{ route('meets.index') }}"
                                        class="btn btn-success w-sm waves ripple-light">Submit</a> --}}
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
