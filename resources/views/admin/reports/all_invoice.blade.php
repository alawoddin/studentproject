<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Fee Receipt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts for nicer typography -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom tag style for the ID badge */
        .id-badge {
            background-color: rgba(255 255 255 / 0.35);
            color: #e0e7ff;
            font-weight: 600;
        }

        /* Graduation cap icon style */
        .grad-cap {
            filter: drop-shadow(0 0 1px rgb(0 0 0 / 0.12));
        }

        /* PAID stamp style */
        .paid-stamp {
            display: inline-block;
            color: #34d399;
            /* Tailwind green-400 */
            font-weight: 700;
            font-size: 1.1rem;
            border: 2px dashed #34d399;
            padding: 0.25rem 0.75rem;
            border-radius: 0.25rem;
            transform: rotate(-8deg);
            user-select: none;
        }

        /* Print styles - hide button, adjust container */
        @media print {
            button#print-btn {
                display: none;
            }

            body {
                background: white;
            }

            .print-container {
                box-shadow: none !important;
                margin: 0;
                border-radius: 0;
            }
        }
    </style>
</head>

{{-- @php
$paids = App\Models\Paid::all();
@endphp --}}

<body class="bg-gray-100 p-4 flex justify-center">

    <div class="print-container max-w-4xl w-full bg-white rounded-lg shadow-md p-6 sm:p-10">
        <!-- Header -->
        <div class="bg-blue-600 rounded-t-lg px-6 py-5 relative overflow-visible">
            <h1 class="text-white text-3xl font-extrabold">Student Fee Receipt</h1>
            <p class="text-blue-200 mt-1 select-none">Academic Year {{ $Paid->order_year }}</p>
            <div
                class="absolute top-5 right-5 flex items-center space-x-2 id-badge rounded-full px-3 py-1 text-sm min-w-[115px] justify-center">
                <span>ID: STU-{{ $Paid->order_year }} - {{ $Paid->id }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="grad-cap h-6 w-6 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 9l-9 5-9-5" />
                </svg>
            </div>
        </div>

        <!-- Info Block -->
        <div class="bg-gray-50 rounded-lg p-6 mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Student Information -->
            <div>
                <h2 class="font-semibold text-lg mb-3">Student Information</h2>
                <p><span class="font-semibold">Name:</span> {{ $Paid->student->name }}</p>
                <p><span class="font-semibold">Department:</span> {{ $Paid->department->depart_name }}</p>
                <p><span class="font-semibold">Receipt Date:</span> {{ $Paid->order_month }} {{ $Paid->order_year }}</p>
            </div>
            <!-- Institution Details -->
            <div>
                <h2 class="font-semibold text-lg mb-3">TAWANA Details</h2>
                <p><span class="font-semibold">Teacher Name</span></p>
                <p>{{ $Paid->teacher->first_name }}</p>
                <p>Fees: {{ $Paid->total_fees }}</p>
                <p>Phone: {{ $Paid->student->phone_number }}</p>
            </div>
        </div>

        <!-- Course Details Table -->
        <div class="mt-8">
            <h3 class="font-semibold text-lg mb-3">Course Details</h3>
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="w-full text-left border-collapse table-fixed min-w-[480px]">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th class="p-3 font-semibold w-1/2">Subject</th>
                            <th class="p-3 font-semibold w-1/2">Teacher</th>
                            <th class="p-3 font-semibold w-1/3">Fee Amount</th>
                            <th class="p-3 font-semibold w-1/3">paid</th>
                            <th class="p-3 font-semibold w-1/3">remaining_Fees</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 even:bg-gray-50">
                            <td class="p-3">{{ $Paid->subject->subject_name }}</td>
                            <td class="p-3">{{ $Paid->teacher->first_name }}</td>
                            <td class="p-3">{{ $Paid->total_fees }}</td>
                            <td class="p-3">{{ $Paid->paid }}</td>
                            <td class="p-3 ">{{ $Paid->remaining_Fees }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Fee summary + paid stamp row -->
        <div
            class="bg-gray-50 rounded-lg flex flex-col md:flex-row justify-between items-center mt-8 p-6 space-y-4 md:space-y-0">
            <div class="self-start">
                <div class="paid-stamp select-none">PAID</div>
            </div>
            <div class="text-right space-y-1 w-full max-w-xs">
                <p>Total Fee: <span class="font-semibold text-blue-700">{{ $Paid->total_fees }}</span></p>
                <p>Paid Amount: <span class="font-semibold text-green-600">{{ $Paid->paid }}</span></p>
                <p>Remaining Balance: <span class="font-semibold text-red-600">{{ $Paid->remaining_Fees }}</span></p>

                {{-- @if ($remaining_Fees > 0)
                <p>Remaining Balance: <span class="font-semibold text-red-600">{{ $Paid->remaining_Fees }}</span></p>
                @elseif($remaining_Fees < 0)
                <p>Remaining Balance: <span class="font-semibold ">{{ $Paid->remaining_Fees }}</span></p>
                @endif --}}
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-6 flex flex-col md:flex-row justify-between text-sm text-gray-700 space-y-4 md:space-y-0">
            <div class="max-w-md">
                <p>This is a computer generated receipt and does not require a physical signature.</p>
                <p class="mt-2">For any queries regarding this receipt, please contact the accounts department.</p>
            </div>
            <div class="flex justify-end">
                <button id="print-btn"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-2 py-1 rounded inline-flex items-center"
                    onclick="window.print()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 9V2h12v7M6 18h12v4H6v-4zm0-9h12v6H6V9z" />
                    </svg>
                    Print Receipt
                </button>
            </div>
        </div>
    </div>

</body>

</html>
