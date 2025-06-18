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

                 $notification = [
                    'message' => 'I am sorry. Please check your Roll ID and Department ID.',
                    'alert-type' => 'error'
               ];

                 $depart = Department::all();
                return view('frontend.teacher_dashboard', compact('teacher', 'depart'))->with($notification);
    }
    public function index()
    {
        $teacher = Teacher::all();
        $depart = Department::all();

        $notification = [
            'message' => 'I am sorry. Please check your Roll ID and Department ID.',
            'alert-type' => 'error'
       ];
        return view('frontend.teacher_login' , compact('teacher' , 'depart'))->with($notification);
    }
    //end method

    public function TeacherDashboard() {

        $notification = [
            'message' => 'I am sorry. Please check your Roll ID and Department ID.',
            'alert-type' => 'error'
       ];

        return view('frontend.index')->with($notification);
    }




}


