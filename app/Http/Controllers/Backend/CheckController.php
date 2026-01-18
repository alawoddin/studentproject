<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Paid;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class CheckController extends Controller
{
    public function CheckUsers() {
     $teachers = Teacher::all(); // get all teachers
    return view('admin.checkusers.checkusers', compact('teachers'));
}

    public function dashboard($id)
{
    $teacher = Teacher::findOrFail($id); // find teacher by ID
    return view('frontend.teacher_index', compact('teacher'));
}

// public function TeacherView($id)
// {
//     $teacher = Teacher::with('department')->findOrFail($id);

//     $paid = Paid::where('teacher_id', $id)
//         ->where('status', 'paid')
//         ->get();

//     $studentCount = $paid->unique('student_id')->count(); 

//     return view('frontend.teacher_view', compact('teacher', 'paid', 'studentCount'));
// }


}
