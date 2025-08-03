@extends('admin.admin_dashboard')
@section('admin')

<h1>
    @php
    use App\Models\Expense;
    $teacherExpenses = Expense::where('teacher_id', $teacher->id)->get();
@endphp
    
</h1>

<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0"> {{ $teacher->first_name }}</h4>

                                    

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                         @php
            use App\Models\Paid;

            $paids = Paid::with(['student', 'subject'])
                ->where('teacher_id', $teacher->id)
                ->where('status', 'paid')
                ->get();

            $groupedPaids = $paids->groupBy(function($item) {
                return $item->subject->subject_name ?? 'No Subject';
            });
        @endphp
                        <div class="row">
                        @foreach ($groupedPaids as $subjectName => $paidGroup)
                        @php
                            $subjectIdCard = $paidGroup->first()->subject->id ?? null;
                        @endphp
                            
                            <div class="col-lg-4">
                                <div class="card m-b-30">
                                    <div class="card-body">

                                        <div class="d-flex align-items-center">
                                            <img class="d-flex me-3 rounded-circle img-thumbnail avatar-lg" src="https://tawanatechnology.com/frontend/images/logo5.png" alt="Generic placeholder image">
                                            <div class="flex-grow-1">
                                                <a href="{{ route('teacher.index', ['id' => $teacher->id, 'subject_id' => $subjectIdCard]) }}"><h5 class="mt-0 font-size-18 mb-1">{{ $subjectName }}</h5></a>
                                                <p class="text-muted font-size-14">{{ $paidGroup->first()->student?->time  }}</p>

                                                <ul class="social-links list-inline mb-0">
                                                     <li class="list-inline-item">
                                                        <a role="button" class="text-reset" title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips" href="{{ route('teacher.index', ['id' => $teacher->id, 'subject_id' => $subjectIdCard]) }}"><i class="fas fa-clipboard"></i></a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        @endforeach 
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- Main Content -->
<div class="row">
    <!-- Table Section -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    Amount Information About
                    @if(request('subject_id'))
                        <small class="text-muted"> - Filtered by subject</small>
                    @endif
                </h4>

                <div class="table-responsive">
                    <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Sl</th>
                                <th>Data</th>
                                <th>Paid</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacherExpenses as $key => $expense)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $expense->date }}</td>
                                    <td>{{ $expense->amount }}</td>
                                     <th>{{ $expense->note }}</th>
                                </tr>
                            @endforeach

                            <tr class="table-light">
                                <th>N</th>
                                <th>Sum</th>
                                <th>{{ $teacherExpenses->sum('amount') }} Af</th>
                                <th>Note</th>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>

@endsection
