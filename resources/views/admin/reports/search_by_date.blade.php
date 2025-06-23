@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Search By Date Order</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
        <h3 class="text-danger">Search By Date: {{ $formatDate }}</h3>
        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Std name</th>
                <th>Department</th>
                <th>subject</th>
                <th>Teacher</th>
                <th>Total Fess</th>
                <th>Paid</th>
                <th>remains_fee</th>
                <th>Action </th>
            </tr>
            </thead>


            <tbody>
           @foreach ($orderDate as $key=> $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->student->name  }}</td>
                <td>{{ $item->department->depart_name }}</td>
                <td>{{ $item->subject->subject_name }}</td>
                <td>{{ $item->teacher->first_name }}</td>
                <td>{{ $item->total_fees }}</td>
                <td>{{ $item->paid }}</td>
                <td>{{ $item->remaining_Fees }}</td>
                {{-- <td>{{ $item->order_year }}</td> --}}


        <td><a href="{{ route('all.invoice',$item->id) }}" class="btn btn-primary waves-effect waves-light"> <i class="fas fa-eye"></i> </a>

                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>





@endsection
