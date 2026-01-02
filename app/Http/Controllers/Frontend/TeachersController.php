<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Paid;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
public function teacherLogin(Request $request)
{
    $request->validate([
        'roll_id' => 'required|numeric',
        'email' => 'required|email',
        'password' => 'required|string',
        'department_id' => 'required|numeric',
    ]);

    $teacher = Teacher::where('roll_id', $request->roll_id)
        ->where('email', $request->email)
        ->where('department_id', $request->department_id)
        ->first();

    // Check password separately
    if ($teacher && Hash::check($request->password, $teacher->password)) {

        Auth::guard('teacher')->login($teacher);

        return redirect()->route('teacher.dashboard')->with([
            'message' => 'You logged in successfully',
            'alert-type' => 'success'
        ]);
    }

    return redirect()->back()->with([
        'message' => 'Invalid credentials',
        'alert-type' => 'error'
    ]);
}

    public function index()
    {
        $id = Auth::guard('teacher')->id();
        $teacher = Teacher::find($id);
        $depart = Department::all();
        return view('frontend.teacher_login', compact('teacher', 'depart'));
    }

    
        public function teacherDashboard()
        {
            $id = Auth::guard('teacher')->id();
            $teacher = Teacher::with('department')->findOrFail($id);

        
            $studentCount = Paid::where('teacher_id', $id)
                                ->where('status', 'paid')
                                ->distinct('student_id')
                                ->count('student_id');

            return view('frontend.index', compact('teacher', 'studentCount'));
        }



        public function TeacherView($id)
        {
            $teacher = Teacher::with('department')->findOrFail($id);

            $paid = Paid::where('teacher_id', $id)
                ->where('status', 'paid')
                ->get();

            $studentCount = $paid->unique('student_id')->count(); 

            return view('frontend.teacher_view', compact('teacher', 'paid', 'studentCount'));
        }




    // public function teacherDashboard()
    // {

    //     $teacher = Teacher::all();
    //     $depart = Department::all();
    //     return view('frontend.index', compact('teacher', 'depart'));
    // }

    // public function TeacherView($id)
    // {
    //     $teacher = Teacher::with('department')->findOrFail($id);
    //     $paid = Paid::where('teacher_id', $id)->where('status', 'paid')
    //     ->get();
    //     return view('frontend.teacher_view', compact('teacher',  'paid'));
    // }
    
    //end mehod


}

