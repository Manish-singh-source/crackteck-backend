@extends('frontend/layout/master')

@section('main-content')

<!-- Breakcrumbs -->
<div class="tf-sp-1 pb-0">
    <div class="container">
        <ul class="breakcrumbs">
            <li>
                <a href="{{ route('website') }}" class="body-small link">
                    Home
                </a>
            </li>
            <li class="d-flex align-items-center">
                <i class="icon icon-arrow-right"></i>
            </li>
            <li>
                <span class="body-small">Account</span>
            </li>
        </ul>
    </div>
</div>
<!-- /Breakcrumbs -->
<!-- My Account -->
<section class="tf-sp-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="wrap-sidebar-account ">
                    <ul class="my-account-nav content-append">
                        <li><a href="{{ route('my-account') }}" class="my-account-nav-item">Dashboard</a></li>
                        <li><a href="{{ route('my-account-orders') }}" class="my-account-nav-item">Order</a></li>
                        <li><a href="{{ route('my-account-address') }}" class="my-account-nav-item">Address</a></li>
                        <li><a href="{{ route('my-account-edit') }}" class="my-account-nav-item">Account Details</a></li>
                        <!-- <li><a href="my-account-amc') }}" class="my-account-nav-item">AMC</a></li> -->
                        <li><span class="my-account-nav-item active">AMC</span></li>
                        <li><a href="{{ route('wishlist') }}" class="my-account-nav-item">Wishlist</a></li>
                        <li><a href="{{ route('website') }}" class="my-account-nav-item">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="my-account-content account-dashboard">
                    <h4 class="fw-semibold mb-20">AMC Details</h4>
                    <div class="tf-order_history-table">
                        <table class="table_def">
                            <thead>
                                <tr>
                                    <th class="title-sidebar fw-medium">Sr No</th>
                                    <th class="title-sidebar fw-medium">Devices</th>
                                    <th class="title-sidebar fw-medium">Plan Name</th>
                                    <th class="title-sidebar fw-medium">Purchase Date</th>
                                    <th class="title-sidebar fw-medium">Expiry Date</th>
                                    <th class="title-sidebar fw-medium">Status</th>
                                    <th class="title-sidebar fw-medium">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="td-order-item">
                                    <td class="body-text-3">#1</td>
                                    <td class="body-text-3">4</td>
                                    <td class="body-text-3">Premium AMC</td>
                                    <td class="body-text-3">28 Jan 2025 </td>
                                    <td class="body-text-3">27 Jan 2026 </td>
                                    <td class="body-text-3 text-delivered">Active</td>
                                    <td><a href="{{ route('amc-details') }}" class="tf-btn btn-small d-inline-flex">
                                            <span class="text-white">Detail</span>

                                        </a></td>
                                </tr>
                                <tr class="td-order-item">
                                    <td class="body-text-3">#2</td>
                                    <td class="body-text-3">5</td>
                                    <td class="body-text-3">Standard AMC</td>
                                    <td class="body-text-3">15 Dec 2024 </td>
                                    <td class="body-text-3">15 Dec 2025 </td>
                                    <td class="body-text-3 text-delivered">Active</td>
                                    <td><a href="{{ route('amc-details') }}" class="tf-btn btn-small d-inline-flex">
                                            <span class="text-white">Detail</span>

                                        </a></td>
                                </tr>
                                <tr class="td-order-item">
                                    <td class="body-text-3">#3</td>
                                    <td class="body-text-3">2</td>
                                    <td class="body-text-3">Standard AMC</td>
                                    <td class="body-text-3">15 Jun 2024 </td>
                                    <td class="body-text-3 text-danger">15 Jun 2025 </td>
                                    <td class="body-text-3 text-delivered">Active</td>
                                    <td><a href="{{ route('amc-details') }}" class="tf-btn btn-small d-inline-flex">
                                            <span class="text-white">Detail</span>

                                        </a></td>
                                </tr>
                                <tr class="td-order-item">
                                    <td class="body-text-3">#4</td>
                                    <td class="body-text-3">1</td>
                                    <td class="body-text-3">Basic AMC</td>
                                    <td class="body-text-3">20 Jan 2024 </td>
                                    <td class="body-text-3 text-warning">20 July 2025 </td>
                                    <td class="body-text-3 text-delivered">Active</td>
                                    <td><a href="{{ route('amc-details') }}" class="tf-btn btn-small d-inline-flex">
                                            <span class="text-white">Detail</span>

                                        </a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /My Account -->

@endsection