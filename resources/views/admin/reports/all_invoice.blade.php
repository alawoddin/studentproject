<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Bill Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        @media print {
            @page {
                size: A4;
                margin: 20mm;
            }
        }

        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #fff;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .logo {
            width: 200px;
            height: auto;
        }

        .table td {
            padding: 8px;
            vertical-align: middle;
        }

        .footer {
            font-size: 14px;
            margin-top: 20px;
        }

        .fw-bold {
            font-weight: bold;
        }

        .header-title {
            text-align: center;
        }

        @media (max-width: 576px) {
            .header-title {
                text-align: center;
                margin-top: 10px;
            }

            .d-flex {
                flex-direction: column !important;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <!-- Header -->
        <div class="d-flex justify-content-around align-items-center mb-4 flex-wrap">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdI-PfLqNRTO4RykwkjHmAk6tLlY8Q3RZlJA&s"
                alt="Logo" class="logo" />




            <div class="bill_number" style="color: green; font-weight: bold">
                Bill NO# <span> {{ $Paid->id }}</span>
            </div>
        </div>

        <!-- Table -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="fw-bold">Register Date</td>
                    <td>{{ $Paid->paid_date }}</td>
                    <td class="fw-bold">First Name</td>
                    <td>{{ $Paid->student->name }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Subject</td>
                    <td>{{ $Paid->subject->subject_name }}</td>
                    <td class="fw-bold">Father Name</td>
                    <td>{{ $Paid->student->father_name }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Amount</td>
                    <td>{{ $Paid->total_fees }}</td>
                    <td class="fw-bold">Paid Fee</td>
                    <td>{{ $Paid->paid }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Remain Fee</td>
                    <td>{{ $Paid->remaining_Fees }}</td>
                    <td class="fw-bold">Time</td>
                    <td>{{ $Paid->student->time }}</td>
                </tr>
            </tbody>
        </table>
        <!-- Footer -->
        <!-- Footer -->
        <div class="footer">
            <p>
                <i class="bi bi-building text-success"></i>
                Tawanatechnology.com
            </p>
            <p>
                <i class="bi bi-telephone-fill text-success"></i>
                +93(0)788077685
            </p>

            <p>
                <i class="bi bi-geo-alt-fill text-success"></i>
                Charahe Polsorkh, Amir Center, Manzel 3rd.
            </p>
        </div>
    </div>
</body>

</html>
