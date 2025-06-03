<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher; // ✅ این خط بسیار مهم است

class TeacherController extends Controller
{
    // add part 
    public function AddTeacher() {
        return view('admin.teacher.add_teacher');
    }

    // show part 

    public function ManageTeacher() {
        $teachers = Teacher::all();
        return view('admin.teacher.manage_teacher', compact('teachers'));
    }
    // store part 

    public function StoreTeacher(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'national_id' => 'required|unique:teachers,national_id',
            'roll_id' => 'required|unique:teachers,roll_id',
        ]);

        Teacher::create($request->all());

        return redirect()->route('manage.teacher')->with('success', 'Teacher added successfully!');
    }

    // Edit part 

    public function EditTeacher($id) {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit_teacher', compact('teacher'));
    }



     // update part 

    public function UpdateTeacher(Request $request, $id)
    {
        $request->validate([
            'first_name'   => 'required',
            'last_name'    => 'required',
            'father_name'  => 'required',
            'gender'       => 'required|in:Male,Female',
            'phone'        => 'required',
            'email'        => 'required|email|unique:teachers,email,' . $id,
            'national_id'  => 'required|unique:teachers,national_id,' . $id,
            'roll_id'      => 'required|unique:teachers,roll_id,' . $id,
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());

        return redirect()->route('manage.teacher')
                         ->with('success', 'Teacher updated successfully!');
    }

    // Delete part 

    public function DeleteTeacher($id) {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('manage.teacher')->with('success', 'Teacher deleted successfully!');
    }

   

}
