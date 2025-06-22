@extends('admin.admin_dashboard')
@section('admin')

    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h4 class="card-title">View Expenses</h4>
                <a href="{{ route('add.expense') }}" class="btn btn-primary waves-effect waves-light mb-4">Create
                    Expense</a>
            </div>

            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th class="all">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($expenses as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->amount }} AF</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->note }}</td>
                            <td style="text-align:center; font-size: 20px;">
                                <a href="{{ route('edit.expense', $item->id) }}"><i class="fas fa-edit btn btn-primary"></i></a>
                                <a href="{{ route('delete.expense', $item->id) }}" id="delete"><i
                                        class="fas fa-trash-alt btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
