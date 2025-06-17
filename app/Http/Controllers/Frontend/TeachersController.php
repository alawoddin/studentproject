<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teacher = Teacher::all();
        $depart = Department::all();
        return view('frontend.index' , compact('teacher' , 'depart'));
    }
}
