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

        return redirect()->route('manage.paid')->with('success', 'Paid record added successfully.');
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
    // public function UpdateStudent(Request $request, $id)
    // {
    //     $paid = Paid::findOrFail($id);
    //     $paid->update($request->all());

    //     return redirect()->route('manage.paid')->with('success', 'Paid record updated successfully.');
    // }

    // public function UpdateStudent(Request $request, $id)
    // {

    //     $request->validate([
    //         'student' => 'required|string|max:255',
    //         'department' => 'required|string|max:255',
    //         'subject' => 'required|string|max:255',
    //         'teacher' => 'required|string|max:255',
    //         'total_fees' => 'required|numeric',
    //         'paid' => 'required|numeric',
    //         'remaining_Fees' => 'required|numeric',
    //         'entry_date' => 'required|date',
    //         'paid_date' => 'required|date',
    //     ]);


    //     $paid = Paid::findOrFail($id);


    //     $paid->update([
    //         'student' => $request->student,
    //         'department' => $request->department,
    //         'subject' => $request->subject,
    //         'teacher' => $request->teacher,
    //         'total_fees' => $request->total_fees,
    //         'paid' => $request->paid,
    //         'remaining_Fees' => $request->remaining_Fees,
    //         'entry_date' => $request->entry_date,
    //         'paid_date' => $request->paid_date,
    //     ]);


    //     return redirect()->route('manage.paid')->with('success', 'Paid Info updated successfully!');
    // }



    // ------------------------------------
    public function UpdateStudent(Request $request, $id)
    {
        dd('form reached', $request->all());
        $request->validate([
            'student' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'teacher' => 'required|string|max:255',
            'total_fees' => 'required|numeric',
            'paid' => 'required|numeric',
            'remaining_Fees' => 'required|numeric',
            'entry_date' => 'required|date',
            'paid_date' => 'required|date',
        ]);

        $paid = Paid::findOrFail($id);

        $paid->update([
            'student' => $request->student,
            'department' => $request->department,
            'subject' => $request->subject,
            'teacher' => $request->teacher,
            'total_fees' => $request->total_fees,
            'paid' => $request->paid,
            'remaining_Fees' => $request->remaining_Fees,
            'entry_date' => $request->entry_date,
            'paid_date' => $request->paid_date,
        ]);

        return redirect()->route('manage.paid')->with('success', 'Updated successfully.');
    }
    // -------------------------------------

    // حذف پرداخت
    public function DeleteStudent($id)
    {
        $paid = Paid::findOrFail($id);
        $paid->delete();

        return redirect()->route('manage.paid')->with('success', 'Paid record deleted successfully.');
    }
}