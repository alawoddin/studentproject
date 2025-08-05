@extends('frontend.teacher_dashboard')

@section('teacher')



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
            $classTime = $paidGroup->first()->student?->time ?? 'N/A';
            $studentCount = $paidGroup->unique('student_id')->count();
        @endphp
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img class="rounded-circle img-thumbnail avatar-lg mr-3" style="margin-right: 10px" src="https://tawanatechnology.com/frontend/images/logo5.png" alt="Class Logo">
                        <div>
                            <a href="{{ route('teacher.subject.index', ['id' => $teacher->id, 'subject_id' => $subjectIdCard]) }}">
                                <h5 class="mt-0 font-size-18 mb-1 text-primary">Class: {{ $subjectName }}</h5>
                            </a>
                            <p class="mb-1 text-muted font-size-14">
                                <i class="ri-time-line"></i> <strong>Time:</strong> {{ $classTime }}
                            </p>
                            <p class="mb-0 font-size-14">
                                <span class="badge bg-success">Students: {{ $studentCount }}</span>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <a href="{{ route('teacher.subject.index', ['id' => $teacher->id, 'subject_id' => $subjectIdCard]) }}" class="btn btn-outline-primary btn-sm">
                            <i class="ri-calendar-check-line"></i> Manage Attendance
                        </a>
                        {{-- Add more class actions here if needed --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
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


        

     





    </div>


@endsection