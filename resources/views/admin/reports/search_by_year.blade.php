<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TAWANA Interactive Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8f9fa;
            padding: 40px;
        }

        .report-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
            animation: fadeInUp 0.6s ease;
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #198754;
            margin-bottom: 20px;
            border-left: 5px solid #198754;
            padding-left: 15px;
        }

        table.dataTable thead {
            background-color: #198754;
            color: white;
        }

        .total-expense {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: right;
            color: #dc3545;
            margin-top: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            font-weight: bold;
            color: #198754;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .footer {
            text-align: center;
            font-size: 0.9rem;
            color: #999;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>TAWANA Project Report</h1>
        <p><strong>Email:</strong> TAWANA@gmail.com | <strong>Mob:</strong> 0730803820 | <strong>Location:</strong>
            Kabul, Afg</p>
    </div>

    @php
        $paids = App\Models\Paid::sum('paid');
    @endphp
    <div class="report-section">
        <div class="section-title"><i class="fas fa-briefcase"></i> All Student Info</div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Std name</th>
                    <th>Department</th>
                    <th>subject</th>
                    <th>Teacher</th>
                    <th>Total Fess</th>
                    <th>Paid</th>
                    <th>remains_fee</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Paid as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->student->name }}</td>
                        <td>{{ $item->department->depart_name }}</td>
                        <td>{{ $item->subject->subject_name }}</td>
                        <td>{{ $item->teacher->first_name }}</td>
                        <td>{{ $item->total_fees }}</td>
                        <td>{{ $item->paid }}</td>
                        <td>{{ $item->remaining_Fees }}</td>
                        {{-- <td>{{ number_format($paids, 2) }} AFG</td> --}}
                    </tr>
                @endforeach
                <tr class="font-bold bg-gray-100">
                    <td colspan="7" class="text-right fw-bold">Total Paid:</td>
                    <td class="fw-bold">{{ number_format($paids, 2) }} AFG</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="report-section">
        <div class="section-title"><i class="fas fa-chart-line"></i>Teacher Info </div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Father Name</th>
                    <th>Roll ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>National ID</th>
                    <th>percentage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacher as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->father_name }}</td>
                        <td>{{ $item->roll_id }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->department->depart_name }}</td>
                        <td>{{ $item->national_id }}</td>
                        <td>{{ $item->percentage }}</td>
                        {{-- <td>{{ number_format($paids, 2) }} AFG</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="report-section">
        <div class="section-title"><i class="fas fa-money-bill"></i> Expense Info</div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $total = App\Models\Expense::sum('amount');
                @endphp
                @foreach ($expense as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->note }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total-expense">Total Expense Price: {{ $total }}</div>
    </div>

    <div class="report-section">
        <div class="section-title"><i class="fas fa-user-friends"></i> Stuff  Info</div>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Father Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stuff as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->father_name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email  }}</td>
                    <td>{{ $item->salary  }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">© 2025 TAWANA Report System</div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contractTable, #projectInfoTable, #expenseTable, #partnerTable').DataTable({
                paging: false,
                searching: true,
                info: false
            });
        });
    </script>
</body>

</html>
