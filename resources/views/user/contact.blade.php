@extends('user.layout.main')
@push('title')
    <title>Login</title>
@endpush
@push('contact')
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
                                    <li class="breadcrumb-item active" aria-current="page">contact us</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <!-- breadcrumb area end -->

        <!-- google map start -->
        <!-- <div class="map-area section-padding">
                                                        <div id="google-map">
                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.838709675939!2d144.95320007668528!3d-37.817246734238516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4dd5a05d97%3A0x3e64f855a564844d!2s121%20King%20St%2C%20Melbourne%20VIC%203000%2C%20Australia!5e0!3m2!1sen!2sus!4v1670477011653!5m2!1sen!2sus" style="border:0;width:100%;height:100%;" allowfullscreen="" loading="lazy"></iframe>
                                                        </div>
                                                    </div> -->
        <!-- google map end -->

        <!-- contact area start -->
        <div class="contact-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h3 class="contact-title">Tell Us Your Project</h3>
                            <form id="AddContact" method="post" class="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="first_name" placeholder="Name *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Phone *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email_address" placeholder="Email *" type="email" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="Subject *" type="text" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn-sqr" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h3 class="contact-title">Contact Us</h3>
                            <p>Please feel free to contact us.</p>
                            <ul>
                                <!-- <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 NewYork City</li> -->
                                <li><i class="fa fa-phone"></i> E-mail: <a
                                        href="https://tom-bag.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="e58c8b838aa59c8a9097818a88848c8bcb868a88">[tombagboutik@gmail.com]</a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i> +1 240 675 0625</li>
                            </ul>
                            <!-- <div class="working-time">
                                                                            <h6>Working Hours</h6>
                                                                            <p><span>Monday – Saturday:</span>08AM – 22PM</p>
                                                                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
@endsection
