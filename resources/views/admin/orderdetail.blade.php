@extends('admin.layout.main')
@push('title')
    <title>
        Order Detail</title>
@endpush
@push('order')
    active
@endpush
@section('body')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Order Detail</h4>
                                </div>
                                <center>
                                    <h3>Order Id:#{{ $order[0]->order_id }}</h3>
                                </center>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Thumbnail</th>
                                                        <th>Product Name</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order as $data)
                                                        @foreach ($order_detail[$data->order_id] as $val)
                                                            <?php $tot = $val->order_product_qty * $val->product_price; ?>
                                                            <tr>
                                                                <td><img width="100px"
                                                                        src="/storage/product/{{ $val->product_imagea }}">
                                                                </td>
                                                                <td>{{ $val->product_name }}</td>
                                                                <td>${{ $val->product_price }}</td>
                                                                <td>{{ $val->order_product_qty }}</td>
                                                                <td>${{ $tot }}</td>


                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>OrderId</th>
                                                        <th>Date</th>
                                                        <th>Update Status</th>
                                                        <th>Total</th>
                                                        <th>Detail</th>
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
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">Shipping Detail</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div id="refer" class="table-responsive">
                                            <table class="table zero-configuration">
                                                <tbody>
                                                    <tr>
                                                        <td>Order Total</td>
                                                        <td>${{ $order[0]->order_total }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Order Status</td>
                                                        <td>
                                                            @if ($data->order_status != 'delivered')
                                                                <fieldset class="form-group">
                                                                    <select
                                                                        class="form-control bv_{{ $order[0]->order_id }}"
                                                                        onchange="orderstatus('{{ $data->order_id }}')"
                                                                        id="basicSelect">
                                                                        @if ($data->order_status == 'pending')
                                                                            <option selected value="pending">Pending
                                                                            </option>
                                                                            <option value="shipped">shipped</option>
                                                                            <option value="delivered">delivered
                                                                            </option>
                                                                        @elseif($data->order_status == 'shipped')
                                                                            <option selected value="shipped"
                                                                                value="shipped">
                                                                                shipped
                                                                            </option>
                                                                            <option value="delivered">delivered
                                                                            </option>
                                                                        @endif
                                                                    </select>
                                                                </fieldset>
                                                            @else
                                                                <span style="color:green;"><b>Delivered</b></span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Order Date</td>
                                                        <td>{{ $order[0]->order_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>First Name</td>
                                                        <td>{{ $order[0]->order_first_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td>{{ $order[0]->order_last_name }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Company Name</td>
                                                        <td>{{ $order[0]->order_company_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <td>{{ $order[0]->order_conutry }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td>{{ $order[0]->order_street_address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <td>{{ $order[0]->order_state }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td>{{ $order[0]->order_city }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zipcode</td>
                                                        <td>{{ $order[0]->order_zip_code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td>{{ $order[0]->order_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Order Note</td>
                                                        <td>{{ $order[0]->order_order_note }}</td>
                                                    </tr>
                                                </tbody>

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
