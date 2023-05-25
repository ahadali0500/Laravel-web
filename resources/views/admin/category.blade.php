@extends('admin.layout.main')
@push('title')
    <title>Category</title>
@endpush
@push('category')
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
                                    <h4 class="card-title"> Manage Category</h4>
                                    <a href="{{ url('/admin/category/add') }}"><button style="float:right"
                                            class="btn btn-primary">Add Category</button></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table id="refer" class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Category Id</th>
                                                        <th>Category Name</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($category as $data)
                                                        <tr>
                                                            <td>#{{ $data->category_id }}</td>
                                                            <td>{{ $data->category_name }}</td>
                                                            <td><a href="/admin/category/update/{{ $data->category_id }}"><button
                                                                        class="btn btn-primary">Update</button></a></td>
                                                            <td><button onclick="category_delete({{ $data->category_id }})"
                                                                    class="btn btn-danger">Delete</button></td>
                                                            <td>
                                                                @if ($data->category_status == 1)
                                                                    <button
                                                                        onclick="category_status({{ $data->category_id }})"
                                                                        class="btn btn-success">Activated</button>
                                                                @else
                                                                    <button
                                                                        onclick="category_status({{ $data->category_id }})"
                                                                        class="btn btn-danger">Deactivated</button>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Category Id</th>
                                                        <th>Category Name</th>
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
