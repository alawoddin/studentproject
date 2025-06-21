<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staf;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class StafController extends Controller
{
    //  Add Staf 
    public function AddStaf()
    {
        return view('admin.staf.add_staf');
    }

        // Manage All Staf
    public function ManageStaf()
    {
        $stafs = Staf::all();
        return view('admin.staf.manage_staf', compact('stafs'));
    }
    
    //  Store Staf
    public function StoreStaf(Request $request)
    {

         if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('uploads/teacher/' . $name_gen));
            $save_url = 'uploads/teacher/' . $name_gen;

            Staf::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'father_name' => $request->father_name,
                'roll_id' => $request->roll_id,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'national_id' => $request->national_id,
                'photo' => $save_url,
                 'salary' => $request->salary,
            ]);

            $notification = array(
            'message' => 'stuff Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('manage.staf')->with($notification);
        // $request->validate([
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'father_name' => 'required',
        //     'gender' => 'required|in:Male,Female',
        //     'phone' => 'required',
        //     'email' => 'required|email|unique:staf,email',
        //     'photo' => 'required',
        //     'national_id' => 'required|unique:staf,national_id',
        //     'roll_id' => 'required|unique:staf,roll_id',
        //     'salary' => 'nullable|numeric',
        // ]);

        // Staf::create($request->all());

        // return redirect()->route('manage.staf')->with([
        //     'message' => 'Staf added successfully',
        //     'alert-type' => 'success'
        // ]);
    }

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


        $staf= Staf::findOrFail($id);
        $staf->update($request->all());



        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('uploads/teacher/' . $name_gen));
            $save_url = 'uploads/teacher/' . $name_gen;

        }
        $notification = array(
            'message' => 'Stuff Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.staf')->with($notification);
    }


    // Delete Staf

       public function DeleteStaf($id)
    {
        $staf = Staf::findOrFail($id);
        $staf->delete();

        return redirect()->route('manage.staf')->with('success', 'Stuff deleted successfully!');
    }
}
