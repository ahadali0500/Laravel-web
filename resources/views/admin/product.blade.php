@extends('admin.layout.main')
@push('title')
    <title>Product</title>
@endpush
@push('product')
    active
@endpush
@section('body')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                {!! session('menue_alert') !!}
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> Manage Products</h4>
                                    <a href="{{ url('/admin/product/add') }}"><button style="float:right"
                                            class="btn btn-primary">Add Product</button></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div id="refer" class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>MRP</th>
                                                        <th>SKU</th>
                                                        <th>TotalQty</th>
                                                        <th>AvailableQty</th>
                                                        <th>SellQty</th>
                                                        <th>Detail</th>
                                                        <th>Delete</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product as $data)
                                                        <tr>
                                                            <td>#{{ $data->product_id }}</td>
                                                            <td>{{ $data->product_name }}</td>
                                                            <td>${{ $data->product_price }}</td>
                                                            <td>${{ $data->product_mrp }}</td>
                                                            <td>{{ $data->product_sku }}</td>
                                                            <td>{{ $data->product_qty }}</td>
                                                            <td><?php echo inventryavailable($data->product_id); ?></td>
                                                            <td><?php echo sellproduct($data->product_id); ?></td>

                                                            {{-- <td>{{ $data->product_short_des }}</td>
                                                            <td>{{ $data->product_long_des }}</td> --}}
                                                            <td><a href="/admin/product/update/{{ $data->product_id }}"><button
                                                                        class="btn btn-primary">View</button></a></td>
                                                            <td><button onclick="productdelete({{ $data->product_id }})"
                                                                    class="btn btn-danger">Delete</button></td>
                                                            <td>
                                                                @if ($data->product_status == 1)
                                                                    <button
                                                                        onclick="product_status({{ $data->product_id }})"
                                                                        class="btn btn-success">Activated</button>
                                                                @else
                                                                    <button
                                                                        onclick="product_status({{ $data->product_id }})"
                                                                        class="btn btn-danger">Deactivated</button>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>MRP</th>
                                                        <th>SKU</th>
                                                        <th>TotalQty</th>
                                                        {{-- <th>AvailableQty</th>
                                                        <th>SellQty</th> --}}
                                                        <th>Image1</th>
                                                        <th>Image2</th>
                                                        {{-- <th>ShortDes</th>
                                                        <th>LongDes</th> --}}
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
