@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<div class="container-fluid">

       <!-- start page title -->
       <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Teacher ADDISSION</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Teacher</a></li>
                        <li class="breadcrumb-item active">Admission</li>
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

                    <h4 class="card-title">Fill Teacher Info</h4>
                <form action="{{ route('update.teacher', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST') {{-- Change to PUT if you want to follow RESTful conventions --}}

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="first_name" type="text" value="{{ $teacher->first_name }}" placeholder="First Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="last_name" type="text" value="{{ $teacher->last_name }}" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Father Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="father_name" type="text" value="{{ $teacher->father_name }}" placeholder="Father Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Roll ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="roll_id" type="text" value="{{ $teacher->roll_id }}" placeholder="Roll ID">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" type="email" value="{{ $teacher->email }}" placeholder="Email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="phone" type="text" value="{{ $teacher->phone }}" placeholder="Phone number">
                        </div>
                    </div>

                   <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" {{ $teacher->gender == 'Male' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" {{ $teacher->gender == 'Female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">National ID</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="national_id" type="text" value="{{ $teacher->national_id }}" placeholder="National ID">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update Teacher</button>
                </form>




                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>



@endsection


