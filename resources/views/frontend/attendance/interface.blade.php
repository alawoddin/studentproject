@extends('frontend.teacher_dashboard')

@section('teacher')

<style>
    .table-responsive {
    overflow-x: auto;
}

.sticky-sl {
    position: sticky;
    left: 0;
    z-index: 5;
    background: #ff0000;
}

.sticky-name {
    position: sticky;
    left: 30px; /* width of Sl column */
    z-index: 6;
    background: #fff;
}

/* keep header above body */
thead th.sticky-sl,
thead th.sticky-name {
    z-index: 10;
    background: #212529; /* bootstrap dark */
    color: #fff;
}
</style>


    <div class="container-fluid">

        <!-- Breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <nav class="fs-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#" class="fw-bold">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $teacher->first_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

 <!-- Main Content -->
<div class="row">
    <!-- Table Section -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    Amount Information
                    @if(request('subject_id'))
                        <small class="text-muted"> - Filtered by subject</small>
                    @endif
                </h4>

                {{-- Subject Filter Links
                <div class="mb-3">
                    <strong>Filter by Subject:</strong>
                    @php

                        $subjectIds = $paids->pluck('subject.id')->unique();
                    @endphp
                    @foreach ($subjectIds as $subjectId)
                        @php
                            $subjectName = $paids->firstWhere('subject.id', $subjectId)?->subject->subject_name ?? 'Unknown';
                        @endphp
                        <a href="{{ route('teacher.index', ['id' => $teacher->id, 'subject_id' => $subjectId]) }}"
                           class="badge bg-primary text-white me-2 {{ request('subject_id') == $subjectId ? 'bg-dark' : '' }}">
                            {{ $subjectName }}
                        </a>
                    @endforeach
                    <a href="{{ route('teacher.index', ['id' => $teacher->id]) }}" class="badge bg-secondary text-white">
                        All
                    </a>
                </div> --}}
        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf

               <div class="table-responsive">
            <table class="table table-bordered table-info align-middle table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th class="sticky-sl">Sl</th>
                            <th class="sticky-name">Name</th>
                            @php
                                // Use the first student's paid_date for all header dates
                                $startDate = $paids->first() ? \Carbon\Carbon::parse($paids->first()->paid_date) : \Carbon\Carbon::today();
                            @endphp
                            @for ($d = 0; $d < 30; $d++)
                                <th class="text-center">{{ $startDate->copy()->addDays($d)->format('d M') }}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $startDate = $paids->first() ? \Carbon\Carbon::parse($paids->first()->paid_date) : \Carbon\Carbon::today();
                @endphp
                @foreach ($paids as $key => $item)
                    <tr>
                        <td class="sticky-sl">{{ $key + 1 }}</td>
                       <td class="sticky-name">
    <span class="fw-bold">{{ $item->student->name }}</span>
</td>
                        @for ($d = 0; $d < 30; $d++)
                            @php
                                $date = $startDate->copy()->addDays($d)->format('Y-m-d');
                                $attendance = \App\Models\Attend::where('student_id', $item->student->id)
                                    ->where('attendance_date', $date)->first();
                                // Disable attendance if student's paid_date is after the current attendance date
                                $isDisabled = \Carbon\Carbon::parse($item->paid_date)->gt($startDate->copy()->addDays($d));
                            @endphp
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <input type="radio"
                                        class="btn-check"
                                        name="attendance[{{ $item->student->id }}][{{ $date }}]"
                                        id="present-{{ $item->student->id }}-{{ $date }}"
                                        value="present"
                                        {{ $attendance && $attendance->status === 'present' ? 'checked' : '' }}
                                        {{ $isDisabled ? 'disabled' : '' }}>
                                    <label class="btn btn-outline-success btn-sm {{ $isDisabled ? 'disabled' : '' }}" for="present-{{ $item->student->id }}-{{ $date }}">
                                        <i class="ri-check-line"></i>
                                    </label>

                                    <input type="radio"
                                        class="btn-check"
                                        name="attendance[{{ $item->student->id }}][{{ $date }}]"
                                        id="absent-{{ $item->student->id }}-{{ $date }}"
                                        value="absent"
                                        {{ $attendance && $attendance->status === 'absent' ? 'checked' : '' }}
                                        {{ $isDisabled ? 'disabled' : '' }}>
                                    <label class="btn btn-outline-danger btn-sm {{ $isDisabled ? 'disabled' : '' }}" for="absent-{{ $item->student->id }}-{{ $date }}">
                                        <i class="ri-close-line"></i>
                                    </label>
                                </div>
                            </td>
                        @endfor
                    </tr>
                @endforeach
                    </tbody>
                </table>
    </div>
            <button type="submit" class="btn btn-primary mt-3">Save Attendance</button>

     </form>
                
                        @php
                            $totalPaid = $paids->sum('paid');
                            $percentage = $teacher->percentage;
                            $commission = $totalPaid * $percentage / 100;
                        @endphp
                <div>
                  <div class="card shadow-sm mb-4">
                        <div class="card-body text-center">
                            <button type="button" class="btn btn-success mb-3" onclick="document.getElementById('salary-box').style.display='block'; this.style.display='none';">
                                <i class="ri-money-dollar-circle-line"></i> Show Salary
                            </button>
                            <div id="salary-box" style="display:none;">
                                <h2 class="text-success fw-bold">
                                    <i class="ri-money-dollar-circle-fill"></i> Salary: {{ number_format($commission) }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Teacher Card -->
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="text-center mt-4">
                            <form action="">
                                <input type="text" value="{{$commission}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>


    </div>

@endsection


 