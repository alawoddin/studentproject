<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\DepartmentSubject;
use App\Models\Paid;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TeacherController extends Controller
{
    // add part
    public function AddTeacher() {
        $depart = department::all();

        return view('admin.teacher.add_teacher' , compact('depart'));
    }

    // show part

    public function ManageTeacher() {
        $teachers = Teacher::with('department')->get();
        // $depart = department::all();
        return view('admin.teacher.manage_teacher', compact('teachers'));
    }
    // store part

    public function StoreTeacher(Request $request){

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('uploads/teacher/'.$name_gen));
            $save_url = 'uploads/teacher/'.$name_gen;

            Teacher::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'father_name' => $request->father_name,
                'department_id' => $request->department_id,
                'roll_id' => $request->roll_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'national_id' => $request->national_id,
                'percentage' => $request->percentage,
                'photo' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('manage.teacher')->with($notification);
    }

    // Edit part

    public function EditTeacher($id) {
        $teacher = Teacher::findOrFail($id);
        $departments = Department::all();
         // Capitalized model name and clearer variable name
        return view('admin.teacher.edit_teacher', compact('teacher', 'departments'));
    }



     // update part

    public function UpdateTeacher(Request $request, $id)
    {

        // dd($request->all());

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());



        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('uploads/teacher/'.$name_gen));
            $save_url = 'uploads/teacher/'.$name_gen;

            // $teacher = Teacher::findOrFail($id);



        }
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.teacher')->with($notification);
    }

    // Delete part

    public function DeleteTeacher($id) {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('manage.teacher')->with('success', 'Teacher deleted successfully!');
    }

    public function ViewTeacher($id)
    {
        $teacher = Teacher::with('department')->findOrFail($id);
        // $teachers = Teacher::withCount('students')->findOrFail($id);
        $studentCount = Student::where('teacher_id', $id)->count();
        // $subject = Teacher::with( 'subjects')->findOrFail($id);
        // $teachers = Teacher::with('subjects')->findOrFail($id);

        $paid = Paid::where('teacher_id', $id)
            ->where('status', 'paid')
            ->get();

        return view('admin.teacher.view_teachers', compact('teacher', 'studentCount', 'paid'));
    }


    //end method
    // public function TeacherIndex($id) {
    //     $teachers = Teacher::with('department')->get();
    //     $teacher = Teacher::with('department', 'subjects')->findOrFail($id);

    //     $paids = Paid::with(['student', 'subject', 'department'])
    //         ->where('teacher_id', $id)
    //         ->where('status', 'paid')
    //         ->get();

    //     return view('admin.teacher.index', compact('teachers', 'teacher', 'paids'));
    // }
        public function TeacherIndex($id, Request $request)
        {
            $subjectId = $request->query('subject_id');  

            $teacher = Teacher::findOrFail($id);

            $paidsQuery = Paid::with(['student', 'subject', 'department'])
                ->where('teacher_id', $id)
                ->where('status', 'paid');

            if ($subjectId) {
                $paidsQuery->where('subject_id', $subjectId);  
            }

            $paids = $paidsQuery->get();

            return view('admin.teacher.index', compact('teacher', 'paids', 'subjectId'));
        }
}
