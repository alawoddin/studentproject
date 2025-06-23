@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Staf ADDISSION</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Staf</a></li>
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

                        <h4 class="card-title">Fill Staf Info</h4>
                        <form action="{{ route('store.staf') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="first_name" type="text" placeholder="first Name">
                                </div>
                            </div>

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="last_name" type="text" placeholder="last Name">
                                </div>
                            </div>

                            <!--end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Father Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="father_name" type="text" placeholder="father Name">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="phone" type="text" placeholder="Phone number">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <input class="form-check-input" name="gender" value="Male" id="FormRadios1"
                                        type="radio" placeholder="Email">
                                    <label for="formRadios1" class="form-check-label">
                                        Male
                                    </label>

                                    <input class="form-check-input" name="gender" value="Female" id="FormRadios1"
                                        type="radio" placeholder="Email">
                                    <label for="formRadios1" class="form-check-label">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">National ID:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="national_id" type="text"
                                        placeholder="National ID">
                                </div>
                            </div>
                            <!-- end row -->


                           

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Salary</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="salary" type="number" placeholder="Salary">
                                </div>
                            </div>



                             <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Upload Image:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="photo"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" src="{{ asset('uploads/no_image.png') }}" alt="Product Image"
                                        class="rounded-circle p-1 bg-primary" width="110">
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Staf</button>

                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection
