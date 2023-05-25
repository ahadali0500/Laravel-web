@extends('user.layout.main')
@push('title')
    <title>Forgot Password</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Recover Password</li>
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
                        <div class="col-lg-6">

                            <div class="login-reg-form-wrap sign-up-form">
                                <center>
                                    <h3>Forgot Password</h3>
                                </center>
                                <br>


                                <form id="fp_email">


                                    @csrf
                                    <div class="single-input-item">
                                        <input type="email" name="email" placeholder="Enter Your Email*" required />
                                    </div>

                                    <div class="single-input-item">
                                        <button type="submit" id="bbttnn" class="btn btn-sqr">SUBMIT</button>
                                    </div>
                                    <br>
                                    <span>For Login <a href="/login">click here</a></span>
                                </form>

                                <center>
                                    <h4 id="alert"></h4>
                                </center>
                            </div>
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
