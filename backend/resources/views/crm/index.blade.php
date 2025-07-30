@extends('crm.layouts.master')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
            </div>
        </div>

        <!-- Start Main Widgets -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="widget-first">

                            <div class="d-flex align-items-center mb-1">
                                <span
                                    class="avatar-md rounded-circle bg-gray d-flex justify-content-center align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 24 24">
                                        <path fill="#108dff" fill-rule="evenodd"
                                            d="M2.545 8.73C2 9.8 2 11.2 2 14s0 4.2.545 5.27a5 5 0 0 0 2.185 2.185C5.8 22 7.2 22 10 22h4c2.8 0 4.2 0 5.27-.545a5 5 0 0 0 2.185-2.185C22 18.2 22 16.8 22 14s0-4.2-.545-5.27a5 5 0 0 0-2.185-2.185C18.2 6 16.8 6 14 6h-4c-2.8 0-4.2 0-5.27.545A5 5 0 0 0 2.545 8.73M15.06 12.5a.75.75 0 0 0-1.12-1l-3.011 3.374l-.87-.974a.75.75 0 0 0-1.118 1l1.428 1.6a.75.75 0 0 0 1.119 0z"
                                            clip-rule="evenodd" />
                                        <path fill="#108dff"
                                            d="M12 2c4.713 0 7.07 0 8.535 1.464c.757.758 1.123 1.754 1.3 3.192V10H2.164V6.656c.176-1.438.541-2.434 1.299-3.192C4.928 2 7.285 2 11.999 2"
                                            opacity="0.5" />
                                    </svg>
                                </span>

                                <div>
                                    <p class="mb-2 text-dark fs-15 fw-medium">Total Customers</p>
                                    <h3 class="mb-0 fs-22 text-dark me-3">456</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <p class="mb-0 text-dark mt-1 fs-14 fw-medium">This Month
                                </p>
                                <p class="text-muted mb-0 fs-13 d-flex flex-column">
                                    <span
                                        class="text-success px-2 py-1 bg-success-subtle rounded-4 me-2">+9.5%</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="widget-first">

                            <div class="d-flex align-items-center mb-1">
                                <span
                                    class="avatar-md rounded-circle bg-gray d-flex justify-content-center align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 24 24">
                                        <path fill="#108dff" fill-rule="evenodd"
                                            d="M2.545 8.73C2 9.8 2 11.2 2 14s0 4.2.545 5.27a5 5 0 0 0 2.185 2.185C5.8 22 7.2 22 10 22h4c2.8 0 4.2 0 5.27-.545a5 5 0 0 0 2.185-2.185C22 18.2 22 16.8 22 14s0-4.2-.545-5.27a5 5 0 0 0-2.185-2.185C18.2 6 16.8 6 14 6h-4c-2.8 0-4.2 0-5.27.545A5 5 0 0 0 2.545 8.73M15.06 12.5a.75.75 0 0 0-1.12-1l-3.011 3.374l-.87-.974a.75.75 0 0 0-1.118 1l1.428 1.6a.75.75 0 0 0 1.119 0z"
                                            clip-rule="evenodd" />
                                        <path fill="#108dff"
                                            d="M12 2c4.713 0 7.07 0 8.535 1.464c.757.758 1.123 1.754 1.3 3.192V10H2.164V6.656c.176-1.438.541-2.434 1.299-3.192C4.928 2 7.285 2 11.999 2"
                                            opacity="0.5" />
                                    </svg>
                                </span>

                                <div>
                                    <p class="mb-2 text-dark fs-15 fw-medium">Total Engineers</p>
                                    <h3 class="mb-0 fs-22 text-dark me-3">65</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <p class="mb-0 text-dark mt-1 fs-14 fw-medium">This Month
                                </p>
                                <p class="text-muted mb-0 fs-13 d-flex flex-column">
                                    <span
                                        class="text-success px-2 py-1 bg-success-subtle rounded-4 me-2">+9.5%</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="widget-first">

                            <div class="d-flex align-items-center mb-1">
                                <span
                                    class="avatar-md rounded-circle bg-gray d-flex justify-content-center align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 24 24">
                                        <path fill="#108dff" fill-rule="evenodd"
                                            d="M2.545 8.73C2 9.8 2 11.2 2 14s0 4.2.545 5.27a5 5 0 0 0 2.185 2.185C5.8 22 7.2 22 10 22h4c2.8 0 4.2 0 5.27-.545a5 5 0 0 0 2.185-2.185C22 18.2 22 16.8 22 14s0-4.2-.545-5.27a5 5 0 0 0-2.185-2.185C18.2 6 16.8 6 14 6h-4c-2.8 0-4.2 0-5.27.545A5 5 0 0 0 2.545 8.73M15.06 12.5a.75.75 0 0 0-1.12-1l-3.011 3.374l-.87-.974a.75.75 0 0 0-1.118 1l1.428 1.6a.75.75 0 0 0 1.119 0z"
                                            clip-rule="evenodd" />
                                        <path fill="#108dff"
                                            d="M12 2c4.713 0 7.07 0 8.535 1.464c.757.758 1.123 1.754 1.3 3.192V10H2.164V6.656c.176-1.438.541-2.434 1.299-3.192C4.928 2 7.285 2 11.999 2"
                                            opacity="0.5" />
                                    </svg>
                                </span>

                                <div>
                                    <p class="mb-2 text-dark fs-15 fw-medium">Total Delivery Man</p>
                                    <h3 class="mb-0 fs-22 text-dark me-3">45</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <p class="mb-0 text-dark mt-1 fs-14 fw-medium">This Month
                                </p>
                                <p class="text-muted mb-0 fs-13 d-flex flex-column">
                                    <span
                                        class="text-success px-2 py-1 bg-success-subtle rounded-4 me-2">+9.5%</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="widget-first">

                            <div class="d-flex align-items-center mb-1">
                                <span
                                    class="avatar-md rounded-circle bg-gray d-flex justify-content-center align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 24 24">
                                        <path fill="#108dff" fill-rule="evenodd"
                                            d="M2.545 8.73C2 9.8 2 11.2 2 14s0 4.2.545 5.27a5 5 0 0 0 2.185 2.185C5.8 22 7.2 22 10 22h4c2.8 0 4.2 0 5.27-.545a5 5 0 0 0 2.185-2.185C22 18.2 22 16.8 22 14s0-4.2-.545-5.27a5 5 0 0 0-2.185-2.185C18.2 6 16.8 6 14 6h-4c-2.8 0-4.2 0-5.27.545A5 5 0 0 0 2.545 8.73M15.06 12.5a.75.75 0 0 0-1.12-1l-3.011 3.374l-.87-.974a.75.75 0 0 0-1.118 1l1.428 1.6a.75.75 0 0 0 1.119 0z"
                                            clip-rule="evenodd" />
                                        <path fill="#108dff"
                                            d="M12 2c4.713 0 7.07 0 8.535 1.464c.757.758 1.123 1.754 1.3 3.192V10H2.164V6.656c.176-1.438.541-2.434 1.299-3.192C4.928 2 7.285 2 11.999 2"
                                            opacity="0.5" />
                                    </svg>
                                </span>

                                <div>
                                    <p class="mb-2 text-dark fs-15 fw-medium">Total Leads</p>
                                    <h3 class="mb-0 fs-22 text-dark me-3">124</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <p class="mb-0 text-dark mt-1 fs-14 fw-medium">Leads This Month
                                </p>
                                <p class="text-muted mb-0 fs-13 d-flex flex-column">
                                    <span
                                        class="text-success px-2 py-1 bg-success-subtle rounded-4 me-2">+9.5%</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="widget-first">

                            <div class="d-flex align-items-center mb-1">
                                <span
                                    class="avatar-md rounded-circle bg-gray d-flex justify-content-center align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 24 24">
                                        <path fill="#108dff" fill-rule="evenodd"
                                            d="M2.545 8.73C2 9.8 2 11.2 2 14s0 4.2.545 5.27a5 5 0 0 0 2.185 2.185C5.8 22 7.2 22 10 22h4c2.8 0 4.2 0 5.27-.545a5 5 0 0 0 2.185-2.185C22 18.2 22 16.8 22 14s0-4.2-.545-5.27a5 5 0 0 0-2.185-2.185C18.2 6 16.8 6 14 6h-4c-2.8 0-4.2 0-5.27.545A5 5 0 0 0 2.545 8.73M15.06 12.5a.75.75 0 0 0-1.12-1l-3.011 3.374l-.87-.974a.75.75 0 0 0-1.118 1l1.428 1.6a.75.75 0 0 0 1.119 0z"
                                            clip-rule="evenodd" />
                                        <path fill="#108dff"
                                            d="M12 2c4.713 0 7.07 0 8.535 1.464c.757.758 1.123 1.754 1.3 3.192V10H2.164V6.656c.176-1.438.541-2.434 1.299-3.192C4.928 2 7.285 2 11.999 2"
                                            opacity="0.5" />
                                    </svg>
                                </span>

                                <div>
                                    <p class="mb-2 text-dark fs-15 fw-medium">Total Follow Ups</p>
                                    <h3 class="mb-0 fs-22 text-dark me-3">85</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <p class="mb-0 text-dark mt-1 fs-14 fw-medium">Follow Ups This Month
                                </p>
                                <p class="text-muted mb-0 fs-13 d-flex flex-column">
                                    <span
                                        class="text-success px-2 py-1 bg-success-subtle rounded-4 me-2">+9.5%</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="widget-first">

                            <div class="d-flex align-items-center mb-1">
                                <span
                                    class="avatar-md rounded-circle bg-gray d-flex justify-content-center align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 24 24">
                                        <path fill="#108dff" fill-rule="evenodd"
                                            d="M2.545 8.73C2 9.8 2 11.2 2 14s0 4.2.545 5.27a5 5 0 0 0 2.185 2.185C5.8 22 7.2 22 10 22h4c2.8 0 4.2 0 5.27-.545a5 5 0 0 0 2.185-2.185C22 18.2 22 16.8 22 14s0-4.2-.545-5.27a5 5 0 0 0-2.185-2.185C18.2 6 16.8 6 14 6h-4c-2.8 0-4.2 0-5.27.545A5 5 0 0 0 2.545 8.73M15.06 12.5a.75.75 0 0 0-1.12-1l-3.011 3.374l-.87-.974a.75.75 0 0 0-1.118 1l1.428 1.6a.75.75 0 0 0 1.119 0z"
                                            clip-rule="evenodd" />
                                        <path fill="#108dff"
                                            d="M12 2c4.713 0 7.07 0 8.535 1.464c.757.758 1.123 1.754 1.3 3.192V10H2.164V6.656c.176-1.438.541-2.434 1.299-3.192C4.928 2 7.285 2 11.999 2"
                                            opacity="0.5" />
                                    </svg>
                                </span>

                                <div>
                                    <p class="mb-2 text-dark fs-15 fw-medium">Total Service Requests</p>
                                    <h3 class="mb-0 fs-22 text-dark me-3">122</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <p class="mb-0 text-dark mt-1 fs-14 fw-medium">Requests This Month
                                </p>
                                <p class="text-muted mb-0 fs-13 d-flex flex-column">
                                    <span
                                        class="text-success px-2 py-1 bg-success-subtle rounded-4 me-2">+9.5%</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="widget-first">

                            <div class="d-flex align-items-center mb-1">
                                <span
                                    class="avatar-md rounded-circle bg-gray d-flex justify-content-center align-items-center me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                        viewBox="0 0 24 24">
                                        <path fill="#108dff" fill-rule="evenodd"
                                            d="M2.545 8.73C2 9.8 2 11.2 2 14s0 4.2.545 5.27a5 5 0 0 0 2.185 2.185C5.8 22 7.2 22 10 22h4c2.8 0 4.2 0 5.27-.545a5 5 0 0 0 2.185-2.185C22 18.2 22 16.8 22 14s0-4.2-.545-5.27a5 5 0 0 0-2.185-2.185C18.2 6 16.8 6 14 6h-4c-2.8 0-4.2 0-5.27.545A5 5 0 0 0 2.545 8.73M15.06 12.5a.75.75 0 0 0-1.12-1l-3.011 3.374l-.87-.974a.75.75 0 0 0-1.118 1l1.428 1.6a.75.75 0 0 0 1.119 0z"
                                            clip-rule="evenodd" />
                                        <path fill="#108dff"
                                            d="M12 2c4.713 0 7.07 0 8.535 1.464c.757.758 1.123 1.754 1.3 3.192V10H2.164V6.656c.176-1.438.541-2.434 1.299-3.192C4.928 2 7.285 2 11.999 2"
                                            opacity="0.5" />
                                    </svg>
                                </span>

                                <div>
                                    <p class="mb-2 text-dark fs-15 fw-medium">Total AMC Requests</p>
                                    <h3 class="mb-0 fs-22 text-dark me-3">144</h3>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3 justify-content-between">
                                <p class="mb-0 text-dark mt-1 fs-14 fw-medium">Requests This Month
                                </p>
                                <p class="text-muted mb-0 fs-13 d-flex flex-column">
                                    <span
                                        class="text-success px-2 py-1 bg-success-subtle rounded-4 me-2">+9.5%</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Main Widgets -->


        <!-- start row -->
        <div class="row">

            <div class="col-md-12 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sales Overview</h5>
                    </div>

                    <div class="card-body">
                        <div id="basic_column_chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Sales Pipeline</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="top-session" class="apex-charts"></div>

                        <div class="row mt-2">
                            <div class="col">
                                <div class="d-flex justify-content-between align-items-center p-1">
                                    <div>
                                        <i class="mdi mdi-circle fs-12 align-middle me-1" style="color:#28C76F;"></i>
                                        <span class="align-middle fw-semibold">Won</span>
                                    </div>
                                    <span class="fw-medium text-muted float-end"><i
                                            class="mdi mdi-arrow-up text-success align-middle fs-14 me-1"></i>12.48%</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center p-1">
                                    <div>
                                        <i class="mdi mdi-circle fs-12 align-middle me-1"
                                            style="color:#EA5455;"></i>
                                        <span class="align-middle fw-semibold">Lost</span>
                                    </div>
                                    <span class="fw-medium text-muted float-end"><i
                                            class="mdi mdi-arrow-up text-success align-middle fs-14 me-1"></i>5.23%</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center p-1">
                                    <div>
                                        <i class="mdi mdi-circle fs-12 align-middle me-1"
                                            style="color: #FF9F43;"></i>
                                        <span class="align-middle fw-semibold">Qualified</span>
                                    </div>
                                    <span class="fw-medium text-muted float-end"><i
                                            class="mdi mdi-arrow-up text-success align-middle fs-14 me-1"></i>5.23%</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center p-1">
                                    <div>
                                        <i class="mdi mdi-circle fs-12 align-middle me-1" style="color: #B8C2CC;"></i>
                                        <span class="align-middle fw-semibold">Unqualified</span>
                                    </div>
                                    <span class="fw-medium text-muted float-end"><i
                                            class="mdi mdi-arrow-up text-success align-middle fs-14 me-1"></i>15.58%</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end start -->

        <div class="row">
            <div class="col-md-12 col-xl-8">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0">Top Leads</h5>
                                <div class="ms-auto">
                                    <button class="btn btn-sm bg-light border dropdown-toggle fw-medium" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by Created<i class="mdi mdi-chevron-down ms-1 fs-14"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Created</a>
                                        <a class="dropdown-item" href="#">Converted</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="totalleads" class="apex-charts mt-n3"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Plans</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mt-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="d-block ">Basic Plan</span>
                                        <span class="d-block ">40%</span>
                                    </div>
                                    <div class="progress progress-md mt-2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-primary" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="d-block ">Standard</span>
                                        <span class="d-block ">80%</span>
                                    </div>
                                    <div class="progress progress-md mt-2" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="d-block ">Premium</span>
                                        <span class="d-block ">45%</span>
                                    </div>
                                    <div class="progress progress-md mt-2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-primary" style="width: 45%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-fill">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="d-block ">Custom Plan</span>
                                        <span class="d-block ">25%</span>
                                    </div>
                                    <div class="progress progress-md mt-2" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-primary" style="width: 25%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-md-12 col-xl-3">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Leads Overview</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="deals-statistics" class="apex-charts"></div>
                    </div>

                </div>
            </div>

            <div class="col-xl-9">
                <div class="card overflow-hidden">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Leads Report</h5>
                        </div>
                    </div>

                    <div class="card-body mt-0">
                        <div class="table-responsive table-card mt-0">

                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col" class="cursor-pointer">Lead Id</th>
                                        <th scope="col" class="cursor-pointer">Company</th>
                                        <th scope="col" class="cursor-pointer">Contact Person</th>
                                        <th scope="col" class="cursor-pointer">Industry</th>
                                        <th scope="col" class="cursor-pointer">Source</th>
                                        <th scope="col" class="cursor-pointer">Requirement</th>
                                        <th scope="col" class="cursor-pointer">Budget</th>
                                        <th scope="col" class="cursor-pointer">Urgency</th>
                                        <th scope="col" class="cursor-pointer">Status</th>
                                        <th scope="col" class="cursor-pointer">Created By</th>
                                        <th scope="col" class="cursor-pointer">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>L-001</td>
                                        <td>ABC Ltd</td>
                                        <td>sarah</td>
                                        <td>Pharma</td>
                                        <td>Website</td>
                                        <td>CCTV</td>
                                        <td>50K</td>
                                        <td>High</td>
                                        <td><span
                                                class="badge bg-primary-subtle text-primary fw-semibold">New</span>
                                        </td>
                                        <td>Raj Patel</td>

                                        <td>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="View">
                                                <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                            </a>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                            </a>
                                            <a aria-label="anchor"
                                                class="btn btn-icon btn-sm bg-danger-subtle"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>L-001</td>
                                        <td>ABC Ltd</td>
                                        <td>sarah</td>
                                        <td>Pharma</td>
                                        <td>Website</td>
                                        <td>CCTV</td>
                                        <td>50K</td>
                                        <td>High</td>
                                        <td><span
                                                class="badge bg-primary-subtle text-primary fw-semibold">New</span>
                                        </td>
                                        <td>Raj Patel</td>

                                        <td>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="View">
                                                <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                            </a>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                            </a>
                                            <a aria-label="anchor"
                                                class="btn btn-icon btn-sm bg-danger-subtle"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>L-002</td>
                                        <td>ABC Ltd</td>
                                        <td>sarah</td>
                                        <td>Pharma</td>
                                        <td>Website</td>
                                        <td>CCTV</td>
                                        <td>50K</td>
                                        <td>High</td>
                                        <td><span
                                                class="badge bg-danger-subtle text-danger fw-semibold">Lost</span></td>
                                        <td>Raj Patel</td>

                                        <td>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="View">
                                                <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                            </a>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                            </a>
                                            <a aria-label="anchor"
                                                class="btn btn-icon btn-sm bg-danger-subtle"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>L-002</td>
                                        <td>ABC Ltd</td>
                                        <td>sarah</td>
                                        <td>Pharma</td>
                                        <td>Website</td>
                                        <td>CCTV</td>
                                        <td>50K</td>
                                        <td>High</td>
                                        <td><span
                                                class="badge bg-primary-subtle text-primary fw-semibold">New</span></td>
                                        <td>Raj Patel</td>

                                        <td>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="View">
                                                <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                            </a>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                            </a>
                                            <a aria-label="anchor"
                                                class="btn btn-icon btn-sm bg-danger-subtle"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>L-002</td>
                                        <td>ABC Ltd</td>
                                        <td>sarah</td>
                                        <td>Pharma</td>
                                        <td>Website</td>
                                        <td>CCTV</td>
                                        <td>50K</td>
                                        <td>High</td>
                                        <td><span
                                                class="badge bg-danger-subtle text-danger fw-semibold">Lost</span></td>
                                        <td>Raj Patel</td>

                                        <td>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="View">
                                                <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                            </a>
                                            <a aria-label="anchor" href=""
                                                class="btn btn-icon btn-sm bg-warning-subtle me-1"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                <i class="mdi mdi-pencil-outline fs-14 text-warning"></i>
                                            </a>
                                            <a aria-label="anchor"
                                                class="btn btn-icon btn-sm bg-danger-subtle"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                <i class="mdi mdi-delete fs-14 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card overflow-hidden">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Top Salesperson Performance</h5>
                        </div>
                    </div>

                    <div class="card-body mt-0">
                        <div class="table-responsive table-card mt-0">

                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0">

                                <thead class="text-muted table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Target (₹)</th>
                                        <th>Achieved (₹)</th>
                                        <th>Deals Closed</th>
                                        <th>Conversion Rate</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Amit Sharma</td>
                                        <td>1,00,000</td>
                                        <td>1,20,000</td>
                                        <td>15</td>
                                        <td>75%</td>
                                        <td class="good">Excellent</td>
                                    </tr>
                                    <tr>
                                        <td>Ravi Mehta</td>
                                        <td>1,00,000</td>
                                        <td>80,000</td>
                                        <td>10</td>
                                        <td>60%</td>
                                        <td class="avg">Average</td>
                                    </tr>
                                    <tr>
                                        <td>Neha Singh</td>
                                        <td>1,00,000</td>
                                        <td>55,000</td>
                                        <td>5</td>
                                        <td>35%</td>
                                        <td class="poor">Needs Improvement</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-6">
                <div class="card overflow-hidden">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Top Engineer Performance</h5>
                        </div>
                    </div>

                    <div class="card-body mt-0">
                        <div class="table-responsive table-card mt-0">

                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0">

                                <thead class="text-muted table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Service Calls</th>
                                        <th>Resolved</th>
                                        <th>Response Time (avg)</th>
                                        <th>Customer Rating</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Suresh Patil</td>
                                        <td>50</td>
                                        <td>48</td>
                                        <td>2h</td>
                                        <td>4.7 ★</td>
                                        <td class="good">Excellent</td>
                                    </tr>
                                    <tr>
                                        <td>Manish Jain</td>
                                        <td>45</td>
                                        <td>40</td>
                                        <td>3h</td>
                                        <td>4.1 ★</td>
                                        <td class="avg">Good</td>
                                    </tr>
                                    <tr>
                                        <td>Priya Nair</td>
                                        <td>40</td>
                                        <td>30</td>
                                        <td>5h</td>
                                        <td>3.5 ★</td>
                                        <td class="poor">Needs Training</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-6">
                <div class="card overflow-hidden">

                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title mb-0">Top Delivery Men Performance</h5>
                        </div>
                    </div>

                    <div class="card-body mt-0">
                        <div class="table-responsive table-card mt-0">

                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0">

                                <thead class="text-muted table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Total Deliveries</th>
                                        <th>On-Time Deliveries</th>
                                        <th>Customer Complaints</th>
                                        <th>Area</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Rahul Desai</td>
                                        <td>200</td>
                                        <td>195</td>
                                        <td>0</td>
                                        <td>Mumbai South</td>
                                        <td class="good">Outstanding</td>
                                    </tr>
                                    <tr>
                                        <td>Arjun Thakur</td>
                                        <td>180</td>
                                        <td>160</td>
                                        <td>2</td>
                                        <td>Navi Mumbai</td>
                                        <td class="avg">Satisfactory</td>
                                    </tr>
                                    <tr>
                                        <td>Jaydeep Yadav</td>
                                        <td>170</td>
                                        <td>130</td>
                                        <td>5</td>
                                        <td>Thane</td>
                                        <td class="poor">Needs Review</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div> <!-- container-fluid -->
</div> <!-- content -->



@endsection


