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
                <span class="body-small"> Wishlist</span>
            </li>
        </ul>
    </div>
</div>
<!-- /Breakcrumbs -->

<!-- Wishlist -->
<div class="tf-sp-2">
    <div class="container">
        <div class="tf-wishlist">
            <table class="tf-table-wishlist">
                <thead>
                    <tr>
                        <th class="wishlist-item_remove"></th>
                        <th class="wishlist-item_image"></th>
                        <th class="wishlist-item_info">
                            <p class="product-title fw-semibold">Product Name</p>
                        </th>
                        <th class="wishlist-item_price">
                            <p class="product-title fw-semibold">Unit Price</p>
                        </th>
                        <th class="wishlist-item_stock">
                            <p class="product-title fw-semibold">Stock Status</p>
                        </th>
                        <th class="wishlist-item_action"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="wishlist-item">
                        <td class="wishlist-item_remove">
                            <i class="icon-close remove link cs-pointer"></i>
                        </td>
                        <td class="wishlist-item_image">
                            <a href="{{ route('product-detail') }}">
                                <img src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                    alt="Image" class="lazyload">
                            </a>
                        </td>
                        <td class="wishlist-item_info">
                            <a class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link"
                                href="{{ route('product-detail') }}">
                                Qubo Smart Cam 360 Q100 WiFi CCTV 2 Way Talk Night Vision Security Camera
                            </a>
                        </td>
                        <td class="wishlist-item_price">
                            <p class="price-wrap fw-medium flex-nowrap">
                                <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                            </p>
                        </td>
                        <td class="wishlist-item_stock">
                            <span class="wishlist-stock-status">In Stock</span>
                        </td>
                        <td class="wishlist-item_action">
                            <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray">
                                <span class="text-white">Add To Cart</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="wishlist-item">
                        <td class="wishlist-item_remove">
                            <i class="icon-close remove link cs-pointer"></i>
                        </td>
                        <td class="wishlist-item_image">
                            <a href="{{ route('product-detail') }}">
                                <img src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                    alt="Image" class="lazyload">
                            </a>
                        </td>
                        <td class="wishlist-item_info">
                            <a class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link"
                                href="{{ route('product-detail') }}">
                                HP Victus Intel Core i5 13th Gen 13420H Gaming Laptop
                            </a>
                        </td>
                        <td class="wishlist-item_price">
                            <p class="price-wrap fw-medium flex-nowrap">
                                <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                            </p>
                        </td>
                        <td class="wishlist-item_stock">
                            <span class="wishlist-stock-status">In Stock</span>
                        </td>
                        <td class="wishlist-item_action">
                            <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray">
                                <span class="text-white">Add To Cart</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="wishlist-item">
                        <td class="wishlist-item_remove">
                            <i class="icon-close remove link cs-pointer"></i>
                        </td>
                        <td class="wishlist-item_image">
                            <a href="{{ route('product-detail') }}">
                                <img src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                    alt="Image" class="lazyload">
                            </a>
                        </td>
                        <td class="wishlist-item_info">
                            <a class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link"
                                href="{{ route('product-detail') }}">
                                RICH POLO Biometric RS 9w with WiFi Access Control, Time & Attendance (Fingerprint)
                            </a>
                        </td>
                        <td class="wishlist-item_price">
                            <p class="price-wrap fw-medium flex-nowrap">
                                <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                            </p>
                        </td>
                        <td class="wishlist-item_stock">
                            <span class="wishlist-stock-status">In Stock</span>
                        </td>
                        <td class="wishlist-item_action">
                            <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray">
                                <span class="text-white">Add To Cart</span>
                            </a>
                        </td>
                    </tr>
                    <tr class="wishlist-item">
                        <td class="wishlist-item_remove">
                            <i class="icon-close remove link cs-pointer"></i>
                        </td>
                        <td class="wishlist-item_image">
                            <a href="{{ route('product-detail') }}">
                                <img src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}" data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                    alt="Image" class="lazyload">
                            </a>
                        </td>
                        <td class="wishlist-item_info">
                            <a class="text-line-clamp-2 body-md-2 fw-semibold text-secondary link"
                                href="{{ route('product-detail') }}">
                                HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner Cartridge, 1 Ink Bottle
                                Included)
                            </a>
                        </td>
                        <td class="wishlist-item_price">
                            <p class="price-wrap fw-medium flex-nowrap">
                                <span class="new-price price-text fw-medium mb-0">₹80.000</span>
                                <span class="old-price body-md-2 text-main-2 fw-normal">₹100.000</span>
                            </p>
                        </td>
                        <td class="wishlist-item_stock">
                            <span class="wishlist-stock-status">In Stock</span>
                        </td>
                        <td class="wishlist-item_action">
                            <a href="#shoppingCart" data-bs-toggle="offcanvas" class="tf-btn btn-gray">
                                <span class="text-white">Add To Cart</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="d-none">
                    <tr>
                        <td colspan="6" class="text-center">
                            No products added to the wishlist
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- /Wishlist -->

@endsection
