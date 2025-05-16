<?php include('layouts/header.php') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Spare Parts Requests</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <form action="#" method="get">
                            <div class="row g-3">
                                <div class="col-xl-4 col-sm-6">
                                    <div class="search-box">
                                        <input type="text" name="search" value="" class="form-control search" placeholder="Search by name, type, brand, module number or serial number">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-3 col-6">
                                    <div>
                                        <select class="form-select" name="type" id="">

                                            <option selected="" value="0">
                                                All
                                            </option>
                                            <option value="1">
                                                Laptops
                                            </option>
                                            <option value="2">
                                                Computers
                                            </option>
                                            <option value="3">
                                                Accessories
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-3 col-6">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-100 waves ripple-light"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                            Search
                                        </button>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-3 col-6">
                                    <div>
                                        <a href="#" class="btn btn-danger w-100 waves ripple-light"> <i class="ri-refresh-line me-1 align-bottom"></i>
                                            Reset
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-body pt-0">
                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active p-2" id="all_customer_tab" data-bs-toggle="tab"
                                    href="#all_customer" role="tab">
                                    <span class="d-block d-sm-none"><i
                                            class="mdi mdi-information"></i></span>
                                    <span class="d-none d-sm-block">All Parts</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content text-muted">
                            <div class="tab-pane active show pt-4" id="all_customer" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <table id="responsive-datatable"
                                                    class="table table-striped table-borderless dt-responsive nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Engineer Name</th>
                                                            <th>Total Qty</th>
                                                            <th>In Hand Qty</th>
                                                            <th>Used Qty</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    	Engineer 1
                                                                </div>
                                                            </td>
                                                            <td>12</td>
                                                            <td>10</td>
                                                            <td>2</td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-engineer-bag.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    	Engineer 2
                                                                </div>
                                                            </td>
                                                            <td>12</td>
                                                            <td>10</td>
                                                            <td>2</td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-engineer-bag.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div>
                                                                    	Engineer 3
                                                                </div>
                                                            </td>
                                                            <td>12</td>
                                                            <td>10</td>
                                                            <td>2</td>
                                                            <td>
                                                                <a aria-label="anchor" href="view-engineer-bag.php"
                                                                    class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                                    data-bs-toggle="tooltip" data-bs-original-title="View">
                                                                    <i class="mdi mdi-eye-outline fs-14 text-primary"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->

    <?php include('layouts/footer.php') ?>