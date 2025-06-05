@extends('admin.admin_dashboard')
@section('admin')
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h4 class="card-title">View Student Info</h4>
                <a href="{{ route('add.depart') }}" class="btn btn-primary waves-effect waves-light mb-4">Create
                    Department</a>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Subject</th>

                        <th class="all">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($departments as $key => $depart)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $depart->depart_name }}</td>
                            <td>{{ $depart->depart_subject }}</td>
                            <td style="text-align:center; font-size: 20px;">
                                <a href="{{ route('edit.depart', $depart->id) }}"><i
                                        class="fas fa-edit btn btn-primary"></i></a>
                                <a href="{{ route('delete.depart', $depart->id) }}" id="delete"><i
                                        class="fas fa-trash-alt btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
