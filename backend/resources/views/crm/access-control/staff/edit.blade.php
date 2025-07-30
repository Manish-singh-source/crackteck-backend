@extends('crm/layouts/master')

@section('content')

<div class="content">


    <div class="container-fluid">

        <div class="bradcrumb pt-3 ps-2 bg-light">
            <div class="row ">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Staff</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">
                                            Role Access
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Role',
                                        'name' => 'role',
                                        'options' => ["0" => "--Select--","1" => "Admin", "2" => "Sales Person", "3" => "Operation Manager"]
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'First Name',
                                        'name' => 'firstname',
                                        'type' => 'text',
                                        'placeholder' => 'Enter First Name',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Last Name',
                                        'name' => 'lastname',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Last Name',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Phone number',
                                        'name' => 'phone',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Phone number',
                                        ])
                                    </div>


                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'E-mail address',
                                        'name' => 'email',
                                        'type' => 'email',
                                        'placeholder' => 'Enter Email id',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Date of Birth',
                                        'name' => 'dob',
                                        'type' => 'date',
                                        'placeholder' => 'Enter Date of Birth',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Gender',
                                        'name' => 'gender',
                                        'options' => ["0" => "--Select--","1" => "Male", "2" => "Female", "3" => "Other"]
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Marital Status',
                                        'name' => 'marital',
                                        'options' => ["0" => "--Select--","1" => "Yes", "2" => "No"]
                                        ])
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card pb-4">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Address Details
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label for="current-address" class="form-label">Current Address <span class="text-danger">*</span></label>
                                        <textarea name="current-address" id="current-address" class="form-control" value="" required="" placeholder="Enter Current Address"></textarea>
                                    </div>

                                    <div class="col-6">
                                        <label for="permanent-address" class="form-label">Permanent Address </label>
                                        <textarea name="permanent-address" id="permanent-address" class="form-control" value="" placeholder="Enter Permanent Address"></textarea>
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'City',
                                        'name' => 'city',
                                        'type' => 'text',
                                        'placeholder' => 'Enter City',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'State',
                                        'name' => 'state',
                                        'type' => 'text',
                                        'placeholder' => 'Enter State',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Country',
                                        'name' => 'country',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Country',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Pincode',
                                        'name' => 'pincode',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Pincode',
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Job Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Employee ID',
                                        'name' => 'emp_id',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Employee ID',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Department/Role',
                                        'name' => 'department',
                                        'options' => ["0" => "--Select--", "1" => "Sales", "2" => "Support", "3" => "Management"]
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Designation/Position',
                                        'name' => 'designation',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Designation/Position',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Joining Date',
                                        'name' => 'join_date',
                                        'type' => 'date',
                                        'placeholder' => 'Enter Joining Date',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.select', [
                                        'label' => 'Shift Timing',
                                        'name' => 'shift_timing',
                                        'options' => ["0" => "--Select--", "1" => "Morning Shift", "2" => "Afternoon Shift", "3" => "Night Shift"]
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Work Location',
                                        'name' => 'work_location',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Work Location',
                                        ])
                                    </div>

                                    <div class="col-6">
                                        @include('components.form.input', [
                                        'label' => 'Supervisor/Manager Name',
                                        'name' => 'supervisor',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Supervisor/Manager Name',
                                        ])
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
                                    Identity Proof
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        @include('components.form.select', [
                                        'label' => 'Government ID Type',
                                        'name' => 'gov_id',
                                        'options' => ["0" => "--Select--", "1" => "Aadhar Card", "2" => "Pan Card"]
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'ID Number',
                                        'name' => 'card_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter ID Number',
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'Upload ID Document (Image/PDF)',
                                        'name' => 'document_image',
                                        'type' => 'file',
                                        'placeholder' => 'Enter Upload ID Document (Image/PDF)',
                                        ])
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Other Information:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'Upload Profile Photo',
                                        'name' => 'profile_pic',
                                        'type' => 'file',
                                        'placeholder' => 'Enter Upload Profile Photo',
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'Emergency Contact Name',
                                        'name' => 'emergency_contact_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Emergency Contact Name',
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'Emergency Contact Number',
                                        'name' => 'emergency_contact_number',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Emergency Contact Number',
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.select', [
                                        'label' => 'Employment Status',
                                        'name' => 'emp_status',
                                        'options' => ["0" => "--Select--", "1" => "Active", "2" => "Inactive", "3" => "Resigned", "4" => "Terminated"]
                                        ])
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">
                                    Salary Details:
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'Salary Amount',
                                        'name' => 'salary_amount',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Salary Amount',
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.select', [
                                        'label' => 'Payment Mode',
                                        'name' => 'payment-mode',
                                        'options' => ["0" => "--Select--", "1" => "Bank Transfer", "2" => "Cash", "3" => "Cheque"]
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'Bank Account Number',
                                        'name' => 'bank_account_number',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Bank Account Number',
                                        ])
                                    </div>
                                    
                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'Bank Name',
                                        'name' => 'bank_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Bank Name',
                                        ])
                                    </div>

                                    <div class="">
                                        @include('components.form.input', [
                                        'label' => 'IFSC Code',
                                        'name' => 'ifsc_code',
                                        'type' => 'text',
                                        'placeholder' => 'Enter IFSC Code',
                                        ])
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="text-start mb-3">
                            <a href="{{ route('staff.index') }}" class="btn btn-success w-sm waves ripple-light">
                                Submit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection