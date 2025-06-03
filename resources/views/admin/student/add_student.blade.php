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

                        <div class="row mb-3">
                                <!-- Name -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" type="text" placeholder="Name">
                            </div>
                        </div>

                        <!-- Lastname -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="lastname" type="text" placeholder="Last Name">
                            </div>
                        </div>
                        </div>


                        <div class="row mb-3">

                             <!-- Father name -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Father Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="father_name" type="text" placeholder="Father Name">
                            </div>
                        </div>

                        <!-- Department name -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="department_name" type="text" placeholder="Department">
                            </div>
                        </div>

                        </div>


                        <div class="row mb-3">

                             <!-- Subject name -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="subject_name" type="text" placeholder="Subject">
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="phone_number" type="text" placeholder="Phone Number">
                            </div>
                        </div>

                        </div>



                        <div class="row mb-3">
                             <!-- Email -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" placeholder="Email">
                            </div>
                        </div>

                    <!-- Amount -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Total Fees</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="amount" name="amount" type="number" >
                            </div>
                        </div>

                        </div>


                        <div class="row mb-3">

                            <!-- Paid -->
                            <div class="col-md-6">
                                <label class="col-sm-2 col-form-label">Paid</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="paid" name="paid" type="number" >
                                </div>
                            </div>

                            <!-- Remaining Fees -->
                            <div class="col-md-6">
                                <label class="col-sm-2 col-form-label">Remaining Fees</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="remaining_fees" name="remaining_fees" type="number" >
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">

                                  <!-- Entry date -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Entry Date</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="entry_date" type="date">
                            </div>
                        </div>

                        <!-- Paid date -->
                        <div class="col-md-6">
                            <label class="col-sm-2 col-form-label">Paid Date</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="paid_date" type="date">
                            </div>
                        </div>
                        </div>



                        <div class="row mb-3">

                                <!-- National ID -->
                        <div class="col-md-6">
                            <label class="col-sm-2 ms-1 col-form-label">National ID</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="national_id" type="text" placeholder="National ID">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="col-sm-2 ms-1 col-form-label">teacher</label>
                            <select name="teacher_id" class="form-select">
                                <option value="">Select</option>
                                @foreach ($teachers as $info)
                                    <option value="{{ $info->id }}">{{ $info->first_name }} </option>
                                @endforeach
                            </select>
                        </div>

                        </div>



                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success">Add Student</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function calculateRemaining() {
        let amount = parseFloat($('#amount').val()) || 0;
        let paid = parseFloat($('#paid').val()) || 0;
        let remaining = amount - paid;
        $('#remaining_fees').val(remaining >= 0 ? remaining : 0);
    }

    $(document).ready(function () {
        // Recalculate on input changes
        $('#amount, #paid').on('input', calculateRemaining);

        // Initialize on page load
        calculateRemaining();
    });
</script>
@endsection
