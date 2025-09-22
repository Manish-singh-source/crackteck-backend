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
                <p class="body-small">
                    Track Your Order
                </p>
            </li>
        </ul>
    </div>
</div>
<!-- /Breakcrumbs -->

<!-- Track Order -->
<section class="s-track-order tf-sp-2">
    <div class="container">
        <div class="position-relative">
            <div class="parallax-image">
                <img src="https://img.freepik.com/free-photo/flat-lay-hand-holding-compass_23-2149617650.jpg?t=st=1751353442~exp=1751357042~hmac=b7071a8abf34ed561b10ab3fc0b5d980294c8168273c491c3535080eaae59ad4&w=2000" data-src="https://img.freepik.com/free-photo/flat-lay-hand-holding-compass_23-2149617650.jpg?t=st=1751353442~exp=1751357042~hmac=b7071a8abf34ed561b10ab3fc0b5d980294c8168273c491c3535080eaae59ad4&w=2000" alt=""
                    class="lazyload effect-paralax">
            </div>
            <div class="wrap">
                <div class="box-title">
                    <h5 class="fw-semibold">Track your order</h5>
                    <p class="body-text-3">To track your order, please enter your order ID in the box below
                        and
                        press the "Track" button. The ID has been sent to you on your receipt and in the
                        confirmation email you received.</p>
                </div>
                <form class="form-trackorder def">
                    <fieldset>
                        <label>Oder ID</label>
                        <input class="def" type="text" placeholder="Found in your order confirmation email"
                            required>
                    </fieldset>
                    <fieldset>
                        <label>Order email</label>
                        <input class="def" type="text" placeholder="Email you used during checkout" required>
                    </fieldset>
                    <div class="box-btn">
                        <button type="submit" class="tf-btn w-100">
                            <span class="text-white">Track</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /Track Order -->

@endsection
