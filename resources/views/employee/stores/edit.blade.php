@extends('layouts.employee-backend')
@section('content')
    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Store</h3>

                <a href="{{ route("employee.stores.index") }}" class="btn btn-primary">All Stores</a>

            </div>
            <div class="block-content">
                <form action="{{ route('employee.stores.update', $store->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-8 col-xl-5">

                            <div class="col-12 mb-3">
                                <label class="form-label" for="label">Name</label>
                                <input required type="text" class="form-control" id="name" name="name"
                                    value="{{ $store->name }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label" for="label">Address</label>
                                <input required type="address" class="form-control" id="address" name="address"
                                    value="{{ $store->address }}">
                            </div>


                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">City</label>
                                    <input required type="text" class="form-control" id="city" name="city" value="{{ $store->city }}">
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">Telephone</label>
                                    <input required type="text" class="form-control" id="Telephone" name="telephone" value="{{ $store->telephone }}">
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="label">Postcode</label>
                                    <input required type="text" class="form-control" id="post_Code" name="post_code" value="{{ $store->post_code }}">
                                </div>

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
