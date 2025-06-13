@extends('admin.admin_dashboard')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">paid Admission</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Student</a></li>
                            <li class="breadcrumb-item active">Admission</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Admission Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Fill Student Info</h4>
                        <form action="{{ route('store.paid') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">student</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="student" type="text" placeholder="Name">
                                    </div>
                                </div>

                                <!-- Lastname -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">department</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="department" type="text" placeholder="department">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">subject</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="subject" type="text" placeholder="subject">
                                    </div>
                                </div>

                                <!-- Lastname -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">teacher</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="teacher" type="text" placeholder="teacher">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">total_fees</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="total_fees" type="text" placeholder="total_fees">
                                    </div>
                                </div>

                                <!-- Lastname -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">Paid</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="paid" type="text" placeholder="paid">
                                    </div>
                                </div>
                            </div>
                            {{-- row 3 --}}
                            <div class="row mb-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">remaining_Fees</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="remaining_Fees" type="number"
                                            placeholder="remaining_Fees">
                                    </div>
                                </div>

                                <!-- Lastname -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">entry_date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="entry_date" type="datetime-local"
                                            placeholder="entry_date">
                                    </div>
                                </div>
                            </div>
                            {{-- row 4 --}}
                            <div class="row mb-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label class="col-sm-2 col-form-label">paid_date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="paid_date" type="datetime-local"
                                            placeholder="paid_date">
                                    </div>
                                </div>

                            </div>








                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add piad</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- jQuery Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function calculateRemaining() {
            let amount = parseFloat($('#amount').val()) || 0;
            let paid = parseFloat($('#paid').val()) || 0;
            let remaining = amount - paid;
            $('#remaining_fees').val(remaining >= 0 ? remaining : 0);
        }

        $(document).ready(function () {
            // Recalculate on input changes
            $('#amount, #paid').on('input', calculateRemaining);

            // Initialize on page load
            calculateRemaining();
        });
    </script>
@endsection