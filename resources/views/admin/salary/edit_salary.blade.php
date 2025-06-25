@extends('admin.admin_dashboard')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Teacher Salary </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Salary</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expense Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Salary Info</h4>
                        <form action="{{ route('update.salary', $salary->id) }}" method="POST">
                            @csrf

                            {{-- === Expense Info === --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-sm-4 col-form-label">Department</label>
                                    <div class="col-sm-10">
                                        <select name="department_id" class="form-select" id="department-dropdown">
                                            <option value="">Select</option>
                                            @foreach ($depart as $info)
                                            <option value="{{ $info->id }}"
                                                {{ isset($salary) && $salary->department_id == $info->id ? 'selected' : '' }}>
                                                {{ $info->depart_name }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label class="col-sm-6 col-form-label">subject</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="subject" value="{{ $salary->subject }}" name="subject" type="text" placeholder="enter the subject">
                                    </div>
                                    {{-- <label class="col-sm-4 col-form-label">Subject</label>
                                    <div class="col-sm-10">
                                        <select name="subject_id" class="form-select" id="subject-dropdown">
                                            <option value="">Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="col-sm-6 col-form-label">Teacher</label>
                                    <div class="col-sm-10">
                                        <select name="teacher_id" class="form-select">
                                            @foreach ($teachers as $info)
                                            <option value="{{ $info->id }}"
                                                {{ $salary->teacher_id == $info->id ? 'selected' : '' }}>
                                                {{ $info->first_name }}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label class="col-sm-6 col-form-label">salary</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="salary" name="salary" value="{{ $salary->salary }}" type="text" placeholder="enter the salary">
                                    </div>
                                </div>
                            </div>



                            {{-- === Submit Button === --}}
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Salary</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
