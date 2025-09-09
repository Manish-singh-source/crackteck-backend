@extends('crm/layouts/master')

@section('content')

<div class="content">


    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Assigned Jobs</li>
                        <li class="breadcrumb-item active" aria-current="page">Start Job</li>
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
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Client Details
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush ">

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Customer Name :
                                                </span>
                                                <span>
                                                    Shyam Jaiswal
                                                </span>
                                            </li>

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Contact no :
                                                </span>
                                                <span>
                                                    9004086582
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush ">

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Email :
                                                </span>
                                                <span>
                                                    shyam@gmail.com
                                                </span>
                                            </li>

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Address :
                                                </span>
                                                <span>
                                                    Lalji Pada , Kandivali West, Mumbai, Maharashtra 400067
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start Job Section -->
                    <div class="col-lg-12 start-job-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Start Job
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Client Connected Via',
                                        'name' => 'client_connected',
                                        'options' => ["0" => "--Select--", "1" => "Call", "2" => "E-mail", "3" => "WhatsApp"]
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Client Confirmation',
                                        'name' => 'client_confirmation',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Confirmation Details',
                                        ])
                                    </div>
                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Remote Tool Used',
                                        'name' => 'remote_tool',
                                        'options' => ["0" => "--Select Remote Tool--", "1" => "Anydesk", "2" => "Team Viewer"]
                                        ])
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 start-job-section">
                        <div class="text-start mb-3">
                            <!-- 
                            <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button>
                            -->
                            <a href="#" class="btn btn-success w-sm waves ripple-light start-job-btn">Submit</a>
                        </div>
                    </div>

                    <!-- Start Details Section -->
                    <div class="col-lg-12 start-job-details-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Job Details
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush ">

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Connected Via :
                                                </span>
                                                <span>
                                                    Call
                                                </span>
                                            </li>

                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Client Confirmation :
                                                </span>
                                                <span>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, ut?
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="list-group list-group-flush ">
                                            <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                                <span class="fw-semibold text-break">Remote Tool Used :
                                                </span>
                                                <span>
                                                    Anydesk
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 start-job-details-section">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light perform-diagnosis-btn">Perform Diagnosis</a>
                        </div>
                    </div>

                    <!-- Diagnosis Section -->
                    <div class="col-lg-12 diagnosis-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Diagnosis Details
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="fw-bold">
                                            Diagnosis Type
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="category3">
                                            <label class="form-check-label" for="category3">
                                                Windows/macOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="category2">
                                            <label class="form-check-label" for="category2">
                                                Network
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="category1">
                                            <label class="form-check-label" for="category1">
                                                Printer/Software
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 pt-3">
                                    <div class="col-6">
                                        <label for="meetType" class="form-label">Diagnosis Notes:</label>
                                        <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 diagnosis-section">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light diagnosis-complete-btn">Submit</a>
                        </div>
                    </div>

                    <!-- Diagnosis Details Section -->
                    <div class="col-lg-12 diagnosis-details-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Diagnosis Details
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row gap-3">
                                    <div class="col-12">
                                        <div class="fw-semibold text-break">
                                            Diagnosis Type
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item border-0">Windows/macOS</li>
                                            <li class="list-group-item border-0">Network</li>
                                            <li class="list-group-item border-0">Printer/Software</li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <div class="fw-semibold text-break">Diagnosis Notes :
                                        </div>
                                        <div>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, ut?
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 diagnosis-details-section">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light take-action-btn">Take Action</a>
                        </div>
                    </div>

                    <!-- Action Taken Section -->
                    <div class="col-lg-12 action-taken-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Action Taken
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- <div class="col-6">
                                        <label for="meetTitle" class="form-label">Fix Description<span class="text-danger">*</span></label>
                                        <input type="text" name="meetTitle" id="meetTitle" class="form-control" value="" required="" placeholder="Enter Confirmation Details">
                                    </div> -->
                                    <div class="col-12">
                                        <label for="meetType" class="form-label">Fix Description:</label>
                                        <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="col-12">
                                        @include('components.form.input', [
                                        'label' => 'Before Screenshot',
                                        'name' => 'before_screenshot',
                                        'type' => 'file',
                                        ])
                                    </div>
                                    <div class="col-12">
                                        @include('components.form.input', [
                                        'label' => 'After Screenshot',
                                        'name' => 'after_screenshot',
                                        'type' => 'file',
                                        ])
                                    </div>
                                    <div class="col-12">
                                        @include('components.form.input', [
                                        'label' => 'Logs (if any)',
                                        'name' => 'logs',
                                        'type' => 'file',
                                        ])
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 action-taken-section">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light take-action-complete-btn">Submit</a>
                        </div>
                    </div>

                    <!-- Action Taken Details Section -->
                    <div class="col-lg-12 action-taken-details-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Action Taken Details
                                    </h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row gap-3">
                                    <div class="col-12">
                                        <div class="fw-semibold text-break">Fix Description :
                                        </div>
                                        <div>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, ut?
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-semibold text-break">
                                            Before Screenshot:
                                        </span>
                                        <span>
                                            <button class="btn btn-sm btn-primary">View</button>
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-semibold text-break">
                                            After Screenshot:
                                        </span>
                                        <span>
                                            <button class="btn btn-sm btn-primary">View</button>
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-semibold text-break">
                                            Logs (if any):
                                        </span>
                                        <span>
                                            <button class="btn btn-sm btn-primary">View</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 action-taken-details-section">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light escalate-btn">Escalate</a>
                        </div>
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light complete-job-btn">Complete Job</a>
                        </div>
                    </div>

                    <!-- Escalate Section -->
                    <div class="col-lg-12 escalate-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Escalate to On-Site
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        @include('components.form.select', [
                                        'label' => 'Reason For Escalation',
                                        'name' => 'reason_for_escalation',
                                        'options' => ["0" => "--Select Reason--", "1" => "Hardware Failure", "2" => "No Internet Access"]
                                        ])
                                    </div>
                                    <div class="col-12">
                                        <label for="meetType" class="form-label">Additional Notes:</label>
                                        <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 escalate-section">
                        <div class="text-start mb-3">
                            <a href="#" class="btn btn-success w-sm waves ripple-light">Submit</a>
                        </div>
                    </div>

                    <!-- Complete Job Section -->
                    <div class="col-lg-12 complete-job-section">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Complete Job
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="meetTitle" class="form-label">Time Spent(HH:MM)<span class="text-danger">*</span></label>
                                        <input type="time" name="meetTitle" id="meetTitle" class="form-control" value="" required="" placeholder="Enter Confirmation Details">
                                    </div>
                                    <div class="col-12">
                                        <label for="status" class="form-label">Result</label>
                                        <select name="status" id="status" class="form-control">
                                            <option> -- Select --</option>
                                            <option>Resolved - Remote</option>
                                            <option>Unresolved - Remote</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="meetType" class="form-label">Client Feedback:</label>
                                        <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 complete-job-section">
                        <div class="text-start mb-3">
                            <a href="{{ route('assigned-jobs.index') }}" class="btn btn-success w-sm waves ripple-light">Mark as Complete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // $(".start-job-section").hide();
        $(".start-job-details-section").hide();

        $(".diagnosis-section").hide();
        $(".diagnosis-details-section").hide();

        $(".action-taken-section").hide();
        $(".action-taken-details-section").hide();

        $(".escalate-section").hide();
        $(".complete-job-section").hide();

        // events
        $(".start-job-btn").on("click", function() {
            $(".start-job-section").hide();
            $(".start-job-details-section").show();
        });

        $(".perform-diagnosis-btn").on("click", function() {
            $(this).hide();
            $(".diagnosis-section").show();
        });

        $(".diagnosis-complete-btn").on("click", function() {
            $(this).hide();
            $(".diagnosis-section").hide();
            $(".diagnosis-details-section").show();
        });

        $(".take-action-btn").on("click", function() {
            $(this).hide();
            $(".action-taken-section").show();
        });

        $(".take-action-complete-btn").on("click", function() {
            $(this).hide();
            $(".action-taken-section").hide();
            $(".action-taken-details-section").show();
        });

        $(".escalate-btn").on("click", function() {
            $(".escalate-section").show();
        });

        $(".complete-job-btn").on("click", function() {
            $(".complete-job-section").show();
        });
    });
</script>

@endsection