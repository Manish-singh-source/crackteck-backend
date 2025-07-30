@extends('crm/layouts/master')

@section('content')

<style>
    #popupOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #popupOverlay img {
        max-width: 90%;
        max-height: 90%;
        box-shadow: 0 0 10px #fff;
    }

    #popupOverlay .closeBtn {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        color: white;
        cursor: pointer;
    }

    button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }
</style>
<div class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-xl-8 mx-auto">

                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">
                                Leads Details
                            </h5>
                            <div class="fw-bold text-dark">
                                #{{ $lead->id }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">


                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush ">

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Client Name :
                                        </span>
                                        <span>
                                            {{ $lead->first_name }} {{ $lead->last_name }}
                                        </span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Contact no :
                                        </span>
                                        <span>
                                            {{ $lead->phone }}
                                        </span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Follow-Up Date :
                                        </span>
                                        <span>
                                            25-04-25
                                        </span>
                                    </li>
                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Follow-Up Time :
                                        </span>
                                        <span>
                                            12:45PM
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
                                            {{ $lead->email }}
                                        </span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Remarks :
                                        </span>
                                        <span>
                                            Lalji Pada , Kandivali West, Mumbai, Maharashtra 400067
                                        </span>
                                    </li>

                                    <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">Status :
                                        </span>
                                        <span>
                                            {{ $lead->status }}
                                        </span>
                                    </li>
                                    <!-- <li class="list-group-item border-0 d-flex align-items-center gap-3 flex-wrap">
                                        <span class="fw-semibold text-break">PO :
                                        </span>
                                        <span>
                                            <button class="btn btn-success btn-sm">View</button>
                                        </span>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3">
                            <div class="col-12">
                                @include('components.form.select', [
                                'label' => 'Lead Status',
                                'name' => 'status',
                                'options' => ["0" => "--Select Status--", "1" => "New", "2" => "Contacted", "3" => "Qualified", "4" => "Quoted", "Converted", "5" => "Lost"]
                                ])
                            </div>
                            <div class="col-12">
                                @include('components.form.select', [
                                'label' => 'AMC Type',
                                'name' => 'amc_type',
                                'options' => ["0" => "--Select AMC Type--", "1" => "AMC", "2" => "Non AMC"]
                                ])
                            </div>
                            <div class="col-12">
                                @include('components.form.input', [
                                'label' => 'Reasons',
                                'name' => 'region',
                                'type' => 'text',
                                'placeholder' => 'Enter Reasons',
                                ])
                            </div>


                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection