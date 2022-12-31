@extends('layouts.admin-backend')
@section('page-title', 'Dashboard - Admin')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Dashboard
                    </h1>
                    <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                        Welcome {{ Auth::user()->name }}
                    </h2>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">App</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <div class="content">

        <div class="row row-deck">


            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.stores.index') }}">
                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $totalStores }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Stores</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                {{-- <i class="far fa-user-circle fs-3 text-primary"></i> --}}
                                <i class="fa fa-2x fa-store text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.stores.index') }}">
                                <span>View stores</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- END New Customers -->
            </div>

            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.employees.index') }}">

                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $totalEmployees }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Employee</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                {{-- <i class="far fa-user-circle fs-3 text-primary"></i> --}}
                                <i class="fa fa-2x fa-user text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.employees.index') }}">
                                <span>View Employees</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- END New Customers -->
            </div>

            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->
                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.logs.index') }}">

                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $totdayActivityLogs }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Activity Logs</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                {{-- <i class="far fa-user-circle fs-3 "></i> --}}
                                <i class="fa fa-2x fa-history text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.logs.index') }}">
                                <span>View Logs</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- END New Customers -->
            </div>

            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->

                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.sims.index') }}">

                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $totalSims }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Sims</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                {{-- <i class="far fa-user-circle fs-3 text-primary"></i> --}}
                                <i class="fa fa-2x fa-sim-card text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.sims.index') }}">
                                <span>View Sims</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- END New Customers -->
            </div>



            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->

                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.multiple-sim-search.index') }}">

                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $multipleSimSearches }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Multiple Sim Search</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                {{-- <i class="far fa-user-circle fs-3 text-primary"></i> --}}
                                <i class="fa fa-2x fa-sim-card text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.multiple-sim-search.index') }}">
                                <span>View Multiple Sim Search</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- END New Customers -->
            </div>



            <div class="col-sm-6 col-xxl-3">
                <!-- New Customers -->

                <div class="block block-rounded d-flex flex-column">
                    <a href="{{ route('admin.single-sim-search.index') }}">

                        <div
                            class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                            <dl class="mb-0">
                                <dt class="fs-3 fw-bold">{{ $singleSimSearches }}</dt>
                                <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Single Sim Search</dd>
                            </dl>
                            <div class="item item-rounded-lg bg-body-light">
                                {{-- <i class="far fa-user-circle fs-3 text-primary"></i> --}}
                                <i class="fa fa-2x fa-sim-card text-primary"></i>
                            </div>
                        </div>
                        <div class="bg-body-light rounded-bottom">
                            <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between"
                                href="{{ route('admin.single-sim-search.index') }}">
                                <span>View Single Sim Search</span>
                                <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                            </a>
                        </div>
                    </a>
                </div>
                <!-- END New Customers -->
            </div>



        </div>

    </div>

    <!-- END Page Content -->
@endsection
