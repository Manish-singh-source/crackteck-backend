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
                                Spare Part Request
                            </h5>

                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush ">

                            <li class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <span class="fw-semibold text-break">From Engineer :
                                </span>
                                <span>
                                    User Name
                                </span>
                            </li>

                            <li class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <span class="fw-semibold text-break">Service Id:
                                </span>
                                <span>
                                    <a href="#">
                                        #1001
                                    </a>
                                </span>
                            </li>

                            <li class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <span class="fw-semibold text-break">Status:
                                </span>
                                <span>
                                    <span class="badge bg-danger-subtle text-danger fw-semibold request-status">Pending</span>
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Spare Part Details
                            </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table
                            class="table table-striped table-borderless dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Item Image</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Brand</th>
                                    <th>Modal Number</th>
                                    <th>Serial Number</th>
                                    <th>Approve Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="align-middle">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <img src="https://placehold.co/100x100" alt="Headphone" width="100px" class="img-fluid d-block">
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            External Hard Disk
                                        </div>
                                    </td>
                                    <td>
                                        Storage Device
                                    </td>
                                    <td>
                                        Seagate
                                    </td>
                                    <td>
                                        STDR2000100
                                    </td>
                                    <td>
                                        SGHD789012
                                    </td>
                                    <td>2024-02-05</td>
                                    <td>Approved</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <div class="col-xl-4">




                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Customer Details
                            </h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group list-group-flush ">

                            <li class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <span class="fw-semibold text-break">Customer Name :
                                </span>
                                <span>
                                    Shyam Jaiswal
                                </span>
                            </li>

                            <li class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <span class="fw-semibold text-break">Contact no :
                                </span>
                                <span>
                                    9004086582
                                </span>
                            </li>

                            <li class="list-group-item border-0 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                <span class="fw-semibold text-break">Feedback :
                                </span>
                                <span>
                                    Need a AMC Service for my PC
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> <!-- content -->

<script>
    $(document).ready(function() {
        $(".delivery-form").hide();

        $("#approve-request").on('click', function() {
            $(this).parent().hide();
            $(".request-status").html("Approved");
            $(".request-status").removeClass("bg-danger-subtle text-danger");
            $(".request-status").addClass("bg-success-subtle text-success");
            $(".delivery-form").show();
        });

        $("#reject-request").on('click', function() {
            $(this).parent().hide();
            $(".request-status").html("Rejected");
        });
    });
</script>


@endsection