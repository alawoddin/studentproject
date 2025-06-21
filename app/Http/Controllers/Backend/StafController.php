<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staf;

class StafController extends Controller
{
    //  Add Staf 
    public function AddStaf()
    {
        return view('admin.staf.add_staf');
    }

    //  Store Staf
    public function StoreStaf(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'gender' => 'required|in:Male,Female',
            'phone' => 'required',
            'email' => 'required|email|unique:staf,email',
            'photo' => 'required',
            'national_id' => 'required|unique:staf,national_id',
            'roll_id' => 'required|unique:staf,roll_id',
            'salary' => 'nullable|numeric',
        ]);

        Staf::create($request->all());

        return redirect()->route('manage.staf')->with([
            'message' => 'Staf added successfully',
            'alert-type' => 'success'
        ]);
    }

    // Manage All Staf
    public function ManageStaf()
    {
        $stafs = Staf::all();
        return view('admin.staf.manage_staf', compact('stafs'));
    }

    // Edit Staf
    public function EditStaf($id)
    {
        $staf = Staf::findOrFail($id);
        return view('admin.staf.edit_staf', compact('staf'));
    }

    // Update Staf
    public function UpdateStaf(Request $request, $id)
    {
        $staf = Staf::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:staf,email,' . $id,
            'national_id' => 'required|unique:staf,national_id,' . $id,
            'roll_id' => 'required|unique:staf,roll_id,' . $id,
            'salary' => 'nullable|numeric',
        ]);

        $staf->update($request->all());

        return redirect()->route('manage.staf')->with([
            'message' => 'Staf updated successfully',
            'alert-type' => 'success'
        ]);
    }

    // sDelete Staf
    public function DeleteStaf($id)
    {
        $staf = Staf::findOrFail($id);
        $staf->delete();

        return redirect()->route('manage.staf')->with([
            'message' => 'Staf deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
