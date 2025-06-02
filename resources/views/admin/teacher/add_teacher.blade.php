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
                    <form action="" method="POST" enctype="multipart/form-data" >

                        @csrf

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="full_name" type="text" placeholder="full Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Father Name:</label>
                            <div class="col-sm-10">
                          <input class="form-control" name="full_name" type="text" placeholder="full Name">
                            </div>
                        </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Roll id</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="roll_id" type="text" placeholder="Roll id">
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
                        <label for="example-text-input" class="col-sm-2 col-form-label">class</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="class_id" aria-label="Default select example">
                                <option selected="">-- Select a Class --</option>
                                <option value="">student name</option>

                                </select>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <input class="form-check-input" name="gender" value="Male"  id="FormRadios1" type="radio"  placeholder="Email">
                            <label for="formRadios1" class="form-check-label">
                                Male
                            </label>

                                <input class="form-check-input" name="gender" value="female" id="FormRadios1" type="radio"  placeholder="Email">
                                <label for="formRadios1" class="form-check-label">
                                Female
                            </label>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">DOB</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="dob" type="date" placeholder="mm/dd/yy">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="photo" id="Image">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            {{-- <img id="ShowImage" src="{{ empty($adminData->photo)? asset('uploads/no_image.png') : asset('uploads/admin_profiles/'.$adminData->photo) }}" alt="avatar-4" class="rounded avatar-md"> --}}
                            <img id="ShowImage" src="{{ asset('uploads/no_image.png')  }}" alt="avatar-4" class="rounded avatar-md">



                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add Student</button>

                </form>



                </div>
            </div>
        </div> <!-- end col -->
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#Image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#ShowImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>





@endsection


