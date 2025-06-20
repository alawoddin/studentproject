@extends('admin.admin_dashboard')

@section('admin')


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

    @php
        $teacher = App\Models\Teacher::with('department')->get();
    @endphp

    <div class="row">
        @foreach ($teacher as $item )


            <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('view.teachers')}}">
                    <div class="d-flex">

                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">{{ $item->first_name }}</p>
                            <h4 class="mb-2">{{ $item->last_name }}</h4>
                        {{--    <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $item->roll_id }}%</span>{{ $item->department->depart_name}}</p> --}}
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <img src="{{ $item->photo }}" style="height: 50px" alt="">
                            </span>
                        </div>

                    </div>
                    </a>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>

        <!-- end col -->
    @endforeach

    </div><!-- end row -->



    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
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
                    $students = App\Models\Student::with('teacher')->limit(5)->get();
                @endphp

                <div class="table-responsive">
                    <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Father Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $student)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->lastname }}</td>
                                    <td>{{ $student->father_name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->teacher->first_name  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
    <!-- end row -->
</div>

@endsection

