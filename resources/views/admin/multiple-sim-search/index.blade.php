@extends('layouts.admin-backend')
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
                    Multiple Sim Search
                </h3>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sim Number</th>
                                <th>Scanned By</th>
                                <th>Lat</th>
                                <th>Long</th>
                                {{-- <th>Store</th> --}}
                                <th>Identity</th>
                                <th>Created At</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($multipleSimSearches as $sim)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sim->systemSim ? $sim->systemSim->ssn : "-" }}</td>
                                    <td>{{ $sim->scannedBy->name }}</td>
                                    <td>{{ $sim->lat }}</td>
                                    <td>{{ $sim->lng }}</td>
                                    {{-- <td>{{ $sim->sim->store ? $sim->sim->store->name : "" }}</td> --}}
                                    <td>{{ $sim->systemSim ? $sim->systemSim->company : "-" }}</td>

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
