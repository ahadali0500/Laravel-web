@extends('admin.layout.main')
@push('title')
    <title>Add Product</title>
@endpush
@push('product')
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
                                    <h4 class="card-title">Add Product</h4>
                                    <a href="{{ url('/admin/product/') }}"><button style="float:right"
                                            class="btn btn-primary">Back</button></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form id="AddProduct" method="POST" action="{{ url('admin/AddProduct_process') }}"
                                            enctype="multipart/form-data" class="form-horizontal">

                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span>select Category</span>
                                                    <fieldset class="form-group">
                                                        <select required name="category" class="form-control"
                                                            id="basicSelect">
                                                            <option value="">Categories</option>
                                                            @foreach ($category as $data)
                                                                <option value="{{ $data->category_id }}">
                                                                    {{ $data->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Name</span>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>SKU</span>
                                                        <div class="controls">
                                                            <input type="text" name="sku" class="form-control"
                                                                placeholder="SKU" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Price</span>
                                                        <div class="controls">
                                                            <input type="number" name="price" class="form-control"
                                                                placeholder="price" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>MRP</span>
                                                        <div class="controls">
                                                            <input type="number" name="mrp" class="form-control"
                                                                placeholder="MRP" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Quantity</span>
                                                        <div class="controls">
                                                            <input type="number" name="qty" class="form-control"
                                                                placeholder="Quantity" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Main Image 1</span>
                                                        <div class="controls">
                                                            <input type="file" name="imagea" class="form-control"
                                                                placeholder="Image" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <span>Main Image 2</span>
                                                        <div class="controls">
                                                            <input type="file" name="imageb" class="form-control"
                                                                placeholder="Image" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <span>Multiple Image</span>
                                                        <div class="controls">
                                                            <input type="file" multiple name="image[]"
                                                                class="form-control" placeholder="Image" required>
                                                        </div>
                                                    </div>
                                                    <fieldset class="form-group">
                                                        <span>Short Description</span>
                                                        <textarea class="form-control" required name="short_des" id="description" rows="3"
                                                            placeholder="Short Description"></textarea>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <span>Detail Description</span>
                                                        <textarea class="form-control" required name="long_des" id="description" rows="3"
                                                            placeholder="detail Description"></textarea>
                                                    </fieldset>
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
