@extends('admin.layout.main')
@push('title')
    <title>customer</title>
@endpush
@push('customer')
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
                                    <h4 class="card-title"> Manage Customer</h4>

                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div id="refer" class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Email</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Company</th>
                                                        <th>Number</th>
                                                        <th>Address 1</th>
                                                        <th>Addess 2</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Zipcode</th>
                                                        <th>Country</th>
                                                        <th>Findus</th>
                                                        <th>About</th>
                                                        <th>Website</th>
                                                        <th>Tax Id</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($register as $data)
                                                        <tr>
                                                            <td>#{{ $data->register_id }}</td>
                                                            <td>{{ $data->register_email }}</td>
                                                            <td>{{ $data->register_firstname }}</td>
                                                            <td>{{ $data->register_lastname }}</td>
                                                            <td>{{ $data->register_company }}</td>
                                                            <td>{{ $data->register_number }}</td>
                                                            <td>{{ $data->register_address1 }}</td>
                                                            <td>{{ $data->register_address2 }}</td>
                                                            <td>{{ $data->register_city }}</td>
                                                            <td>{{ $data->register_state }}</td>
                                                            <td>{{ $data->register_zipcode }}</td>
                                                            <td>{{ $data->register_country }}</td>
                                                            <td>{{ $data->register_find }}</td>
                                                            <td>{{ $data->register_aboutyou }}</td>
                                                            <td>{{ $data->register_website }}</td>
                                                            <td>{{ $data->register_taxid }}</td>
                                                            <td>
                                                                @if ($data->register_status == 0)
                                                                    <div class="btn-group">
                                                                        <div class="dropdown">
                                                                            <button
                                                                                class="btn bg-gradient-primary dropdown-toggle mr-1 mb-1"
                                                                                type="button" id="dropdownMenuButton101"
                                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                Approval Pending
                                                                            </button>
                                                                            <div class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton101">
                                                                                <a onclick="userapproval('approve',{{ $data->register_id }})"
                                                                                    class="dropdown-item">
                                                                                    Approve</a>
                                                                                <a onclick="userapproval('disapprove',{{ $data->register_id }})"
                                                                                    class="dropdown-item">DisApprove</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @elseif($data->register_status == 'Approve')
                                                                    <button class="btn btn-success  mr-1 mb-1"
                                                                        type="button">
                                                                        Approved
                                                                    </button>
                                                                @else
                                                                    <button class="btn btn-danger  mr-1 mb-1"
                                                                        type="button">
                                                                        Dispproved
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Email</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Company</th>
                                                        <th>Number</th>
                                                        <th>Address 1</th>
                                                        <th>Addess 2</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Zipcode</th>
                                                        <th>Country</th>
                                                        <th>Findus</th>
                                                        <th>About</th>
                                                        <th>Website</th>
                                                        <th>Tax Id</th>
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
