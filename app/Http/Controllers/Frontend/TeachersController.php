<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    public function TeacherLogin(Request $request) {
        $request->validate([
                   'roll_id' => 'required|numeric',
                    'department_id' => 'required|numeric',
             ]);

             $roll_id = $request->roll_id;
             $department_id = $request->department_id;

               $teacher = Teacher::where('roll_id', $roll_id)
                     ->where('department_id', $department_id)
                   ->first();

                if (!$teacher) {
                     $notification = [
                        'message' => 'I am sorry. Please check your Roll ID and Department ID.',
                        'alert-type' => 'error'
                   ];

                   return redirect()->back()->with($notification);
                 }

                 $depart = Department::all();
                return view('frontend.index', compact('teacher', 'depart'));
    }
    public function index()
    {
        $teacher = Teacher::all();
        $depart = Department::all();
        return view('frontend.teacher_login' , compact('teacher' , 'depart'));
    }
    //end method

    public function TeacherDashboard() {


        return view('frontend.index');
    }




}


