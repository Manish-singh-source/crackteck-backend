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
                            <li><a href="{{ route('my-account-orders') }}" class="my-account-nav-item">Orders</a></li>
                            <li><span class="my-account-nav-item active">Address</span></li>
                            <li><a href="{{ route('my-account-edit') }}" class="my-account-nav-item">Account Details</a>
                            </li>
                            <li><a href="{{ route('my-account-amc') }}" class="my-account-nav-item">AMC</a></li>
                            <li><a href="{{ route('wishlist') }}" class="my-account-nav-item">Wishlist</a></li>
                            @if (Auth::check())
                                <form method="POST" action="{{ route('frontend.logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Logout</button>
                            </form>
                            @else
                                <form method="POST" action="{{ route('frontend.login') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Login</button>
                            </form>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="my-account-content account-address">
                        <h4 class="fw-semibold mb-20">Your addresses (2)</h4>
                        <div class="widget-inner-address ">
                            <button class="tf-btn btn-add-address">
                                <span class="text-white">Add new address</span>
                            </button>
                            <form class="wd-form-address show-form-address mb-20">
                                <div class="form-content">
                                    <div class="cols">
                                        <fieldset>
                                            <label for="first-name">First Name</label>
                                            <input type="text" id="first-name" required>
                                        </fieldset>
                                        <fieldset>
                                            <label for="last-name">Last Name</label>
                                            <input type="text" id="last-name" required>
                                        </fieldset>
                                    </div>
                                    <fieldset>
                                        <label for="company">Company</label>
                                        <input type="text" id="company" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="address-1">Address 1</label>
                                        <input type="text" id="address-1" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="city">City</label>
                                        <input type="text" id="city" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="region">Country/region</label>
                                        <input type="text" id="region" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="zip-code">Postal/ZIP code</label>
                                        <input type="text" id="zip-code" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" required>
                                    </fieldset>
                                    <div class="tf-cart-checkbox">
                                        <input type="checkbox" name="set_def" class="tf-check" checked
                                            id="default-address-add2">
                                        <label for="default-address-add">Set as default address</label>
                                    </div>
                                </div>
                                <div class="box-btn">
                                    <button class="tf-btn btn-large" type="submit">
                                        <span class="text-white">Update</span>
                                    </button>
                                    <a href="#;" class="tf-btn btn-large btn-hide-address d-inline-flex">
                                        <span class="text-white">Cancel</span>
                                    </a>
                                </div>
                            </form>
                            <ul class="list-account-address tf-grid-layout md-col-2">
                                <li class="account-address-item">
                                    <p class="title title-sidebar fw-semibold">
                                        Gala No.5, Sheetal Swapna
                                    </p>
                                    <div class="info-detail">
                                        <div class="box-infor">
                                            <p class="title-sidebar">Crackteck</p>
                                            <p class="title-sidebar">info@crackteck.com</p>
                                            <p class="title-sidebar">Company</p>
                                            <p class="title-sidebar"> Gala No.5, Sheetal Swapna</p>
                                            <p class="title-sidebar">Industrial Estate, Sativali Road,</p>
                                            <p class="title-sidebar">Bhoidapada, Vasai East,</p>
                                            <p class="title-sidebar">Palghar - 401208.</p>
                                            <p class="title-sidebar">+91 9607 78 8836</p>
                                        </div>
                                        <div class="box-btn">
                                            <button class="tf-btn btn-large btn-edit-address" data-form="form-edit-1">
                                                <span class="text-white">Edit</span>
                                            </button>
                                            <button class="tf-btn btn-large btn-delete-address" data-form="form-edit-1">
                                                <span class="text-white">Delete</span>
                                            </button>
                                        </div>

                                    </div>
                                </li>
                                <li class="account-address-item">
                                    <p class="title title-sidebar fw-semibold">
                                        Ghanshyam Enclave
                                    </p>
                                    <div class="info-detail">
                                        <div class="box-infor">
                                            <p class="title-sidebar">Technofra</p>
                                            <p class="title-sidebar">Technofra@support.com</p>
                                            <p class="title-sidebar">Company</p>
                                            <p class="title-sidebar">Office No. 501,</p>
                                            <p class="title-sidebar">5th Floor, Ghanshyam Enclave,</p>
                                            <p class="title-sidebar">New Link Road, Kandivali (West),</p>
                                            <p class="title-sidebar">Mumbai - 400067.</p>
                                            <p class="title-sidebar">+91 8080 80 3374</p>
                                        </div>
                                        <div class="box-btn">
                                            <button class="tf-btn btn-large btn-edit-address" data-form="form-edit-2">
                                                <span class="text-white">Edit</span>
                                            </button>
                                            <button class="tf-btn btn-large btn-delete-address" data-form="form-edit-2">
                                                <span class="text-white">Delete</span>
                                            </button>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            <form class="wd-form-address edit-form-address">
                                <div class="form-content">
                                    <div class="cols">
                                        <fieldset>
                                            <label for="first-name">First Name</label>
                                            <input type="text" id="first-name2" required>
                                        </fieldset>
                                        <fieldset>
                                            <label for="last-name">Last Name</label>
                                            <input type="text" id="last-name2" required>
                                        </fieldset>
                                    </div>
                                    <fieldset>
                                        <label for="company">Company</label>
                                        <input type="text" id="company2" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="address-1">Address 1</label>
                                        <input type="text" id="address2-1" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="city">City</label>
                                        <input type="text" id="city2" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="region">Country/region</label>
                                        <input type="text" id="region2" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="zip-code">Postal/ZIP code</label>
                                        <input type="text" id="zip-code2" required>
                                    </fieldset>
                                    <fieldset>
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone2" required>
                                    </fieldset>
                                    <div class="tf-cart-checkbox">
                                        <input type="checkbox" name="set_def" class="tf-check" checked
                                            id="default-address-add">
                                        <label for="default-address-add">Set as default address</label>
                                    </div>
                                </div>

                                <div class="box-btn">
                                    <button class="tf-btn btn-large" type="submit">
                                        <span class="text-white">Update</span>
                                    </button>
                                    <a href="#;" class="tf-btn btn-large btn-hide-edit-address d-inline-flex">
                                        <span class="text-white">Cancel</span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /My Account -->
@endsection
