@extends('user.layout.main')
@push('title')
    <title>Order Detail</title>
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

                                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <center>
                    <h3>Order ID: #{{ $order_id }}</h3>
                </center><br>
                <div class="section-bg-color">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div id="cart_ref3" class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0; ?>
                                        @foreach ($order as $dvc)
                                            @foreach ($order_detail[$dvc->order_id] as $dvm)
                                                <?php $tot = $dvm->order_product_qty * $dvm->product_price; ?>
                                                <tr>
                                                    <td class="pro-thumbnail"><a><img class="img-fluid"
                                                                src="/storage/product/{{ $dvm->product_imagea }}"
                                                                alt="Product" /></a>
                                                    </td>
                                                    <td class="pro-title"><a>{{ $dvm->product_name }}</a></td>
                                                    <td class="pro-price"><span>${{ $dvm->product_price }}</span></td>
                                                    <td class="pro-price"><span>{{ $dvm->order_product_qty }}</span></td>
                                                    <td class="pro-subtotal">
                                                        <span>${{ $tot }}</span>
                                                    </td>

                                                </tr>
                                                <?php
                                                $total = $total + $tot;
                                                ?>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Cart Calculation Area -->

                            <div id="cart_ref2" class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Shipping Address</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            @foreach ($order as $dvc)
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{ $dvc->order_street_address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Order Date</td>
                                                    <td>{{ $dvc->order_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Order Status</td>
                                                    <td>{{ $dvc->order_status }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Cart Calculation Area -->

                            <div id="cart_ref2" class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Bill Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>${{ $total }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Shipping</td>
                                                <td>$70</td>
                                            </tr> --}}
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">${{ $total }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
@endsection
