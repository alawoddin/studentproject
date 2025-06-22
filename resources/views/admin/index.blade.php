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
                <a href="{{ route('view.teachers' , $item->id)}}">
                <div class="d-flex">

                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">{{ $item->first_name }}</p>
                        <h4 class="mb-2">{{ $item->last_name }}</h4>
                       <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2">
                        <i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $item->roll_id }}%</span>{{ $item->department->depart_name}}</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <img src="{{ asset($item->photo) }}" style="height: 50px" alt="">
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

                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th style="width: 120px;">Salary</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                <tr>
                                    <td><h6 class="mb-0">Charles Casey</h6></td>
                                    <td>Web Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        23
                                    </td>
                                    <td>
                                        04 Apr, 2021
                                    </td>
                                    <td>$42,450</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Alex Adams</h6></td>
                                    <td>Python Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                    </td>
                                    <td>
                                        28
                                    </td>
                                    <td>
                                        01 Aug, 2021
                                    </td>
                                    <td>$25,060</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                    <td>Senior Javascript Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        35
                                    </td>
                                    <td>
                                        15 Jun, 2021
                                    </td>
                                    <td>$59,350</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                    <td>React Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        25
                                    </td>
                                    <td>
                                        01 March, 2021
                                    </td>
                                    <td>$23,700</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                    <td>Senior Web Designer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        38
                                    </td>
                                    <td>
                                        01 Jan, 2021
                                    </td>
                                    <td>$69,185</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Den Simpson</h6></td>
                                    <td>Web Designer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                    </td>
                                    <td>
                                        21
                                    </td>
                                    <td>
                                        01 Sep, 2021
                                    </td>
                                    <td>$37,845</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Mahek Torres</h6></td>
                                    <td>Senior Laravel Developer</td>
                                    <td>
                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                    </td>
                                    <td>
                                        32
                                    </td>
                                    <td>
                                        20 May, 2021
                                    </td>
                                    <td>$55,100</td>
                                </tr>
                                 <!-- end -->
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

