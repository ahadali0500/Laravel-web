@extends('admin.layout.main')
@push('title')
    <title>Dashboard</title>
@endpush
@push('dasboard')
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
                            <div class="col-lg-12 row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Product List</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <span
                                                            class="badge badge-pill bg-primary float-right"><?php echo count($product); ?></span>
                                                        Total Products
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span
                                                            class="badge badge-pill bg-success float-right"><?php echo count($activeproduct); ?></span>
                                                        Active Products
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span
                                                            class="badge badge-pill bg-warning float-right"><?php echo count($disactiveproduct); ?></span>
                                                        Disactive Products
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Category List</h4>

                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <span
                                                            class="badge badge-pill bg-primary float-right"><?php echo count($category); ?></span>
                                                        Total Category
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span
                                                            class="badge badge-pill bg-success float-right"><?php echo count($activecategory); ?></span>
                                                        Active Category
                                                    </li>
                                                    <li class="list-group-item">
                                                        <span
                                                            class="badge badge-pill bg-warning float-right"><?php echo count($disactivecategory); ?></span>
                                                        Disactive Category
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Slider list</h4>

                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <span
                                                            class="badge badge-pill bg-primary float-right"><?php echo count($slider); ?></span>
                                                        Total Slider
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-header">
                                                <h4 class="card-title">Messages list</h4>

                                            </div>
                                            <div class="card-content">
                                                <div class="card-body card-dashboard">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-primary float-right"><?php echo count($contact); ?></span>
                                                            Total Messages
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 row">
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Customer List</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body card-dashboard">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-primary float-right"><?php echo count($register); ?></span>
                                                            Total Customer
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-warning float-right"><?php echo count($pendingregister); ?></span>
                                                            Pending Customer
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-success float-right"><?php echo count($activeregister); ?></span>
                                                            Active Customer
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-warning float-right"><?php echo count($disactiveregister); ?></span>
                                                            Disactive Customer
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Order List</h4>

                                            </div>
                                            <div class="card-content">
                                                <div class="card-body card-dashboard">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-primary float-right"><?php echo count($order); ?></span>
                                                            Total Order
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-danger float-right"><?php echo count($pendingorder); ?></span>
                                                            Pending Order
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-warning float-right"><?php echo count($shippedorder); ?></span>
                                                            Shipped order
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span
                                                                class="badge badge-pill bg-success float-right"><?php echo count($deliveredorder); ?></span>
                                                            Delivered order
                                                        </li>
                                                    </ul>
                                                </div>
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
