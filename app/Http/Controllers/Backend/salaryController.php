<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentSubject;
use App\Models\salary;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class salaryController extends Controller
{
    public function AllSalary() {
        $salary = salary::with('teacher' , 'subject')->get();
        return view('admin.salary.all_salary' , compact('salary'));
    }

    //end method

    public function AddSalary() {
        $teachers = Teacher::all();
        $salary = salary::all();
        $depart = Department::all();
        $subjects = DepartmentSubject::where('department_id')->get();
        return view ('admin.salary.add_salary' , compact('salary' , 'depart' , 'teachers' , 'subjects'));
    }

    public function StoreSalary(Request $request)
    {

        salary::create([
            'department_id' => $request->department_id,
            'teacher_id' => $request->teacher_id,
            'salary' => $request->salary,
            'subject_id' => $request->subject_id,
            'order_month'  => Carbon::now()->format('F'),   // Example: May
            'order_year'   => Carbon::now()->format('Y'),
        ]);


        $notification = [
            'message' => 'Salary Store Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.salary')->with($notification);
    }

    //end method
    
    public function EditSalary($id) {
        $salary = salary::findOrFail($id);
        $teachers = Teacher::all();
        $depart = Department::all();
        $subjects = DepartmentSubject::where('department_id', $salary->department_id)->get(); // اصلاح این خط
        return view('admin.salary.edit_salary', compact('salary', 'depart', 'teachers', 'subjects'));
    }


    //end method

    public function UpdateSalary(Request $request, $id)
    {
        $salary = salary::findOrFail($id);
        $salary->update($request->all());

        $notification = array(
            'message' => 'Salary Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.salary')->with($notification);
    }

    //end method

    public function DeleteSalary($id) {

        {
            $salary = salary::findOrFail($id);
            $salary->delete();

            $notification = array(
                'message' => 'Salary Delete Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.salary')->with($notification);
        }
    }
}
