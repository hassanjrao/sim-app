@extends("layouts.admin-backend")
@section('content')




    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Employee</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-5">

                            <div class="col-12 mb-3">
                                <label class="form-label" for="label">Name</label>
                                <input required type="text" class="form-control" id="name" name="name"
                                    value="{{ $employee->user->name }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label" for="label">Email</label>
                                <input required type="email" class="form-control" id="email" name="email"
                                    value="{{ $employee->user->email }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label" for="label">password</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ $employee->password }}">
                            </div>



                            <div class="mb-4 mt-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->


@endsection
