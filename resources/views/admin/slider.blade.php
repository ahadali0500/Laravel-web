@extends('admin.layout.main')
@push('title')
    <title>Slider</title>
@endpush
@push('slider')
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
                                    <h4 class="card-title"> Manage Slider</h4>
                                    <a href="{{ url('/admin/slider/add') }}"><button style="float:right"
                                            class="btn btn-primary">Add Slider</button></a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div id="refer" class="table-responsive">
                                            <table class="table zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Heading</th>
                                                        <th>Link</th>
                                                        <th>Image</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($slider as $data)
                                                        <tr>
                                                            <td>{{ $data->slider_title }}</td>
                                                            <td>{{ $data->slider_heading }}</td>
                                                            <td>{{ $data->slider_link }}</td>
                                                            <td><img width="100px"
                                                                    src="/storage/slider/{{ $data->slider_image }}"></td>
                                                            <td><a href="/admin/slider/update/{{ $data->slider_id }}"><button
                                                                        class="btn btn-primary">Update</button></a></td>
                                                            <td><button onclick="sliderdelete({{ $data->slider_id }})"
                                                                    class="btn btn-danger">Delete</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Heading</th>
                                                        <th>Link</th>
                                                        <th>Image</th>
                                                        <th>Update</th>
                                                        <th>Delete</th>
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
