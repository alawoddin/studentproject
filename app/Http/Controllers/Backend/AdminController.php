<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();
        $notification = array(
            'message' => 'Admin logout  Successfully',
            'alert-type' => 'success'
        );
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with($notification);
    }

    //end method
    public function AdminProfile () {
        $id = Auth::user()->id;
        // $adminData = User::find($id);
        $adminData = Auth::user();
        return view('admin.admin_profile_view' , compact('adminData'));
    }
    //end mehtod

    public function AdminProfileUpdate(Request $request) {
        // dd($request->all());
        $id = Auth::user()->id;
        $admin = User::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin_profiles/'.$admin->photo));
            $imagename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_profiles'), $imagename);
            $admin->photo = $imagename;
        }
        $admin->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    //end method

    public function AdminPasswordChange() {
        return view('admin.admin_password_change');
    }

    //end method

    public function AdminPasswordUpdate(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        
        if(!Hash::check($request->old_password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    //end method

}
