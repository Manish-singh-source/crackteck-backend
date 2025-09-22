@extends('frontend/layout/master')

@section('main-content')

<!-- Breakcrumbs -->
<div class="tf-sp-3 pb-0">
    <div class="container">
        <ul class="breakcrumbs">
            <li><a href="{{ route('website') }}" class="body-small link">Home</a></li>
            <li class="d-flex align-items-center">
                <i class="icon icon-arrow-right"></i>
            </li>
            <li><span class="body-small">Cart</span></li>
        </ul>
    </div>
</div>
<!-- /Breakcrumbs -->

<!-- Shopping Cart -->
<div class="s-shoping-cart tf-sp-2">
    <div class="container">
        <div class="checkout-status tf-sp-2 pt-0">
            <div class="checkout-wrap">
                <span class="checkout-bar first"></span>
                <div class="step-payment ">
                    <span class="icon">
                        <i class="icon-shop-cart-1"></i>
                    </span>
                    <a href="{{ route('shop-cart') }}" class="text-secondary body-text-3">Shopping Cart</a>
                </div>
                <div class="step-payment">
                    <span class="icon">
                        <i class="icon-shop-cart-2"></i>
                    </span>
                    <a href="{{ route('checkout') }}" class="link-secondary body-text-3">Shopping & Checkout</a>

                </div>
                <div class="step-payment">
                    <span class="icon">
                        <i class="icon-shop-cart-3"></i>
                    </span>
                    <a href="{{ route('order-details') }}" class="link-secondary body-text-3">Confirmation</a>
                </div>
            </div>
        </div>
        <form class="form-discount">
            <div class="overflow-x-auto">
                <table class="tf-table-page-cart">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tf-cart-item">
                            <td class="tf-cart-item_product">
                                <a href="#" class="img-box"><img src="{{ asset('frontend-assets/images/new-products/2-4-1.png') }}"
                                        alt=""></a>
                                <div class="cart-info">
                                    <a href="#" class="cart-title body-md-2 fw-semibold link">
                                        HP Victus Intel Core i5 13th  Gen 13420H <br
                                            class="d-none d-xl-block"> Gaming Laptop
                                    </a>
                                    <div class="variant-box">
                                        <p class="body-text-3">Color:</p>
                                        <div class="tf-select">
                                            <select>
                                                <option>Yellow</option>
                                                <option>Green</option>
                                                <option selected="selected">Black</option>
                                                <option>Red</option>
                                                <option>Beige</option>
                                                <option>Pink</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-cart-title="Price" class="tf-cart-item_price ">
                                <p class="cart-price price-on-sale price-text fw-medium">₹22.99</p>
                            </td>
                            <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                                <div class="wg-quantity">
                                    <span class="btn-quantity btn-decrease">
                                        <i class="icon-minus"></i>
                                    </span>
                                    <input class="quantity-product" type="text" name="number" value="1">
                                    <span class="btn-quantity btn-increase">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                            </td>
                            <td data-cart-title="Total" class="tf-cart-item_total">
                                <p class="cart-total total-price price-text fw-medium">₹22.99</p>
                            </td>
                            <td data-cart-title="Remove" class="remove-cart text-xxl-end">
                                <span class="remove icon icon-close link"></span>
                            </td>
                        </tr>
                        <tr class="tf-cart-item">
                            <td class="tf-cart-item_product">
                                <a href="#" class="img-box"><img src="{{ asset('frontend-assets/images/new-products/2-2-1.png') }}"
                                        alt=""></a>
                                <div class="cart-info">
                                    <a href="#" class="cart-title body-md-2 fw-semibold link">
                                        HP MFP 1188W Multi-function WiFi Monochrome  <br
                                            class="d-none d-xl-block"> Laser Printer (Toner Cartridge, 1 Ink Bottle Included)
                                    </a>
                                    <div class="variant-box">
                                        <p class="body-text-3">Color:</p>
                                        <div class="tf-select">
                                            <select>
                                                <option>Yellow</option>
                                                <option>Green</option>
                                                <option selected="selected">Black</option>
                                                <option>Red</option>
                                                <option>Beige</option>
                                                <option>Pink</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-cart-title="Price" class="tf-cart-item_price ">
                                <p class="cart-price price-on-sale price-text fw-medium">₹549.99</p>
                            </td>
                            <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                                <div class="wg-quantity">
                                    <span class="btn-quantity btn-decrease">
                                        <i class="icon-minus"></i>
                                    </span>
                                    <input class="quantity-product" type="text" name="number" value="1">
                                    <span class="btn-quantity btn-increase">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                            </td>
                            <td data-cart-title="Total" class="tf-cart-item_total">
                                <p class="cart-total total-price price-text fw-medium">₹549.99</p>
                            </td>
                            <td data-cart-title="Remove" class="remove-cart text-xxl-end">
                                <span class="remove icon icon-close link"></span>
                            </td>
                        </tr>
                        <tr class="tf-cart-item">
                            <td class="tf-cart-item_product">
                                <a href="#" class="img-box"><img src="{{ asset('frontend-assets/images/new-products/2-1-1.png') }}"
                                        alt=""></a>
                                <div class="cart-info">
                                    <a href="#" class="cart-title body-md-2 fw-semibold link">
                                        Qubo Smart Cam 360 Q100 3MP 1296p WiFi  <br
                                            class="d-none d-xl-block"> CCTV 2 Way Talk Night Vision Security Camera
                                    </a>
                                    <div class="variant-box">
                                        <p class="body-text-3">Color:</p>
                                        <div class="tf-select">
                                            <select>
                                                <option>Yellow</option>
                                                <option>Green</option>
                                                <option selected="selected">Black</option>
                                                <option>Red</option>
                                                <option>Beige</option>
                                                <option>Pink</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-cart-title="Price" class="tf-cart-item_price ">
                                <p class="cart-price price-on-sale price-text fw-medium">₹279.71</p>
                            </td>
                            <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                                <div class="wg-quantity">
                                    <span class="btn-quantity btn-decrease">
                                        <i class="icon-minus"></i>
                                    </span>
                                    <input class="quantity-product" type="text" name="number" value="1">
                                    <span class="btn-quantity btn-increase">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                            </td>
                            <td data-cart-title="Total" class="tf-cart-item_total">
                                <p class="cart-total total-price price-text fw-medium">₹279.71</p>
                            </td>
                            <td data-cart-title="Remove" class="remove-cart text-xxl-end">
                                <span class="remove icon icon-close link"></span>
                            </td>
                        </tr>
                        <tr class="tf-cart-item">
                            <td class="tf-cart-item_product">
                                <a href="#" class="img-box"><img src="{{ asset('frontend-assets/images/new-products/2-3-1.png') }}"
                                        alt=""></a>
                                <div class="cart-info">
                                    <a href="#" class="cart-title body-md-2 fw-semibold link">
                                        RICH POLO Biometric RS 9w with WiFi  <br
                                            class="d-none d-xl-block"> Access Control, Time & Attendance (Fingerprint)
                                    </a>
                                    <div class="variant-box">
                                        <p class="body-text-3">Color:</p>
                                        <div class="tf-select">
                                            <select>
                                                <option>Yellow</option>
                                                <option>Green</option>
                                                <option selected="selected">Black</option>
                                                <option>Red</option>
                                                <option>Beige</option>
                                                <option>Pink</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-cart-title="Price" class="tf-cart-item_price ">
                                <p class="cart-price price-on-sale price-text fw-medium">₹199.99</p>
                            </td>
                            <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                                <div class="wg-quantity">
                                    <span class="btn-quantity btn-decrease">
                                        <i class="icon-minus"></i>
                                    </span>
                                    <input class="quantity-product" type="text" name="number" value="1">
                                    <span class="btn-quantity btn-increase">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>
                            </td>
                            <td data-cart-title="Total" class="tf-cart-item_total">
                                <p class="cart-total total-price price-text fw-medium">₹199.99</p>
                            </td>
                            <td data-cart-title="Remove" class="remove-cart text-xxl-end">
                                <span class="remove icon icon-close link"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="cart-bottom">
                <div class="ip-discount-code">
                    <input type="text" placeholder="Enter your cupon code" required>
                    <button type="submit" class="tf-btn btn-gray">
                        <span class="text-white">Apply coupon</span>
                    </button>
                </div>
                <span class="last-total-price main-title fw-semibold">Total:</span>
            </div>
        </form>
        <div class="box-btn">
            <a href="{{ route('website') }}" class="tf-btn btn-gray"><span class="text-white">Continue
                    shopping</span></a>
            <a href="{{ route('checkout') }}" class="tf-btn"><span class="text-white">Proceed to checkout</span></a>
        </div>

    </div>
</div>
<!-- /Shopping Cart -->

@endsection