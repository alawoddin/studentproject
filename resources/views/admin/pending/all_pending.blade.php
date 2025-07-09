@extends('admin.admin_dashboard')
@section('admin')

<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between">
            <h4 class="card-title">View Student Info</h4>
            <a href="{{ route('add.pending') }}" class="btn btn-primary waves-effect waves-light mb-4">Create Student</a>
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
                    <th>Time</th>
                    <th>Status</th>
                    <th class="all">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pending as $key => $pend)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pend->name }}</td>
                    <td>{{ $pend->lastname }}</td>
                    <td>{{ $pend->father_name }}</td>
                    <td>{{ $pend->phone_number }}</td>
                    <td>{{ $pend->email }}</td>
                    <td>{{ $pend->time }}</td>
                    <td>
                        @if($pend->status === 'done')
                            <span class="badge bg-success">done</span>
                        @elseif($pend->status === 'wait')
                            <span class="badge bg-warning">wait</span>
                        @elseif($pend->status === 'reject')
                            <span class="badge bg-danger">reject</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('student.pending', $pend->id) }}">
                            @if($pend->status === 'wait')
                                <i class="fas fa-spinner btn btn-warning waves-effect waves-light" title="Mark as Done"></i>
                            @elseif($pend->status === 'done')
                                <i class="fas fa-check btn btn-success waves-effect waves-light" title="Already Done"></i>
                            @elseif($pend->status === 'reject')
                                <i class="fas fa-times btn btn-danger waves-effect waves-light" title="Rejected"></i>
                            @endif
                        </a>
                    </td>


                        {{-- @if($pend->status === 'done')
                        <a href="{{ route('deactivate.paid', $pend->id) }}">
                            <i class="fas fa-check btn btn-primary waves-effect waves-light"></i>
                        </a>
                    @else
                        <a href="{{ route('deactivate.paid', $pend->id) }}">
                            <i class="fas fa-times btn btn-primary waves-effect waves-light"></i>
                        </a>
                    @endif --}}
                    {{-- <td>
                        @if($pend->status === 'done')
                            <span class="badge bg-success">done</span>
                        @elseif($pend->status === 'wait')
                            <span class="badge bg-warning">wait</span>
                        @elseif($pend->status === 'reject')
                            <span class="badge bg-danger">reject</span>
                        @endif
                    </td> --}}
                    {{-- <td>
                        @if($pend->status = 'wait')
                            <span>{{ $pend->status }}</span>
                        @endif
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
