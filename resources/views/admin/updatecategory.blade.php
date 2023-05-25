@extends('admin.layout.main')
@push('title')
    <title>Update Category</title>
@endpush
@push('category')
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
                                    <h4 class="card-title">Update Category</h4>
                                    <a href="{{ url('/admin/category/') }}"><button style="float:right"
                                            class="btn btn-primary">Back</button></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form id="UpCategory" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Name</span>
                                                        <div class="controls">
                                                            <input type="text" value="{{ $category[0]->category_name }}"
                                                                name="name" required class="form-control"
                                                                placeholder="Name">
                                                        </div>
                                                        <span id="alert" style="float:right;color:red"></span>
                                                    </div>
                                                    <input type="hidden" value="{{ $category[0]->category_id }}"
                                                        name="category_id">
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
