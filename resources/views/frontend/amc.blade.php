@extends('frontend/layout/master')

@section('style')
    <style>
        .pricing-section {
            padding: 30px 0;
        }

        .pricing-section h3 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .pricing-section p {
            color: #666;
            font-size: 15px;
        }

        .toggle-buttons {
            display: inline-flex;
            background-color: #e0f3ed;
            border-radius: 8px;
            overflow: hidden;
            margin: 30px 0;
        }

        .toggle-buttons button {
            background: none;
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            color: #111;
        }

        .toggle-buttons .active {
            background-color: #1987FF;
            color: #fff;
        }

        .price-card {
            background-color: #fff;
            border: none;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.07);
            transition: 0.3s;
        }

        .price-card:hover {
            transform: translateY(-5px);
        }

        .price-card h4 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .price-card .price {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .price-card ul {
            padding-left: 0;
            list-style: none;
            color: #555;
            font-size: 15px;
            line-height: 1.8;
        }

        .price-card ul li::before {
            content: "✔";
            color: #27c4*;
            margin-right: 8px;
        }

        .price-card .btn {
            margin-top: 20px;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 5px;
        }

        .recommended {
            border: 2px solid #1987FF;
            position: relative;
        }

        .recommended::before {
            content: "RECOMMENDED";
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #1987FF;
            color: rgb(0, 0, 0);
            font-size: 12px;
            font-weight: bold;
            padding: 5px 12px;
            border-radius: 20px;
        }

        .feature {
            display: flex;
            justify-content: space-between;
        }




        .testimonial-heading {
            text-align: center;
            padding: 60px 0 30px;
        }

        .testimonial-heading h6 {
            color: #1987FF;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .testimonial-heading h3 {
            font-weight: 700;
        }

        .testimonial-heading span {
            color: #1987FF;
        }

        .testimonial-card {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            margin: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
        }

        .testimonial-stars {
            color: #1987FF;
            margin-bottom: 10px;
        }

        .testimonial-text {
            font-size: 15px;
            color: #333;
            margin-bottom: 15px;
        }

        .testimonial-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .testimonial-user img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .testimonial-user-info h6 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .testimonial-user-info small {
            font-size: 13px;
            color: #888;
        }

        .badge-top {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #1987FF;
            color: #fff;
            font-weight: bold;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Carousel arrows */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #1987FF;
            border-radius: 50%;
            padding: 10px;
        }

        .carousel-item {
            height: 30vh;
            color: #000000;
            position: relative;
            background-size: cover;
            background-position: top;
        }

        .form-container {
            max-width: 1196px;
        }

        .tf-sp-2 {
            padding-top: 20px;
            padding-bottom: 0px;
        }






        .container-contact-form {
            display: flex;
            /* max-width: 1000px; */
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            width: 250px;
            background: #EBEBEB;
            padding: 40px 20px;
        }

        .sidebar h2 {
            margin-bottom: 40px;
        }

        .step {
            margin-bottom: 30px;
            color: #999;
            font-weight: bold;
        }

        .step.active {
            color: #000;
        }

        .form-content {
            flex: 1;
            padding: 40px;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        /* input,
          select,
          textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
          } */

        .btn {
            padding: 10px 20px;
            background: #1987FF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            padding: 10px 20px;
            background: rgb(56, 219, 192);
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #000000;
        }

        .btn:disabled {
            background: #ccc;
        }
    </style>
@endsection

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
                    <span class="body-small">AMC</span>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Breakcrumbs -->

    <div class="page-content md-mb-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tf-sp-2">
                        <img src="{{ asset('frontend-assets/images/banner/AMC.png') }}" style="width: 100%;" alt="">
                        <div class="container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pricing-section text-center">
        <div class="container">
            <h3>Pricing</h3>
            <p>Sign up in less than 30 seconds. Try out our 7 day risk free trial, upgrade at anytime, no questions, no
                hassle.</p>

            <div class="toggle-buttons">
                <button class="active">Monthly</button>
                <button>Annually</button>
            </div>

            <div class="row g-4 md-mt-3">
                <!-- Free Plan -->
                <div class="col-md-6 col-lg-3">
                    <div class="price-card h-100">
                        <h4>Free</h4>
                        <div class="price">₹ 0 <small class="text-muted">/mo</small></div>
                        <div class="pricing-features">
                            <h6 class="text-primary my-3">Software Updates</h6>
                            <div class="feature">Duration<span>1 Year</span></div>
                            <div class="feature">Products Covered<span>Laptops, Desktops</span></div>
                            <div class="feature">Response Time<span>48 Hours</span></div>
                            <div class="feature">On-Site Visit<span>No</span></div>
                        </div>
                        <button class="btn btn-outline-dark w-100">Get Started</button>
                    </div>
                </div>

                <!-- Small Business -->
                <div class="col-md-6 col-lg-3">
                    <div class="price-card h-100">
                        <h4>Basic AMC</h4>
                        <div class="price">₹ 99 <small class="text-muted">/mo</small></div>
                        <div class="pricing-features">
                            <h6 class="text-primary my-3">Software Updates</h6>
                            <div class="feature">Duration<span>1 Year</span></div>
                            <div class="feature">Products Covered<span>Laptops, Desktops</span></div>
                            <div class="feature">Response Time<span>40 Hours</span></div>
                            <div class="feature">On-Site Visit<span>Yes (1 visits/year)</span></div>
                        </div>
                        <button class="btn btn-outline-dark w-100">Get Started</button>
                    </div>
                </div>

                <!-- Professional (Recommended) -->
                <div class="col-md-6 col-lg-3">
                    <div class="price-card h-100 recommended">
                        <h4>Standard AMC</h4>
                        <div class="price">₹ 219 <small class="text-muted">/mo</small></div>
                        <div class="pricing-features">
                            <h6 class="text-primary my-3">Software + Hardware Support</h6>
                            <div class="feature">Duration<span>1 Year</span></div>
                            <div class="feature">Products Covered<span>Laptops, Desktops</span></div>
                            <div class="feature">Response Time<span>24 Hours</span></div>
                            <div class="feature">On-Site Visit<span>Yes (2 visits/year)</span></div>
                        </div>
                        <button class="btn btn-outline-dark w-100">Get Started</button>
                    </div>
                </div>

                <!-- Enterprise -->
                <div class="col-md-6 col-lg-3">
                    <div class="price-card h-100">
                        <h4>Premium AMC</h4>
                        <div class="price">₹ 419 <small class="text-muted">/mo</small></div>
                        <div class="pricing-features">
                            <h6 class="text-primary my-3">Full Software + Hardware Support</h6>
                            <div class="feature">Duration<span>1 Year</span></div>
                            <div class="feature">Products Covered<span>Laptops, Desktops</span></div>
                            <div class="feature">Response Time<span>48 Hours</span></div>
                            <div class="feature">On-Site Visit<span>Yes (3 visits/year)</span></div>
                        </div>
                        <button class="btn btn-outline-dark w-100">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <h4 class="d-flex d-md-none justify-content-center align-item-center">Service Request Form</h4>

    <div class="container container-contact-form">
        <div class="sidebar d-none d-md-flex flex-column">
            <h4 class="mb-5 d-flex justify-content-center text-center">Service Request Form</h4>
            <div class="step active" id="step1">1. Customer Details</div>
            <div class="step" id="step2">2. Product Information</div>
            <div class="step" id="step3">3. AMC Plan Selection</div>
            <div class="step" id="step4">4. Additional Information</div>
        </div>


        <div class="form-content">
            <form id="requestForm">
                <!-- Step 1 -->
                <div class="form-section active" id="section1">
                    <h3 class="mb-5">Customer Details</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control form-control-lg" id="name"
                                placeholder="Full Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email"
                                placeholder="Email Address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control form-control-lg" id="phone"
                                placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control form-control-lg" id="address"
                                placeholder="Address" required>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="form-section" id="section2">
                    <h3 class="mb-5">Product Information</h3>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="product" class="form-label">Product Type</label>
                            <select class="form-select " id="product" required>
                                <option value="">Product Type</option>
                                <option>Laptop</option>
                                <option>Desktop</option>
                                <option>Printer</option>
                                <option>Server</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="brand" class="form-label">Brand Name</label>
                            <input type="text" class="form-control form-control-lg" id="brand"
                                placeholder="Brand Name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="model" class="form-label">Model Number</label>
                            <input type="text" class="form-control form-control-lg" id="model"
                                placeholder="Model Number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="serial" class="form-label">Serial Number</label>
                            <input type="text" class="form-control form-control-lg" id="serial"
                                placeholder="Serial Number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="purchase" class="form-label">Purchase Date</label>
                            <input type="date" class="form-control form-control-lg" id="purchase"
                                placeholder="Purchase Date" required>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="form-section" id="section3">
                    <h3 class="mb-5">AMC Plan Selection</h3>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Select Plan:</label><br>
                            <div class="form-check form-check-inline align-item-center">
                                <input class="form-check-input" type="radio" name="plan" id="basic"
                                    value="Basic" required>
                                <label class="form-check-label ms-2" for="basic">Basic</label>
                            </div>
                            <div class="form-check form-check-inline align-item-center">
                                <input class="form-check-input" type="radio" name="plan" id="standard"
                                    value="Standard">
                                <label class="form-check-label ms-2" for="standard">Standard</label>
                            </div>
                            <div class="form-check form-check-inline align-item-center">
                                <input class="form-check-input" type="radio" name="plan" id="premium"
                                    value="Premium">
                                <label class="form-check-label ms-2" for="premium">Premium</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="duration" class="form-label">AMC Duration</label>
                            <select class="form-select " id="duration" required>
                                <option value="">AMC Duration</option>
                                <option>6 Months</option>
                                <option>1 Year</option>
                                <option>2 Years</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="start" class="form-label">Preferred Start Date</label>
                            <input type="date" class="form-control form-control-lg" id="start"
                                placeholder="Preferred Start Date" required>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="form-section" id="section4">
                    <h3 class="mb-5">Additional Information</h3>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Additional Notes (Optional)</label>
                        <textarea class="form-control" id="notes" rows="4" placeholder="Any additional notes or instructions..."></textarea>
                    </div>


                    <div class="form-check mb-4 align-item-center">
                        <input class="form-check-input" type="checkbox" id="agree" required>
                        <label class="form-check-label ms-2" for="agree">
                            I agree to the <a href="#">terms and conditions</a>.
                        </label>
                    </div>
                </div>

                <div style="text-align: right;">
                    <button type="button" class="btn mt-3" id="nextBtn">Next</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Testimonial -->
    <section class="tf-sp-2 mb-5">
        <div class="container">
            <div class="flat-title wow fadeInUp">
                <h5 class="fw-semibold">Customer Review</h5>
                <!-- <div class="box-btn-slide relative">
                <div class="swiper-button-prev nav-swiper nav-prev-products">
                  <i class="icon-arrow-left-lg"></i>
                </div>
                <div class="swiper-button-next nav-swiper nav-next-products">
                  <i class="icon-arrow-right-lg"></i>
                </div>
              </div> -->
            </div>
            <div class="swiper tf-sw-products" data-preview="3" data-tablet="2" data-mobile-sm="1" data-mobile="1"
                data-space-lg="30" data-space-md="15" data-space="15" data-pagination="1" data-pagination-sm="1"
                data-pagination-md="2" data-pagination-lg="3">
                <div class="swiper-wrapper">
                    <!-- item 1 -->
                    <div class="swiper-slide">
                        <div class="wg-testimonial wow fadeInUp">
                            <div class="entry_image">
                                <img src="{{ asset('frontend-assets/images/item/person.avif') }}"
                                    data-src="{{ asset('frontend-assets/images/item/person.avif') }}" alt=""
                                    class="lazyload">
                            </div>
                            <div class="content">
                                <div class="box-title">
                                    <a href="#" class="entry_name product-title link fw-semibold">
                                        Cameron Williamson
                                    </a>
                                    <ul class="entry_meta">
                                        <li>
                                            <p class="body-small text-main-2">Color: Black</p>
                                        </li>
                                        <li class="br-line"></li>
                                        <li>
                                            <p class="body-small text-main-2 fw-semibold">Verified Purchase</p>
                                        </li>
                                    </ul>
                                    <ul class="list-star">
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                    </ul>
                                </div>
                                <p class="entry_text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis
                                    velit,
                                    pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at
                                    justo sed
                                    nibh interdum viverra at non magna
                                </p>
                                <p class="entry_date body-small">
                                    December 14, 2020 at 17:20
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- item 2 -->
                    <div class="swiper-slide">
                        <div class="wg-testimonial wow fadeInUp" data-wow-delay="0.1s">
                            <div class="entry_image">
                                <img src="{{ asset('frontend-assets/images/item/person.avif') }}"
                                    data-src="{{ asset('frontend-assets/images/item/person.avif') }}" alt=""
                                    class="lazyload">
                            </div>
                            <div class="content">
                                <div class="box-title">
                                    <a href="#" class="entry_name product-title link fw-semibold">
                                        Cameron Williamson
                                    </a>
                                    <ul class="entry_meta">
                                        <li>
                                            <p class="body-small text-main-2">Color: Black</p>
                                        </li>
                                        <li class="br-line"></li>
                                        <li>
                                            <p class="body-small text-main-2 fw-semibold">Verified Purchase</p>
                                        </li>
                                    </ul>
                                    <ul class="list-star">
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                    </ul>
                                </div>
                                <p class="entry_text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis
                                    velit,
                                    pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at
                                    justo sed
                                    nibh interdum viverra at non magna
                                </p>
                                <p class="entry_date body-small">
                                    December 14, 2020 at 17:20
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- item 3 -->
                    <div class="swiper-slide">
                        <div class="wg-testimonial wow fadeInUp" data-wow-delay="0.2s">
                            <div class="entry_image">
                                <img src="{{ asset('frontend-assets/images/item/person.avif') }}"
                                    data-src="{{ asset('frontend-assets/images/item/person.avif') }}" alt=""
                                    class="lazyload">
                            </div>
                            <div class="content">
                                <div class="box-title">
                                    <a href="#" class="entry_name product-title link fw-semibold">
                                        Cameron Williamson
                                    </a>
                                    <ul class="entry_meta">
                                        <li>
                                            <p class="body-small text-main-2">Color: Black</p>
                                        </li>
                                        <li class="br-line"></li>
                                        <li>
                                            <p class="body-small text-main-2 fw-semibold">Verified Purchase</p>
                                        </li>
                                    </ul>
                                    <ul class="list-star">
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                    </ul>
                                </div>
                                <p class="entry_text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis
                                    velit,
                                    pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at
                                    justo sed
                                    nibh interdum viverra at non magna
                                </p>
                                <p class="entry_date body-small">
                                    December 14, 2020 at 17:20
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- item 4 -->
                    <div class="swiper-slide">
                        <div class="wg-testimonial">
                            <div class="entry_image">
                                <img src="{{ asset('frontend-assets/images/item/person.avif') }}"
                                    data-src="{{ asset('frontend-assets/images/item/person.avif') }}" alt=""
                                    class="lazyload">
                            </div>
                            <div class="content">
                                <div class="box-title">
                                    <a href="#" class="entry_name product-title link fw-semibold">
                                        Cameron Williamson
                                    </a>
                                    <ul class="entry_meta">
                                        <li>
                                            <p class="body-small text-main-2">Color: Black</p>
                                        </li>
                                        <li class="br-line"></li>
                                        <li>
                                            <p class="body-small text-main-2 fw-semibold">Verified Purchase</p>
                                        </li>
                                    </ul>
                                    <ul class="list-star">
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                        <li><i class="icon-star"></i></li>
                                    </ul>
                                </div>
                                <p class="entry_text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis
                                    velit,
                                    pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at
                                    justo sed
                                    nibh interdum viverra at non magna
                                </p>
                                <p class="entry_date body-small">
                                    December 14, 2020 at 17:20
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-dot-default sw-pagination-products justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Testimonial -->
@endsection

@section('script')
    <script>
        const sections = document.querySelectorAll('.form-section');
        const steps = document.querySelectorAll('.step');
        let currentStep = 0;

        document.getElementById('nextBtn').addEventListener('click', () => {
            if (currentStep < sections.length - 1) {
                sections[currentStep].classList.remove('active');
                steps[currentStep].classList.remove('active');
                currentStep++;
                sections[currentStep].classList.add('active');
                steps[currentStep].classList.add('active');
                if (currentStep === sections.length - 1) {
                    document.getElementById('nextBtn').textContent = 'Submit';
                }
            } else {
                alert('Form submitted successfully!');
                document.getElementById('requestForm').reset();
                location.reload(); // Optional: Reset the form flow
            }
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection


