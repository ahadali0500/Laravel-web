@extends('user.layout.main')
@push('title')
    <title>Shop</title>
@endpush
@push('shop')
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
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h4 class="sidebar-title">Categories</h4>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        @php
                                            $data = categories();
                                        @endphp
                                        @foreach ($data['category'] as $datavc)
                                            <li>

                                                <div class="custom-control custom-checkbox">
                                                    <input @if ($datavc->category_id == $category) checked @endif
                                                        onclick="catefilterc('{{ $datavc->category_id }}')" type="checkbox"
                                                        class="custom-control-input"
                                                        id="customCheck2{{ $datavc->category_id }}">
                                                    <label class="custom-control-label"
                                                        for="customCheck2{{ $datavc->category_id }}">{{ $datavc->category_name }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h4 class="sidebar-title">price</h4><br>
                                <span> Min Price {{ $minprice }} - Max Price {{ $maxprice }}</span>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="1" data-max="1000"></div>
                                        <div class="range-slider">
                                            <form class="d-flex align-items-center justify-content-between">

                                                <div class="price-input">
                                                    <label for="amount">Price: </label>

                                                    <input style="font-size:12px" type="text" id="amount">
                                                </div>
                                                <button onclick="pricefilter(jQuery('#amount').val())" type="button"
                                                    class="filter-btn">filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- single sidebar end -->


                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view"
                                                    data-bs-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-bs-toggle="tooltip"
                                                    title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
                                @foreach ($shop as $shopdata)
                                    <div class="col-md-4 col-sm-6">
                                        <!-- product grid start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="{{ url('productdetail/' . $shopdata->product_id) }}">
                                                    <img class="pri-img"
                                                        src="/storage/product/{{ $shopdata->product_imagea }}"
                                                        alt="product">
                                                    <img class="sec-img"
                                                        src="/storage/product/{{ $shopdata->product_imageb }}"
                                                        alt="product">
                                                </a>
                                                {{-- <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>-30%</span>
                                                    </div>
                                                </div> --}}
                                                <div class="button-group">
                                                    {{-- <a data-bs-toggle="tooltip" title="Add to Wishlist"><i
                                                            class=""></i></a> --}}
                                                    @if (session()->has('user_id'))
                                                        <a onclick="addtocart('{{ $shopdata->product_id }}','1')"
                                                            data-bs-toggle="tooltip" title="Add to Cart"><i
                                                                class="pe-7s-cart"></i></a>
                                                    @endif
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view{{ $shopdata->product_id }}"><span
                                                            data-bs-toggle="tooltip" title="Quick View"><i
                                                                class="pe-7s-look"></i></span></a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <h6 class="product-name">
                                                    <a
                                                        href="{{ url('productdetail/' . $shopdata->product_id) }}">{{ $shopdata->product_name }}</a>
                                                </h6>
                                                <div class="price-box">
                                                    <span class="price-regular">${{ $shopdata->product_price }}</span>
                                                    <span class="price-old"><del>${{ $shopdata->product_mrp }}</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product grid end -->

                                        <!-- product list item end -->
                                        <div class="product-list-item">
                                            <figure class="product-thumb">
                                                <a href="{{ url('productdetail/' . $shopdata->product_id) }}">
                                                    <img class="pri-img"
                                                        src="/storage/product/{{ $shopdata->product_imagea }}"
                                                        alt="product">
                                                    <img class="sec-img"
                                                        src="/storage/product/{{ $shopdata->product_imageb }}"
                                                        alt="product">
                                                </a>
                                                {{-- <div class="product-badge">
                                                    <div class="product-label new">
                                                        <span>-30%</span>
                                                    </div>
                                                </div> --}}
                                            </figure>
                                            <div class="product-content-list">
                                                <h5 class="product-name"><a
                                                        href="{{ url('productdetail/' . $shopdata->product_id) }}">{{ $shopdata->product_name }}</a>
                                                </h5>
                                                <div class="price-box">
                                                    <span class="price-regular">${{ $shopdata->product_price }}</span>
                                                    <span
                                                        class="price-old"><del>${{ $shopdata->product_mrp }}</del></span>
                                                </div>
                                                <p>{{ $shopdata->product_short_des }}
                                                </p>
                                                <div class="button-group">
                                                    {{-- <a href="wishlist.html" data-bs-toggle="tooltip"
                                                        title="Add to Wishlist"><i class="pe-7s-like"></i></a> --}}
                                                    @if (session()->has('user_id'))
                                                        <a onclick="addtocart('{{ $shopdata->product_id }}','1')"
                                                            data-bs-toggle="tooltip" title="Add to Cart"><i
                                                                class="pe-7s-cart"></i></a>
                                                    @endif
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick_view{{ $shopdata->product_id }}"><span
                                                            data-bs-toggle="tooltip" title="Quick View"><i
                                                                class="pe-7s-look"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product list item end -->
                                    </div>
                                    <!-- product single item start -->
                                    <!-- Quick view modal start -->
                                    <div class="modal" id="quick_view{{ $shopdata->product_id }}">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">

                                                                    <div class="pro-large-img img-zoom">
                                                                        <img src="/storage/product/{{ $shopdata->product_imagea }}"
                                                                            alt="product-details" />
                                                                    </div>
                                                                    <div class="pro-large-img img-zoom">
                                                                        <img src="/storage/product/{{ $shopdata->product_imageb }}"
                                                                            alt="product-details" />
                                                                    </div>
                                                                    @foreach ($shoppic[$shopdata->product_id] as $valpic)
                                                                        <div class="pro-large-img img-zoom">
                                                                            <img src="/storage/product/{{ $valpic->product_image }}"
                                                                                alt="product-details" />
                                                                        </div>
                                                                    @endforeach


                                                                </div>

                                                                <div class="pro-nav slick-row-10 slick-arrow-style">

                                                                    <div class="pro-nav-thumb">
                                                                        <img src="/storage/product/{{ $shopdata->product_imagea }}"
                                                                            alt="product-details" />
                                                                    </div>
                                                                    <div class="pro-nav-thumb">
                                                                        <img src="/storage/product/{{ $shopdata->product_imageb }}"
                                                                            alt="product-details" />
                                                                    </div>
                                                                    @foreach ($shoppic[$shopdata->product_id] as $valpic)
                                                                        <div class="pro-nav-thumb">
                                                                            <img src="/storage/product/{{ $valpic->product_image }}"
                                                                                alt="product-details" />
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-7">

                                                                <div class="product-details-des">
                                                                    <h3 class="product-name">
                                                                        {{ $shopdata->product_name }}
                                                                    </h3>
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
                                                                        <span class="price-regular">
                                                                            ${{ $shopdata->product_price }}</span>
                                                                        <span class="price-old"><del>$
                                                                                {{ $shopdata->product_mrp }}</del></span>
                                                                    </div>
                                                                    {{-- <div class="availability">
                                                                        <i class="fa fa-check-circle"></i>
                                                                        <span>200 in stock</span>
                                                                    </div> --}}
                                                                    <p class="pro-desc">
                                                                        {{ $shopdata->product_short_des }}</p>
                                                                    <div
                                                                        class="quantity-cart-box d-flex align-items-center">
                                                                        <h6 class="option-title">qty:</h6>
                                                                        <div class="quantity">
                                                                            <div class="pro-qty"><input id="userqty"
                                                                                    type="text" value="1"></div>
                                                                        </div>
                                                                        @if (session()->has('user_id'))
                                                                            <div class="action_link">
                                                                                <a onclick="addtocart('{{ $shopdata->product_id }}',jQuery('#userqty').val())"
                                                                                    class="btn btn-cart2">Add to
                                                                                    Cart</a>

                                                                            </div>
                                                                        @else
                                                                            <center>
                                                                                <h4>Login To Add Product in your Cart</h4>
                                                                            </center>
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        Total Products: {{ $shopdata->product_qty }}
                                                                    </div>

                                                                    <div>
                                                                        Available Products: <?php echo inventryavailable($shopdata->product_id); ?>
                                                                    </div>
                                                                    {{-- <div class="useful-links">
                                                                        <a href="#" data-bs-toggle="tooltip"
                                                                            title="Compare"><i
                                                                                class="pe-7s-refresh-2"></i>compare</a>
                                                                        <a href="#" data-bs-toggle="tooltip"
                                                                            title="Wishlist"><i
                                                                                class="pe-7s-like"></i>wishlist</a>
                                                                    </div> --}}
                                                                    {{-- <div class="like-icon">
                                                                        <a class="facebook" href="#"><i
                                                                                class="fa fa-facebook"></i>like</a>
                                                                        <a class="twitter" href="#"><i
                                                                                class="fa fa-twitter"></i>tweet</a>
                                                                        <a class="pinterest" href="#"><i
                                                                                class="fa fa-pinterest"></i>save</a>
                                                                        <a class="google" href="#"><i
                                                                                class="fa fa-google-plus"></i>share</a>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Quick view modal end -->
                                @endforeach
                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area -->
                            {{-- <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                                </ul>
                            </div> --}}
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>
    <form id="filter">
        <input type="hidden" value="{{ $category }}" name="category" id="category">
        <input type="hidden" value="{{ $minprice }}" name="minprice" id="minprice">
        <input type="hidden" value="{{ $maxprice }}" name="maxprice" id="maxprice">
    </form>
@endsection
