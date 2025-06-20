<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller
{
    public function teacherLogin(Request $request) {

        $request->validate([
            'roll_id' => 'required|numeric',
            'department_id' => 'required|numeric',
        ]);

        // $teacher = Teacher::where('roll_id', $request->roll_id)->first();
        $teacher = Teacher::where('roll_id', $request->roll_id)
        ->where('department_id', $request->department_id)
        ->first();

        if ($teacher) {
            Auth::guard('teacher')->login($teacher);

            $notification = array(
                'message' => 'your login successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('teacher.dashboard')->with($notification);
        }


        else {

            $notification = array(
                'message' => 'your roll_id is invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }


    public function index()
    {
        $teacher = Teacher::all();
        $depart = Department::all();
        return view('frontend.teacher_login', compact('teacher', 'depart'));
    }

    public function teacherDashboard() {

        $teacher = Teacher::all();
        $depart = Department::all();
        return view('frontend.index' , compact('teacher', 'depart'));
    }
}
