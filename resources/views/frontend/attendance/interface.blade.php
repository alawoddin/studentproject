
@extends('frontend.teacher_dashboard')

@section('teacher')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<<<<<<< HEAD
    <title>Live Attendance Count</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
=======
    <title>Student Attendance</title>
>>>>>>> 8387b81a1e75648c3487114a51eb30c755fd2feb
    <style>
        body {
            padding: 20px;
            height: 100vh;
            background: url("https://png.pngtree.com/background/20210709/original/pngtree-sign-in-check-in-attendance-wall-annual-meeting-background-picture-image_937018.jpg");
            background-size: cover;
            background-position: center;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-wrapper {
            overflow-x: auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 15px;
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(3px);
        }

        h2 {
            font-weight: bold;
            color: #2c3e50;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            text-align: center;
            white-space: nowrap;
        }

        th:first-child,
        td:first-child,
        th:nth-child(2),
        td:nth-child(2) {
            text-align: left;
        }

        .count-box {
            margin-top: 5px;
            font-size: 0.9rem;
        }

        .present {
            color: green;
        }

        .absent {
            color: red;
        }

        table {
            min-width: 1200px;
        }

        .submit-btn {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            cursor: pointer;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .submit-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Student Attendance</h2>

        <div class="table-wrapper">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>ID</th>
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
                        <th>Summary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start">Ahmad</td>
                        <td class="text-start">Physics</td>
                        <td>1</td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td><input type="checkbox" /></td>
                        <td>
                            <div class="count-box">
                                <span class="present">Present: <span class="present-count">0</span></span><br />
                                <span class="absent">Absent: <span class="absent-count">18</span></span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

<<<<<<< HEAD
        <button class="submit-btn" onclick="submitAttendance()">
            Submit Attendance
        </button>
    </div>

    <script>
        function updateCounts(row) {
            const checkboxes = row.querySelectorAll("input[type='checkbox']");
            const presentCount = Array.from(checkboxes).filter(
                (cb) => cb.checked
            ).length;
            const totalDays = checkboxes.length;
            const absentCount = totalDays - presentCount;

            row.querySelector(".present-count").innerText = presentCount;
            row.querySelector(".absent-count").innerText = absentCount;
        }

        function submitAttendance() {
            alert("Attendance submitted successfully!");
            // Optionally send data to server here
        }

        const studentRows = document.querySelectorAll("tbody tr");
        studentRows.forEach((row) => {
            const checkboxes = row.querySelectorAll("input[type='checkbox']");
            checkboxes.forEach((cb) => {
                cb.addEventListener("change", () => updateCounts(row));
            });
            updateCounts(row); // Initial calculation
=======
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
>>>>>>> 8387b81a1e75648c3487114a51eb30c755fd2feb
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
<<<<<<< HEAD
=======

@endsection
>>>>>>> 8387b81a1e75648c3487114a51eb30c755fd2feb
