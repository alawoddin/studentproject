<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }

        .card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .student-avatar {
            width: 40px;
            height: 40px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <header class="bg-white rounded-xl shadow-sm p-6 mb-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden">
                        <!-- <i class="fas fa-user-tie text-blue-600 text-3xl"></i> -->
                        <img class="header-profile-user"
                            src="{{ !empty($teacher->photo) ? asset($teacher->photo) : asset('uploads/no_image.png') }}"
                            alt="Header Avatar">
                    </div>
                    <div class="ml-4">
                        <h1 class="text-2xl font-bold text-gray-800">
                            {{ $teacher->first_name }}
                        </h1>
                        <p class="text-gray-600">{{ $teacher->roll_id }}</p>

                    </div>
                </div>



                <div class="bg-blue-50 text-blue-800 px-4 py-2 rounded-lg">
                    <p class="flex items-center">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>
                        <span>{{ $teacher->department->depart_name }}</span>
                    </p>
                </div>
            </div>
        </header>

 {{--       @php
            use App\Models\Paid;

            // Get all Paid records with student and subject
            $paids = Paid::with(['student', 'subject'])->get();

            // Group by subject name
            $groupedPaids = $paids->groupBy(function($item) {
                return $item->subject->subject_name ?? 'No Subject';
            });

        @endphp
--}}

        @php
            use App\Models\Paid;

            $paids = Paid::with(['student', 'subject'])
                ->where('teacher_id', $teacher->id)
                ->where('status', 'paid')
                ->get();

            $groupedPaids = $paids->groupBy(function($item) {
                return $item->subject->subject_name ?? 'No Subject';
            });
        @endphp

        <!-- Class Cards -->
       <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            @foreach ($groupedPaids as $subjectName => $paidGroup)
                @php
                    $subjectIdCard = $paidGroup->first()->subject->id ?? null;
                @endphp

                <a href="{{ route('teacher.index', ['id' => $teacher->id, 'subject_id' => $subjectIdCard]) }}" class="block">
                    <div class="card bg-white rounded-xl p-6 h-full">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-gray-700">{{ $subjectName }}</h3>
                                <p class="text-gray-500 text-sm mb-4">Time: {{ $paidGroup->first()->student?->time  }}</p>
                            </div>
                            <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">
                                Active
                            </div>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                            <div class="flex items-center text-yellow-500">
                                <i class="fas fa-users mr-1"></i>
                                <span>{{ $paidGroup->unique('student_id')->count() }}</span>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800 text-sm">View Details</button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>






    </div>

@php
    //  $paids = Paid::with('student')->first()->limit(5)->get();
    $paids = Paid::with('student')->limit(5)->get();
    //  $paid = Paid::all();
    $paid = Paid::orderBy('order_month', 'desc')->first();
@endphp

    <!-- Students Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-semibold text-gray-800">
                Advanced Web Development Students
            </h2>
            <p class="text-gray-600 mt-1 text-sm">{{ $paid->order_month }} {{ $paid->order_year }} - {{ $teacher->department->depart_name }}</p>
        </div>


        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            #
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Student Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Student last_name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            eamil
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            time
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            phone
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($paids as $key => $item )
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $key + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">

                                <div>
                                    <div class="text-sm font-medium text-gray-900">

                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $item->student->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->student->lastname }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->student->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ $item->student->time }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <p>{{ $item->student->phone_number }}</p>
                        </td>
                    </tr>
                    <!-- More rows... -->
        @endforeach

                </tbody>
            </table>
        </div>

    </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart general settings
        Chart.defaults.font.family =
            "Segoe UI, Tahoma, Geneva, Verdana, sans-serif";
        Chart.defaults.font.size = 12;

        // Grades Chart
        const gradesCtx = document.getElementById("gradesChart").getContext("2d");
        const gradesChart = new Chart(gradesCtx, {
            type: "bar",
            data: {
                labels: ["Web Dev", "React", "UI/UX", "Databases"],
                datasets: [
                    {
                        label: "Average Grades",
                        data: [16.8, 17.5, 18.2, 15.9],
                        backgroundColor: [
                            "rgba(59, 130, 246, 0.6)",
                            "rgba(16, 185, 129, 0.6)",
                            "rgba(139, 92, 246, 0.6)",
                            "rgba(245, 158, 11, 0.6)",
                        ],
                        borderColor: [
                            "rgba(59, 130, 246, 1)",
                            "rgba(16, 185, 129, 1)",
                            "rgba(139, 92, 246, 1)",
                            "rgba(245, 158, 11, 1)",
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 20,
                        ticks: {
                            stepSize: 2,
                        },
                    },
                },
            },
        });

        // Attendance Chart
        const attendanceCtx = document
            .getElementById("attendanceChart")
            .getContext("2d");
        const attendanceChart = new Chart(attendanceCtx, {
            type: "line",
            data: {
                labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
                datasets: [
                    {
                        label: "Present",
                        data: [22, 19, 24, 20, 22],
                        backgroundColor: "rgba(16, 185, 129, 0.2)",
                        borderColor: "rgba(16, 185, 129, 1)",
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                    },
                    {
                        label: "Absent",
                        data: [2, 5, 0, 4, 2],
                        backgroundColor: "rgba(239, 68, 68, 0.2)",
                        borderColor: "rgba(239, 68, 68, 1)",
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                    },
                ],
            },
            options: {
                responsive: true,
                interaction: {
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5,
                        },
                    },
                },
            },
        });
    </script>
</body>

</html>
