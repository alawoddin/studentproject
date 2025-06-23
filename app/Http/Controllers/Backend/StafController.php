<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Staf;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class StafController extends Controller
{

    public function AddStaf()
    {
        return view('admin.staf.add_staf');
    }


    public function ManageStaf()
    {
        $stafs = Staf::all();
        return view('admin.staf.manage_staf', compact('stafs'));
    }


    public function StoreStaf(Request $request)
    {
        $data = $request->all();

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('uploads/staf/' . $name_gen));
            $save_url = 'uploads/staf/' . $name_gen;

            $data['photo'] = $save_url;
        }

        Staf::create($data);

        $notification = [
            'message' => 'Staff Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.staf')->with($notification);
    }


    public function EditStaf($id)
    {
        $staf = Staf::findOrFail($id);
        return view('admin.staf.edit_staf', compact('staf'));
    }


    public function UpdateStaf(Request $request, $id)
    {
        $staf = Staf::findOrFail($id);

        $data = $request->all();

        if ($request->file('photo')) {
            $image = $request->file('photo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300, 300)->save(public_path('uploads/staf/' . $name_gen));
            $save_url = 'uploads/staf/' . $name_gen;

            $data['photo'] = $save_url;
        }

        $staf->update($data);

        $notification = [
            'message' => 'Staff Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.staf')->with($notification);
    }


    public function DeleteStaf($id)
    {
        $staf = Staf::findOrFail($id);
        $staf->delete();

        return redirect()->route('manage.staf')->with('success', 'Staff deleted successfully!');
    }

  
    public function ViewStaf($id)
    {
        $staf = Staf::findOrFail($id);
        return view('admin.staf.view_staf', compact('staf'));
    }
}
