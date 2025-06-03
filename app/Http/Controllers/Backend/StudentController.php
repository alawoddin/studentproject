<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function AddStudent()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        return view('admin.student.add_student' , compact('students' , 'teachers'));
    }

    public function StoreStudent(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'father_name' => 'required',
            'department_name' => 'required',
            'subject_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'paid' => 'required|numeric',
            'remaining_fees' => 'required|numeric',
            'entry_date' => 'required|date',
            'paid_date' => 'required|date',
            'national_id' => 'required|unique:students,national_id'
        ]);

        Student::create($request->all());

        return redirect()->route('manage.student')->with('success', 'Student added successfully');
    }

    public function ManageStudent()
    {
        $students = Student::with('teacher')->get();
        return view('admin.student.manage_student', compact('students'));
    }

    public function EditStudent($id)
    {
        $student = Student::findOrFail($id);
        $teachers = Teacher::all();
        return view('admin.student.edit_student', compact('student', 'teachers'));
    }

    public function UpdateStudent(Request $request, $id)
    {

        $student = Student::findOrFail($id);

        $student->update($request->all());


        return redirect()->route('manage.student')->with('success', 'Student updated successfully');
    }

    public function DeleteStudent($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()->route('manage.student')->with('success', 'Student deleted successfully');
    }
}
