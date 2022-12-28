@extends('layouts.employee-backend')
@section('page-title', 'Single Sim Search')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Single Sim Search
                </h3>

                <a href="{{ route("employee.sims.index") }}" class="btn btn-primary">All Sims</a>



            </div>

            <div class="block-content block-content-full">


                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <input type="text" id="tagsInput" required name="sim_numbers" data-role="tagsinput">
                    </div>


                    <div class="col-lg-6">
                        <form action="{{ route('employee.sims.store') }}" method="POST" id="createSimForm">

                            @csrf
                            <div class="row">
                                <div class="col-lg-8">
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
                                    <button class="btn btn-success">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Sims (<span id="totalSims">0</span>)
                </h3>

            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive" style="height: 400px">

                    <table class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sim Number</th>
                                <th>Remove</th>
                            </tr>

                        </thead>

                        <tbody id="simsCont">

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
        $('.tagsInput').tagsinput({
            trimValue: true,
            allowDuplicates: false,
            delimiter: ",",
        });


        let sims = [];

        $("#tagsInput").on('itemAdded', function(event) {

            let sim = event.item;

            if (!sims.includes(sim)) {
                sims.unshift(sim)
            }
            $("#tagsInput").tagsinput('removeAll');

            var simsCont = $("#simsCont");

            simsCont.html("");

            // remove sim_numbers element from form

            $(".sim_numbers").remove();


            sims.forEach(sim => {
                simsCont.append(`<tr>
                <td>${sims.indexOf(sim)+1}</td>
                <td>${sim}</td>
                <td><button type="button" onclick="removeSim(${sims.indexOf(sim)})" class="btn btn-sm btn-alt-danger  js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete">
                      <i class="fa fa-fw fa-times"></i>
                    </button></td>`)

                $("#createSimForm").append(
                    `<input type="hidden" name="sim_numbers[]" class='sim_numbers' value="${sim}">`)
            });

            $("#totalSims").html(sims.length);


            // getValues(event.target.id)
        });



        $(".tagsinput").on('itemRemoved', function(event) {
            getValues(event.target.id)
        });

        function removeSim(index) {
            sims.splice(index, 1);
            var simsCont = $("#simsCont");

            simsCont.html("");
            $(".sim_numbers").remove();

            $("#totalSims").html(sims.length);


            sims.forEach(sim => {
                simsCont.append(`<tr>
                    <td>${sims.indexOf(sim)+1}</td>
                    <td>${sim}</td>

                    <td><button type="button" onclick="removeSim(${sims.indexOf(sim)})" class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete">
                      <i class="fa fa-fw fa-times"></i>
                    </button></td>`)

                $("#createSimForm").append(
                    `<input type="hidden" name="sim_numbers[]" class='sim_numbers' value="${sim}">`)
            });
        }


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
