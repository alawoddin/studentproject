<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function AddStudent() {
        return view('admin.student.add_student');
    }

    //end AddStudent
    public function ManageStudent() {
        return view('admin.student.manage_student');
    }
}
