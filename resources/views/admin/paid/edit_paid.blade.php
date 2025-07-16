@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Paid Admission</h4>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Student Payment Info</h4>
                        <form action="{{ route('store.paid') }}" method="POST">

                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="student-dropdown" class="form-label">Select Student</label>
                                    <select name="student_id" id="student-dropdown" class="form-select" required>
                                        @foreach ($student as $info)
                                            <option value="{{ $info->id }}" 
                                            {{ isset($paid) && $paid->student_id == $info->id ? 'selected' : '' }}>
                                            {{ $info->name }}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <select name="department_id" class="form-select" id="department-dropdown">
                                        <option value="">Select</option>
                                        @foreach ($depart as $info)
                                            <option value="{{ $info->id }}"
                                                {{ isset($paid) && $paid->department_id == $info->id ? 'selected' : '' }}>
                                                {{ $info->depart_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Subject</label>
                                    <select name="subject_id" class="form-select" id="subject-dropdown">
                                        <option value="">Select Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ $paid->subject_id == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Teacher</label>
                                    <select name="teacher_id" class="form-select">
                                        <option value="">Select</option>
                                        @foreach ($teachers as $info)
                                            <option value="{{ $info->id }}"
                                                {{ $paid->teacher_id == $info->id ? 'selected' : '' }}>
                                                {{ $info->first_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Total Fees</label>
                                    <input class="form-control" name="total_fees" type="text"
                                        value="{{ $paid->total_fees }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Paid</label>
                                    <input class="form-control" name="paid" type="text" value="{{ $paid->paid }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Remaining Fees</label>
                                    <input class="form-control" name="remaining_Fees" type="number"
                                        value="{{ $paid->remaining_Fees }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Entry Date</label>
                                    <input class="form-control" name="entry_date" type="date"
                                        value="{{ $paid->entry_date }}">
                                </div>
                                {{-- row 4 --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-sm-6 col-form-label">Paid_date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="paid_date" value="{{ $paid->paid_date }}" type="date"
                                            placeholder="paid_date">
                                    </div>
                                </div>

                            </div>
                            </div>


                            <button type="submit" class="btn btn-success">Update Paid</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script>
        function calculateRemaining() {
            let total = parseFloat($('#total_fees').val()) || 0;
            let paid = parseFloat($('#paid').val()) || 0;
            let remaining = total - paid;
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
