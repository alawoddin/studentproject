@extends('admin.admin_dashboard')
@section('admin')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Student</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Student</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Student Info</h4>
                        <form action="{{ route('update.student', $student->id) }}" method="POST">
                            @csrf

                            <!-- Name -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" type="text" value="{{ $student->name }}">
                                </div>
                            </div>

                            <!-- Lastname -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="lastname" type="text"
                                        value="{{ $student->lastname }}">
                                </div>
                            </div>

                            <!-- Father Name -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Father Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="father_name" type="text"
                                        value="{{ $student->father_name }}">
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="phone_number" type="text"
                                        value="{{ $student->phone_number }}">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="email" type="email"
                                        value="{{ $student->email }}">
                                </div>
                            </div>


                            <!-- National ID -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">National ID</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="national_id" type="text"
                                        value="{{ $student->national_id }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 ms-1 col-form-label">Teacher</label>
                                <div class="col-sm-10">
                                    <select name="teacher_id" class="form-select">
                                        <option value="">Select</option>
                                        @foreach ($teachers as $info)
                                            <option value="{{ $info->id }}"
                                                {{ (int) $student->teacher_id === (int) $info->id ? 'selected' : '' }}>
                                                {{ $info->first_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="col-sm-10">
                                        <label class="col-form-label">Time (Am | PM)</label>
                                        <input class="form-control" id="time" name="time" type="Time" value="{{ $student->time }}">
                                    </div>
                                </div>
                            </div>

                             <div class="col-md-6">
                                    <label class="form-label">Entry Date</label>
                                    <input class="form-control" name="entry_date" type="date"
                                        value="{{ $paid->entry_date }}">
                            </div>



                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Student</button>

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

        $(document).ready(function() {
            // Recalculate on input changes
            $('#amount, #paid').on('input', calculateRemaining);

            // Initialize on page load
            calculateRemaining();
        });
    </script>
@endsection
