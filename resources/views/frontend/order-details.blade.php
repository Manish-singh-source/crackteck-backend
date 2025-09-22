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
                <span class="body-small"> Order Detail</span>
            </li>
        </ul>
    </div>
</div>
<!-- /Breakcrumbs -->

<!-- Check Out Cart -->
<section class="tf-sp-2">
    <div class="container">
        <div class="checkout-status tf-sp-2 pt-0">
            <div class="checkout-wrap">
                <span class="checkout-bar end"></span>
                <div class="step-payment ">
                    <span class="icon">
                        <i class="icon-shop-cart-1"></i>
                    </span>
                    <a href="{{ route('shop-cart') }}" class="link-secondary body-text-3">Shopping Cart</a>
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
                    <a href="{{ route('order-details') }}" class="text-secondary body-text-3">Confirmation</a>
                </div>
            </div>
        </div>
        <div class="tf-order-detail">
            <div class="order-notice">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ffffff"
                        viewBox="0 0 256 256">
                        <path
                            d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-11.55,39.29c-4.79,5-9.75,10.17-12.38,16.52-2.52,6.1-2.63,13.07-2.73,19.82-.1,7-.21,14.33-3.32,17.43s-10.39,3.22-17.43,3.32c-6.75.1-13.72.21-19.82,2.73-6.35,2.63-11.52,7.59-16.52,12.38S132,224,128,224s-9.15-4.92-14.11-9.69-10.17-9.75-16.52-12.38c-6.1-2.52-13.07-2.63-19.82-2.73-7-.1-14.33-.21-17.43-3.32s-3.22-10.39-3.32-17.43c-.1-6.75-.21-13.72-2.73-19.82-2.63-6.35-7.59-11.52-12.38-16.52S32,132,32,128s4.92-9.15,9.69-14.11,9.75-10.17,12.38-16.52c2.52-6.1,2.63-13.07,2.73-19.82.1-7,.21-14.33,3.32-17.43S70.51,56.9,77.55,56.8c6.75-.1,13.72-.21,19.82-2.73,6.35-2.63,11.52-7.59,16.52-12.38S124,32,128,32s9.15,4.92,14.11,9.69,10.17,9.75,16.52,12.38c6.1,2.52,13.07,2.63,19.82,2.73,7,.1,14.33.21,17.43,3.32s3.22,10.39,3.32,17.43c.1,6.75.21,13.72,2.73,19.82,2.63,6.35,7.59,11.52,12.38,16.52S224,124,224,128,219.08,137.15,214.31,142.11ZM173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34Z">
                        </path>
                    </svg>
                </span>
                <p>Thank you. Your order has been received.</p>
            </div>
            <ul class="order-overview-list">
                <li>Order number: <strong>6284</strong></li>
                <li>Date: <strong>March 6, 2025</strong></li>
                <li>Total: <strong>₹109.91</strong></li>
                <li>Payment method: <strong>Direct bank transfer</strong></li>
            </ul>
            <div class="order-detail-wrap">
                <h5 class="fw-bold">Order details</h5>
                <!-- <table class="tf-table-order-detail">
                    <thead>
                        <tr>
                            <td>
                                <h6 class="fw-semibold">Product</h6>
                            </td>
                            <td>
                                <h6 class="fw-semibold">Total</h6>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tf-order-item">
                            <td class="tf-order-item_product">
                                <a href="" class="link fw-normal">
                                    SAMSUNG 34-Inch Odyssey G5 Ultra-Wide Gaming Monitor with 1000R Curved
                                    Screen, Black
                                    <span class="text-black">×1</span>
                                </a>
                            </td>
                            <td>
                                <span class="fw-medium ">10.00₹</span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><span>Subtotal:</span></th>
                            <td><span>10.00₹</span></td>
                        </tr>
                        <tr>
                            <th><span>Shipping:</span></th>
                            <td><span>Free shipping</span></td>
                        </tr>
                        <tr>
                            <th><span>Payment method:</span></th>
                            <td><span>Direct bank transfer</span></td>
                        </tr>
                        <tr>
                            <th>
                                <p class="fw-semibold product-title text-uppercase">Total:</p>
                            </th>
                            <td><span class="fw-semibold">10.00₹</span></td>
                        </tr>
                    </tfoot>
                </table> -->
                <!-- <div class="customer-table">
                    <div class="tf-order_history-table">
                        <table id="table_def" class="table table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>S.No</th>
                                    <th>Item Description</th>
                                    <th>HSN/SAC</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>Taxable Value</th>
                                    <th>IGST</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Qubo Smart Cam 360 1296p WiFi CCTV
                                    </td>
                                    <td>7015845</td>
                                    <td>4 SET</td>
                                    <td>360</td>
                                    <td>1598</td>
                                    <td>256</td>
                                    <td>1560</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>RICH POLO Biometric Time & Attendance (Fingerprint)
                                    </td>
                                    <td>7015845</td>
                                    <td>4 SET</td>
                                    <td>360</td>
                                    <td>1598</td>
                                    <td>256</td>
                                    <td>1560</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB)
                                    </td>
                                    <td>7015845</td>
                                    <td>4 SET</td>
                                    <td>360</td>
                                    <td>1598</td>
                                    <td>256</td>
                                    <td>1560</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>12 SET</td>
                                    <td>4785</td>
                                    <td>4785</td>
                                    <td>768</td>
                                    <td>4680</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row border-bottom mt-2 mb-3">
                    <div class="col-md-5">
                        <div class="d-flex">
                            <p class="me-2">Account Holder Name : </p>
                            <p class="text-dark fw-medium">Technofra</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Bank Name : </p>
                            <p class="text-dark fw-medium">RBL</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Account Number : </p>
                            <p class="text-dark fw-medium">75519687</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">Branch Name : </p>
                            <p class="text-dark fw-medium"> Kandivali</p>
                        </div>
                        <div class="d-flex">
                            <p class="me-2">IFSC Code : </p>
                            <p class="text-dark fw-medium">RBL185181</p>
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto mb-3">
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-2 pe-3">
                            <p class="mb-0">Total Taxable Value</p>
                            <p class="text-dark fw-medium mb-2">INR </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-2 pe-3">
                            <p class="mb-0">Total Taxable Amount</p>
                            <p class="text-dark fw-medium mb-2">INR</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                            <p class="mb-0">Rounded Off</p>
                            <p class="text-dark fw-medium mb-2">(-) 0.47</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                            <p class="mb-0">Total Value (in figure)</p>
                            <p class="text-dark fw-medium mb-2">INR</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                            <p class="mb-0">Total Value (in Word)</p>
                            <p class="text-dark fw-medium mb-2">Five thousand Seven Seventy Five</p>
                        </div>
                    </div>
                </div> -->
                <div class="tf-order_history-table">
                    <table class="table_def">
                        <thead class="table-light text-start">
                            <tr>
                                <th style="width: 50px;">S.No</th>
                                <th style="width: 300px;">Item Description</th>
                                <th style="width: 100px;">HSN/SAC</th>
                                <th style="width: 100px;">QTY</th>
                                <th style="width: 100px;">Price</th>
                                <th style="width: 100px;">Taxable Value</th>
                                <th style="width: 100px;">IGST</th>
                                <th style="width: 100px;">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="text-start">
                            <tr>
                                <td>1</td>
                                <td>Qubo Smart Cam 360 1296p WiFi CCTV
                                </td>
                                <td>7015845</td>
                                <td>4 SET</td>
                                <td>360</td>
                                <td>1598</td>
                                <td>256</td>
                                <td>1560</td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>RICH POLO Biometric Time & Attendance (Fingerprint)
                                </td>
                                <td>7015845</td>
                                <td>4 SET</td>
                                <td>360</td>
                                <td>1598</td>
                                <td>256</td>
                                <td>1560</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>HP Victus Intel Core i5 13th Gen 13420H - (16 GB/512 GB)
                                </td>
                                <td>7015845</td>
                                <td>4 SET</td>
                                <td>360</td>
                                <td>1598</td>
                                <td>256</td>
                                <td>1560</td>
                            </tr>
                        </tbody>
                        <tfoot class="text-start">
                            <tr>
                                <td colspan="3"></td>
                                <td>12 SET</td>
                                <td>4785</td>
                                <td>4785</td>
                                <td>768</td>
                                <td>4680</td>
                            </tr>
                        </tfoot>
                    </table>                    
                </div>

                <div class="row mt-2 mb-3" style="max-width: 1420px;">
                        <div class="col-md-5">
                            <div class="d-flex">
                                <p class="me-2">Account Holder Name : </p>
                                <p class="text-dark fw-medium">Technofra</p>
                            </div>
                            <div class="d-flex">
                                <p class="me-2">Bank Name : </p>
                                <p class="text-dark fw-medium">RBL</p>
                            </div>
                            <div class="d-flex">
                                <p class="me-2">Account Number : </p>
                                <p class="text-dark fw-medium">75519687</p>
                            </div>
                            <div class="d-flex">
                                <p class="me-2">Branch Name : </p>
                                <p class="text-dark fw-medium"> Kandivali</p>
                            </div>
                            <div class="d-flex">
                                <p class="me-2">IFSC Code : </p>
                                <p class="text-dark fw-medium">RBL185181</p>
                            </div>
                        </div>
                        <div class="col-md-5 mt-2 mb-3 ms-auto mb-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-2 pe-3">
                                <p class="mb-0">Total Taxable Value</p>
                                <p class="text-dark fw-medium mb-2">INR </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-2 pe-3">
                                <p class="mb-0">Total Taxable Amount</p>
                                <p class="text-dark fw-medium mb-2">INR</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                                <p class="mb-0">Rounded Off</p>
                                <p class="text-dark fw-medium mb-2">(-) 0.47</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                                <p class="mb-0">Total Value (in figure)</p>
                                <p class="text-dark fw-medium mb-2">INR</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2 pe-3">
                                <p class="mb-0">Total Value (in Word)</p>
                                <p class="text-dark fw-medium mb-2">Five thousand Seven Seventy Five</p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row gap-30 gap-sm-0">
                <div class="col-sm-6 col-12">
                    <div class="order-detail-wrap">
                        <h5 class="fw-bold">Billing Address</h5>
                        <div class="billing-info">
                            <p>Crackteck</p>
                            <p>info@crackteck.com</p>
                            <p>Company</p>
                            <p> Gala No.5, Sheetal Swapna</p>
                            <p>Industrial Estate, Sativali Road,</p>
                            <p>Bhoidapada, Vasai East,</p>
                            <p>Palghar - 401208.</p>
                            <p>+91 9607 78 8836</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="order-detail-wrap">
                        <h5 class="fw-bold">Shipping address</h5>
                        <div class="billing-info">
                            <p>Technofra</p>
                            <p>Technofra@support.com</p>
                            <p>Company</p>
                            <p>Office No. 501,</p>
                            <p>5th Floor, Ghanshyam Enclave,</p>
                            <p>New Link Road, Kandivali (West),</p>
                            <p>Mumbai - 400067.</p>
                            <p>+91 8080 80 3374</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Check Out Cart -->

@endsection