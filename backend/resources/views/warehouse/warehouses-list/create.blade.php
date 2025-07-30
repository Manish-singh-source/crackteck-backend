@extends('warehouse/layouts/master')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Create New Warehouse</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Warehouse Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Warehouse Name',
                                        'name' => 'warehouse_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Warehouse Name',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Warehouse Type',
                                        'name' => 'warehouse_type',
                                        'options' => ["0" => "--Select--","1" => "Storage Hub", "2" => "Return Center"]
                                        ])
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Location Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Address Line 1',
                                        'name' => 'warehouse_addr1',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Address Line 1',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Address Line 2',
                                        'name' => 'warehouse_addr2',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Address Line 2',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'City',
                                        'name' => 'city',
                                        'options' => ["0" => "--Select--","1" => "Mumbai", "2" => "Thane"]
                                        ])
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'State',
                                        'name' => 'state',
                                        'options' => ["0" => "--Select--","1" => "Maharashtra"]
                                        ])
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Country',
                                        'name' => 'country',
                                        'options' => ["0" => "--Select--","1" => "India"]
                                        ])
                                    </div>
                                </div>


                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Pin Code',
                                        'name' => 'pincode',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Pincode',
                                        ])
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Contact Details</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Contact Person Name',
                                        'name' => 'contact_person_name',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Contact Person Name',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Phone Number',
                                        'name' => 'phone_number',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Phone Number',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Alternate Phone Number',
                                        'name' => 'alternate_phone_number',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Alternate Phone Number',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Email Address',
                                        'name' => 'email',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Email Address',
                                        ])
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Operational Settings</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Working Hours',
                                        'name' => 'working_hours',
                                        'type' => 'text',
                                        'placeholder' => 'E.g. 9AM - 6PM',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Working Days',
                                        'name' => 'working_days',
                                        'type' => 'text',
                                        'placeholder' => 'Monday - Sunday',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Maximum Storage Capacity',
                                        'name' => 'max-store-capacity',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Maximum Storage Capacity',
                                        ])
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Supported Operations',
                                        'name' => 'supported_operations',
                                        'options' => ["0" => "--Select Supported Operations--", "1" => "Inbound", "2" => "Outbound", "3" => "Returns", "4" => "QC"]
                                        ])
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Zone Configuration',
                                        'name' => 'zone_conf',
                                        'options' => ["0" => "--Select Zone Configuration--", "1" => "Receiving Zone", "2" => "Pick Zone", "3" => "Cold Storage"]
                                        ])
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Legal/Compliance</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-12">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'GST Number/Tax ID',
                                        'name' => 'gst_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter GST Number/Tax ID',
                                        ])
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Licence/Permit Number',
                                        'name' => 'licence_no',
                                        'type' => 'text',
                                        'placeholder' => 'Enter Licence/Permit Number',
                                        ])
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div>
                                        @include('components.form.input', [
                                        'label' => 'Upload Licence Document',
                                        'name' => 'licence_doc',
                                        'type' => 'file',
                                        ])
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">System Settings</h5>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <form action="inventory.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3 pb-3">
                                <div class="col-12">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Default Warehouse',
                                        'name' => 'default_warehouse',
                                        'options' => ["0" => "--Select--", "1" => "Active", "2" => "Inactive"]
                                        ])
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        @include('components.form.select', [
                                        'label' => 'Status',
                                        'name' => 'status',
                                        'options' => ["0" => "--Select--", "1" => "Active", "2" => "Inactive"]
                                        ])
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="text-start">
                    <!-- @include('components.form.button', [
                    'type' => 'submit',
                    'value' => 'Sign In',
                    'class' => 'btn-secondary',
                    'colClass' => 'col-12',
                    ]) -->
                    <a href="{{ route('warehouses-list.index') }}" class="btn btn-success">
                        Add
                    </a>
                </div>
            </div>

        </div>
    </div> <!-- container-fluid -->
</div> <!-- content -->


@endsection