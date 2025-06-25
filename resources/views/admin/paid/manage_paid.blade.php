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
                        <th>student</th>
                        <th>Department</th>
                        <th>subject</th>
                        <th>teacher</th>
                        <th>total_fees</th>
                        <th>paid</th>
                        <th>remaining_Fees</th>
                        <th>entry_date</th>
                        <th>paid_date</th>
                        <th>Status</th>
                        <th class="all">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($paid as $key => $paids)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $paids->student->name }}</td>
                            <td>{{ $paids->department->depart_name }}</td>
                            <td>{{ $paids->subject->subject_name }}</td>
                            {{-- <td>
                                @foreach ($paids->subjects as $subject)
                                    <span class="badge bg-success">{{ $subject->subject_name }}</span>
                                @endforeach
                            </td> --}}

                            <td>{{ $paids->teacher->first_name }}</td>
                            <td>{{ $paids->total_fees }}</td>
                            <td>{{ $paids->paid }}</td>
                            <td>{{ $paids->remaining_Fees }}</td>
                            <td>{{ $paids->entry_date }}</td>
                            <td>{{ $paids->paid_date }}</td>
                            <td>
                                @if($paids->status === 'paid')
                                    <span class="badge bg-success">paid</span>
                                @else
                                    <span class="badge bg-danger">no_paid</span>
                                @endif
                            </td>

                            <td style="text-align:center; font-size: 20px;">
                                <a href="{{ route('edit.paid', $paids->id) }}">
                                    <i class="fas fa-edit btn btn-primary"></i>
                                </a>
                                <a href="{{ route('delete.paid', $paids->id) }}" id="delete">
                                    <i class="fas fa-trash-alt btn btn-danger"></i>
                                </a>

                                @if($paids->status === 'paid')
                                    <a href="{{ route('deactivate.paid', $paids->id) }}">
                                        <i class="fas fa-check btn btn-primary waves-effect waves-light"></i>
                                    </a>
                                @else
                                    <a href="{{ route('deactivate.paid', $paids->id) }}">
                                        <i class="fas fa-times btn btn-primary waves-effect waves-light"></i>
                                    </a>
                                @endif
                            </td>



                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
