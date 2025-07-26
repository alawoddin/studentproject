
@extends('frontend.teacher_dashboard')

@section('teacher')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Attendance</title>
    <style>
        body {
            padding: 20px;
            background: #e9ecef;
        }

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            background: #fff;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            min-width: 1200px;
        }

        th,
        td {
            white-space: nowrap;
            vertical-align: middle;
            text-align: center;
        }

        th:first-child,
        td:first-child {
            text-align: left;
            min-width: 140px;
        }

        th:nth-child(2),
        td:nth-child(2) {
            min-width: 120px;
            text-align: left;
        }

        th:nth-child(3),
        td:nth-child(3) {
            min-width: 80px;
        }

        button {
            margin-bottom: 15px;
        }

        h2 {
            color: #343a40;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="mb-4 text-center">Student Attendance</h2>

        <form id="attendanceForm">
            <button type="submit" class="btn btn-success mb-3">Submit Attendance</button>

            <div class="table-wrapper">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Time</th>
                            <th>2025-07-01</th>
                            <th>2025-07-02</th>
                            <th>2025-07-03</th>
                            <th>2025-07-04</th>
                            <th>2025-07-05</th>
                            <th>2025-07-06</th>
                            <th>2025-07-07</th>
                            <th>2025-07-08</th>
                            <th>2025-07-09</th>
                            <th>2025-07-10</th>
                            <th>2025-07-11</th>
                            <th>2025-07-12</th>
                            <th>2025-07-13</th>
                            <th>2025-07-14</th>
                            <th>2025-07-15</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($atten as $key => $student)
                                <tr>

                                <td>{{ $student->id ?? 'No ID' }}</td>
                                <td class="text-start">{{ $student->name ?? 'No Name' }}</td>
                                <td class="text-start">{{ $student->time ?? 'No Time' }}</td>
                                <td><input type="checkbox" name="present_1_2025-07-01" /></td>
                                  <td><input type="checkbox" name="present_1_2025-07-02" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-03" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-04" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-05" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-06" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-07" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-08" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-09" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-10" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-11" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-12" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-13" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-14" /></td>
                            <td><input type="checkbox" name="present_1_2025-07-15" /></td>
                                </tr>
                            @endforeach
                        
                    </tbody>
                </table>
            </div>
        </form>
    </div>


 

    {{-- <script>
        document.getElementById('attendanceForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(this);
            const attendance = {};
            for (let [key, value] of formData.entries()) {
                attendance[key] = value;
            }
            Swal.fire({
                title: 'Success!',
                text: 'Attendance has been submitted successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script> --}}
    <script>
    document.getElementById('attendanceForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        const attendance = {};

        // Loop through form data
        for (let [key, value] of formData.entries()) {
            attendance[key] = value;
        }

        // Handle unchecked checkboxes explicitly
        const checkboxes = this.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            if (!checkbox.checked) {
                attendance[checkbox.name] = 'unchecked';
            } else {
                attendance[checkbox.name] = 'checked';
            }
        });

        // Show success message
        Swal.fire({
            title: 'Success!',
            text: 'Attendance has been submitted successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });

        console.log(attendance); // Optional: for debugging
    });
</script>


</body>

</html>

@endsection