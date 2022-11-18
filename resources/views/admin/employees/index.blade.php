@extends('layouts.admin-backend')
@section('page-title', 'Employees - Admin')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Employees
                </h3>


                <button type="button" class="btn btn-primary push" data-bs-toggle="modal"
                    data-bs-target="#modal-block-popin">Add Employee</button>
            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->user->name }}</td>
                                    <td>{{ $employee->user->email }}</td>
                                    <td>{{ $employee->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Horizontal Primary">

                                            <a href="{{ route('admin.sims.index', ["employee_id"=>$employee->user->id]) }}"
                                                class="btn btn-sm btn-alt-secondary">View Sims</a>

                                            <a href="{{ route('admin.stores.index', ["employee_id"=>$employee->user->id]) }}"
                                                class="btn btn-sm btn-alt-success">View Stores</a>
                                            <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                                class="btn btn-sm btn-alt-primary">Edit</a>
                                            <form id="form-{{ $employee->id }}"
                                                action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST">
                                                @method("DELETE")
                                                @csrf
                                                <input type="button" onclick="confirmDelete({{ $employee->id }})"
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

                <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add Employee</h3>
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
                                                    <label class="form-label" for="label">Email</label>
                                                    <input required type="email" class="form-control" id="email"
                                                        name="email">
                                                </div>

                                            </div>


                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label" for="label">Password</label>
                                                    <input required type="password" class="form-control" id="password"
                                                        name="password">
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




    {{-- <livewire:questions.add-question />



        <livewire:questions.list-questions /> --}}

    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

@endsection
