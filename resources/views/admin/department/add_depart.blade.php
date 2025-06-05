@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Student Admission</h4>
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
                        <h4 class="card-title">Fill Student Info</h4>
                        <form action="{{ route('store.depart') }}" method="POST" enctype="multipart/form-data">
                            @csrf




                            <div class="row mb-3">

                                <!-- Father name -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">Department Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="depart_name" type="text"
                                            placeholder="Department name">
                                    </div>
                                </div>

                                <!-- Department name -->
                                <div class="col-md-6">
                                    <label class="col-sm-3 col-form-label">Department Subject</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="depart_subject" type="text"
                                            placeholder="Department subject">
                                    </div>
                                </div>

                            </div>




                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add department</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
