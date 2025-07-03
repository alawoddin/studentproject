@extends('admin.admin_dashboard')
@section('admin')

<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between">
            <h4 class="card-title">View Student Info</h4>
            <a href="{{ route('add.student') }}" class="btn btn-primary waves-effect waves-light mb-4">Create Student</a>
        </div>

        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Father Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>teacher name</th>
                    <th>Time</th>
                    <th class="all">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $key => $student)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->father_name }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->teacher->first_name }}</td>
                    <td>{{ $student->time }}</td>
                    <td style="text-align:center; font-size: 20px;">
                        <a href="{{ route('edit.student', $student->id) }}"><i class="fas fa-edit btn btn-primary"></i></a>
                        <a href="{{ route('delete.student', $student->id) }}" id="delete"><i class="fas fa-trash-alt btn btn-danger"></i></a>
                        <a href="{{ route('print.invoice',$student->id) }}" >
                            <i class="fas fa-print btn btn-primary"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
