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
                            <li><a href="{{ route('my-account-edit') }}" class="my-account-nav-item">Dashboard</a></li>
                            <li><a href="{{ route('my-account-orders') }}" class="my-account-nav-item">Orders</a></li>
                            <li><a href="{{ route('my-account-address') }}" class="my-account-nav-item">Address</a></li>
                            <li><span class="my-account-nav-item active">Account Details</span></li>
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
                    <div class="my-account-content account-details">
                        <div class="wrap">
                            <h4 class="fw-semibold mb-20">Information</h4>
                            <form class="form-account-details">
                                <div class="form-content">
                                    <div class="cols">
                                        <fieldset>
                                            <input type="text" placeholder="First Name" value="Mas">
                                        </fieldset>
                                        <fieldset>
                                            <input type="text" placeholder="Last Name" value="Shin">
                                        </fieldset>
                                    </div>
                                    <div class="cols">
                                        <fieldset>
                                            <input type="email" placeholder="Email" value="info@crackteck.com">
                                        </fieldset>
                                        <fieldset>
                                            <input type="number" placeholder="Phone" value="08801234567">
                                        </fieldset>
                                    </div>
                                    <fieldset>
                                        <input type="text" placeholder="Address" value="India">
                                    </fieldset>
                                </div>
                            </form>
                        </div>
                        <div class="wrap">
                            <h4 class="fw-semibold mb-20">Change Password</h4>
                            <form class="def form-reset-password">
                                <fieldset>
                                    <input type="password" placeholder="Password*" required>
                                </fieldset>
                                <fieldset>
                                    <input type="password" placeholder="New Password*" required>
                                </fieldset>
                                <fieldset>
                                    <input type="password" placeholder="Confirm Password*" required>
                                </fieldset>
                                <div class="box-btn">
                                    <button type="submit" class="tf-btn btn-large">
                                        <span class="text-white">Update Account</span>
                                    </button>
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
