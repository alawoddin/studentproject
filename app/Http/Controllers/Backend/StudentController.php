<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    public function AddStudent()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $depart = department::all();

        return view('admin.student.add_student', compact('students', 'teachers', 'depart',));
    }

    public function StoreStudent(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'father_name' => 'required',
            'department_id' => 'required|exists:departments,id',
            'depart_subject' => 'required',
            'phone_number' => 'required',
            'email' => '',
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
        $students = Student::with('teacher', 'department')->get();
        return view('admin.student.manage_student', compact('students'));
    }

    public function EditStudent($id)
    {
        $student = Student::findOrFail($id);
        $teachers = Teacher::all();
        $depart = department::all();
        return view('admin.student.edit_student', compact('student', 'teachers', 'depart'));
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
