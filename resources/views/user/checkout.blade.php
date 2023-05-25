@extends('user.layout.main')
@push('title')
    <title>Checkout</title>
@endpush
@push('active')
    active
@endpush
@section('body')
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <form id="checkout_process">
            <!-- checkout main wrapper start -->
            <div class="checkout-page-wrapper section-padding">
                <div class="container">

                    <div class="row">
                        <!-- Checkout Billing Details -->
                        <div class="col-lg-6">
                            <div class="checkout-billing-details-wrap">
                                <h4 class="checkout-title">Billing Details</h4>
                                <div class="billing-form-wrap">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">First Name</label>
                                                <input type="text" value="{{ $user[0]->register_firstname }}"
                                                    id="f_name" name="first_name" placeholder="First Name" required />
                                            </div>
                                        </div>
                                        <input type="hidden" name="email" value="{{ $user[0]->register_email }}">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Last Name</label>
                                                <input type="text" id="l_name"
                                                    value="{{ $user[0]->register_lastname }}" name="last_name"
                                                    placeholder="Last Name" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="com-name">Company Name</label>
                                        <input type="text" id="com-name" value="{{ $user[0]->register_company }}"
                                            name="company_name" placeholder="Company Name" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="country" class="required">Country</label>
                                        <input type="text" id="com-name" value="{{ $user[0]->register_country }}"
                                            name="conutry" placeholder="Country" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address" class="required mt-20">Street address</label>
                                        <input type="text" id="street-address" value="{{ $user[0]->register_address1 }}"
                                            name="street_address" placeholder="Street address Line 1" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town" class="required">Town / City</label>
                                        <input type="text" id="town" value="{{ $user[0]->register_city }}"
                                            name="city" placeholder="Town / City" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state">State / Divition</label>
                                        <input type="text" id="state" value="{{ $user[0]->register_state }}"
                                            name="state" placeholder="State / Divition" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="postcode" class="required">Postcode / ZIP</label>
                                        <input type="text" id="postcode" value="{{ $user[0]->register_zipcode }}"
                                            name="zip_code" placeholder="Postcode / ZIP" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" value="{{ $user[0]->register_number }}"
                                            name="phone" placeholder="Phone" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" id="ordernote" required cols="30" rows="3"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Order Summary Details -->
                        <div class="col-lg-6">
                            <div class="order-summary-details">
                                <h4 class="checkout-title">Your Order Summary</h4>
                                <div class="order-summary-content">
                                    <!-- Order Summary Table -->
                                    <div class="order-summary-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Products</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $total = 0;
                                                ?>
                                                @foreach ($cart as $data)
                                                    <?php $totl = $data->product_price * $data->product_qty; ?>
                                                    <tr>
                                                        <td><a>{{ $data->product_name }}<strong> ×
                                                                    {{ $data->product_qty }}</strong></a>
                                                        </td>
                                                        <td>${{ $totl }}</td>
                                                    </tr>
                                                    <?php
                                                    
                                                    $total = $total + $totl; ?>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td><strong>${{ $total }}</strong></td>
                                                </tr>
                                                <input type="hidden" name="total" value="{{ $total }}">
                                                <!-- <tr>
                                                                                                                            <td>Shipping</td>
                                                                                                                            <td class="d-flex justify-content-center">
                                                                                                                                <ul class="shipping-type">
                                                                                                                                    <li>
                                                                                                                                        <div class="custom-control custom-radio">
                                                                                                                                            <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                                                                                                            <label class="custom-control-label" for="flatrate">Flat
                                                                                                                                                Rate: $70.00</label>
                                                                                                                                        </div>
                                                                                                                                    </li>
                                                                                                                                    <li>
                                                                                                                                        <div class="custom-control custom-radio">
                                                                                                                                            <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                                                                                                            <label class="custom-control-label" for="freeshipping">Free
                                                                                                                                                Shipping</label>
                                                                                                                                        </div>
                                                                                                                                    </li>
                                                                                                                                </ul>
                                                                                                                            </td>
                                                                                                                        </tr> -->
                                                <tr>
                                                    <td>Total Amount</td>
                                                    <td><strong>${{ $total }}</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- Order Payment Method -->
                                    <div class="order-payment-method">
                                        <!-- <div class="single-payment-method show">
                                                                                                                    <div class="payment-method-name">
                                                                                                                        <div class="custom-control custom-radio">
                                                                                                                            <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                                                                                            <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="payment-method-details" data-method="cash">
                                                                                                                        <p>Pay with cash upon delivery.</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="single-payment-method">
                                                                                                                    <div class="payment-method-name">
                                                                                                                        <div class="custom-control custom-radio">
                                                                                                                            <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                                                                                                            <label class="custom-control-label" for="directbank">Direct Bank
                                                                                                                                Transfer</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="payment-method-details" data-method="bank">
                                                                                                                        <p>Make your payment directly into our bank account. Please use your Order
                                                                                                                            ID as the payment reference. Your order will not be shipped until the
                                                                                                                            funds have cleared in our account..</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="single-payment-method">
                                                                                                                    <div class="payment-method-name">
                                                                                                                        <div class="custom-control custom-radio">
                                                                                                                            <input type="radio" id="checkpayment" name="paymentmethod" value="check" class="custom-control-input" />
                                                                                                                            <label class="custom-control-label" for="checkpayment">Pay with
                                                                                                                                Check</label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="payment-method-details" data-method="check">
                                                                                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                                                                                                            / County, Store Postcode.</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="single-payment-method">
                                                                                                                    <div class="payment-method-name">
                                                                                                                        <div class="custom-control custom-radio">
                                                                                                                            <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                                                                                                            <label class="custom-control-label" for="paypalpayment">Paypal <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card" alt="Paypal" /></label>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="payment-method-details" data-method="paypal">
                                                                                                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                                                                                            PayPal account.</p>
                                                                                                                    </div>
                                                                                                                </div> -->
                                        <div class="summary-footer-area">
                                            <!-- <div class="custom-control custom-checkbox mb-20">
                                                                                                                        <input type="checkbox" class="custom-control-input" id="terms" required />
                                                                                                                        <label class="custom-control-label" for="terms">I have read and agree to
                                                                                                                            the website <a href="index.html">terms and conditions.</a></label>
                                                                                                                    </div> -->
                                            @if ($total < 50)
                                                <center><button disabled class="btn btn-sqr">$50 Order Minimum</button>
                                                </center>
                                            @else
                                                <center><button id="btn" type="submit" class="btn btn-sqr">Place
                                                        Order</button></center>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- checkout main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
@endsection
