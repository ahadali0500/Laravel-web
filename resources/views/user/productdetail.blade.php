@extends('user.layout.main')
@push('title')
    <title>Product Detail</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">product details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">

                                        <div class="pro-large-img img-zoom">
                                            <img src="/storage/product/{{ $shop[0]->product_imagea }}"
                                                alt="product-details" />
                                        </div>
                                        <div class="pro-large-img img-zoom">
                                            <img src="/storage/product/{{ $shop[0]->product_imageb }}"
                                                alt="product-details" />
                                        </div>
                                        @foreach ($shoppic as $valpic)
                                            <div class="pro-large-img img-zoom">
                                                <img src="/storage/product/{{ $valpic->product_image }}"
                                                    alt="product-details" />
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">
                                        <div class="pro-nav-thumb">
                                            <img src="/storage/product/{{ $shop[0]->product_imagea }}"
                                                alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="/storage/product/{{ $shop[0]->product_imageb }}"
                                                alt="product-details" />
                                        </div>
                                        @foreach ($shoppic as $valpic)
                                            <div class="pro-nav-thumb">
                                                <img src="/storage/product/{{ $valpic->product_image }}"
                                                    alt="product-details" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <h3 class="product-name">{{ $shop[0]->product_name }}</h3>
                                        {{-- <div class="ratings d-flex">
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                            <div class="pro-review">
                                                <span>1 Reviews</span>
                                            </div>
                                        </div> --}}
                                        <div class="price-box">
                                            <span class="price-regular">${{ $shop[0]->product_price }}</span>
                                            <span class="price-old"><del>${{ $shop[0]->product_mrp }}</del></span>
                                        </div>
                                        {{-- <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span>200 in stock</span>
                                        </div> --}}
                                        <p class="pro-desc">{{ $shop[0]->product_short_des }}</p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input id="userqty" type="text" value="1">
                                                </div>
                                            </div>
                                            @if (session()->has('user_id'))
                                                <div class="action_link">
                                                    <a class="btn btn-cart2"
                                                        onclick="addtocart('{{ $shop[0]->product_id }}',jQuery('#userqty').val())">Add
                                                        to
                                                        Cart</a>
                                                </div>
                                            @else
                                                <center>
                                                    <h4>Login To Add Product in your Cart</h4>
                                                </center>
                                            @endif
                                        </div>
                                        <div>
                                            Total Products: {{ $shop[0]->product_qty }}
                                        </div>

                                        <div>
                                            Available Products: <?php echo inventryavailable($shop[0]->product_id); ?>
                                        </div>
                                        {{-- <div class="pro-size">
                                            <h6 class="option-title">size :</h6>
                                            <select class="nice-select">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XL</option>
                                            </select>
                                        </div> --}}
                                        {{-- <div class="useful-links">
                                            <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                                    class="pe-7s-refresh-2"></i>compare</a>
                                            <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                    class="pe-7s-like"></i>wishlist</a>
                                        </div>
                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>{{ $shop[0]->product_long_des }}</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>color</td>
                                                            <td>black, blue, red</td>
                                                        </tr>
                                                        <tr>
                                                            <td>size</td>
                                                            <td>L, M, S</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form">
                                                    <h5>1 review for <span>Chaz Kangeroo</span></h5>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="assets/img/about/avatar.jpg" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span><i class="fa fa-star"></i></span>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span>admin -</span> 30 Mar, 2023</p>
                                                            </div>
                                                            <p>Aliquam fringilla euismod risus ac bibendum. Sed sit
                                                                amet sem varius ante feugiat lacinia. Nunc ipsum nulla,
                                                                vulputate ut venenatis vitae, malesuada ut mi. Quisque
                                                                iaculis, dui congue placerat pretium, augue erat
                                                                accumsan lacus</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Your Name</label>
                                                            <input type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Your Email</label>
                                                            <input type="email" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Your Review</label>
                                                            <textarea class="form-control" required></textarea>
                                                            <div class="help-block pt-10"><span
                                                                    class="text-danger">Note:</span>
                                                                HTML is not translated!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span
                                                                    class="text-danger">*</span>
                                                                Rating</label>
                                                            &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                            <input type="radio" value="1" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="2" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="3" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="4" name="rating">
                                                            &nbsp;
                                                            <input type="radio" value="5" name="rating" checked>
                                                            &nbsp;Good
                                                        </div>
                                                    </div>
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Continue</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Products</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-15 slick-arrow-style">


                            @foreach ($shopcate as $cv)
                                <!-- product item start -->
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="{{ url('productdetail/' . $cv->product_id) }}">
                                            <img class="pri-img" src="/storage/product/{{ $cv->product_imagea }}"
                                                alt="product">
                                            <img class="sec-img" src="/storage/product/{{ $cv->product_imageb }}"
                                                alt="product">
                                        </a>
                                        {{-- <div class="product-badge">
                                            <div class="product-label new">
                                                <span>-30%</span>
                                            </div>
                                        </div> --}}
                                        <div class="button-group">

                                            @if (session()->has('user_id'))
                                                <a onclick="addtocart('{{ $cv->product_id }}','1')"
                                                    data-bs-toggle="tooltip" title="Add to Cart"><i
                                                        class="pe-7s-cart"></i></a>
                                            @endif
                                        </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <h6 class="product-name">
                                            <a
                                                href="{{ url('productdetail/' . $cv->product_id) }}">{{ $cv->product_name }}</a>
                                        </h6>
                                        <div class="price-box">
                                            <span class="price-regular">${{ $cv->product_price }}</span>
                                            <span class="price-old"><del>${{ $cv->product_mrp }}</del></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- product item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
    </main>
@endsection
