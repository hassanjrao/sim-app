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
                    Stores
                </h3>


                <button type="button" class="btn btn-primary push" data-bs-toggle="modal"
                    data-bs-target="#modal-block-popin">Add Store</button>
            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                {{-- <th>Store Id</th> --}}
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Telephone</th>
                                <th>Postcode</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($stores as $store)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $store->id }}</td> --}}
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $store->address }}</td>
                                    <td>{{ $store->city }}</td>
                                    <td>{{ $store->telephone }}</td>
                                    <td>{{ $store->post_code }}</td>
                                    <td>{{ $store->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">
                                            <a href="{{ route('employee.stores.edit', $store->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $store->id }}"
                                                action="{{ route('employee.stores.destroy', $store->id) }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $store->id }})"
                                                    class="btn btn-sm btn-alt-danger" value="Delete">

                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>



    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">

                <form action="{{ route('employee.stores.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add Store</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="block block-rounded">

                                <div class="block-content">

                                    <div class="row push justify-content-center">

                                        <div class="col-lg-12 ">

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Name</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        name="name">
                                                </div>

                                            </div>


                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Address</label>
                                                    <input required type="text" class="form-control" id="address"
                                                        name="address">
                                                </div>

                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">City</label>
                                                    <input required type="text" class="form-control" id="city"
                                                        name="city">
                                                </div>

                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Telephone</label>
                                                    <input required type="text" class="form-control" id="Telephone"
                                                        name="telephone">
                                                </div>

                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Postcode</label>
                                                    <input required type="text" class="form-control" id="post_Code"
                                                        name="post_code">
                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-alt-secondary me-1"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

@endsection
