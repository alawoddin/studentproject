<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paid;
use App\Models\Department;
use App\Models\DepartmentSubject;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class piadController extends Controller
{
    // صفحه فرم ثبت پرداخت
   public function AddPaid()
    {

        $depart = Department::all();
        $firstDepartId = Department::first()->id ?? null;
        $teachers = Teacher::all();
        $student = Student::all();
        $subjects = DepartmentSubject::where('department_id', $firstDepartId)->get();
        return view('admin.paid.add_paid', compact('depart', 'subjects' , 'teachers' , 'student'));
    }



    // ذخیره پرداخت جدید
    public function Storepiad(Request $request)
    {
        Paid::create([
            'student_id' => $request->student_id,
            'department_id' => $request->department_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'total_fees' => $request->total_fees,
            'paid' => $request->paid,
            'remaining_Fees' => $request->remaining_Fees,
            'paid_date' => $request->paid_date,
            'order_date'   => Carbon::now()->format('Y-m-d'),
            'order_month'  => Carbon::now()->format('F'),   // Example: May
            'order_year'   => Carbon::now()->format('Y'),
        ]);

        $notification = [
            'message' => 'Paid Store Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('manage.paid')->with($notification);
    }


    // لیست پرداخت‌ها
public function ManagePaid()
{
    // Get the latest Paid record for each student
    $latestPaidIds = Paid::select(DB::raw('MAX(id) as id'))
        ->groupBy('student_id')
        ->pluck('id');

    // Eager load all relations
    $paid = Paid::with('department.subjects', 'teacher', 'subject', 'student')
        ->whereIn('id', $latestPaidIds)
        ->orderByDesc('paid_date')
        ->get();

    // Get departments with their subjects
    $depart = Department::with('subjects')->get();
    $teachers = Teacher::all();
    $students = Student::all();

    return view('admin.paid.manage_paid', compact('paid', 'depart', 'teachers', 'students'));
}


    // نمایش فرم ویرایش
 public function EditPaid($id)
{
    $paid = Paid::with('subject')->findOrFail($id); // eager load subject relation
    $depart = Department::with('subjects')->get(); // all departments with subjects
    $teachers = Teacher::all();
    $student = Student::all();

    // Subjects of the paid's department
    $subjects = $paid->department ? $paid->department->subjects : collect();

    return view('admin.paid.edit_paid', compact(
        'paid',
        'depart',
        'teachers',
        'student',
        'subjects'
    ));
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

    public function DeactivatePaid($id)
    {
        $record = DB::table('paids')->select('status')->where('id', $id)->first();

        if (!$record) {
            return redirect()->back()->with([
                'message' => 'Paid record not found',
                'alert-type' => 'error'
            ]);
        }

        if ($record->status === 'no_paid') {
            DB::table('paids')->where('id', $id)->update(['status' => 'paid']);

            $notification = [
                'message' => 'Paid deactivated successfully',
                'alert-type' => 'info'
            ];
        } else {
            DB::table('paids')->where('id', $id)->update(['status' => 'no_paid']);

            $notification = [
                'message' => 'Paid activated successfully',
                'alert-type' => 'info'
            ];
        }

        return redirect()->back()->with($notification);
    }

}
