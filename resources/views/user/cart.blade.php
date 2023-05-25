@extends('user.layout.main')
@push('title')
    <title>Cart</title>
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
                                    <li class="breadcrumb-item"><a href="/shop">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
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
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cartdata = addtocartdata();
                                        $total = 0; ?>
                                        @foreach ($cartdata['cart'] as $dvc)
                                            @foreach ($cartdata['datacart'][$dvc->product_id] as $dvm)
                                                <?php $tot = $dvc->product_qty * $dvm->product_price; ?>
                                                <tr>
                                                    <td class="pro-thumbnail"><a><img class="img-fluid"
                                                                src="/storage/product/{{ $dvm->product_imagea }}"
                                                                alt="Product" /></a>
                                                    </td>
                                                    <td class="pro-title"><a>{{ $dvm->product_name }}</a></td>
                                                    <td class="pro-price"><span>${{ $dvm->product_price }}</span></td>
                                                    <td class="pro-quantity">
                                                        <div id="{{ $dvc->cart_id }}_dev"
                                                            onclick="cartqty('{{ $dvc->cart_id }}',jQuery('#val{{ $dvc->cart_id }}').val())"
                                                            class="pro-qty"><input type="text"
                                                                id="val{{ $dvc->cart_id }}" value="{{ $dvc->product_qty }}">
                                                        </div>
                                                    </td>
                                                    <td id="cart_ref1{{ $dvc->cart_id }}" class="pro-subtotal">
                                                        <span>${{ $tot }}</span>
                                                    </td>
                                                    <td class="pro-remove"><a href="javascript:void(0);"
                                                            onclick="cartdel('{{ $dvc->cart_id }}')"><i
                                                                class="fa fa-trash-o"></i></a></td>
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
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div id="cart_ref2" class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
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
                                <a href="/checkout" class="btn btn-sqr d-block">Proceed Checkout</a>
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
