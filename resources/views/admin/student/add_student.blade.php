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
                    <form action="{{ route('store.student') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- === Student Info Section === --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="lastname" type="text" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Father Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="father_name" type="text" placeholder="Father Name">
                                </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="phone_number" type="text" placeholder="Phone Number">
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-4 col-form-label">National ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="national_id" type="text" placeholder="National ID">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="col-sm-10">
                                    <label class="col-form-label">Teacher</label>
                                        <select name="teacher_id" class="form-select">
                                        <option value="">Select</option>
                                        @foreach ($teachers as $info)
                                            <option value="{{ $info->id }}">{{ $info->first_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <label class="col-form-label">Time (Am | PM)</label>
                                        <input class="form-control" id="time" name="time" type="Time">
                                    </div>
                            </div>
                         
                        </div>
                        {{-- === Submit Button === --}}
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add Student</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- jQuery Script --}}
<script>
 {{--    function calculateRemaining() {
        let amount = parseFloat($('#amount').val()) || 0;
        let paid = parseFloat($('#paid').val()) || 0;
        let remaining = amount - paid;
        let percent = amount > 0 ? ((paid / amount) * 100).toFixed(2) + '%' : '0%';

        $('#remaining_fees').val(remaining >= 0 ? remaining : 0);
        $('#percentage').val(percent);
    }

    $(document).ready(function () {
        $('#amount, #paid').on('input', calculateRemaining);
        calculateRemaining();
    });
 --}}






    $(document).ready(function() {
    $('#department-dropdown').on('change', function () {
        var departmentID = $(this).val();
        if (departmentID) {
            $.ajax({
                url: '/get-subjects/' + departmentID,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#subject-dropdown').empty();
                    $('#subject-dropdown').append('<option value="">Select subject</option>');
                    $.each(data, function (key, value) {
                        $('#subject-dropdown').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#subject-dropdown').empty();
            $('#subject-dropdown').append('<option value="">Select subject</option>');
        }
    });
});
 
</script>




@endsection
