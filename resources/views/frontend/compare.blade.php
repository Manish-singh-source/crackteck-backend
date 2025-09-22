@extends('frontend/layout/master')

@section('main-content')
    <!-- Breakcrumbs -->
    <div class="tf-sp-3 pb-0">
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
                    <span class="body-small"> Compare</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Breakcrumbs -->

    <!-- Compare -->
    <div class="tf-sp-2">
        <div class="container">
            <div class="tf-compare">
                <table class="tf-table-compare">
                    <tbody>
                        <tr class="tf-compare-row row-info">
                            <td class="tf-compare-col">
                                <h6 class="fw-semibold">Product Name</h6>
                            </td>
                            <td class="tf-compare-col tf-compare-info">
                                <div class="compare-item_info">
                                    <a href="#" class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link">
                                        Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV
                                    </a>
                                    <span class="icon">
                                        <i class="icon-close remove link cs-pointer"></i>
                                    </span>
                                </div>
                            </td>
                            <td class="tf-compare-col tf-compare-info">
                                <div class="compare-item_info">
                                    <a href="#" class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link">
                                        HP MFP 1188W Multi-function WiFi Monochrome Laser Printer </a>
                                    <span class="icon">
                                        <i class="icon-close remove link cs-pointer"></i>
                                    </span>
                                </div>
                            </td>
                            <td class="tf-compare-col tf-compare-info">
                                <div class="compare-item_info">
                                    <a href="#" class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link">
                                        HP Victus Intel Core i5 13th Gen Gaming Laptop
                                    </a>
                                    <span class="icon">
                                        <i class="icon-close remove link cs-pointer"></i>
                                    </span>
                                </div>
                            </td>
                            <td class="tf-compare-col tf-compare-info">
                                <div class="compare-item_info">
                                    <a href="#" class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link">
                                        RICH POLO Biometric WiFi Access Control, Time & Attendance
                                    </a>
                                    <span class="icon">
                                        <i class="icon-close remove link cs-pointer"></i>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr class="tf-compare-row row-image">
                            <td class="tf-compare-col">
                                <h6 class="fw-semibold">Image</h6>
                            </td>
                            <td class="tf-compare-col tf-compare-image">
                                <a href="#" class="image">
                                    <img src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                        alt="Image" class="lazyload">
                                </a>
                            </td>
                            <td class="tf-compare-col tf-compare-image">
                                <a href="#" class="image">
                                    <img src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                        alt="Image" class="lazyload">
                                </a>
                            </td>
                            <td class="tf-compare-col tf-compare-image">
                                <a href="#" class="image">
                                    <img src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                        alt="Image" class="lazyload">
                                </a>
                            </td>
                            <td class="tf-compare-col tf-compare-image">
                                <a href="#" class="image">
                                    <img src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                        alt="Image" class="lazyload">
                                </a>
                            </td>
                        </tr>
                        <tr class="tf-compare-row">
                            <td class="tf-compare-col">
                                <h6 class="fw-semibold">SKU</h6>
                            </td>
                            <td class="tf-compare-col"> <span>0047</span></td>
                            <td class="tf-compare-col"> <span>0043</span></td>
                            <td class="tf-compare-col"> <span>0054</span></td>
                            <td class="tf-compare-col"> <span>0011</span></td>
                        </tr>
                        <tr class="tf-compare-row">
                            <td class="tf-compare-col">
                                <h6 class="fw-semibold">Price</h6>
                            </td>
                            <td class="tf-compare-col">
                                <p class="price-wrap fw-medium flex-nowrap">
                                    <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                    <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                                </p>
                            </td>
                            <td class="tf-compare-col">
                                <p class="price-wrap fw-medium flex-nowrap">
                                    <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                    <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                                </p>
                            </td>
                            <td class="tf-compare-col">
                                <p class="price-wrap fw-medium flex-nowrap">
                                    <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                    <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                                </p>
                            </td>
                            <td class="tf-compare-col">
                                <p class="price-wrap fw-medium flex-nowrap">
                                    <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                    <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                                </p>
                            </td>
                        </tr>
                        <tr class="tf-compare-row">
                            <td class="tf-compare-col">
                                <h6 class="fw-semibold">Dimensions</h6>
                            </td>
                            <td class="tf-compare-col"><span>N/A</span></td>
                            <td class="tf-compare-col"><span>N/A</span></td>
                            <td class="tf-compare-col"><span>N/A</span></td>
                            <td class="tf-compare-col"><span>N/A</span></td>
                        </tr>
                        <tr class="tf-compare-row">
                            <td class="tf-compare-col">
                                <h6 class="fw-semibold">Add To Cart</h6>
                            </td>
                            <td class="tf-compare-col">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray text-nowrap">
                                    <span class="text-white">Add To Cart</span>
                                </a>
                            </td>
                            <td class="tf-compare-col">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray text-nowrap">
                                    <span class="text-white">Add To Cart</span>
                                </a>
                            </td>
                            <td class="tf-compare-col">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray text-nowrap">
                                    <span class="text-white">Add To Cart</span>
                                </a>
                            </td>
                            <td class="tf-compare-col">
                                <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray text-nowrap">
                                    <span class="text-white">Add To Cart</span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /Compare -->
@endsection
