<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Paid;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
// public function AllAttendance()
// {
//     // Get the ID of the logged-in teacher
//     $teacherId = Auth::guard('teacher')->id();

//     // Fetch all students where the teacher_id matches the logged-in teacher's ID
//     $atten = Student::where('teacher_id', $teacherId)->get();

//     // Return the view with the students data
//     return view('frontend.attendance.interface', compact('atten'));
// }

    // Removed duplicate AddAttendance method

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

    
     public function TeacherSubjectIndex($id, Request $request)
        {
            $subjectId = $request->query('subject_id');  

            $teacher = Teacher::findOrFail($id);

            $paidsQuery = Paid::with(['student', 'subject', 'department'])
                ->where('teacher_id', $id)
                ->where('status', 'paid');

            if ($subjectId) {
                $paidsQuery->where('subject_id', $subjectId);  
            }

            $paids = $paidsQuery->get();


            return view('frontend.attendance.interface', compact('teacher', 'paids', 'subjectId'));
        }

        public function Attendancestore(Request $request){
            foreach ($request->attendance as $studentId => $days) {
                foreach ($days as $date => $status) {
                    Attend::updateOrCreate(
                        ['student_id' => $studentId, 'attendance_date' => $date],
                        ['status' => $status]
                    );
                }
            }
            return back()->with('success', 'Attendance saved!');
        }

        public function َAtendanceIndex(){
             $students = Student::all();
          return view('admin.attendance.index', compact('students'));
        }

        public function AtendanceShow($id){
              $student = Student::with('attendances')->findOrFail($id);
        return view('admin.attendance.show', compact('student'));
        }

        public function Back(){
            
            return redirect()->back();
        }

}
