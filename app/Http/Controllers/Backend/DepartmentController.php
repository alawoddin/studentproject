<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;
use App\Models\DepartmentSubject;


class DepartmentController extends Controller
{

    public function AllDepart() {
        $departments = Department::with('subjects')->get();
        return view('admin.department.all_depart', compact('departments'));
    }


    public function AddDepart() {
        return view('admin.department.add_depart');
    }


    public function StoreDepart(Request $request)
        {
            $request->validate([
                'depart_name' => 'required|string|max:255',
                'depart_subjects' => 'required|array|min:1',
                'depart_subjects.*' => 'required|string|max:255'
            ]);

            $department = Department::create([
                'depart_name' => $request->depart_name
            ]);

            foreach ($request->depart_subjects as $subject) {
                DepartmentSubject::create([
                    'department_id' => $department->id,
                    'subject_name' => $subject
                ]);
            }

            return redirect()->back()->with('success', 'Department and subjects saved!');
        }

    //end method
        public function EditDepart($id) {
            $depart = Department::with('subjects')->findOrFail($id);
            return view('admin.department.edit_depart', compact('depart'));
        }



    //end method

public function UpdateDepart(Request $request, $id) {
    $request->validate([
        'depart_name' => 'required|string|max:255',
        'depart_subjects' => 'required|array|min:1',
        'depart_subjects.*' => 'required|string|max:255'
    ]);

    // Update department name
    $department = Department::findOrFail($id);
    $department->update([
        'depart_name' => $request->depart_name,
    ]);

    // Add new subjects without deleting old ones
    foreach ($request->depart_subjects as $subject) {
        DepartmentSubject::firstOrCreate([
            'department_id' => $id,
            'subject_name' => $subject
        ]);
    }

    $notification = [
        'message' => 'Department Updated Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.depart')->with($notification);
}


    public function DeleteDepart($id) {
        department::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Department Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.depart')->with($notification);
  }
}