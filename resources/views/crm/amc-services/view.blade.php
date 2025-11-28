@extends('crm/layouts/master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-xl-8">
                    <!-- Customer Details Card -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">AMC Service Details</h5>
                                <div>
                                    <span
                                        class="fw-bold text-dark">#AMC-{{ str_pad($amcService->id, 4, '0', STR_PAD_LEFT) }}</span>
                                    <span class="badge bg-success ms-2">Active</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Customer Name:</span>
                                            <span>{{ $amcService->full_name }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Contact No:</span>
                                            <span>{{ $amcService->phone }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Email:</span>
                                            <span>{{ $amcService->email }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">DOB:</span>
                                            <span>{{ $amcService->dob ? $amcService->dob->format('d M Y') : 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Customer Type:</span>
                                            <span>{{ $amcService->customer_type ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Company Name:</span>
                                            <span>{{ $amcService->company_name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">GST No:</span>
                                            <span>{{ $amcService->gst_no ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">PAN No:</span>
                                            <span>{{ $amcService->pan_no ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Created By:</span>
                                            <span>{{ $amcService->creator->name ?? 'System' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Created At:</span>
                                            <span>{{ $amcService->created_at->format('d M Y, h:i A') }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AMC Plan Details Card -->
                    <div class="card mt-3">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">AMC Plan Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Plan Name:</span>
                                            <span>{{ $amcService->amcPlan->plan_name ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Start Date:</span>
                                            <span>{{ $amcService->plan_start_date ? $amcService->plan_start_date->format('d M Y') : 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Priority Level:</span>
                                            <span>{{ $amcService->priority_level ?? 'N/A' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Plan Duration:</span>
                                            <span>{{ $amcService->plan_duration ?? 'N/A' }}</span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">End Date:</span>
                                            <span>
                                                @php
                                                    $endDate = null;
                                                    if ($amcService->plan_start_date && $amcService->plan_duration) {
                                                        $startDate = \Carbon\Carbon::parse(
                                                            $amcService->plan_start_date,
                                                        );
                                                        $duration = $amcService->plan_duration;

                                                        // Extract number from duration string
                                                        preg_match('/\d+/', $duration, $matches);
                                                        $number = isset($matches[0]) ? (int) $matches[0] : 0;

                                                        if (stripos($duration, 'month') !== false) {
                                                            $endDate = $startDate->copy()->addMonths($number);
                                                        } elseif (stripos($duration, 'year') !== false) {
                                                            $endDate = $startDate->copy()->addYears($number);
                                                        } elseif (stripos($duration, 'day') !== false) {
                                                            $endDate = $startDate->copy()->addDays($number);
                                                        }
                                                    }
                                                @endphp
                                                {{ $endDate ? $endDate->format('d M Y') : ($amcService->plan_end_date ? $amcService->plan_end_date->format('d M Y') : 'N/A') }}
                                            </span>
                                        </li>
                                        <li class="list-group-item border-0 d-flex gap-3">
                                            <span class="fw-semibold">Total Amount:</span>
                                            <span
                                                class="fw-bold text-success">₹{{ number_format($amcService->total_amount, 2) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title flex-grow-1 mb-0">
                                        Service History Details
                                    </h5>
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center gap-2">
                                    <div>
                                        <span>
                                            Next Visit Date:
                                        </span>
                                        <span
                                            class="p-1 rounded bg-warning-subtle text-warning fw-semibold">2025-07-16</span>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addVisitModal2">Add Visit</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="addVisitModal2" tabindex="-1"
                                            aria-labelledby="addVisitModalLabel2" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="#">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="addVisitModalLabel2">Reschedule
                                                                Appointment</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body p-2">
                                                            <div class="card">
                                                                <div class="card-header border-bottom-dashed">
                                                                    <div class="d-flex">
                                                                        <h5 class="card-title flex-grow-1 mb-0">
                                                                            Engineer Location
                                                                        </h5>
                                                                    </div>
                                                                </div>

                                                                <div class="card-body">
                                                                    <div>
                                                                        <select required="" name="eng-location2"
                                                                            id="eng-location2" class="form-select w-100">
                                                                            <option value="0" selected=""
                                                                                disabled="">---- Select Location ----
                                                                            </option>
                                                                            <option value="0">Mumbai</option>
                                                                            <option value="0">Delhi</option>
                                                                            <option value="0">Kolkata</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card hide-assign-eng-section2" id="mySection2"
                                                                style="display: none;">
                                                                <div class="card-header border-bottom-dashed">
                                                                    <div class="d-flex pb-3">
                                                                        <h5 class="card-title flex-grow-1 mb-0">Assign
                                                                            Engineer</h5>
                                                                    </div>
                                                                    <div class="col-sm-10 d-flex gap-2">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input eng-assign2"
                                                                                type="radio" name="gridRadios2"
                                                                                id="individualRadio2" value="individual"
                                                                                checked="">
                                                                            <label class="form-check-label"
                                                                                for="individualRadio2">
                                                                                Individual Engineer
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input eng-assign2"
                                                                                type="radio" name="gridRadios2"
                                                                                id="groupRadio2" value="group">
                                                                            <label class="form-check-label"
                                                                                for="groupRadio2">
                                                                                Group Engineer
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="card-body">
                                                                    <!-- Individual Engineer Dropdown -->
                                                                    <div id="individualDropdown2">
                                                                        <select required="" name="status2"
                                                                            class="form-select w-100">
                                                                            <option value="" selected=""
                                                                                disabled="">---- Select Individual
                                                                                Engineer ----</option>
                                                                            <option value="engineer1">Engineer 1</option>
                                                                            <option value="engineer2">Engineer 2</option>
                                                                            <option value="engineer3">Engineer 3</option>
                                                                        </select>
                                                                    </div>

                                                                    <!-- Group Engineer Dropdown -->
                                                                    <div id="groupDropdown2" style="display: none;">
                                                                        <select id="groupDropdownSelect2"
                                                                            class="form-select w-100">
                                                                            <option value="" selected=""
                                                                                disabled="">---- Select Group Engineer
                                                                                ----</option>
                                                                            <option value="group1">Engineer 1</option>
                                                                            <option value="group2">Engineer 2</option>
                                                                            <option value="group3">Engineer 3</option>
                                                                        </select>

                                                                        <!-- Button to display selected options -->
                                                                        <button
                                                                            class="btn btn-primary mt-2 add-engineer2">Add
                                                                            Engineer</button>

                                                                        <!-- Table to display selected values with checkboxes -->
                                                                        <table class="table mt-4" id="selectedTable2">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Group Name</th>
                                                                                    <th>Admin</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <!-- Selected values will appear here -->
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success">Submit</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Assign Engineer --}}
                        <div class="card-body">
                            <table class="table table-striped table-borderless dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Engineer Name</th>
                                        <th>Visit Date</th>
                                        <th>Issue Type</th>
                                        <th>Report</th>
                                        <th>Status</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="align-middle">
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Chris Doe
                                        </td>
                                        <td>2025-07-16 12:09 PM</td>
                                        <td>
                                            Maintanance
                                        </td>
                                        <td>
                                            NA
                                        </td>
                                        <td>
                                            <span class="badge bg-warning-subtle text-warning fw-semibold">Upcoming</span>
                                        </td>
                                        <td>
                                            <!-- Re-Scheduled Button -->
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#rescheduleModal">
                                                Re-Scheduled
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="rescheduleModal" tabindex="-1"
                                                aria-labelledby="rescheduleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="#">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="rescheduleModalLabel">
                                                                    Reschedule Appointment</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body p-2">
                                                                <p>Please enter new schedule date:</p>
                                                                <input type="date" id="newSchedule"
                                                                    class="form-control"
                                                                    placeholder="Enter new date/time">
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-success">Submit</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>

                                    <tr class="align-middle">
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            John Doe
                                        </td>
                                        <td>2025-04-04 06:09 PM</td>
                                        <td>
                                            Maintanance
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="./view-detailed-service-history.php">View Report</a>
                                            <!-- <div id="popupOverlay">
                                                            <span class="closeBtn hide-report">&times;</span>
                                                            <img id="popupImage" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRevxmRXifnbO19nrfkzha4QLipReqGMcM33g&s" alt="Popup Image">
                                                        </div> -->
                                        </td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success fw-semibold">Completed</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary disabled">Re-Scheduled</button>

                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <!-- Branches Card -->
                    @if ($amcService->branches->count() > 0)
                        <div class="card mt-3">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">Branch Information</h5>
                            </div>
                            <div class="card-body">
                                @forelse($amcService->branches as $index => $branch)
                                    <div class="border rounded p-3 mb-3">
                                        <h6 class="fw-bold mb-3">Branch #{{ $index + 1 }}: {{ $branch->branch_name }}
                                        </h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class="mb-2"><span class="fw-semibold">Address:</span>
                                                    {{ $branch->address_line1 }}</p>
                                                @if ($branch->address_line2)
                                                    <p class="mb-2"><span class="fw-semibold">Address Line 2:</span>
                                                        {{ $branch->address_line2 }}</p>
                                                @endif
                                                <p class="mb-2"><span class="fw-semibold">City:</span>
                                                    {{ $branch->city }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="mb-2"><span class="fw-semibold">State:</span>
                                                    {{ $branch->state }}</p>
                                                <p class="mb-2"><span class="fw-semibold">Pincode:</span>
                                                    {{ $branch->pincode }}</p>
                                                @if ($branch->contact_person)
                                                    <p class="mb-2"><span class="fw-semibold">Contact Person:</span>
                                                        {{ $branch->contact_person }} ({{ $branch->contact_no }})</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">No branches added</p>
                                @endforelse
                            </div>
                        </div>
                    @endif

                    <!-- Products Card -->
                    @if ($amcService->products->count() > 0)
                        <div class="card mt-3">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">Product Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Type</th>
                                                <th>Brand</th>
                                                <th>Model No</th>
                                                <th>Serial No</th>
                                                <th>Purchase Date</th>
                                                <th>Warranty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($amcService->products as $index => $product)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->type->parent_categories ?? '-' }}</td>
                                                    <td>{{ $product->brand->brand_title ?? '-' }}</td>
                                                    <td>{{ $product->model_no ?? '-' }}</td>
                                                    <td>{{ $product->serial_no ?? '-' }}</td>
                                                    <td>{{ $product->purchase_date ? $product->purchase_date->format('d M Y') : '-' }}
                                                    </td>
                                                    <td>{{ $product->warranty_status ?? '-' }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center text-muted">No products added
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-xl-4">
                    <!-- Assign Engineer Card -->
                    <div class="card">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Assign Engineer</h5>
                        </div>
                        <div class="card-body">
                            <form id="assignEngineerForm">
                                @csrf
                                <input type="hidden" name="amc_service_id" value="{{ $amcService->id }}">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Assignment Type</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="assignment_type"
                                                id="typeIndividual" value="Individual" checked>
                                            <label class="form-check-label" for="typeIndividual">Individual</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="assignment_type"
                                                id="typeGroup" value="Group">
                                            <label class="form-check-label" for="typeGroup">Group</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Individual Assignment -->
                                <div id="individualSection">
                                    <div class="mb-3">
                                        <label for="engineer_id" class="form-label">Select Engineer</label>
                                        <select name="engineer_id" id="engineer_id" class="form-select">
                                            <option value="">--Select Engineer--</option>
                                            @foreach ($engineers as $engineer)
                                                <option value="{{ $engineer->id }}">
                                                    {{ $engineer->first_name }} {{ $engineer->last_name }} -
                                                    {{ $engineer->designation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Group Assignment -->
                                <div id="groupSection" style="display: none;">
                                    <div class="mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <input type="text" name="group_name" id="group_name" class="form-control"
                                            placeholder="Enter Group Name">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Select Engineers</label>
                                        <div class="border rounded p-3" style="max-height: 300px; overflow-y: auto;">
                                            @foreach ($engineers as $engineer)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input engineer-checkbox" type="checkbox"
                                                        name="engineer_ids[]" value="{{ $engineer->id }}"
                                                        id="eng_{{ $engineer->id }}">
                                                    <label class="form-check-label" for="eng_{{ $engineer->id }}">
                                                        {{ $engineer->first_name }} {{ $engineer->last_name }} -
                                                        {{ $engineer->designation }}
                                                    </label>
                                                    <input class="form-check-input ms-3" type="radio"
                                                        name="supervisor_id" value="{{ $engineer->id }}"
                                                        id="sup_{{ $engineer->id }}">
                                                    <label class="form-check-label small text-muted"
                                                        for="sup_{{ $engineer->id }}">
                                                        (Supervisor)
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <small class="text-muted">Check engineers to add to group, select one as
                                            supervisor</small>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-account-plus"></i> Assign Engineer
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Assigned Engineers History -->
                    <div class="card mt-3">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Assigned Engineers History</h5>
                        </div>
                        <div class="card-body">
                            @if ($amcService->engineerAssignments && $amcService->engineerAssignments->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 50px;">#</th>
                                                <th>Assignment Type</th>
                                                <th>Engineer(s)</th>
                                                <th>Assigned Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($amcService->engineerAssignments->sortByDesc('assigned_at') as $index => $assignment)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $assignment->assignment_type == 'Individual' ? 'bg-info' : 'bg-primary' }}">
                                                            {{ $assignment->assignment_type }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if ($assignment->assignment_type == 'Individual')
                                                            <div>
                                                                <strong>{{ $assignment->engineer->first_name ?? '' }}
                                                                    {{ $assignment->engineer->last_name ?? '' }}</strong>
                                                                <br>
                                                                <small
                                                                    class="text-muted">{{ $assignment->engineer->designation ?? '' }}</small>
                                                            </div>
                                                        @else
                                                            <div>
                                                                <strong>Group: {{ $assignment->group_name }}</strong>
                                                                <br>
                                                                <small class="text-muted">
                                                                    Supervisor:
                                                                    {{ $assignment->supervisor->first_name ?? '' }}
                                                                    {{ $assignment->supervisor->last_name ?? '' }}
                                                                </small>
                                                                <br>
                                                                <small class="text-muted">
                                                                    Members: {{ $assignment->groupEngineers->count() }}
                                                                </small>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-clock-outline"></i>
                                                        {{ $assignment->assigned_at ? $assignment->assigned_at->format('d M Y, h:i A') : 'N/A' }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $assignment->status == 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                                            {{ $assignment->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center text-muted py-4">
                                    <i class="mdi mdi-account-off mdi-48px"></i>
                                    <p class="mb-0">No engineers assigned yet</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Actions Card -->
                    <div class="card mt-3">
                        <div class="card-header border-bottom-dashed">
                            <h5 class="card-title mb-0">Actions</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('amc-services.edit', $amcService->id) }}" class="btn btn-warning">
                                    <i class="bx bx-pencil"></i> Edit AMC Service
                                </a>
                                <a href="{{ route('amc-services.index') }}" class="btn btn-secondary">
                                    <i class="bx bx-arrow-back"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Toggle between Individual and Group assignment
        $('input[name="assignment_type"]').change(function() {
            if ($(this).val() === 'Individual') {
                $('#individualSection').show();
                $('#groupSection').hide();
            } else {
                $('#individualSection').hide();
                $('#groupSection').show();
            }
        });

        // Handle form submission
        $('#assignEngineerForm').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            // Validation
            let assignmentType = $('input[name="assignment_type"]:checked').val();

            if (assignmentType === 'Individual') {
                if (!$('#engineer_id').val()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please select an engineer'
                    });
                    return;
                }
            } else {
                if (!$('#group_name').val()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please enter group name'
                    });
                    return;
                }

                let checkedEngineers = $('.engineer-checkbox:checked').length;
                if (checkedEngineers === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please select at least one engineer'
                    });
                    return;
                }

                if (!$('input[name="supervisor_id"]:checked').val()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please select a supervisor'
                    });
                    return;
                }
            }

            // Submit form
            $.ajax({
                url: '{{ route('amc-services.assign-engineer') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            location.reload();
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'An error occurred';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: errorMessage
                    });
                }
            });
        });
    });
</script>
@endsection
