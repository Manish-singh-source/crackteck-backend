@extends('frontend/layout/master')

@section('main-content')
    <div class="container-fluid" style="z-index: 10;display: flex;opacity: 0.9;position: absolute;">
        <div class="container">
            <div class="category-scroll-container " class="box-btn-slide-2 sw-nav-effect wow fadeInUp" data-wow-delay="0s">
                <div class="swiper tf-sw-products slider-category" data-preview="10" data-tablet="7" data-mobile-sm="4"
                    data-mobile="3" data-pagination="2" data-pagination-sm="4" data-pagination-md="7"
                    data-pagination-lg="10">
                    <div class="category-track swiper-wrapper">
                        @if(isset($categories) && $categories->count() > 0)
                            @foreach($categories as $category)
                                <div class="category-item swiper-slide">
                                    <a href="{{ $category->url }}" class="hover-img" style="text-decoration: none;">
                                        <img src="{{ $category->category_image ? asset($category->category_image) : asset('frontend-assets/images/new-products/default-category.png') }}"
                                             alt="{{ $category->parent_categories }}"
                                             style="width: 100%; height: auto; object-fit: cover;">
                                        <span style="color: #ffffff;">{{ $category->parent_categories }}</span>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <!-- Fallback content when no categories are available -->
                            <div class="category-item swiper-slide">
                                <div class="hover-img">
                                    <img src="{{ asset('frontend-assets/images/new-products/header-product-1.png') }}"
                                        alt="Default Category">
                                    <span style="color: #ffffff;">No Categories Available</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if($banners->count() > 0)
                @foreach($banners as $index => $banner)
                    <!-- Slide {{ $index + 1 }} -->
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                        style="background-image: url('{{ $banner->banner_image_url }}');">
                        <div class="container">
                            <div class="carousel-caption">
                                @if($banner->banner_sub_heading)
                                    <h5>{{ $banner->banner_sub_heading }}</h5>
                                @endif
                                @if($banner->banner_heading)
                                    <h1>{!! nl2br(e($banner->banner_heading)) !!}</h1>
                                @endif
                                @if($banner->banner_description)
                                    <p>{{ $banner->banner_description }}</p>
                                @endif
                                @if($banner->button_text && $banner->banner_url)
                                    <a href="{{ $banner->banner_url }}" class="btn btn-outline-light">{{ $banner->button_text }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Default slide when no banners are available -->
                <div class="carousel-item active"
                    style="background-image: url('{{ asset('frontend-assets/images/banner/main-banner-1.jpg') }}');">
                    <div class="container">
                        <div class="carousel-caption">
                            <h5>Welcome to CrackTeck</h5>
                            <h1>Your Technology Partner</h1>
                            <p>Discover our latest products and services</p>
                            <a href="{{ route('shop') }}" class="btn btn-outline-light">EXPLORE NOW</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Navigation buttons - only show if there are multiple banners -->
        @if($banners->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon p-3" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

            <!-- Carousel indicators -->
            <div class="carousel-indicators">
                @foreach($banners as $index => $banner)
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
        @endif
    </div>

    <!-- /Banner Product -->
    <!-- Iconbox -->
    <div class="tf-sp-2">
        <div class="container">
            <div class="swiper tf-sw-iconbox" data-preview="5" data-tablet="3" data-mobile-sm="2" data-mobile="1"
                data-space-lg="20" data-space-md="20" data-space="15">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="tf-icon-box wow fadeInLeft" data-wow-delay="0s">
                            <div class="icon-box">
                                <img src="{{ asset('frontend-assets/images/icons/icon-1.png') }}" alt="icon">
                            </div>
                            <div class="content">
                                <p class="body-text fw-semibold">Free delivery</p>
                                <p class="body-text-3">Free Shipping for orders over ₹20</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="icon-box">
                                <img src="{{ asset('frontend-assets/images/icons/icon-2.png') }}" alt="icon">
                            </div>
                            <div class="content">
                                <p class="body-text fw-semibold">Support 24/7</p>
                                <p class="body-text-3">24 hours a day, 7 days a week</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="icon-box">
                                <img src="{{ asset('frontend-assets/images/icons/icon-3.png') }}" alt="icon">
                            </div>
                            <div class="content">
                                <p class="body-text fw-semibold">Payment</p>
                                <p class="body-text-3">Pay with Multiple Credit Cards</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box wow fadeInLeft" data-wow-delay="0.3s">
                            <div class="icon-box">
                                <img src="{{ asset('frontend-assets/images/icons/icon-4.png') }}" alt="icon">
                            </div>
                            <div class="content">
                                <p class="body-text fw-semibold">Reliable</p>
                                <p class="body-text-3">Trusted by 2000+ major brands</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tf-icon-box wow fadeInLeft" data-wow-delay="0.4s">
                            <div class="icon-box">
                                <img src="{{ asset('frontend-assets/images/icons/icon-5.png') }}" alt="icon">
                            </div>
                            <div class="content">
                                <p class="body-text fw-semibold">Guarantee</p>
                                <p class="body-text-3">Within 30 days for an exchange</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-iconbox sw-dot-default justify-content-center"></div>
            </div>
        </div>
    </div>
    <!-- /Iconbox -->

    <!-- Deal Today -->
    <section class="tf-sp-2 pt-3">
        <div class="container">
            <div class="flat-title pb-8 wow fadeInUp" data-wow-delay="0">
                <h5 class="fw-semibold flat-title-has-icon">
                    Deal Of The Day
                </h5>
                <!-- <div class="box-btn-slide relative">
                            <div class="swiper-button-prev nav-swiper nav-prev-products">
                                <i class="icon-arrow-left-lg"></i>
                            </div>
                            <div class="swiper-button-next nav-swiper nav-next-products">
                                <i class="icon-arrow-right-lg"></i>
                            </div>
                        </div> -->
            </div>
            <div class="box-btn-slide-2 sw-nav-effect timer">
                <div class="swiper tf-sw-products slider-thumb-deal" data-preview="4" data-tablet="3" data-mobile-sm="2"
                    data-mobile="1" data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1"
                    data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        <!-- card 1 -->
                        <div class="swiper-slide">
                            <div class="card-product style-border wow fadeInLeft" data-wow-delay="0">
                                <div class="card-product-wrapper overflow-visible ">
                                    <div class="product-thumb-image">
                                        <a href="{{ route('product-detail') }}" class="card-image">
                                            <img width="600" height="520"
                                                src="{{ asset('frontend-assets/images/new-products/1-1.png') }}"
                                                alt="Image Product" class="lazyload img-product">
                                        </a>
                                    </div>
                                    <ul class="list-product-btn top-0 end-0">
                                        <li>
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-cart2"></i>
                                                <span class="tooltip">Add to Cart</span>
                                            </a>
                                        </li>
                                        <li class=" wishlist">
                                            <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-heart2"></i>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="modal"
                                                class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-view"></i>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-compare1"></i>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="box-sale-wrap top-0 start-0 z-5">
                                        <p class="small-text">Sale</p>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="box-title gap-xl-12">
                                        <div class="d-flex flex-column">
                                            <h6>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product fw-semibold text-secondary link">
                                                    CCTV
                                                </a>
                                            </h6>
                                        </div>
                                        <p class="price-wrap fw-medium">
                                            <span class="new-price h4 fw-normal text-primary mb-0">₹37.500</span>
                                        </p>
                                    </div>
                                    <div class="box-infor-detail gap-xl-20">
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="102738"
                                                data-labels="Days,Hours,Mins,Secs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card 2 -->
                        <div class="swiper-slide">
                            <div class="card-product style-border  wow fadeInLeft" data-wow-delay="0.1s">
                                <div class="card-product-wrapper overflow-visible">
                                    <div class="product-thumb-image">
                                        <a href="{{ route('product-detail') }}" class="card-image">
                                            <img width="600" height="520"
                                                src="{{ asset('frontend-assets/images/new-products/1-2.png') }}"
                                                alt="Image Product" class="lazyload img-product">
                                        </a>
                                        <div class="box-sale-wrap top-0 start-0 z-5">
                                            <p class="small-text">Sale</p>
                                        </div>
                                    </div>
                                    <ul class="list-product-btn top-0 end-0">
                                        <li>
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-cart2"></i>
                                                <span class="tooltip">Add to Cart</span>
                                            </a>
                                        </li>
                                        <li class=" wishlist">
                                            <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-heart2"></i>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="modal"
                                                class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-view"></i>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-compare1"></i>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-product-info">
                                    <div class="box-title gap-xl-12">
                                        <div class="d-flex flex-column">
                                            <h6>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product fw-semibold text-secondary link">
                                                    Printer
                                                </a>
                                            </h6>
                                        </div>
                                        <p class="price-wrap fw-medium">
                                            <span class="new-price h4 fw-normal text-primary mb-0">₹62.000</span>
                                        </p>
                                    </div>
                                    <div class="box-infor-detail gap-xl-20">
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="22671"
                                                data-labels="Days,Hours,Mins,Secs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card 3 -->
                        <div class="swiper-slide">
                            <div class="card-product style-border wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="card-product-wrapper overflow-visible">
                                    <div class="product-thumb-image">
                                        <a href="{{ route('product-detail') }}" class="card-image">
                                            <img width="600" height="520"
                                                src="{{ asset('frontend-assets/images/new-products/1-3.png') }}"
                                                alt="Image Product" class="lazyload img-product">
                                        </a>
                                    </div>
                                    <ul class="list-product-btn top-0 end-0">
                                        <li>
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-cart2"></i>
                                                <span class="tooltip">Add to Cart</span>
                                            </a>
                                        </li>
                                        <li class=" wishlist">
                                            <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-heart2"></i>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="modal"
                                                class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-view"></i>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-compare1"></i>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="box-sale-wrap top-0 start-0 z-5">
                                        <p class="small-text">Sale</p>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="box-title gap-xl-12">
                                        <div class="d-flex flex-column">
                                            <h6>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product fw-semibold text-secondary link">
                                                    Bio-metric
                                                </a>
                                            </h6>
                                        </div>
                                        <p class="price-wrap fw-medium">
                                            <span class="new-price h4 fw-normal text-primary mb-0">₹42.500</span>
                                        </p>
                                    </div>
                                    <div class="box-infor-detail gap-xl-20">
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="5804"
                                                data-labels="Days,Hours,Mins,Secs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card 4 -->
                        <div class="swiper-slide">
                            <div class="card-product style-border wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="card-product-wrapper overflow-visible">
                                    <div class="product-thumb-image">
                                        <a href="{{ route('product-detail') }}" class="card-image">
                                            <img width="600" height="520"
                                                src="{{ asset('frontend-assets/images/new-products/1-4.png') }}"
                                                alt="Image Product" class="lazyload img-product">
                                        </a>
                                    </div>
                                    <ul class="list-product-btn top-0 end-0">
                                        <li>
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-cart2"></i>
                                                <span class="tooltip">Add to Cart</span>
                                            </a>
                                        </li>
                                        <li class=" wishlist">
                                            <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-heart2"></i>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="modal"
                                                class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-view"></i>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-compare1"></i>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="box-sale-wrap top-0 start-0 z-5">
                                        <p class="small-text">Sale</p>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="box-title gap-xl-12">
                                        <div class="d-flex flex-column">
                                            <h6>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product fw-semibold text-secondary link">
                                                    Laptop
                                                </a>
                                            </h6>
                                        </div>
                                        <p class="price-wrap fw-medium">
                                            <span class="new-price h4 fw-normal text-primary mb-0">₹48.000</span>
                                        </p>
                                    </div>
                                    <div class="box-infor-detail gap-xl-20">
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="8738"
                                                data-labels="Days,Hours,Mins,Secs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card 5 -->
                        <div class="swiper-slide">
                            <div class="card-product style-border">
                                <div class="card-product-wrapper overflow-visible">
                                    <div class="product-thumb-image">
                                        <a href="{{ route('product-detail') }}" class="card-image">
                                            <img width="600" height="520"
                                                src="{{ asset('frontend-assets/images/new-products/1-5.png') }}"
                                                alt="Image Product" class="lazyload img-product">
                                        </a>
                                    </div>
                                    <ul class="list-product-btn top-0 end-0">
                                        <li>
                                            <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-cart2"></i>
                                                <span class="tooltip">Add to Cart</span>
                                            </a>
                                        </li>
                                        <li class=" wishlist">
                                            <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-heart2"></i>
                                                <span class="tooltip">Add to Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#quickView" data-bs-toggle="modal"
                                                class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-view"></i>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                <i class="icon icon-compare1"></i>
                                                <span class="tooltip">Compare</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="box-sale-wrap top-0 start-0 z-5">
                                        <p class="small-text">Sale</p>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <div class="box-title gap-xl-12">
                                        <div class="d-flex flex-column">
                                            <h6>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product fw-semibold text-secondary link">
                                                    Desktop
                                                </a>
                                            </h6>
                                        </div>
                                        <p class="price-wrap fw-medium">
                                            <span class="new-price h4 fw-normal text-primary mb-0">₹80.000</span>
                                        </p>
                                    </div>
                                    <div class="box-infor-detail gap-xl-20">
                                        <div class="countdown-box">
                                            <div class="js-countdown" data-timer="102738"
                                                data-labels="Days,Hours,Mins,Secs">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-dot-default sw-pagination-products justify-content-center"></div>
                </div>
                <div class="d-none d-xl-flex swiper-button-prev nav-swiper nav-prev-products-2">
                    <i class="icon-arrow-left-lg"></i>
                </div>
                <div class="d-none d-xl-flex swiper-button-next nav-swiper nav-next-products-2">
                    <i class="icon-arrow-right-lg"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- /Deal Today -->

    <!-- Banner Product -->
    <section>
        <div class="container">
            <div class=" swiper tf-sw-categories overflow-xxl-visible" data-preview="2" data-tablet="2"
                data-mobile-sm="1" data-mobile="1" data-space-lg="30" data-space-md="20" data-space="15"
                data-pagination="1" data-pagination-sm="2" data-pagination-md="2" data-pagination-lg="2">
                <div class="swiper-wrapper">
                    <!-- item 1 -->
                    <div class="swiper-slide">
                        <a href="{{ route('product-detail') }}"
                            class="banner-image-product-2 style-2 type-sp-2 hover-img d-block">
                            <div class="item-image img-style overflow-visible position3">
                                <img src="{{ asset('frontend-assets/images/item/camera-1.webp') }}"
                                    data-src="{{ asset('frontend-assets/images/item/camera-1.webp') }}" alt=""
                                    class="lazyload">
                            </div>
                            <div class=" item-banner has-bg-img " data-bg-img=""
                                style="background-image: url( {{ asset('frontend-assets/images/banner/banner-4.jpg') }} );"
                                data-bg-size="cover" data-bg-repeat="no-repeat">
                                <div class="inner">
                                    <div class="box-sale-wrap box-price type-3 relative">
                                        <p class="small-text sub-price">From</p>
                                        <p class="main-title-2 num-price">₹1.399</p>
                                    </div>
                                    <h4 class="name fw-normal text-white lh-lg-38 text-xxl-center text-line-clamp-2">
                                        ThinkPad X1 Carbon Gen 9
                                        <br class="d-none d-sm-block">
                                        <span class="fw-bold">
                                            4K HDR-Core i7 32GB
                                        </span>
                                    </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- item 2 -->
                    <div class="swiper-slide">
                        <a href="{{ route('product-detail') }}"
                            class="banner-image-product-2 type-sp-2 hover-img d-block">
                            <div class="item-image img-style overflow-visible position2">
                                <img src="{{ asset('frontend-assets/images/item/laptop.webp') }}"
                                    data-src="{{ asset('frontend-assets/images/item/laptop.webp') }}" alt=""
                                    class="lazyload">
                            </div>
                            <div class=" item-banner has-bg-img " data-bg-img=""
                                style="background-image: url({{ asset('frontend-assets/images/banner/banner-3.jpg') }});"
                                data-bg-size="cover" data-bg-repeat="no-repeat">
                                <div class="inner justify-content-xl-end">
                                    <div class="box-sale-wrap type-3 relative">
                                        <p class="small-text">From</p>
                                        <p class="main-title-2">₹399</p>
                                    </div>
                                    <h4 class="name fw-normal text-white lh-lg-38 text-xl-end">
                                        Lenovo ThinkBook
                                        <br>
                                        <span class="fw-bold">
                                            8GB/MX450 2GB
                                        </span>
                                    </h4>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="sw-dot-default sw-pagination-categories justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Banner Product -->

    <!-- Category -->
    <section class="tf-sp-2 pt-3">
        <div class="container">
            <div class="swiper tf-sw-products" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="1"
                data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1" data-pagination-sm="2"
                data-pagination-md="3" data-pagination-lg="4" data-grid="2">
                <div class="swiper-wrapper">
                    <!-- item 1 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-1.jpg') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        Laptops & Accessories
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- item 2 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-2.png') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        Computers & Accessories
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- item 3 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-3.jpg') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        Apple Products
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- item 4 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-4.jpg') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        Server &
                                        Workstation
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- item 5 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-5.png') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        Bio-metric
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- item 6 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-6.png') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        Printer & Scanner
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- item 7 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-7.jpg') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        Storage & Digital Devices
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <!-- item 8 -->
                    <div class="swiper-slide">
                        <div class="wg-cls hover-img type-abs wow fadeInUp" data-wow-delay="0s">
                            <a href="{{ route('shop') }}" class="img-style d-block">
                                <img src="{{ asset('frontend-assets/images/collection/cls-grid-8.jpg') }}"
                                    alt="">
                            </a>
                            <div class="content">
                                <h6 class="fw-normal">
                                    <a href="{{ route('shop') }}" class="link">
                                        CCTV & Webcam
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-dot-default sw-pagination-products justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Category -->

    <!-- Deal Today -->
    <!-- <section class="tf-sp-2 pt-3">
                <div class="container">
                    <div class="flat-title pb-8 wow fadeInUp" data-wow-delay="0s">
                        <h5 class="fw-semibold text-primary flat-title-has-icon">
                            <span class="icon"><i class=" icon-fire tf-ani-tada"></i></span>Deal Of The Day
                        </h5>
                        <div class="box-btn-slide relative">
                            <div class="swiper-button-prev nav-swiper nav-prev-products">
                                <i class="icon-arrow-left-lg"></i>
                            </div>
                            <div class="swiper-button-next nav-swiper nav-next-products">
                                <i class="icon-arrow-right-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="box-btn-slide-2 sw-nav-effect">
                        <div class="swiper tf-sw-products" data-preview="5" data-tablet="4" data-mobile-sm="3"
                            data-mobile="2" data-space-lg="30" data-space-md="20" data-space="15" data-pagination="2"
                            data-pagination-sm="3" data-pagination-md="4" data-pagination-lg="5">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0s">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product-detail') }}" class="product-img">
                                                <img class="img-product lazyload" src="images/product/product-81.jpg"
                                                    data-src="images/product/product-81.jpg" alt="image-product">
                                                <img class="img-hover lazyload" src="images/product/product-21.jpg"
                                                    data-src="images/product/product-21.jpg" alt="image-product">
                                            </a>
                                            <div class="box-sale-wrap pst-default z-5">
                                                <p class="small-text">Sale</p>
                                                <p class="title-sidebar-2">28%</p>
                                            </div>
                                            <ul class="list-product-btn">
                                                <li>
                                                    <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                        class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-cart2"></span>
                                                        <span class="tooltip">Add to Cart</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block wishlist">
                                                    <a href="#;"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-heart2"></span>
                                                        <span class="tooltip">Add to Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-view"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block">
                                                    <a href="#compare" data-bs-toggle="offcanvas"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-compare1"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-product-info">
                                            <div class="box-title">
                                                <div class="d-flex flex-column">
                                                    <p class="caption text-main-2 font-2">Game Consoles</p>
                                                    <a href="{{ route('product-detail') }}"
                                                        class="name-product body-md-2 fw-semibold text-secondary link">
                                                        Sony PlayStation 5 (PS5) – Next-Gen Gaming Console with
                                                        Ultra-Fast SSD & 4K Graphics
                                                    </a>
                                                </div>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="new-price price-text fw-medium text-primary mb-0">₹71.500</span>
                                                </p>
                                            </div>
                                            <div class="box-infor-detail">
                                                <div class="product-progress-sale">
                                                    <div class="progress-sold progress" role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary" style="width: 30%"></div>
                                                    </div>
                                                    <div class="box-quantity d-flex justify-content-between">
                                                        <p class="text-avaiable caption">
                                                            Sold:
                                                            <span class="fw-bold">21</span>
                                                        </p>
                                                        <p class="text-avaiable caption">
                                                            Available:
                                                            <span class="fw-bold">58</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.1s">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product-detail') }}" class="product-img">
                                                <img class="img-product lazyload" src="images/product/product-detail-14.jpg"
                                                    data-src="images/product/product-detail-14.jpg" alt="image-product">
                                                <img class="img-hover lazyload" src="images/product/product-detail-16.jpg"
                                                    data-src="images/product/product-detail-16.jpg" alt="image-product">
                                            </a>
                                            <ul class="list-product-btn">
                                                <li>
                                                    <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                        class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-cart2"></span>
                                                        <span class="tooltip">Add to Cart</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block wishlist">
                                                    <a href="#;"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-heart2"></span>
                                                        <span class="tooltip">Add to Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-view"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block">
                                                    <a href="#compare" data-bs-toggle="offcanvas"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-compare1"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="box-sale-wrap pst-default z-5">
                                                <p class="small-text">Sale</p>
                                                <p class="title-sidebar-2">33%</p>
                                            </div>
                                        </div>
                                        <div class="card-product-info">
                                            <div class="box-title">
                                                <div class="d-flex flex-column">
                                                    <p class="caption text-main-2 font-2">Smart TVs</p>
                                                    <a href="{{ route('product-detail') }}"
                                                        class="name-product body-md-2 fw-semibold text-secondary link">
                                                        TCL 32-inch 3-Series 720p Roku Smart TV - 32S335, 2021 Model
                                                    </a>
                                                </div>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="new-price price-text fw-medium text-primary mb-0">₹63.070</span>
                                                </p>
                                            </div>
                                            <div class="box-infor-detail">
                                                <div class="product-progress-sale">
                                                    <div class="progress-sold progress" role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary" style="width: 41%"></div>
                                                    </div>
                                                    <div class="box-quantity d-flex justify-content-between">
                                                        <p class="text-avaiable caption">
                                                            Sold:
                                                            <span class="fw-bold">41</span>
                                                        </p>
                                                        <p class="text-avaiable caption">
                                                            Available:
                                                            <span class="fw-bold">59</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.2s">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product-detail') }}" class="product-img">
                                                <img class="img-product lazyload" src="images/product/product-81.jpg"
                                                    data-src="images/product/product-38.jpg" alt="image-product">
                                                <img class="img-hover lazyload" src="images/product/product-11.jpg"
                                                    data-src="images/product/product-11.jpg" alt="image-product">
                                            </a>
                                            <ul class="list-product-btn">
                                                <li>
                                                    <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                        class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-cart2"></span>
                                                        <span class="tooltip">Add to Cart</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block wishlist">
                                                    <a href="#;"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-heart2"></span>
                                                        <span class="tooltip">Add to Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-view"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block">
                                                    <a href="#compare" data-bs-toggle="offcanvas"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-compare1"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="box-sale-wrap pst-default z-5">
                                                <p class="small-text">Sale</p>
                                                <p class="title-sidebar-2">21%</p>
                                            </div>
                                        </div>
                                        <div class="card-product-info">
                                            <div class="box-title">
                                                <div class="d-flex flex-column">
                                                    <p class="caption text-main-2 font-2">Headphone</p>
                                                    <a href="{{ route('product-detail') }}"
                                                        class="name-product body-md-2 fw-semibold text-secondary link">
                                                        Logitech M510 Wireless Computer Mouse for PC with USB Unifying...
                                                    </a>
                                                </div>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="new-price price-text fw-medium text-primary mb-0">₹61.860</span>
                                                </p>
                                            </div>
                                            <div class="box-infor-detail">
                                                <div class="product-progress-sale">
                                                    <div class="progress-sold progress" role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary" style="width: 22%"></div>
                                                    </div>
                                                    <div class="box-quantity d-flex justify-content-between">
                                                        <p class="text-avaiable caption">
                                                            Sold:
                                                            <span class="fw-bold">22</span>
                                                        </p>
                                                        <p class="text-avaiable caption">
                                                            Available:
                                                            <span class="fw-bold">78</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.3s">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product-detail') }}" class="product-img">
                                                <img class="img-product lazyload" src="images/product/product-39.jpg"
                                                    data-src="images/product/product-39.jpg" alt="image-product">
                                                <img class="img-hover lazyload" src="images/product/product-56.jpg"
                                                    data-src="images/product/product-56.jpg" alt="image-product">
                                            </a>
                                            <div class="box-sale-wrap pst-default z-5">
                                                <p class="small-text">Sale</p>
                                                <p class="title-sidebar-2">15%</p>
                                            </div>
                                            <ul class="list-product-btn">
                                                <li>
                                                    <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                        class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-cart2"></span>
                                                        <span class="tooltip">Add to Cart</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block wishlist">
                                                    <a href="#;"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-heart2"></span>
                                                        <span class="tooltip">Add to Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-view"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block">
                                                    <a href="#compare" data-bs-toggle="offcanvas"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-compare1"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-product-info">
                                            <div class="box-title">
                                                <div class="d-flex flex-column">
                                                    <p class="caption text-main-2 font-2">Product</p>
                                                    <a href="{{ route('product-detail') }}"
                                                        class="name-product body-md-2 fw-semibold text-secondary link">
                                                        SAMSUNG Galaxy Z Flip Factory Unlocked Cell Phone
                                                    </a>
                                                </div>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="new-price price-text fw-medium text-primary mb-0">₹74.999</span>
                                                </p>
                                            </div>
                                            <div class="box-infor-detail">
                                                <div class="product-progress-sale">
                                                    <div class="progress-sold progress" role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary" style="width: 70%"></div>
                                                    </div>
                                                    <div class="box-quantity d-flex justify-content-between">
                                                        <p class="text-avaiable caption">
                                                            Sold:
                                                            <span class="fw-bold">70</span>
                                                        </p>
                                                        <p class="text-avaiable caption">
                                                            Available:
                                                            <span class="fw-bold">30</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.4s">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product-detail') }}" class="product-img">
                                                <img class="img-product lazyload" src="images/product/product-40.jpg"
                                                    data-src="images/product/product-40.jpg" alt="image-product">
                                                <img class="img-hover lazyload" src="images/product/product-detail-6.jpg"
                                                    data-src="images/product/product-detail-6.jpg" alt="image-product">
                                            </a>
                                            <ul class="list-product-btn">
                                                <li>
                                                    <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                        class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-cart2"></span>
                                                        <span class="tooltip">Add to Cart</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block wishlist">
                                                    <a href="#;"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-heart2"></span>
                                                        <span class="tooltip">Add to Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-view"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block">
                                                    <a href="#compare" data-bs-toggle="offcanvas"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-compare1"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="box-sale-wrap pst-default z-5">
                                                <p class="small-text">Sale</p>
                                                <p class="title-sidebar-2">8%</p>
                                            </div>
                                        </div>
                                        <div class="card-product-info">
                                            <div class="box-title">
                                                <div class="d-flex flex-column">
                                                    <p class="caption text-main-2 font-2">Product</p>
                                                    <a href="{{ route('product-detail') }}"
                                                        class="name-product body-md-2 fw-semibold text-secondary link">
                                                        Samsung Product Samsung Galaxy S21 5G Factory Unlocked
                                                        Android...
                                                    </a>
                                                </div>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="new-price price-text fw-medium text-primary mb-0">₹69.700</span>
                                                </p>
                                            </div>
                                            <div class="box-infor-detail">
                                                <div class="product-progress-sale">
                                                    <div class="progress-sold progress" role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary" style="width: 62%"></div>
                                                    </div>
                                                    <div class="box-quantity d-flex justify-content-between">
                                                        <p class="text-avaiable caption">
                                                            Sold:
                                                            <span class="fw-bold">62</span>
                                                        </p>
                                                        <p class="text-avaiable caption">
                                                            Available:
                                                            <span class="fw-bold">45</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="card-product style-img-border">
                                        <div class="card-product-wrapper">
                                            <a href="{{ route('product-detail') }}" class="product-img">
                                                <img class="img-product lazyload" src="images/product/product-81.jpg"
                                                    data-src="images/product/product-81.jpg" alt="image-product">
                                                <img class="img-hover lazyload" src="images/product/product-21.jpg"
                                                    data-src="images/product/product-21.jpg" alt="image-product">
                                            </a>
                                            <div class="box-sale-wrap pst-default z-5">
                                                <p class="small-text">Sale</p>
                                                <p class="title-sidebar-2">20%</p>
                                            </div>
                                            <ul class="list-product-btn">
                                                <li>
                                                    <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                        class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-cart2"></span>
                                                        <span class="tooltip">Add to Cart</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block wishlist">
                                                    <a href="#;"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-heart2"></span>
                                                        <span class="tooltip">Add to Wishlist</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#quickView" data-bs-toggle="modal"
                                                        class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-view"></span>
                                                        <span class="tooltip">Quick View</span>
                                                    </a>
                                                </li>
                                                <li class="d-none d-sm-block">
                                                    <a href="#compare" data-bs-toggle="offcanvas"
                                                        class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                        <span class="icon icon-compare1"></span>
                                                        <span class="tooltip">Compare</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-product-info">
                                            <div class="box-title">
                                                <div class="d-flex flex-column">
                                                    <p class="caption text-main-2 font-2">Game Consoles</p>
                                                    <a href="{{ route('product-detail') }}"
                                                        class="name-product body-md-2 fw-semibold text-secondary link">
                                                        Lammcou Headphone Holder for PS5 Mini Hanger...
                                                    </a>
                                                </div>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="new-price price-text fw-medium text-primary mb-0">₹62.800</span>
                                                </p>
                                            </div>
                                            <div class="box-infor-detail">
                                                <div class="product-progress-sale">
                                                    <div class="progress-sold progress" role="progressbar" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                                    </div>
                                                    <div class="box-quantity d-flex justify-content-between">
                                                        <p class="text-avaiable caption">
                                                            Sold:
                                                            <span class="fw-bold">70</span>
                                                        </p>
                                                        <p class="text-avaiable caption">
                                                            Available:
                                                            <span class="fw-bold">45</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sw-dot-default sw-pagination-products justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
    <!-- /Deal Today -->

    <!-- Tab Product -->
    <div class="tf-sp-2 flat-animate-tab">
        <div class="container">
            <div class="flat-title">
                <div class="flat-title-tab-default">
                    <ul class="menu-tab-line" role="tablist">
                        <li class="nav-tab-item d-flex" role="presentation">
                            <a href="#feature" class="tab-link main-title link fw-semibold active"
                                data-bs-toggle="tab">Feature</a>
                        </li>
                        <li class="nav-tab-item d-flex" role="presentation">
                            <a href="#toprate" class="tab-link main-title link fw-semibold"
                                data-bs-toggle="tab">Toprate</a>
                        </li>
                        <li class="nav-tab-item d-flex" role="presentation">
                            <a href="#on-sale" class="tab-link main-title link fw-semibold" data-bs-toggle="tab">On
                                sale</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="feature" role="tabpanel">
                    <div class="swiper tf-sw-products" data-preview="5" data-tablet="4" data-mobile-sm="3"
                        data-mobile="1" data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1"
                        data-pagination-sm="3" data-pagination-md="4" data-pagination-lg="5">
                        <div class="swiper-wrapper">
                            <!-- item 1 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info px-">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">CCTV</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV 2 Way Talk
                                                    Night Vision Security Camera (1 Channel)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹72.000</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹92.750</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 2 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.1s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Printer</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner
                                                    Cartridge, 1 Ink Bottle Included)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹36.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹45.900</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 3 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.2s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Bio-metric</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    RICH POLO Biometric RS 9w with WiFi Access Control, Time & Attendance
                                                    (Fingerprint)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹87.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹92.750</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 4 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.3s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Laptop</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB SSD/Windows 11
                                                    Home/6 GB Graphics/NVIDIA GeForce RTX 4050/144 Hz) fa1278TX Gaming
                                                    Laptop
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹42.700</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹53.990</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 5 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.4s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Desktop</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    ASUS AiO A3 Series All in One Desktop, Intel 12th Gen Core i3
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹45.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹56.800</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-dot-default sw-pagination-products justify-content-center"></div>
                    </div>
                </div>
                <div class="tab-pane" id="toprate" role="tabpanel">
                    <div class="swiper tf-sw-products" data-preview="5" data-tablet="4" data-mobile-sm="3"
                        data-mobile="1" data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1"
                        data-pagination-sm="3" data-pagination-md="4" data-pagination-lg="5">
                        <div class="swiper-wrapper">
                            <!-- item 1 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.2s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Bio-metric</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    RICH POLO Biometric RS 9w with WiFi Access Control, Time & Attendance
                                                    (Fingerprint)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹87.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹92.750</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 2 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.4s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Desktop </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    ASUS AiO A3 Series All in One Desktop, Intel 12th Gen Core i3
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹45.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹56.800</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 3 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">CCTV</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV 2 Way Talk
                                                    Night Vision Security Camera (1 Channel)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹72.000</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹92.750</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 4 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.1s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Printer</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner
                                                    Cartridge, 1 Ink Bottle Included)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹36.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹45.900</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 5 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.3s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Laptop</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB SSD/Windows 11
                                                    Home/6 GB Graphics/NVIDIA GeForce RTX 4050/144 Hz) fa1278TX Gaming
                                                    Laptop
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹42.700</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹53.990</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-dot-default sw-pagination-products justify-content-center"></div>
                    </div>
                </div>
                <div class="tab-pane" id="on-sale" role="tabpanel">
                    <div class="swiper tf-sw-products" data-preview="5" data-tablet="4" data-mobile-sm="3"
                        data-mobile="1" data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1"
                        data-pagination-sm="3" data-pagination-md="4" data-pagination-lg="5">
                        <div class="swiper-wrapper">
                            <!-- item 1 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.1s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Printer</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner
                                                    Cartridge, 1 Ink Bottle Included)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹36.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹45.900</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 2 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.3s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Laptop</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB SSD/Windows 11
                                                    Home/6 GB Graphics/NVIDIA GeForce RTX 4050/144 Hz) fa1278TX Gaming
                                                    Laptop
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹42.700</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹53.990</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 3 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">CCTV</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV 2 Way Talk
                                                    Night Vision Security Camera (1 Channel)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹72.000</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹92.750</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 4 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.4s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Desktop </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    ASUS AiO A3 Series All in One Desktop, Intel 12th Gen Core i3
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹45.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹56.800</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- item 5 -->
                            <div class="swiper-slide">
                                <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.2s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                alt="image-product">
                                        </a>
                                        <ul class="list-product-btn">
                                            <li>
                                                <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                    class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-cart2"></span>
                                                    <span class="tooltip">Add to Cart</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block wishlist">
                                                <a href="#;"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-heart2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-view"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="d-none d-sm-block">
                                                <a href="#compare" data-bs-toggle="offcanvas"
                                                    class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                                    <span class="icon icon-compare1"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="d-flex flex-column">
                                                <p class="caption text-main-2 font-2">Bio-metric</p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    RICH POLO Biometric RS 9w with WiFi Access Control, Time & Attendance
                                                    (Fingerprint)
                                                </a>
                                            </div>
                                            <p class="price-wrap fw-medium">
                                                <span class="new-price price-text fw-medium mb-0">₹87.500</span>
                                                <span class="old-price body-md-2 text-main-2 fw-normal">₹92.750</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-dot-default sw-pagination-products justify-content-center"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Tab Product -->

    <div class="tf-sp-2 pt-3">
        <div class="container">
            <img src="{{ asset('frontend-assets/images/banner/AMC.png') }}" style="width: 100%;" alt="AMC">
        </div>
    </div>

    <!-- Product Trend -->
    <section class="tf-sp-2 pt-3">
        <div class="container">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <h5 class="fw-semibold">Trending Products</h5>
                <!-- <div class="box-btn-slide relative">
                            <div class="swiper-button-prev nav-swiper nav-prev-products">
                                <i class="icon-arrow-left-lg"></i>
                            </div>
                            <div class="swiper-button-next nav-swiper nav-next-products">
                                <i class="icon-arrow-right-lg"></i>
                            </div>
                        </div> -->
            </div>
            <div class="swiper tf-sw-products" data-preview="5" data-tablet="4" data-mobile-sm="3" data-mobile="1"
                data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1" data-pagination-sm="3"
                data-pagination-md="4" data-pagination-lg="5">
                <div class="swiper-wrapper">
                    <!-- item 1 -->
                    <div class="swiper-slide">
                        <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product-detail') }}" class="product-img">
                                    <img class="img-product lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-5-1.png') }}"
                                        alt="image-product">
                                    <img class="img-hover lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-5-2.png') }}"
                                        alt="image-product">
                                </a>
                                <ul class="list-product-btn">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-cart2"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block wishlist">
                                        <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-heart2"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#quickView" data-bs-toggle="modal"
                                            class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#compare" data-bs-toggle="offcanvas"
                                            class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-compare1"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-product-info">
                                <div class="box-title">
                                    <div class="d-flex flex-column">
                                        <p class="caption text-main-2 font-2">Desktop</p>
                                        <a href="{{ route('product-detail') }}"
                                            class="name-product body-md-2 fw-semibold text-secondary link">
                                            ASUS AiO A3 Series All in One Desktop, Intel 12th Gen Core i3
                                        </a>
                                    </div>
                                    <p class="price-wrap fw-medium">
                                        <span class="new-price price-text fw-medium mb-0">₹15.400</span>
                                        <span class="old-price body-md-2 text-main-2 fw-normal">₹19.800</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item 2 -->
                    <div class="swiper-slide">
                        <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.1s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product-detail') }}" class="product-img">
                                    <img class="img-product lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                        alt="image-product">
                                    <img class="img-hover lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                        alt="image-product">
                                </a>
                                <ul class="list-product-btn">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-cart2"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block wishlist">
                                        <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-heart2"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#quickView" data-bs-toggle="modal"
                                            class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#compare" data-bs-toggle="offcanvas"
                                            class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-compare1"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-product-info">
                                <div class="box-title">
                                    <div class="d-flex flex-column">
                                        <p class="caption text-main-2 font-2">Bio-metric</p>
                                        <a href="{{ route('product-detail') }}"
                                            class="name-product body-md-2 fw-semibold text-secondary link">
                                            RICH POLO Biometric RS 9w with WiFi Access Control, Time & Attendance
                                            (Fingerprint)
                                        </a>
                                    </div>
                                    <p class="price-wrap fw-medium">
                                        <span class="new-price price-text fw-medium mb-0">₹35.200</span>
                                        <span class="old-price body-md-2 text-main-2 fw-normal">₹28.000</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item 3 -->
                    <div class="swiper-slide">
                        <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.2s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product-detail') }}" class="product-img">
                                    <img class="img-product lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                        alt="image-product">
                                    <img class="img-hover lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                        alt="image-product">
                                </a>
                                <ul class="list-product-btn">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-cart2"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block wishlist">
                                        <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-heart2"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#quickView" data-bs-toggle="modal"
                                            class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#compare" data-bs-toggle="offcanvas"
                                            class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-compare1"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-product-info">
                                <div class="box-title">
                                    <div class="d-flex flex-column">
                                        <p class="caption text-main-2 font-2">CCTV</p>
                                        <a href="{{ route('product-detail') }}"
                                            class="name-product body-md-2 fw-semibold text-secondary link">
                                            Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV 2 Way Talk Night
                                            Vision Security Camera (1 Channel)
                                        </a>
                                    </div>
                                    <p class="price-wrap fw-medium">
                                        <span class="new-price price-text fw-medium mb-0">₹38.400</span>
                                        <span class="old-price body-md-2 text-main-2 fw-normal">₹48.990</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item 4 -->
                    <div class="swiper-slide">
                        <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.3s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product-detail') }}" class="product-img">
                                    <img class="img-product lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                        alt="image-product">
                                    <img class="img-hover lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                        alt="image-product">
                                </a>
                                <ul class="list-product-btn">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-cart2"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block wishlist">
                                        <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-heart2"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#quickView" data-bs-toggle="modal"
                                            class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#compare" data-bs-toggle="offcanvas"
                                            class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-compare1"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-product-info">
                                <div class="box-title">
                                    <div class="d-flex flex-column">
                                        <p class="caption text-main-2 font-2">Printer</p>
                                        <a href="{{ route('product-detail') }}"
                                            class="name-product body-md-2 fw-semibold text-secondary link">
                                            HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner Cartridge, 1
                                            Ink Bottle Included)
                                        </a>
                                    </div>
                                    <p class="price-wrap fw-medium">
                                        <span class="new-price price-text fw-medium mb-0">₹26.900</span>
                                        <span class="old-price body-md-2 text-main-2 fw-normal">₹33.800</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item 5 -->
                    <div class="swiper-slide">
                        <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0.4s">
                            <div class="card-product-wrapper">
                                <a href="{{ route('product-detail') }}" class="product-img">
                                    <img class="img-product lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                        alt="image-product">
                                    <img class="img-hover lazyload"
                                        src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                        data-src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                        alt="image-product">
                                </a>
                                <ul class="list-product-btn">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-cart2"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block wishlist">
                                        <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-heart2"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#quickView" data-bs-toggle="modal"
                                            class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#compare" data-bs-toggle="offcanvas"
                                            class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-compare1"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-product-info">
                                <div class="box-title">
                                    <div class="d-flex flex-column">
                                        <p class="caption text-main-2 font-2">Laptop</p>
                                        <a href="{{ route('product-detail') }}"
                                            class="name-product body-md-2 fw-semibold text-secondary link">
                                            HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB SSD/Windows 11 Home/6 GB
                                            Graphics/NVIDIA GeForce RTX 4050/144 Hz) fa1278TX Gaming Laptop
                                        </a>
                                    </div>
                                    <p class="price-wrap fw-medium">
                                        <span class="new-price price-text fw-medium mb-0">₹64.999</span>
                                        <span class="old-price body-md-2 text-main-2 fw-normal">₹79.999</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- item 6 -->
                    <div class="swiper-slide">
                        <div class="card-product style-img-border wow fadeInLeft" data-wow-delay="0s">
                            <div class="card-product-wrapper ">
                                <a href="{{ route('product-detail') }}" class="product-img">
                                    <img class="img-product lazyload"
                                        src="{{ asset('frontend-assets/images/product/product-11.jpg') }}"
                                        data-src="{{ asset('frontend-assets/images/product/product-11.jpg') }}"
                                        alt="image-product">
                                    <img class="img-hover lazyload"
                                        src="{{ asset('frontend-assets/images/product/product-38.jpg') }}"
                                        data-src="{{ asset('frontend-assets/images/product/product-38.jpg') }}"
                                        alt="image-product">
                                </a>
                                <ul class="list-product-btn">
                                    <li>
                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                            class="box-icon add-to-cart btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-cart2"></span>
                                            <span class="tooltip">Add to Cart</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block wishlist">
                                        <a href="#;" class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-heart2"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#quickView" data-bs-toggle="modal"
                                            class="box-icon quickview btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-view"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#compare" data-bs-toggle="offcanvas"
                                            class="box-icon btn-icon-action hover-tooltip tooltip-left">
                                            <span class="icon icon-compare1"></span>
                                            <span class="tooltip">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-product-info">
                                <div class="box-title">
                                    <div class="d-flex flex-column">
                                        <p class="caption text-main-2 font-2">Gaming Mice</p>
                                        <a href="{{ route('product-detail') }}"
                                            class="name-product body-md-2 fw-semibold text-secondary link">
                                            Klim Blaze Rechargeable Wireless Gaming Mouse – RGB Lighting,
                                            High-Precision Sensor & Long-Lasting Battery
                                        </a>
                                    </div>
                                    <p class="price-wrap fw-medium">
                                        <span class="new-price price-text fw-medium mb-0">₹15.400</span>
                                        <span class="old-price body-md-2 text-main-2 fw-normal">₹19.800</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex d-lg-none sw-dot-default sw-pagination-products justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Product Trend -->

    <!-- Banner Product -->
    <section>
        <div class="container">
            <a href="{{ route('product-detail') }}" class="banner-image-product-2 hover-img d-block">
                <div class="item-image item-1 img-style overflow-visible">
                    <img src="{{ asset('frontend-assets/images/item/laptop.webp') }}" style="height: 200%;"
                        data-src="{{ asset('frontend-assets/images/item/laptop.webp') }}" alt=""
                        class="lazyload">
                </div>
                <div class="item-image item-2 img-style overflow-visible d-none d-lg-block">
                    <img src="{{ asset('frontend-assets/images/item/camera-3.webp') }}"
                        data-src="{{ asset('frontend-assets/images/item/camera-3.webp') }}" alt=""
                        class="lazyload">
                </div>
                <div class=" item-banner has-bg-img" data-bg-img="" data-bg-size="cover"
                    style="background-image: url({{ asset('frontend-assets/images/banner/banner-21.jpg') }});"
                    data-bg-repeat="no-repeat">
                    <div class="inner">
                        <h3 class="fw-normal text-white lh-lg-50 font-2">Shop and <span class="fw-bold">SAVE
                                BIG</span>
                            <br>
                            on hottest camera
                        </h3>
                        <div class="box-sale-wrap type-3 relative">
                            <p class="small-text">Save</p>
                            <p class="price-text-2 ">₹67.700</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <!-- /Banner Product -->

    <!-- Application -->
    <section class="tf-sp-2 pt-3">
        <div class="container">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <h5 class="fw-semibold">Best Selling Products</h5>
                <!-- <div class="box-btn-slide relative">
                            <div class="swiper-button-prev nav-swiper nav-prev-products">
                                <i class="icon-arrow-left-lg"></i>
                            </div>
                            <div class="swiper-button-next nav-swiper nav-next-products">
                                <i class="icon-arrow-right-lg"></i>
                            </div>
                        </div> -->
            </div>
            <div class="swiper tf-sw-products" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="1"
                data-space-lg="30" data-space-md="20" data-space="15" data-pagination="1" data-pagination-sm="2"
                data-pagination-md="3" data-pagination-lg="4">
                <div class="swiper-wrapper">
                    <!-- item 1 -->
                    <div class="swiper-slide">
                        <ul class="product-list-wrap wow fadeInUp" data-wow-delay="0s">
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    CCTV
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV 2 Way Talk
                                                    Night Vision Security Camera
                                                </a>
                                            </div>

                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹14.500</span>
                                                    <span class="old-price body-md-2 text-main-2">₹18.600</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    Printer
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner
                                                    Cartridge, 1 Ink Bottle Included)
                                                </a>
                                            </div>
                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹49.900</span>
                                                    <span class="old-price body-md-2 text-main-2">₹62.300</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- item 2 -->
                    <div class="swiper-slide">
                        <ul class="product-list-wrap wow fadeInUp" data-wow-delay="0.1s">
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    Laptop
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB SSD/Windows 11
                                                    Home/6 GB Graphics/NVIDIA GeForce RTX 4050/144 Hz) fa1278TX Gaming
                                                    Laptop
                                                </a>
                                            </div>

                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹60.200</span>
                                                    <span class="old-price body-md-2 text-main-2">₹76.900</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    CCTV
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV 2 Way Talk
                                                    Night Vision Security Camera
                                                </a>
                                            </div>
                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹33.000</span>
                                                    <span class="old-price body-md-2 text-main-2">₹41.600</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- item 3 -->
                    <div class="swiper-slide">
                        <ul class="product-list-wrap wow fadeInUp" data-wow-delay="0.2s">
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    Bio-metric
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    RICH POLO Biometric RS 9w with WiFi Access Control, Time & Attendance
                                                    (Fingerprint)
                                                </a>
                                            </div>

                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹73.200</span>
                                                    <span class="old-price body-md-2 text-main-2">₹91.450</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-4-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    Laptop
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB SSD/Windows 11
                                                    Home/6 GB Graphics/NVIDIA GeForce RTX 4050/144 Hz) fa1278TX Gaming
                                                    Laptop
                                                </a>
                                            </div>
                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹47.500</span>
                                                    <span class="old-price body-md-2 text-main-2">₹59.300</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- item 4 -->
                    <div class="swiper-slide">
                        <ul class="product-list-wrap wow fadeInUp" data-wow-delay="0.3s">
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    Printer
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner
                                                    Cartridge, 1 Ink Bottle Included)
                                                </a>
                                            </div>

                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹65.800</span>
                                                    <span class="old-price body-md-2 text-main-2">₹82.600</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-3-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    Bio-metric
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    RICH POLO Biometric RS 9w with WiFi Access Control, Time & Attendance
                                                    (Fingerprint)
                                                </a>
                                            </div>
                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹29.100</span>
                                                    <span class="old-price body-md-2 text-main-2">₹36.450</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- item 5 -->
                    <div class="swiper-slide">
                        <ul class="product-list-wrap wow fadeInUp" data-wow-delay="0s">
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-1-2.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    CCTV
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    Qubo Smart Cam 360 Q100 by HERO GROUP 3MP 1296p WiFi CCTV 2 Way Talk
                                                    Night Vision Security Camera
                                                </a>
                                            </div>

                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹14.500</span>
                                                    <span class="old-price body-md-2 text-main-2">₹18.600</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card-product style-row row-small-2 ">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product-detail') }}" class="product-img">
                                            <img class="img-product lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                            <img class="img-hover lazyload"
                                                src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                data-src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                                alt="image-product">
                                        </a>
                                    </div>
                                    <div class="card-product-info">
                                        <div class="box-title">
                                            <div class="relative z-5">
                                                <p class="caption text-main-2 font-2">
                                                    Printer
                                                </p>
                                                <a href="{{ route('product-detail') }}"
                                                    class="name-product body-md-2 fw-semibold text-secondary link">
                                                    HP MFP 1188W Multi-function WiFi Monochrome Laser Printer (Toner
                                                    Cartridge, 1 Ink Bottle Included)
                                                </a>
                                            </div>
                                            <div class="group-btn">
                                                <p class="price-wrap fw-medium">
                                                    <span class="new-price price-text fw-medium">₹49.900</span>
                                                    <span class="old-price body-md-2 text-main-2">₹62.300</span>
                                                </p>
                                                <ul class="list-product-btn flex-row">
                                                    <li>
                                                        <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                                            class="box-icon add-to-cart btn-icon-action hover-tooltip">
                                                            <span class="icon icon-cart2"></span>
                                                            <span class="tooltip">Add to Cart</span>
                                                        </a>
                                                    </li>
                                                    <li class=" wishlist">
                                                        <a href="#;"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-heart2"></span>
                                                            <span class="tooltip">Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#quickView" data-bs-toggle="modal"
                                                            class="box-icon quickview btn-icon-action hover-tooltip">
                                                            <span class="icon icon-view"></span>
                                                            <span class="tooltip">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#compare" data-bs-toggle="offcanvas"
                                                            class="box-icon btn-icon-action hover-tooltip">
                                                            <span class="icon icon-compare1"></span>
                                                            <span class="tooltip">Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sw-dot-default sw-pagination-products justify-content-center"></div>

            </div>
        </div>
    </section>
    <!-- /Application -->


    <!-- Newsletter -->
    <div class="modal modalCentered fade auto-popup modal-def modal-newleter" id="newsletterModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <span class="icon icon-close icon-close-popup link btn-hide-popup" data-bs-dismiss="modal"></span>
                <div class="heading">
                    <h5 class="fw-semibold">Join our newsletter for ₹10 offs</h5>
                    <p class="body-md-2">Register now to get latest updates on promotions & coupons. <br>
                        Don’t worry, we not spam!</p>
                </div>
                <form class="form-sub" id="newsletterForm">
                    @csrf
                    <div class="form-content">
                        <fieldset>
                            <input type="email" id="newsletter-email" name="email"
                                placeholder="Enter Your Email Address" aria-required="true" required>
                        </fieldset>
                    </div>
                    <div class="box-btn">
                        <button type="submit" class="tf-btn w-100" id="newsletter-submit-btn">
                            <span class="text-white">Subscribe</span>
                        </button>
                    </div>
                    <div id="newsletter-message" class="mt-3" style="display: none;"></div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Newsletter -->

@endsection

@section('script')


    <script>
        $(document).ready(function() {
            // Newsletter subscription form handling
            $('#newsletterForm').on('submit', function(e) {
                e.preventDefault();

                const form = $(this);
                const submitBtn = $('#newsletter-submit-btn');
                const messageDiv = $('#newsletter-message');
                const email = $('#newsletter-email').val();

                // Disable submit button and show loading state
                submitBtn.prop('disabled', true);
                submitBtn.find('span').text('Subscribing...');
                messageDiv.hide();

                // AJAX request to subscribe
                $.ajax({
                    url: '{{ route("newsletter.subscribe") }}',
                    type: 'POST',
                    data: {
                        email: email,
                        _token: $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        
                        if (response.success) {
                            // Show success message
                            messageDiv.html('<div class="alert alert-success">' + response.message + '</div>').show();

                            // Clear form
                            form[0].reset();

                            // Set localStorage to prevent popup from showing again
                            localStorage.setItem('newsletterSubscribed', 'true');
                            sessionStorage.setItem('showPopup', 'true');

                            // Close modal after 3 seconds
                            setTimeout(function() {
                                $('#newsletterModal').modal('hide');
                            }, 3000);
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'Something went wrong. Please try again.';
                        
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        // Show error message
                        messageDiv.html('<div class="alert alert-danger">' + errorMessage + '</div>').show();
                    },
                    complete: function() {
                        // Re-enable submit button
                        submitBtn.prop('disabled', false);
                        submitBtn.find('span').text('Subscribe');
                    }
                });
            });

            // Enhanced auto-popup functionality with localStorage check
            function initNewsletterPopup() {
                if ($(".auto-popup").length > 0) {
                    // Check if user has already subscribed
                    const hasSubscribed = localStorage.getItem('newsletterSubscribed');
                    const showPopup = sessionStorage.getItem('showPopup');

                    // Only show popup if user hasn't subscribed and session flag is not set
                    if (!hasSubscribed && !JSON.parse(showPopup)) {
                        setTimeout(function() {
                            $(".auto-popup").modal("show");
                        }, 3000);
                    }
                }
            }

            // Initialize popup
            initNewsletterPopup();

            // Handle popup close button
            $(".btn-hide-popup").on("click", function() {
                sessionStorage.setItem("showPopup", true);
            });
        });
    </script>

@endsection