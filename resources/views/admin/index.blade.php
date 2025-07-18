@extends('admin.admin_dashboard')

@section('admin')
 @php
                $count = App\Models\Student::count();
                $totalPaid = App\Models\Paid::sum('total_fees');
                $teacher = App\Models\Teacher::count();
                $pending = App\Models\Pending::count();
                $expence = App\Models\Expense::sum('amount');
                $dates = $dates = App\Models\Expense::select('date')->distinct()->pluck('date');

                  

            @endphp



{{-- check for demo  --}}
        
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
                                                    <i class="mdi mdi-cash font-size-24"></i>

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

                         <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <h4 class="card-title mb-4">Expenses Revenue (Monthly)</h4>
                                </div>
                                <div class="card-body py-0 px-2">
                                    <div id="mixed_chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                       <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <h4 class="card-title mb-4">Monthly Expenses & Paid Summary</h4>
                                </div>
                                <div class="card-body py-0 px-2">
                                    <div id="mixed_chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div>


                        


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
                        <!-- end row -->
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div>

        
        <!-- end row -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var months = @json($months);
        var expenses = @json($totals);
        var paid = @json($paidTotals);

        var options = {
            chart: {
                height: 380,
                type: 'line',
                stacked: false,
                toolbar: { show: false }
            },
            stroke: {
                width: [0, 0, 4],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '40%',
                    borderRadius: 5
                }
            },
            colors: ['#3bafda', '#1abc9c', '#f1556c'], // Blue, Green, Red
            series: [
                {
                    name: 'Expenses',
                    type: 'column',
                    data: expenses
                },
                {
                    name: 'Paid',
                    type: 'column',
                    data: paid
                },
                {
                    name: 'Paid Trend',
                    type: 'line',
                    data: paid
                }
            ],
            xaxis: {
                categories: months
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [2] // Only show labels on the line
            },
            yaxis: {
                title: {
                    text: 'Amount'
                },
                labels: {
                    formatter: function (value) {
                        return '$' + value.toLocaleString();
                    }
                }
            },
            title: {
                text: 'Monthly Expenses vs Paid',
                align: 'left'
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (val) {
                        return "$" + val.toLocaleString();
                    }
                }
            },
            legend: {
                position: 'top'
            }
        };

        var chart = new ApexCharts(document.querySelector("#mixed_chart"), options);
        chart.render();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var months = @json($months);
        var expenses = @json($totals);

        var options = {
            chart: {
                height: 350,
                type: 'line',
                stacked: false,
                toolbar: { show: false }
            },
            stroke: {
                width: [0, 4],
                curve: 'smooth'
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                    borderRadius: 4
                }
            },
            colors: ['#3bafda', '#1abc9c'],
            series: [
                {
                    name: 'Expenses (Bar)',
                    type: 'column',
                    data: expenses
                },
                {
                    name: 'Expenses Trend (Line)',
                    type: 'line',
                    data: expenses
                }
            ],
            xaxis: {
                categories: months
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [1]
            },
            yaxis: {
                title: {
                    text: 'Amount'
                },
                labels: {
                    formatter: function (value) {
                        return '$' + value.toLocaleString();
                    }
                }
            },
            title: {
                text: 'Monthly Expenses',
                align: 'left'
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (val) {
                        return "$" + val.toLocaleString();
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#mixed_chart"), options);
        chart.render();
    });
</script>





<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection