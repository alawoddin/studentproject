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
        // Validate the inputs
        $data = $request->validate([
            'roll_id' => 'required|numeric',
            'department_id' => 'required|numeric',
        ]);

        // Attempt to find the teacher with given roll_id and department_id
        $teacher = Teacher::where('roll_id', $data['roll_id'])
                          ->where('department_id', $data['department_id'])
                          ->first();

        // Check if the teacher was found
        if (!$teacher) {
            return redirect()->back()->with([
                'message' => 'I am sorry. Please check your Roll ID and Department ID.',
                'alert-type' => 'error',
            ]);
        }

        // Log in the teacher manually
        // Auth::guard('teacher')->login($teacher);


        // Redirect to teacher's home/dashboard with data
        return redirect()->route('teacher.index')->with([
            'message' => 'You are successfully logged in.',
            'alert-type' => 'success',
        ]);
    }

    public function index()
    {
        $id = Auth::guard('teacher')->id();
        $teacher = Teacher::find($id);
        $depart = Department::all();
        return view('frontend.teacher_login', compact('teacher', 'depart'));
    }

    public function teacherDashboard() {
        return view('frontend.index');
    }
}
