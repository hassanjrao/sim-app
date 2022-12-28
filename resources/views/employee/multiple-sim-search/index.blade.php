@extends('layouts.employee-backend')
@section('page-title', 'Multiple Sims Search')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->


    <multiple-sim-search></multiple-sim-search>




    <!-- END Page Content -->
@endsection

@section('js_after')

<script src="{{ asset('js/app.js') }}"></script>

    <script>



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
