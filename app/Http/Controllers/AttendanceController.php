<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function AllAttendance()
    {
        $atten = Student::all();
        return view('frontend.attendance.attendance', compact('atten'));
    }

    public function AddAttendance()
    {
        $students = Student::all();
        return view('frontend.attendance.add', compact('students'));
    }

    public function StoreAttendance(Request $request)
    {
        $presentStudents = $request->present ?? [];
        $date = $request->date;

        $students = Student::all();

        foreach ($students as $student) {
            Attendance::create([
                'student_name' => $student->name,
                'attendance_date' => $date,
                'is_present' => isset($presentStudents[$student->id]) ? true : false,
            ]);
        }

        return redirect()->route('add.attendance')->with('success', 'حاضری موفقانه ثبت شد!');
    }
}
