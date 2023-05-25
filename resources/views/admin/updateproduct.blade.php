@extends('admin.layout.main')
@push('title')
    <title>Update Product</title>
@endpush
@push('product')
    active
@endpush
@section('body')
    <style>
        #pi:hover {
            position: relative;
        }

        #pi:hover .fa-trash {
            opacity: 1;
            color: black;
            cursor: pointer;
        }

        .fa-trash {
            position: absolute;
            top: 0px;
            font-size: 20px;
            opacity: 0;
        }
    </style>
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
                                    <h4 class="card-title">Update Product</h4>
                                    <a href="{{ url('/admin/product/') }}"><button style="float:right"
                                            class="btn btn-primary">Back</button></a>
                                </div>
                                <div class="card-content">
                                    <div id="refer" class="card-body">
                                        <form id="UpProduct" method="POST" action="{{ url('admin/UpProduct_process') }}"
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
                                                                <option @if ($product[0]->product_category == $data->category_id) selected @endif
                                                                    value="{{ $data->category_id }}">
                                                                    {{ $data->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Name</span>
                                                        <div class="controls">
                                                            <input value="{{ $product[0]->product_name }}"
                                                                type="text" name="name" class="form-control"
                                                                placeholder="Name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>SKU</span>
                                                        <div class="controls">
                                                            <input value="{{ $product[0]->product_sku }}" type="text"
                                                                name="sku" class="form-control" placeholder="SKU"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Price</span>
                                                        <div class="controls">
                                                            <input value="{{ $product[0]->product_price }}" type="number"
                                                                name="price" class="form-control" placeholder="price"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>MRP</span>
                                                        <div class="controls">
                                                            <input type="number" value="{{ $product[0]->product_mrp }}"
                                                                name="mrp" class="form-control" placeholder="MRP"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <span>Quantity</span>
                                                        <div class="controls">
                                                            <input type="number" value="{{ $product[0]->product_qty }}"
                                                                name="qty" class="form-control" placeholder="Quantity"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="product_id"
                                                    value="{{ $product[0]->product_id }}">
                                                <div class="col-sm-12">
                                                    <div class="col-lg-12 row">

                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <span>Main Image 1</span>
                                                                <div class="controls">
                                                                    <input type="file" name="imagea"
                                                                        class="form-control" placeholder="Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <center><img width="100px"
                                                                    src="/storage/product/{{ $product[0]->product_imagea }}">
                                                            </center>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 row">

                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <span>Main Image 2</span>
                                                                <div class="controls">
                                                                    <input type="file" name="imageb"
                                                                        class="form-control" placeholder="Image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <center><img width="100px"
                                                                    src="/storage/product/{{ $product[0]->product_imageb }}">
                                                            </center>
                                                        </div>
                                                    </div>


                                                    <fieldset class="form-group">
                                                        <span>Short Description</span>
                                                        <textarea class="form-control" required name="short_des" id="description" rows="3"
                                                            placeholder="Short Description">{{ $product[0]->product_short_des }}</textarea>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <span>Detail Description</span>
                                                        <textarea class="form-control" required name="long_des" id="description" rows="3"
                                                            placeholder="detail Description">{{ $product[0]->product_long_des }}</textarea>
                                                    </fieldset>
                                                    <div class="form-group">
                                                        <span>Multiple Image</span>
                                                        <div class="controls">
                                                            <input type="file" multiple name="image[]"
                                                                class="form-control" placeholder="Image">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 row">
                                                        @foreach ($product_image as $db)
                                                            <div id="pi" class="col-lg-2"><img width="100px"
                                                                    src="/storage/product/{{ $db->product_image }}"><i
                                                                    onclick="pidel({{ $db->id }})" id="del"
                                                                    class="fa fa-trash"></i>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
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
