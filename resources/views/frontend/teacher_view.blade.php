
@extends('frontend.teacher_dashboard')

@section('teacher')



<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Amount Information</h4>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Sl</th>
                                    <th>Department</th>
                                    <th>Subject Name</th>
                                    <th>Students</th>
                                    <th>total_fees</th>
                                    <th>paid</th>
                                    <th>remaining_Fees</th>
                                    <td>Total of Salary</td>
                                </tr>
                            </thead><!-- end thead -->

                            @php
                            $studentsCount = $paid->count(); // student is already passed from the controller

                            $paids = $paid->sum('paid');
                            $percentage = $teacher->percentage;
                            $count = $paids * $percentage / 100;

                        @endphp

                            <tbody>
                                @foreach ($paid as $key =>  $item )
                                     <!--start-->
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><h6 class="mb-0">{{ $item->department->depart_name }}</h6></td>
                                    <td>{{ $item->subject->subject_name }}</td>
                                    <td>{{ $item->student->name }}</td>
                                    <td>{{ $item->total_fees }}</td>
                                    <td>{{ $item->paid }}</td>
                                    <td>{{ $item->remaining_Fees }}</td>
                                    {{-- <td rowspan="100" class="text-center">{{ $count . 'AFG' }}<td> --}}

            @if ($loop->first)
            <td rowspan="{{ $paid->count() }}" class="text-center">{{ $count . ' AFG' }}</td>
        @endif
                                </tr>
                                 <!-- end -->
                                @endforeach



                            </tbody><!-- end tbody -->
                        </table> <!-- end table -->
                    </div>
                </div><!-- end card -->
            </div><!-- end card -->
        </div>
        <!-- end col -->

        {{-- @php
           $teacher = App\Models\Teacher::with('department')->find($id);

        @endphp --}}

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="mt-4 text-center">
                        <img class="header-profile-user"
                        src="{{ !empty($teacher->photo) ? asset($teacher->photo) : asset('uploads/no_image.png') }}"
                        alt="Header Avatar">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mt-4">
                                <h5>{{ $teacher->first_name }}</h5>
                                <p class="mb-2 text-center">{{ $teacher->department->depart_name }}</p>
                                <p class="mb-2 text-center">{{ $teacher->email }}</p>
                                <p class="mb-2">{{ $teacher->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>




@endsection

