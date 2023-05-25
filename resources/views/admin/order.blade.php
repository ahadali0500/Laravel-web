@extends('admin.layout.main')
@push('title')
    <title>Order</title>
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
                                    <h4 class="card-title"> Manage Orders</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div id="refer" class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>OrderId</th>
                                                        <th>Date</th>
                                                        <th>Update Status</th>
                                                        <th>Total</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order as $data)
                                                        <tr>
                                                            <td>#{{ $data->order_id }}</td>
                                                            <td>{{ $data->order_date }}</td>
                                                            <td>
                                                                @if ($data->order_status != 'delivered')
                                                                    <fieldset class="form-group">
                                                                        <select
                                                                            class="form-control bv_{{ $data->order_id }}"
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
                                                                                    value="shipped">shipped
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
                                                            <td>${{ $data->order_total }}</td>
                                                            <td><a href="/admin/orderdetail/{{ $data->order_id }}">
                                                                    <button class="btn btn-primary  mr-1 mb-1"
                                                                        type="button">
                                                                        View
                                                                    </button></a></td>
                                                        </tr>
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
            </div>
        </div>
    </div>
@endsection
