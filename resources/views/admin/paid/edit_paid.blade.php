@extends('admin.admin_dashboard')
@section('admin')

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
                        <form action="{{ route('update.paid', $paid->id) }}" method="POST">

                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Student</label>
                                    <input class="form-control" name="student" type="text" value="{{ $paid->student }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <select name="department_id" class="form-select" id="department-dropdown">
                                        <option value="">Select</option>
                                        @foreach ($depart as $info)
                                            <option value="{{ $info->id }}" {{ (isset($paid) && $paid->department_id == $info->id) ? 'selected' : '' }}>
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
                                            <option value="{{ $subject->id }}" {{ $paid->subject_id == $subject->id ? 'selected' : '' }}>
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
                                            <option value="{{ $info->id }}" {{ $paid->teacher_id == $info->id ? 'selected' : '' }}>
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
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Paid Date</label>
                                    <input class="form-control" name="paid_date" type="date"
                                        value="{{ $paid->paid_date }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Update Paid</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
