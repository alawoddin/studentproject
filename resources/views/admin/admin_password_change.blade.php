@extends('admin.admin_dashboard')
@section('admin')


<div class="container-fluid">

       <!-- start page title -->
       <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Admin's password Change</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">password</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">ADMIN password -UPDATE</h4>
                    <form action="{{ route('admin.pasword.update') }}" method="POST" >

                        @csrf

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Old password</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('old_password') is-invalid

                            @enderror" placeholder="old password" type="password" name="old_password" value="">
                            @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">new password</label>
                        <div class="col-sm-10">
                            <input class="form-control @error('new_password') is-invalid

                            @enderror" type="password" placeholder="new password" name="new_password" value="">
                            @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">confirm new password</label>
                        <div class="col-sm-10">
                            <input class="form-control" placeholder="confirm password" type="password" name="new_password_confirmation" value="">

                        </div>
                    </div>
                    <!-- end row -->

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Change Password</button>

                </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>


@endsection


