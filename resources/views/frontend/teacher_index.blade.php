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

    {{-- @php
    $teacher = App\Models\Teacher::first();
    $depart = App\Models\Department::first();
@endphp --}}

@php
$id = Auth::guard('teacher')->id();
$profile = App\Models\Teacher::find($id);
@endphp

<div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('teacher.view' , $profile->id) }}">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">{{ $profile->first_name }}</p>
                                <h4 class="mb-2">{{ $profile->last_name }}</h4>
                                <p class="text-muted mb-0">
                                    <span class="text-success fw-bold font-size-12 me-2">
                                        <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $profile->roll_id }}%
                                    </span>
                                </p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <img class="header-profile-user"
                            src="{{ !empty($profile->photo) ? asset($profile->photo) : asset('uploads/no_image.png') }}"
                            alt="Header Avatar">
                                </span>
                            </div>
                        </div>
                    </a>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Latest Transactions</h4>

                        @php
                            $paids = App\Models\Paid::with(['department', 'subject', 'student'])->limit('5')->get();

                        @endphp

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>teacher</th>
                                        <th>Fees</th>
                                        <th>Enter day </th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>

                                    @foreach ($paids as $key => $paid)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <h6 class="mb-0">{{ $paid->student->name }}</h6>
                                            </td>
                                            <td>{{ $paid->subject->subject_name  }}</td>
                                            <td>
                                                <div class="font-size-13">{{ $paid->teacher->first_name }}</div>
                                            </td>
                                            <td>
                                                {{ $paid->total_fees }}
                                            </td>
                                            <td>
                                                {{ $paid->created_at->format('d M Y') }}
                                            </td>
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
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <select class="form-select shadow-none form-select-sm">
                                <option selected>Apr</option>
                                <option value="1">Mar</option>
                                <option value="2">Feb</option>
                                <option value="3">Jan</option>
                            </select>
                        </div>
                        <h4 class="card-title mb-4">Monthly Earnings</h4>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>3475</h5>
                                    <p class="mb-2 text-truncate">Market Place</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>458</h5>
                                    <p class="mb-2 text-truncate">Last Week</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>9062</h5>
                                    <p class="mb-2 text-truncate">Last Month</p>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="mt-4">
                            <div id="donut-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div>
</div>




</div>

@endsection

