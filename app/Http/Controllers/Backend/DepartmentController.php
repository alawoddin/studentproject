<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function AllDepart() {
        $departments = department::all();
        return view('admin.department.all_depart', compact('departments'));
    }
    public function AddDepart() {
        return view('admin.department.add_depart');
    }

    //end method

    public function StoreDepart(Request $request) {

        department::create([
            'depart_name' => $request->depart_name,
            'depart_subject' => $request->depart_subject,
        ]);

        $notification = array(
            'message' => 'Department Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.depart')->with($notification);

    }

    //end method

    public function EditDepart($id) {
        $depart = department::findOrFail($id);
        return view('admin.department.edit_depart', compact('depart'));
    }

    //end method

    public function UpdateDepart(Request $request, $id) {
        department::findOrFail($id)->update([
            'depart_name' => $request->depart_name,
            'depart_subject' => $request->depart_subject,
        ]);

        $notification = array(
            'message' => 'Department Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.depart')->with($notification);
    }

    //end method

    public function DeleteDepart($id) {
        department::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Department Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.depart')->with($notification);
    }
}
