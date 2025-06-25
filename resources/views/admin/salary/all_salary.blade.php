@extends('admin.admin_dashboard')
@section('admin')

    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h4 class="card-title">View Student Info</h4>
                <a href="{{ route('add.paid') }}" class="btn btn-primary waves-effect waves-light mb-4">Create
                    Student</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>department</th>
                        <th>subject</th>
                        <th>teacher</th>
                        <th>Salary</th>
                        <th>Month</th>
                        <th class="all">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($salary as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->department->depart_name }}</td>
                            {{-- <td>{{ $item->subject->subject_name }}</td> --}}
                            <td>{{ $item->subject }}</td>
                            <td>{{ $item->teacher->first_name }}</td>
                            <td>{{ $item->salary }}</td>
                            <td>{{ $item->order_month }}</td>
                            <td style="text-align:center; font-size: 20px;">
                                <a href="{{ route('edit.salary', $item->id) }}">
                                    <i class="fas fa-edit btn btn-primary"></i>
                                </a>
                                <a href="{{ route('delete.salary', $item->id) }}" id="delete">
                                    <i class="fas fa-trash-alt btn btn-danger"></i>
                                </a>
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
