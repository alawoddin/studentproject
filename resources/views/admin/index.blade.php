@extends('admin.admin_dashboard')

@section('admin')
 @php
                $count = App\Models\Student::count();
                $totalPaid = App\Models\Paid::sum('total_fees');
                $teacher = App\Models\Teacher::count();
                $pending = App\Models\Pending::count();
                $expence = App\Models\Expense::sum('amount');
            @endphp
<div class="row">
                            <div class="col-xl-3 col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total Teacher</p>
                                                <h4 class="mb-2">{{$teacher}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-teach font-size-24"></i>
  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total S  tudent</p>
                                                <h4 class="mb-2">{{$count}}</h4>
                                                
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                   <i class="mdi mdi-school font-size-24"></i>

                                                </span>
                                            </div>
                                        </div>                                            
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total Paid</p>
                                                <h4 class="mb-2">{{$totalPaid}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="mdi mdi-coin font-size-24"></i>

                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total pending Student</p>
                                                <h4 class="mb-2">{{$pending}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                   <i class="mdi mdi-timer-sand font-size-24"></i>
 
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                           

    <div class="container-fluid">

       

        <div class="row">
           
            
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="float-end">
                            <select class="form-select shadow-none form-select-sm">
                                <option selected>Apr</option>
                                <option value="1">Mar</option>
                                <option value="2">Feb</option>
                                <option value="3">Jan</option>
                            </select>
                        </div> --}}
                        <h4 class="card-title mb-4">سرمایه</h4>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>{{$totalPaid}}</h5>
                                    <p class="mb-2 text-truncate">اید</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>{{$expence}}</h5>
                                    <p class="mb-2 text-truncate">مصرف</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5><?php echo $totalPaid-$expence ?>    </h5>
                                    <p class="mb-2 text-truncate">دخل</p>
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