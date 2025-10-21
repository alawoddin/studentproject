@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="container-fluid">

    <!-- Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Student Pending</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Student</a></li>
                        <li class="breadcrumb-item active">Admission</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Admission Form -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fill Pending Info</h4>
                    <form action="{{ route('update.pending') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{$pending->id}}" >

                        {{-- === Student Info Section === --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{$pending->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="lastname" type="text" value="{{$pending->lastname}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Program Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="father_name" type="text" value="{{$pending->father_name}}">
                                </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="phone_number" type="text" value="{{$pending->phone_number}}">
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" value="{{$pending->email}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <label class="col-form-label">Time (Am | PM)</label>
                                        <input class="form-control" id="time" name="time" type="Time" value="{{$pending->time}}">
                                    </div>
                            </div>
                        </div>




                        {{-- === Submit Button === --}}
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Updata Student</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>






@endsection
