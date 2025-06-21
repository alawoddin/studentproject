@extends('admin.admin_dashboard')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Expense Entry</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Expense</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expense Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Fill Expense Info</h4>
                        <form action="{{ route('store.expense') }}" method="POST">
                            @csrf

                            {{-- === Expense Info === --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input class="form-control" name="title" type="text" placeholder="Expense Title"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Amount</label>
                                    <input class="form-control" name="amount" type="number" step="0.01"
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

    </div>

@endsection
