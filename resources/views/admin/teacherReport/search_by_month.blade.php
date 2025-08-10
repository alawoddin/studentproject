@extends('admin.admin_dashboard')
@section('admin')
    {{-- <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Search By Month Order</h4>

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
        <h3 class="text-danger">Search By Month: {{ $month }} and Year {{ $years }}</h3>
        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>
                <th>Sl</th>
                <th>name</th>
                <th>Date</th>
                <th>order_month</th>
                <th>Amount</th>
                <th>remains_fee</th>
                <th>order_year</th>
                <th>Action </th>
            </tr>
            </thead>


            <tbody>
           @foreach ($orderMonth as $key => $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->student->name ?? 'N/A' }}</td>
                <td>{{ $item->order_date }}</td>
                <td>{{ $item->order_month }}</td>
                <td>{{ $item->fees }}</td>
                <td>{{ $item->remains_fee }}</td>
                <td>{{ $item->order_year }}</td>


        <td><a href="{{ route('all.invoices',$item->id) }}" class="btn btn-primary waves-effect waves-light"> <i class="fas fa-eye"></i> </a>

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
</div> --}}

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">All Search By Month Order</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0"></ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h3 class="text-danger">Search By Month: {{ $month }}</h3>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>title</th>
                                        <th>amount</th>
                                        <th>teacher</th>
                                        <th>note</th>
                                        <th>Order Month</th>
                                        <th>Action </th>
                                    </tr>
                                    </thead>

                                  <tbody>
                                    @foreach ($expense as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $item->teacher->first_name  ?? 'N/A' }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>{{ $item->order_month }}</td>
                                <td><a href="{{ route('all.invoice',$item->id) }}" class="btn btn-primary waves-effect waves-light"> <i class="fas fa-eye"></i> </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Monthly Summary Report -->
                            <div class="mt-4">
                                {{-- <h5 class="text-success">Monthly Summary</h5>
                            <p><strong>Total students who made a payment:</strong> {{ $totalStudents }}</p>
                            <p><strong>Total received this month:</strong> {{ number_format($totalReceived) }} AFN</p> --}}
                                {{-- <h4>Total students who made a payment: {{ $totalStudents }}</h4>
                                <h4>Total received this month: {{ number_format($totalReceived) }} AFN</h4>
                                <h4>Total remaining fees this month: {{ number_format($totalRemaining) }} AFN</h4> --}}

                            </div>

                        </div> <!-- card-body -->

                    </div> <!-- card -->
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
