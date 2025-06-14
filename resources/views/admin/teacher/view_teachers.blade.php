@extends('admin.admin_dashboard')

@section('admin')


<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <nav class="fs-4"  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#" class="fw-bold">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hashmatullah</li>
                    </ol>
                </nav>

{{--
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
--}}

            </div>
        </div>
    </div>
    <!-- end page title -->


{{--
    @php
        $teacher = App\Models\Teacher::with('department')->get();
    @endphp




    <div class="row">
        @foreach ($teacher as $item )

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-truncate font-size-14 mb-2">{{ $item->first_name }}</p>
                            <h4 class="mb-2">{{ $item->last_name }}</h4>
                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>{{ $item->roll_id }}%</span>{{ $item->department->depart_name}}</p>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-light text-primary rounded-3">
                                <img src="{{ $item->photo }}" style="height: 50px" alt="">
                            </span>
                        </div>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    @endforeach

    </div><!-- end row -->
--}}


    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Amount Information</h4>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Department</th>
                                    <th>Class</th>
                                    <th>Sutudents</th>
                                    <th>Precentage</th>
                                    <th>Total</th>
                                    <td>Total of Salary</td>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                <!--start-->
                                <tr>
                                    <td><h6 class="mb-0">Full Stack</h6></td>
                                    <td>HTML</td>
                                    <td>10</td>
                                    <td>50%</td>
                                    <td>5000af</td>
                                    <td rowspan="100" class="text-center">16000af<td>
                                </tr>
                                 <!-- end -->
                                 <!--start-->
                                <tr>
                                    <td><h6 class="mb-0">Full Stack</h6></td>
                                    <td>CSS</td>
                                    <td>5</td>
                                    <td>50%</td>
                                    <td>2500af</td>
                                </tr>
                                 <!-- end -->
                                 <!--start-->
                                <tr>
                                    <td><h6 class="mb-0">Full Stack</h6></td>
                                    <td>JS</td>
                                    <td>10</td>
                                    <td>50%</td>
                                    <td>5000af</td>
                                </tr>
                                 <!-- end -->
                                 <tr>
                                    <td><h6 class="mb-0">Full Stack</h6></td>
                                    <td>CSS</td>
                                    <td>5</td>
                                    <td>50%</td>
                                    <td>2500af</td>
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
                    <div class="mt-4 text-center">
                        <img id="showImage" src="{{ asset('uploads/no_image.png') }}"
                            alt="Product Image" class="rounded-circle p-1 bg-primary" width="110" height="110">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mt-4">
                                <h5>Hashmatullah Mohammady</h5>
                                <p class="mb-2 text-center">Full Stack Developer</p>
                                <p class="mb-2 text-center">hashmatullah@gmail.com</p>
                                <p class="mb-2">+93 7789 332 234</p>
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

