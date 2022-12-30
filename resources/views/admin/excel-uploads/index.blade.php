@extends('layouts.admin-backend')
@section('page-title', 'Excel Upload - Admin')
@section('content')


    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- User Profile -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Execl Upload</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.upload-excel.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row push">

                        <div class="col-lg-6">
                            <div class="">

                                <label class="form-label" for="one-profile-edit-username">Select Excel </label>
                                <input required type="file" class="form-control" id="one-profile-edit-username"
                                    name="file" placeholder="Select File">
                            </div>

                        </div>

                        <div class="col-lg-6 mt-4">

                            <div class="">
                                <button type="submit" class="btn btn-alt-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END User Profile -->


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    System Sims
                </h3>
            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>SSN</th>
                                <th>Created At</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($systemSims as $sim)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sim->name }}</td>
                                    <td>{{ $sim->ssn }}</td>
                                    <td>{{ $sim->created_at }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>



        <!-- END Connections -->
    </div>
    <!-- END Page Content -->


@endsection
