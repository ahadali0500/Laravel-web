@extends('admin.layout.main')
@push('title')
    <title>Update Slider</title>
@endpush
@push('slider')
    active
@endpush
@section('body')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Simple Validation start -->
                <section class="simple-validation">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Update Slider</h4>
                                    <a href="{{ url('/admin/slider/') }}"><button style="float:right"
                                            class="btn btn-primary">Back</button></a>
                                </div>
                                <div id="refer" class="card-content">
                                    <div class="card-body">
                                        <form id="UpSlider" method="POST" action="{{ url('admin/UpSlider_process') }}"
                                            enctype="multipart/form-data" class="form-horizontal">

                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Title</span>
                                                        <div class="controls">
                                                            <input type="text" value="{{ $slider[0]->slider_title }}"
                                                                name="title" class="form-control" placeholder="Title"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Heading</span>
                                                        <div class="controls">
                                                            <input type="text" value="{{ $slider[0]->slider_heading }}"
                                                                name="heading" class="form-control" placeholder="heading"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>link</span>
                                                        <div class="controls">
                                                            <input type="text" value="{{ $slider[0]->slider_link }}"
                                                                name="link" class="form-control" placeholder="link"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="slider_id" value="{{ $slider[0]->slider_id }}">
                                                <div class="col-lg-12 row">

                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <span>Image</span>
                                                            <div class="controls">
                                                                <input type="file" name="image" class="form-control"
                                                                    placeholder="Image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <center><img width="100px"
                                                                src="/storage/slider/{{ $slider[0]->slider_image }}">
                                                        </center>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Input Validation end -->





            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection
