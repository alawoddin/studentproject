<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Paid;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentController extends Controller
{
    public function AddStudent()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $departments = Department::all();

        return view('admin.student.add_student', compact('students', 'teachers', 'departments'));
    }

    public function StoreStudent(Request $request)
    {
        $request->validate([
            'teacher_id' => 'nullable|exists:teachers,id',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'national_id' => 'required|string|unique:students,national_id',
            'time' => 'nullable',
        ]);

        Student::create([
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'time' => $request->time,
        ]);

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

        $request->validate([
            'teacher_id' => 'nullable|exists:teachers,id',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'national_id' => 'required|string|unique:students,national_id,' . $id,
            'time' => 'nullable',
        ]);

        $student->update([
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'national_id' => $request->national_id,
            'time' => $request->time,
        ]);

        return redirect()->route('manage.student')->with('success', 'Student updated successfully');
    }

    public function DeleteStudent($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()->route('manage.student')->with('success', 'Student deleted successfully');
    }

    public function PrintInvoice($id) {
        $Paid = Paid::with('student' , 'subject' , 'department')->findOrFail($id);
        $student = $Paid->student;

        $pdf = Pdf::loadView('admin.student.print_invoice', compact('student', 'Paid'))
            ->setPaper('a4' , 'landscape')
            ->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
        return $pdf->download('paid.pdf');
    }
}
