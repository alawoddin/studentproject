@extends('admin.admin_dashboard')

@section('admin')

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Manage's Student</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                    <li class="breadcrumb-item active">Student</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between">
            <h4 class="card-title">View Student Info</h4>

            <a href="{{ route('add.student') }}" class="btn btn-primary waves-effect waves-light mb-4">Create Student</a>
        </div>

        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>student name</th>
                <th>Roll Id</th>
                <th>Class</th>
                <th>Req Data</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            </thead>

            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td style="text-align:center; font-size: 20px;">
                <a href=""><i class="fas fa-edit btn btn-primary waves-effect waves-light"></i></a>
                <a href="" id="delete"><i  class="fas fa-trash-alt btn btn-primary waves-effect waves-light"></i></a>
            </td>

            <tbody>
                <tr>

                </tr>



            </tbody>
        </table>

    </div>
</div>

@endsection
