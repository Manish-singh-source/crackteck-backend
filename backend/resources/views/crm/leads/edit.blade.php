@extends('crm/layouts/master')

@section('content')
    <div class="content">


        <div class="container-fluid">

            <div class="bradcrumb pt-3 ps-2 bg-light">
                <div class="row ">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leads</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Leads</li>
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
                     <form action="{{ route('leads.update', $lead->id) }}" method="POST">
                        @csrf
                        @method('PUT')
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

                                        <!-- Existing Fields -->
                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'First Name',
                                                'name' => 'first_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter First Name',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'Last Name',
                                                'name' => 'last_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Last Name',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'Phone number',
                                                'name' => 'phone',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Phone number',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'E-mail address',
                                                'name' => 'email',
                                                'type' => 'email',
                                                'placeholder' => 'Enter E-mail Id',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'Date of Birth',
                                                'name' => 'dob',
                                                'type' => 'date',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.select', [
                                                'label' => 'Gender',
                                                'name' => 'gender',
                                                'options' => ['0' => '--Select--', 'Male' => 'Male', 'Female' => 'Female'],
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <!-- Lead Management Fields -->
                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'Company Name',
                                                'name' => 'company_name',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Company Name',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'Designation',
                                                'name' => 'designation',
                                                'type' => 'text',
                                                'placeholder' => 'Enter Designation',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.select', [
                                                'label' => 'Industry Type',
                                                'name' => 'industry_type',
                                                'options' => [
                                                    '0' => '--Select Industry Type--',
                                                    'Pharma' => 'Pharma',
                                                    'School' => 'School',
                                                    'Manufacturing' => 'Manufacturing',
                                                ],
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.select', [
                                                'label' => 'Source',
                                                'name' => 'source',
                                                'options' => [
                                                    '0' => '--Select Source--',
                                                    'Referral' => 'Referral',
                                                    'Website' => 'Website',
                                                    'Walk-in' => 'Walk-in',
                                                    'Event' => 'Event',
                                                ],
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.select', [
                                                'label' => 'Requirement Type',
                                                'name' => 'requirement_type',
                                                'options' => [
                                                    '0' => '--Select Requirement--',
                                                    'Servers' => 'Servers',
                                                    'CCTV' => 'CCTV',
                                                    'Biometric' => 'Biometric',
                                                    'Networking' => 'Networking',
                                                ],
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.input', [
                                                'label' => 'Budget Range',
                                                'name' => 'budget_range',
                                                'type' => 'text',
                                                'placeholder' => 'e.g., 10K-50K',
                                                'model' => $lead,
                                            ])
                                        </div>

                                        <div class="col-4">
                                            @include('components.form.select', [
                                                'label' => 'Urgency',
                                                'name' => 'urgency',
                                                'options' => [
                                                    '0' => '--Select Urgency--',
                                                    'Low' => 'Low',
                                                    'Medium' => 'Medium',
                                                    'High' => 'High',
                                                ],
                                                'model' => $lead,
                                            ])
                                        </div>
                                        <!--
                                                    <div class="col-4">
                                                        <label for="region" class="form-label">Region</label>
                                                    <input type="text" name="region" id="region" class="form-control" placeholder="Enter Region">
                                                </div> -->

                                        <!-- <div class="col-4">
                                                    <label for="assigned_to" class="form-label">Assigned To</label>
                                                    <input type="text" name="assigned_to" id="assigned_to" class="form-control" placeholder="Enter Salesperson Name or ID">
                                                </div> -->

                                        <div class="col-4">
                                            @include('components.form.select', [
                                                'label' => 'Lead Status',
                                                'name' => 'status',
                                                'options' => [
                                                    '0' => '--Select Status--',
                                                    'New' => 'New',
                                                    'Contacted' => 'Contacted',
                                                    'Qualified' => 'Qualified',
                                                    'Quoted' => 'Quoted',
                                                    'Lost' => 'Lost',
                                                ],
                                                'model' => $lead,
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


                        <div class="col-lg-12">
                            <div class="text-start mb-3">
                                {{-- <a href="{{ route('leads.index') }}" class="btn btn-success w-sm waves ripple-light">
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
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".branch-section").hide();

            $("#branch-form").on("submit", function(e) {
                e.preventdefault();
                let formData = e.serialize();
                console.log(formData);
            });
        });
    </script>
@endsection
