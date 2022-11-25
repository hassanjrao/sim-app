@extends('layouts.employee-backend')
@section('page-title', 'Sims')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">





        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Sims
                </h3>

                <a href="{{ route("employee.sims.create") }}" class="btn btn-primary">Add Sims</a>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sim Number</th>
                                <th>Store</th>
                                <th>Created At</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($sims as $sim)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sim->sim_number }}</td>
                                    <td>{{ $sim->store ? $sim->store->name : "" }}</td>

                                    <td>{{ $sim->created_at }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>


    </div>







    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
