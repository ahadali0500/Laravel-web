  <div class="scroll-top not-visible">
      <i class="fa fa-angle-up"></i>
  </div>
  <!-- footer area start -->
  <footer class="black-bg">
      <!-- newsletter area end -->
      <div class="footer-widget-area">
          <div class="container">
              <div class="row mtn-30">
                  <div class="col-lg-4 col-sm-6">
                      <div class="footer-widget-item mt-30">
                          <h6 class="widget-title">Quick Links</h6>
                          <ul class="usefull-links">
                              <li><a href="/">Home</a></li>
                              <li><a href="/contact">Contact us</a></li>
                              <li><a href="/shop">Shop</a></li>
                              @if (session()->has('user_id'))
                                  <li><a href="/UserAccount">Account</a></li>
                                  <li><a href="/logout">Logout</a></li>
                              @else
                                  <li><a href="/login">Login</a></li>
                                  <li><a href="/register">Register</a></li>
                              @endif
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="footer-widget-item mt-30">
                          <h6 class="widget-title">Categories</h6>
                          <ul class="usefull-links">
                              <?php $cate = categories(); ?>
                              @if (isset($cate['category'][0]))
                                  <li><a
                                          href="/shop?category={{ $cate['category'][0]->category_id }}">{{ $cate['category'][0]->category_name }}</a>
                                  </li>
                              @endif
                              @if (isset($cate['category'][1]))
                                  <li><a
                                          href="/shop?category={{ $cate['category'][1]->category_id }}">{{ $cate['category'][1]->category_name }}</a>
                                  </li>
                              @endif
                              @if (isset($cate['category'][2]))
                                  <li><a
                                          href="/shop?category={{ $cate['category'][2]->category_id }}">{{ $cate['category'][2]->category_name }}</a>
                                  </li>
                              @endif
                              @if (isset($cate['category'][3]))
                                  <li><a
                                          href="/shop?category={{ $cate['category'][3]->category_id }}">{{ $cate['category'][3]->category_name }}</a>
                                  </li>
                              @endif
                              @if (isset($cate['category'][4]))
                                  <li><a
                                          href="/shop?category={{ $cate['category'][4]->category_id }}">{{ $cate['category'][4]->category_name }}</a>
                                  </li>
                              @endif


                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                      <div class="footer-widget-item mt-30">
                          <h6 class="widget-title">Company Information</h6>
                          <ul class="usefull-links">
                              <li style="color:#4aa5a8"><a>tombagboutik@gmail.com</a></li>
                              <li style="color:#4aa5a8"><a>+1 240 675 0625</a></li>
                          </ul>
                      </div>
                  </div>

              </div>
          </div>
      </div>

  </footer>
  <!-- footer area end -->
