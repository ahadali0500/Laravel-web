@extends('user.layout.main')
@push('title')
    <title>Register</title>
@endpush
@section('body')
    <style>
        #sapo {
            float: right;
            font-size: 14px;
        }

        #alert1 {
            float: right;
            font-size: 14px;
            color: red;
        }

        #alert2 {
            float: right;
            font-size: 14px;
            color: red;
        }
    </style>
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-3">

                        </div>
                        <!-- Login Content End -->

                        <!-- Register Content Start -->
                        <div id="rem2" class="col-lg-6">
                            <center>
                                <p style="font-size: 16px;"><b>Welcome to Tom Bag!</b><br>
                                    Please <b><a href="/contactus">contact us</a></b> if you have any issues logging into
                                    your account.</p>
                            </center>
                            <br>
                            <div class="login-reg-form-wrap sign-up-form">
                                <!--<center>-->
                                <!--    <h3>Apply for a Wholesale Account</h3>-->
                                <!--</center>-->
                                <!--<br>-->
                                <!--<h6>Let's get to know your company.</h6>-->

                                <form id="Register">

                                    @csrf
                                    <!--<div class="single-input-item">-->
                                    <!--    <input type="text" name="aboutyou" placeholder="About you*" required />-->
                                    <!--</div>-->
                                    <!--<p>To help us confirm that you qualify for wholesale purchasing, please briefly describe-->
                                    <!--    how you sell products.</p>-->
                                    <!--<div class="single-input-item">-->
                                    <!--    <input type="text" name="website" placeholder="Your Website (optional)" />-->
                                    <!--</div>-->
                                    <!--If you indicate that you only sell products online, your application may not be approved-->
                                    <!--if you do not provide a link to your website.-->
                                    <!--<div class="single-input-item">-->
                                    <!--    <input type="text" name="taxid" placeholder="Tax ID Number*" required />-->
                                    <!--</div>-->
                                    <!--Please enter your Tax ID, BN, reseller's number or other registration number from when-->
                                    <!--you established your business.-->
                                    <!--<br>-->
                                    <!--<br>-->
                                    <!--<h6>Company Details:</h6>-->
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Email*" required />
                                        <span id="alert1"></span>
                                    </div>

                                    <div class="single-input-item">
                                        <input type="password" minlength="6" name="password" placeholder="Password*"
                                            required />
                                        <span id="sapo">Password must be at leat 6 Character.</span>
                                    </div>
                                    <span id="alert2"></span>
                                    <div class="single-input-item">

                                        <input type="password" minlength="6" name="repeatpassword"
                                            placeholder="Password Again*" required />

                                    </div>
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" name="firstname" placeholder="First Name*" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="text" name="lastname" placeholder="Last Name*" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="company" placeholder="Company*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="number" placeholder="Phone Number*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="address1" placeholder="Address*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="address2" placeholder="Address Line 2*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="city" placeholder="City*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="state" placeholder="State*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="zipcode" placeholder="Zip Code*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="text" name="country" placeholder="Counrty*" required />
                                    </div>
                                    <div class="single-input-item">
                                        <select required name="find" select class="form-control">
                                            <option required value="">How did you find us</option>
                                            <option required value="websearch">Web Search</option>
                                            <option required value="socialmedia">Social Media</option>
                                        </select>
                                    </div>
                                    <br><br>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="newsletter" class="custom-control-input"
                                                        id="subnewsletter">
                                                    <label class="custom-control-label" for="subnewsletter">Please send
                                                        discount and new arrival emails.</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="submit" id="btnvalue" class="btn btn-sqr">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="rem1" style="display:none;" class="col-lg-6">
                            <center>
                                <p style="font-size: 18px;"><b>Welcome to Tom Bag!</b><br>
                                    Please <b><a href="/contact">contact us</a></b> if you have any issues logging into
                                    your account.</p>
                            </center>
                            <center>
                                <p style="font-size: 15px;">Thank you for registering for a wholesale buying account with
                                    Tom Bag. We review applications Monday through Friday.

                                    We will contact you when your account is approved. You will then be able to log in and
                                    access pricing.
                                </p>
                            </center>
                        </div>
                        <!-- Register Content End -->
                        <!-- Login Content Start -->
                        <div class="col-lg-3">

                        </div>
                        <!-- Login Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
@endsection
