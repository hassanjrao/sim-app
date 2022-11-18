@extends('layouts.employee-backend')
@section('page-title', 'Stores')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Add Sims
                </h3>



            </div>

            <div class="block-content block-content-full">

                <form action="{{ route('employee.sims.store') }}" method="POST">

                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-lg-6">
                            <input type="text" id="tagsInput" required name="sim_numbers">
                        </div>

                        <div class="col-lg-2">
                            <select class="form-control" required name="store_id">
                                <option value="">Select Store</option>
                                @foreach ($stores as $store)
                                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">

                        <div class="col-lg-2">
                            <button class="btn btn-primary">Submit</button>

                        </div>
                    </div>
                </form>
            </div>


        </div>


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Sims
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

                                    <td>{{ $store->created_at }}</td>

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

    <script>
        $('#tagsInput').tagsinput({
            trimValue: true,
            allowDuplicates: false,
            delimiter: ",",
        });

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        getLocation();

        function showPosition(position) {

            $("#lat").val(position.coords.latitude);
            $("#lng").val(position.coords.longitude);
        }
    </script>

@endsection
