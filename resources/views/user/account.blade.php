@extends('user.layout.main')
@push('title')
    <title>Login</title>
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
                                    <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">my-account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i
                                                    class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                                Orders</a>
                                            <!-- <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i>
                                                                                                                                                                                                                                                                                                        Download</a>
                                                                                                                                                                                                                                                                                                    <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                                                                                                                                                                                                                                                                                        Payment
                                                                                                                                                                                                                                                                                                        Method</a>
                                                                                                                                                                                                                                                                                                    <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                                                                                                                                                                                                                                                                                        Address</a> -->
                                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account
                                                Details</a>
                                            <a href="/logout"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Dashboard</h5>
                                                    <div class="welcome">
                                                        <p>Hello, <strong>{{ $user1[0]->register_firstname }}</strong> (If
                                                            Not <strong>{{ $user1[0]->register_firstname }}
                                                                !</strong><a href="/logout" class="logout">
                                                                Logout</a>)</p>
                                                    </div>
                                                    <p class="mb-0">From your account dashboard. you can easily check &
                                                        view your recent orders, manage your shipping and billing addresses
                                                        and edit your password and account details.</p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Orders</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Order</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($order as $val)
                                                                    <tr>
                                                                        <td>{{ $val->order_id }}</td>
                                                                        <td>{{ $val->order_date }}</td>
                                                                        <td>{{ $val->order_status }}</td>
                                                                        <td>${{ $val->order_total }}</td>
                                                                        <td><a href="/orderdetail/{{ $val->order_id }}"
                                                                                class="btn btn-sqr">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <!-- <div class="tab-pane fade" id="download" role="tabpanel">
                                                                                                                                                                                                                                                                                                        <div class="myaccount-content">
                                                                                                                                                                                                                                                                                                            <h5>Downloads</h5>
                                                                                                                                                                                                                                                                                                            <div class="myaccount-table table-responsive text-center">
                                                                                                                                                                                                                                                                                                                <table class="table table-bordered">
                                                                                                                                                                                                                                                                                                                    <thead class="thead-light">
                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                            <th>Product</th>
                                                                                                                                                                                                                                                                                                                            <th>Date</th>
                                                                                                                                                                                                                                                                                                                            <th>Expire</th>
                                                                                                                                                                                                                                                                                                                            <th>Download</th>
                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                    </thead>
                                                                                                                                                                                                                                                                                                                    <tbody>
                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                            <td>Quickiin Leather Bags</td>
                                                                                                                                                                                                                                                                                                                            <td>Aug 22, 2023</td>
                                                                                                                                                                                                                                                                                                                            <td>Yes</td>
                                                                                                                                                                                                                                                                                                                            <td><a href="#" class="btn btn-sqr"><i
                                                                                                                                                                                                                                                                                                                                class="fa fa-cloud-download"></i>
                                                                                                                                                                                                                                                                                                                                    Download File</a></td>
                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                            <td>Fusions Leather Bags</td>
                                                                                                                                                                                                                                                                                                                            <td>Sep 12, 2023</td>
                                                                                                                                                                                                                                                                                                                            <td>Never</td>
                                                                                                                                                                                                                                                                                                                            <td><a href="#" class="btn btn-sqr"><i
                                                                                                                                                                                                                                                                                                                                class="fa fa-cloud-download"></i>
                                                                                                                                                                                                                                                                                                                                    Download File</a></td>
                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                    </tbody>
                                                                                                                                                                                                                                                                                                                </table>
                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    </div> -->
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <!-- <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                                                                                                                                                                                                                                                                                        <div class="myaccount-content">
                                                                                                                                                                                                                                                                                                            <h5>Payment Method</h5>
                                                                                                                                                                                                                                                                                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    </div> -->
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <!-- <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                                                                                                                                                                                                                                                                        <div class="myaccount-content">
                                                                                                                                                                                                                                                                                                            <h5>Billing Address</h5>
                                                                                                                                                                                                                                                                                                            <address>
                                                                                                                                                                                                                                                                                                                <p><strong>Erik Jhonson</strong></p>
                                                                                                                                                                                                                                                                                                                <p>1355 Market St, Suite 900 <br>
                                                                                                                                                                                                                                                                                                                    San Francisco, CA 94103</p>
                                                                                                                                                                                                                                                                                                                <p>Mobile: (123) 456-7890</p>
                                                                                                                                                                                                                                                                                                            </address>
                                                                                                                                                                                                                                                                                                            <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                                                                                                                                                                                                                                                                                Edit Address</a>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    </div> -->
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Account Details</h5>
                                                    <div class="account-details-form">
                                                        <form id="Addaccount" method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">First
                                                                            Name</label>
                                                                        <input type="text"
                                                                            value="{{ $user1[0]->register_firstname }}"
                                                                            id="f_name" name="firstname"
                                                                            placeholder="First Name" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="last-name" class="required">Last
                                                                            Name</label>
                                                                        <input type="text" id="l_name"
                                                                            value="{{ $user1[0]->register_lastname }}"
                                                                            name="lastname" placeholder="Last Name"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="com-name">Company Name</label>
                                                                        <input type="text" id="com-name"
                                                                            value="{{ $user1[0]->register_company }}"
                                                                            name="company_name" placeholder="Company Name"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="country"
                                                                            class="required">Country</label>
                                                                        <input type="text" id="com-name"
                                                                            value="{{ $user1[0]->register_country }}"
                                                                            name="conutry" placeholder="Country"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="street-address"
                                                                            class="required mt-20">Street address</label>
                                                                        <input type="text" id="street-address"
                                                                            value="{{ $user1[0]->register_address1 }}"
                                                                            name="street_address"
                                                                            placeholder="Street address Line 1" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="town" class="required">Town /
                                                                            City</label>
                                                                        <input type="text" id="town"
                                                                            value="{{ $user1[0]->register_city }}"
                                                                            name="city" placeholder="Town / City"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="state">State / Divition</label>
                                                                        <input type="text" id="state"
                                                                            value="{{ $user1[0]->register_state }}"
                                                                            name="state" placeholder="State / Divition"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="postcode" class="required">Postcode /
                                                                            ZIP</label>
                                                                        <input type="text" id="postcode"
                                                                            value="{{ $user1[0]->register_zipcode }}"
                                                                            name="zip_code" placeholder="Postcode / ZIP"
                                                                            required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="single-input-item">
                                                                        <label for="phone">Phone</label>
                                                                        <input type="text" id="phone"
                                                                            value="{{ $user1[0]->register_number }}"
                                                                            name="phone" placeholder="Phone" required />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="single-input-item">
                                                                <button class="btn btn-sqr" type="submit">Save
                                                                    Changes</button>
                                                            </div>
                                                        </form>

                                                        <form id="passwordchange_process">
                                                            <fieldset>
                                                                <legend>Password change</legend>
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="single-input-item">
                                                                            <label for="new-pwd" class="required">New
                                                                                Password</label>
                                                                            <input type="password" name="password"
                                                                                placeholder="New Password" />
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </fieldset>
                                                            <div class="single-input-item">
                                                                <button class="btn btn-sqr" type="submit">Save
                                                                    Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
@endsection
