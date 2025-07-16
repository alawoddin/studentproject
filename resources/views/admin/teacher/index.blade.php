@extends('admin.admin_dashboard')

@section('admin')

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

                <div class="table-responsive">
                    <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Sl</th>
                                <th>Department</th>
                                <th>Subject Name</th>
                                <th>Students</th>
                                <th>Total Fees</th>
                                <th>Paid</th>
                                {{-- <th>Remaining Fees</th> --}}
                                <th>Date</th>
                                <th>Paid status </th>
                                <th class="all">Action</th>
                                <th>Total of Salary</th>
                            </tr>
                        </thead>

                        @php
                            $totalPaid = $paids->sum('paid');
                            $percentage = $teacher->percentage;
                            $commission = $totalPaid * $percentage / 100;
                        @endphp

                        <tbody>
                            @foreach ($paids as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->department->depart_name }}</td>
                                    <td>{{ $item->subject->subject_name ??'null' }}</td>
                                    <td>{{ $item->student->name }}</td>
                                    <td>{{ $item->total_fees }}</td>
                                    <td>{{ $item->paid }}</td>
                                    {{-- <td>{{ $item->remaining_Fees }}</td> --}}
                                    <td>{{ $item->paid_date }}</td>

                                      <td>
                                        @if ($teacher->status == 1)
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-danger">Unpaid</span>
                                        @endif
                                      </td>

                                       <td style="text-align:center; font-size: 20px;">

                                            @if($item->status === 'paid')
                                                <a href="{{ route('deactivate.paid', $item->id) }}">
                                                    <i class="fas fa-check btn btn-primary waves-effect waves-light"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('deactivate.paid', $item->id) }}">
                                                    <i class="fas fa-times btn btn-primary waves-effect waves-light"></i>
                                                </a>
                                            @endif
                                        </td>

                                    @if ($loop->first)
                                        <td rowspan="{{ $paids->count() }}" class="text-center font-bold bg-blue-50">
                                            {{ $commission }} AFG
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <form action="{{ route('store.expense') }}" method="POST">
                            @csrf

                            {{-- === Expense Info === --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input class="form-control" value="{{ $teacher->first_name }}" name="title" type="text" placeholder="Expense Title"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Amount</label>
                                    <input class="form-control" value="{{ $commission }}" name="amount" type="number" step="0.01"
                                        placeholder="Amount in AF" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Date</label>
                                    <input class="form-control" name="date" type="date" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Note (Optional)</label>
                                    <textarea name="note" class="form-control" rows="1" placeholder="Note..."></textarea>
                                </div>
                            </div>

                            {{-- === Submit Button === --}}
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Expense</button>

                        </form>
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
