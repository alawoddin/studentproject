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
                                <input class="form-control" name="lastname" type="text" value="{{ $student->lastname }}">
                            </div>
                        </div>

                        <!-- Father Name -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Father Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="father_name" type="text" value="{{ $student->father_name }}">
                            </div>
                        </div>

                        <!-- Department -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Department</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="department_name" type="text" value="{{ $student->department_name }}">
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="subject_name" type="text" value="{{ $student->subject_name }}">
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="phone" type="text" value="{{ $student->phone }}">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" type="email" value="{{ $student->email }}">
                            </div>
                        </div>

                        <!-- Amount -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Total Fees</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="amount" type="number" value="{{ $student->amount }}">
                            </div>
                        </div>

                        <!-- Paid -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Paid</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="paid" type="number" value="{{ $student->paid }}">
                            </div>
                        </div>

                        <!-- Remaining Fees -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Remaining Fees</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="remaining_fees" type="number" value="{{ $student->remaining_fees }}">
                            </div>
                        </div>

                        <!-- Entry Date -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Entry Date</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="entry_date" type="date" value="{{ $student->entry_date }}">
                            </div>
                        </div>

                        <!-- Paid Date -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Paid Date</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="paid_date" type="date" value="{{ $student->paid_date }}">
                            </div>
                        </div>

                        <!-- National ID -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">National ID</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="national_id" type="text" value="{{ $student->national_id }}">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Student</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
