<?php
$contain = "Add Customer";
include('layouts/header.php') ?>

<div class="content">


    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meetings</li>
                        <li class="breadcrumb-item active" aria-current="page">Create Meeting</li>
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
                                            Meeting Scheduler
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="status" class="form-label">Lead Id</label>
                                        <select name="status" id="status" class="form-control">
                                            <option> -- Select Lead --</option>
                                            <option>L-001</option>
                                            <option>L-002</option>
                                            <option>L-003</option>
                                            <option>L-004</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-6">
                                        <label for="meetTitle" class="form-label">Meeting Title<span class="text-danger">*</span></label>
                                        <input type="text" name="meetTitle" id="meetTitle" class="form-control" value="" required="" placeholder="Enter Meeting Title">
                                    </div>

                                    <div class="col-6">
                                        <label for="clientName" class="form-label">Client / Lead Name <span class="text-danger">*</span></label>
                                        <input type="text" name="clientName" id="clientName" class="form-control" value="" required="" placeholder="Enter Client / Lead Name">
                                    </div>
                                    <div class="col-6">
                                        <label for="meetType" class="form-label">Meeting Type</label>
                                        <select class="form-control" name="meetType" id="meetType">
                                            <option selected disabled>-- Select Meeting Type --</option>
                                            <option value="">Onsite Demo</option>
                                            <option value="">Virtual Meeting</option>
                                            <option value="">Technical Visit</option>
                                            <option value="">Business Meeting</option>
                                        </select>
                                    </div>


                                    <div class="col-6">
                                        <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                        <input type="date" required="" name="date" id="date" class="form-control" value="" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="time" class="form-label">Time <span class="text-danger">*</span></label>
                                        <input type="time" required="" name="time" id="time" class="form-control" value="" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="location" class="form-label">Location / Meeting Link <span class="text-danger">*</span></label>
                                        <input type="text" required="" name="location" id="location" class="form-control" value="" placeholder="Enter Location / Meeting Link">
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
                                        <label for="meetAgenda" class="form-label">Meeting Agenda / Notes<span class="text-danger">*</span></label>
                                        <textarea name="meetAgenda" id="meetAgenda" class="form-control"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="followUp" class="form-label">Follow-up Task<span class="text-danger">*</span></label>
                                        <textarea name="followUp" id="followUp" class="form-control"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option selected disabled>-- Select Sales Rep --</option>
                                            <option value="">Scheduled</option>
                                            <option value="">Confirmed</option>
                                            <option value="">Completed</option>
                                            <option value="">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="attachment" class="form-label">Attachments <span class="text-danger">*</span></label>
                                        <input type="file" required="" name="attachment" id="attachment" class="form-control" value="" placeholder="">
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
                            <!-- <button type="submit" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </button> -->
                            <a href="meets.php" class="btn btn-success w-sm waves ripple-light">Submit</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('layouts/footer.php') ?>