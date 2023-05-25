<!-- Start Header Area -->
<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 text-right">
                        <div class="header-top-settings">
                            <ul class="nav align-items-center">
                                <li>
                                    <p><b>Any questions</b><a>tombagboutik@gmail.com</a></p>
                                </li>
                                <li>
                                    <p><b>Text Only</b><a href="tel:+1 240 675 0625">+1 240 675 0625</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="welcome-message text-end">
                            <p>Ends Monday: $100 off any dining table + 2 sets of chairs. <a href="shop.html">Shop
                                    Now</a></p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->

        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">

                    <!-- start logo area -->
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="/">
                                <img width="60px" src="{{ asset('/logo/logo2.jpeg') }}" alt="Brand Logo">
                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->

                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li class="@stack('index')"><a href="{{ url('/') }}">Home </a>
                                        </li>
                                        <li><a href="{{ url('/shop') }}">Categories <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                @php
                                                    $data = categories();
                                                @endphp
                                                @foreach ($data['category'] as $catedata)
                                                    <li><a
                                                            href="{{ url('/shop/?category=' . $catedata->category_id) }}">{{ $catedata->category_name }}</a>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="@stack('shop')"><a href="{{ url('/shop') }}">Shop</a></li>
                                        <li class="@stack('contact')"><a href="{{ url('/contact') }}">Contact us</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->

                    <!-- mini cart area start -->
                    <div class="col-lg-3">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    {{-- <li class="header-search-container me-0">
                                        <button class="search-trigger d-block"><i class="pe-7s-search"></i></button>
                                        <form class="header-search-box d-none animated jackInTheBox">
                                            <input type="text" placeholder="Search entire store hire"
                                                class="header-search-field">
                                            <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                        </form>
                                    </li> --}}
                                    <li class="user-hover">
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            @if (session()->has('user_id'))
                                                <li><a href="{{ url('/UserAccount') }}">Account</a></li>
                                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                                            @else
                                                <li><a href="{{ url('/login') }}">login</a></li>
                                                <li><a href="{{ url('/register') }}">register</a></li>
                                            @endif


                                        </ul>
                                    </li>
                                    {{-- <li>
                                        <a href="wishlist.html">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                    </li> --}}
                                    <li>

                                        <a href="#" class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>

                                            <div class="notification">
                                                <span id="numrefer"> <?php echo addtocartnum(); ?></span>
                                            </div>

                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->

    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="/">
                                <img width="60px" src="{{ asset('/logo/logo2.jpeg') }}" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div id="numrefer2" class="mini-cart-wrap">
                                <a href="/cart">
                                    <i class="pe-7s-shopbag"></i>
                                    <div class="notification"> <?php echo addtocartnum(); ?></div>
                                </a>
                            </div>
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- mobile header end -->

    <!-- offcanvas mobile menu start -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                {{-- <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div> --}}
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="menu-item-has-children"><a>Categories</a>
                                <ul class="dropdown">
                                    @php
                                        $data = categories();
                                    @endphp
                                    @foreach ($data['category'] as $catedata)
                                        <li><a
                                                href="{{ url('/shop/?category=' . $catedata->category_id) }}">{{ $catedata->category_name }}</a>

                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                            <li class="menu-item-has-children"><a href="{{ url('/shop') }}">Shop</a>
                            </li>
                            <li class="menu-item-has-children"><a href="{{ url('/contact') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <div class="mobile-settings">
                    <ul class="nav">
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="myaccount" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                    @if (session()->has('user_id'))
                                        <a class="dropdown-item" href="/UserAccount">Account</a>
                                        <a class="dropdown-item" href="/logout">logout</a>
                                    @else
                                        <a class="dropdown-item" href="/register">Register</a>
                                        <a class="dropdown-item" href="/login">login</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <p><a href="tel:+1 240 675 0625">+1 240 675 0625</a></p>
                            </li>
                            <li>
                                <p><a>tombagboutik@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div> --}}
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>
<!-- end Header Area -->
<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div id="numrefer3" class="minicart-item-wrapper">
                    <ul>
                        <?php $cartdata = addtocartdata();
                        $total = 0; ?>
                        @foreach ($cartdata['cart'] as $dvc)
                            @foreach ($cartdata['datacart'][$dvc->product_id] as $dvm)
                                <li class="minicart-item">
                                    <div class="minicart-thumb">
                                        <a>
                                            <img src="/storage/product/{{ $dvm->product_imagea }}" alt="product">
                                        </a>
                                    </div>
                                    <div class="minicart-content">
                                        <h6 class="product-name">
                                            <a>{{ $dvm->product_name }}</a>
                                        </h6>
                                        <p>
                                            <span class="cart-quantity">{{ $dvc->product_qty }}
                                                <strong>&times;</strong></span>
                                            <span class="cart-price">${{ $dvm->product_price }}</span>
                                        </p>
                                    </div>
                                    <button onclick="cartdel('{{ $dvc->cart_id }}')" class="minicart-remove"><i
                                            class="pe-7s-close"></i></button>
                                </li>
                                <?php
                                $tot = $dvc->product_qty * $dvm->product_price;
                                $total = $total + $tot;
                                ?>
                            @endforeach
                        @endforeach

                    </ul>
                </div>

                <div id="numrefer4" class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong>${{ $total }}</strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>${{ $total }}</strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="/cart"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="/checkout"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
