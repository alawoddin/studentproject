
@extends('admin.admin_dashboard')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">paid Admission</h4>
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

                    <div class="row mb-3">
                        <!-- Name -->
                        <div class="col-md-12">
                            <label class="col-sm-12 col-form-label">Student</label>
                            <div class="col-sm-10">
                                <form action="" method="GET">
                                <select name="student_id" class="form-select" id="student-select" onchange="window.location.href=this.value">
                                    <option value="">Select</option>
                                     @foreach($students as $student)
                                        <option value="{{ route('attendance.show', $student->id) }}">
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                              </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

    </div>


    <!-- Select2 Initialization Script -->
<script>
    $(document).ready(function() {
        $('#student-select').select2({
            placeholder: "Search or select a student",
            allowClear: true,
            width: '100%'
        });
    });
</script>


@endsection