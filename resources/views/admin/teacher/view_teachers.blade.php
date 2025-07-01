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
                        <span>{{ $teacher->department->depart_name }}</span>

                    </div>
                </div>



                <div class="bg-blue-50 text-blue-800 px-4 py-2 rounded-lg">
                    <p class="flex items-center">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>
                        <span>{{ $studentCount }}</span>
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
                                <p class="text-gray-500 text-sm mb-4">Schedule: {{ $paidGroup->first()->student?->time ?? 'N/A' }}</p>
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



    {{-- <!-- Class 2 -->
    <div class="card bg-white rounded-xl p-6">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-medium text-gray-700">
                    css class
                </h3>
                <p class="text-gray-500 text-sm mb-4">Sun & Tue 12:00-14:00</p>
            </div>
            <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">
                New
            </div>
        </div>
        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
            <div class="flex items-center text-yellow-500">
                <i class="fas fa-users mr-1"></i>
                <span>18 Students</span>
            </div>
            <button class="text-blue-600 hover:text-blue-800 text-sm">
                View Details
            </button>
        </div>
    </div> --}}

    <!-- Class 3 -->
    {{-- <div class="card bg-white rounded-xl p-6">
        <div class="flex justify-between items-start">
            <div>Boostrap 5 </h3>
                <p class="text-gray-500 text-sm mb-4">Mon & Thu 10:00-12:00</p>
            </div>
            <div class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs">
                Combined
            </div>
        </div>
        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
            <div class="flex items-center text-yellow-500">
                <i class="fas fa-users mr-1"></i>
                <span>12 Students</span>
            </div>
            <button class="text-blue-600 hover:text-blue-800 text-sm">
                View Details
            </button>
        </div>
    </div>
    <!-- Class 4 -->
    <div class="card bg-white rounded-xl p-6">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-medium text-gray-700">
                    javascript class
                </h3>
                <p class="text-gray-500 text-sm mb-4">Sun & Tue 12:00-14:00</p>
            </div>
            <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs">
                New
            </div>
        </div>
        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
            <div class="flex items-center text-yellow-500">
                <i class="fas fa-users mr-1"></i>
                <span>18 Students</span>
            </div>
            <button class="text-blue-600 hover:text-blue-800 text-sm">
                View Details
            </button>
        </div>
    </div>
    <!-- Class 5 -->
    <div class="card bg-white rounded-xl p-6">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-medium text-gray-700">React </h3>
                <p class="text-gray-500 text-sm mb-4">Mon & Thu 10:00-12:00</p>
            </div>
            <div class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs">
                Combined
            </div>
        </div>
        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
            <div class="flex items-center text-yellow-500">
                <i class="fas fa-users mr-1"></i>
                <span>12 Students</span>
            </div>
            <button class="text-blue-600 hover:text-blue-800 text-sm">
                View Details
            </button>
        </div>
    </div>
    <!-- Class 6 -->
    <div class="card bg-white rounded-xl p-6">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-lg font-medium text-gray-700">Github class</h3>
                <p class="text-gray-500 text-sm mb-4">Sat & Wed 13:30-15:30</p>
            </div>
            <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">
                Active
            </div>
        </div>
        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
            <div class="flex items-center text-yellow-500">
                <i class="fas fa-users mr-1"></i>
                <span>24 Students</span>
            </div>
            <button class="text-blue-600 hover:text-blue-800 text-sm">
                View Details
            </button>
        </div>
    </div> --}}


    <!-- Students Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-semibold text-gray-800">
                Advanced Web Development Students
            </h2>
            <p class="text-gray-600 mt-1 text-sm">Spring 2024 - Group A</p>
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
                            Student ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Sessions
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            1
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/12.jpg" alt=""
                                    class="student-avatar rounded-full mr-3" />
                                <div>
                                    <div class="text-sm font-medium text-gray-900">
                                        Fatemeh Ahmadi
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        f.ahmadi@example.com
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            9823511
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            10/12
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                            <a href="#" class="text-blue-600 hover:text-blue-900 mr-2">View</a>
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Message</a>
                        </td>
                    </tr>
                    <!-- More rows... -->
                </tbody>
            </table>
        </div>
        <!-- Table Footer -->
        <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200">
            <div class="flex-1 flex justify-between sm:hidden">
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </a>
                <a href="#"
                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </a>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">10</span>
                        of
                        <span class="font-medium">24</span>
                        students
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <!-- Pages -->
                        <a href="#" aria-current="page"
                            class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            1
                        </a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            2
                        </a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                            3
                        </a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-800">
                    Class Average Grades
                </h3>
                <select
                    class="border border-gray-300 rounded-md px-3 py-1 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>Spring 2024</option>
                    <option>Fall 2023</option>
                </select>
            </div>
            <div class="h-64">
                <canvas id="gradesChart"></canvas>
            </div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-800">Weekly Attendance</h3>
                <div class="flex">
                    <button class="px-3 py-1 bg-blue-50 text-blue-600 text-sm rounded-md mr-2">
                        Week
                    </button>
                    <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 text-sm rounded-md">
                        Month
                    </button>
                </div>
            </div>
            <div class="h-64">
                <canvas id="attendanceChart"></canvas>
            </div>
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
