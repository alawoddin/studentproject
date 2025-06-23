@extends('admin.admin_dashboard')

@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Manage's Staf</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                        <li class="breadcrumb-item active">Staf</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h4 class="card-title">View Staf Info</h4>

                <a href="{{ route('add.staf') }}" class="btn btn-primary waves-effect waves-light mb-4">Create
                    Staf</a>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Father Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>National ID</th>
                        <th>Roll ID</th>
                        <th>Salary</th>
                        <th>Staf image </th>
                        <th class="all">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($stafs as $key => $staf)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $staf->first_name }}</td>
                            <td>{{ $staf->last_name }}</td>
                            <td>{{ $staf->father_name }}</td>
                            <td>{{ $staf->email }}</td>
                            <td>{{ $staf->phone }}</td>
                            <td>{{ $staf->gender }}</td>
                            <td>{{ $staf->national_id }}</td>
                            <td>{{ $staf->roll_id }}</td>
                            <td>{{ $staf->salary }}</td>
                            <td>
                                <img class="header-profile-user"
                                    src="{{ !empty($staf->photo) ? asset($staf->photo) : asset('uploads/no_image.png') }}"
                                    alt="Header Avatar">

                            </td>
                            <td style="text-align:center; font-size: 20px;" class="all">
                                <a href="{{ route('edit.staf', $staf->id) }}"><i
                                        class="fas fa-edit btn btn-primary waves-effect waves-light"></i></a>
                                <a href="{{ route('delete.staf', $staf->id) }}" id="delete"><i
                                        class="fas fa-trash-alt btn btn-danger waves-effect waves-light"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
