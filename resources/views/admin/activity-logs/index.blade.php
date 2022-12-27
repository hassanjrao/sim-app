@extends('layouts.admin-backend')
@section('page-title', 'Activity Logs - Admin')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Activity Logs
                </h3>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Login Successfull</th>
                                <th>Login At</th>
                                <th>Logout At</th>
                                <th>Ip Address</th>
                                <th>Browser</th>
                                <th>IP</th>
                                <th>Lat</th>
                                <th>Long</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($logs as $ind => $log)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $log->name }}</td>
                                    <td>
                                        @if ($log->login_successful == 1)
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Yes</span>
                                        @else
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $log->login_at }}</td>
                                    <td>{{ $log->logout_at }}</td>
                                    <td>{{ $log->ip_address }}</td>
                                    <td>{{ $log->browser }}</td>
                                    <td>{{ $log->ip }}</td>
                                    <td>{{ $log->lat }}</td>
                                    <td>{{ $log->lon }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>



    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

@endsection
