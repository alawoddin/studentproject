@extends('admin.admin_dashboard')
@section('admin')

    <h4>Edit Expense</h4>

    <form action="{{ route('update.expense', $expense->id) }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $expense->title }}">
        </div>
        <div>
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" value="{{ $expense->amount }}">
        </div>
        <div>
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $expense->date }}">
        </div>
        <div>
            <label>Note</label>
            <textarea name="note" class="form-control">{{ $expense->note }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Update Expense</button>
    </form>

@endsection