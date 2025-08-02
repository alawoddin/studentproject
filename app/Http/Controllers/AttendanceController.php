<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Paid;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
public function AllAttendance()
{
    // Get the ID of the logged-in teacher
    $teacherId = Auth::guard('teacher')->id();

    // Fetch all students where the teacher_id matches the logged-in teacher's ID
    $atten = Student::where('teacher_id', $teacherId)->get();

    // Return the view with the students data
    return view('frontend.attendance.interface', compact('atten'));
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


    public function AddAttendance()
    {
        $students = Student::all();
        return view('frontend.attendance.add', compact('students'));
    }
}
