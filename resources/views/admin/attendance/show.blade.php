@extends('layouts.app')

@section('content')
<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<div class="container mt-4">
    <div class="card shadow rounded-3 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Attendance Transcript</h2>
            <button class="btn btn-primary no-print" onclick="window.print()">
                <i class="bi bi-printer"></i> Print
            </button>
        </div>
        <div class="border p-3 mb-4 rounded bg-light">
            <h4 class="mb-1">Student Name: <strong>{{ $student->name }}</strong></h4>
            <h5 class="mb-0 text-muted">ID: {{ $student->id }}</h5>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Attendance Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->attendances as $key => $attendance)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M, Y') }}</td>
                        <td>
                            @if($attendance->status === 'present')
                                <span class="badge bg-success">Present</span>
                            @else
                                <span class="badge bg-danger">Absent</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end mt-4 no-print">
            <a href="{{ route('attendance.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>
@endsection
