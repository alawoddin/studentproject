@extends('admin.admin_dashboard')
@section('admin')

    <div class="container-fluid">

        <!-- Title -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Financial Report</h4>
                </div>
            </div>
        </div>

        <!-- Filter Form -->
        <form action="{{ route('report.filter') }}" method="POST" class="row mb-4">
            @csrf
            <div class="col-md-3">
                <select name="filter" class="form-select" onchange="this.form.submit()">
                    <option value="day" {{ (isset($filter) && $filter == 'day') ? 'selected' : '' }}>Today</option>
                    <option value="week" {{ (isset($filter) && $filter == 'week') ? 'selected' : '' }}>This Week</option>
                    <option value="month" {{ (isset($filter) && $filter == 'month') ? 'selected' : '' }}>This Month</option>
                    <option value="year" {{ (isset($filter) && $filter == 'year') ? 'selected' : '' }}>This Year</option>
                </select>
            </div>
        </form>

        <!-- Report Summary Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light border-0">
                    <div class="card-body">
                        <h5>Total Income</h5>
                        <h3 class="text-success">{{ number_format($totalIncome, 2) }} AF</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-light border-0">
                    <div class="card-body">
                        <h5>Total Expenses</h5>
                        <h3 class="text-danger">{{ number_format($totalExpense, 2) }} AF</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-light border-0">
                    <div class="card-body">
                        <h5>Net Balance</h5>
                        <h3 class="text-primary">{{ number_format($netIncome, 2) }} AF</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
