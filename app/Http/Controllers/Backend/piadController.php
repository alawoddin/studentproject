<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paid;

class piadController extends Controller
{
    // صفحه فرم ثبت پرداخت
    public function AddPaid()
    {
        return view('admin.paid.add_paid');
    }

    // ذخیره پرداخت جدید
    public function Storepiad(Request $request)
    {
        Paid::create($request->all());

        $notification = array(
            'message' => 'Paid Store Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.paid')->with($notification);
    }

    // لیست پرداخت‌ها
    public function ManagePaid()
    {
        $paid = Paid::all();
        return view('admin.paid.manage_paid', compact('paid'));
    }

    // نمایش فرم ویرایش
    public function EditPaid($id)
    {
        $paid = Paid::findOrFail($id);
        return view('admin.paid.edit_paid', compact('paid'));
    }

    // به‌روزرسانی پرداخت
    public function UpdatePaid(Request $request, $id)
    {
        $paid = Paid::findOrFail($id);
        $paid->update($request->all());

        $notification = array(
            'message' => 'Paid Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.paid')->with($notification);
    }




    // ------------------------------------

    // حذف پرداخت
    public function DeletePaid($id)
    {
        $paid = Paid::findOrFail($id);
        $paid->delete();

        $notification = array(
            'message' => 'Paid Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.paid')->with($notification);
    }
}
