<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Paid;
use App\Models\Teacher;
use App\Models\Expense;
use App\Models\Staf;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function AdminAllReports() {
        return view('admin.reports.all_report');
    }

    public function AdminSearchByDate(Request $request) {
        $date = new DateTime($request->date);
        $formatDate = $date->format('Y-m-d');

        $paid = Paid::with('student')->get();

        $orderDate = Paid::where('order_date' , $formatDate)->latest()->get();

        return view('admin.reports.search_by_date', compact('orderDate', 'paid' , 'formatDate'));
    }

    public function AdminSearchByMonth(Request $request)
{
    $month = $request->month;

    $Paid = Paid::with('student')
        ->where('order_month', $month)
        ->get();

    $totalStudents = $Paid->pluck('student_id')->unique()->count();

    return view('admin.reports.search_by_month', compact(
        'Paid',  'month'
    ));
}

public function AdminSearchByYear(Request $request){
    $years = $request->year;

    $Paid = Paid::with('student' ,  'department')->get();
    $teacher = Teacher::with('department')->get();
    $expense = Expense::with('paid')->get();
    $stuff = Staf::all();

    $orderYear = Paid::where('order_year',$years)->latest()->get();
    return view('admin.reports.search_by_year',compact('orderYear', 'Paid' , 'expense' , 'stuff' , 'teacher' , 'years'));
}
 // End Method

 public function AllInvoice($id)
 {
     $Paid = Paid::with('student' , 'subject' , 'department')->findOrFail($id);
     $student = $Paid->student;  // Get student related to this payment

     // No need to do: $student = Student::find($id);

     return view ('admin.reports.all_invoice' , compact('Paid', 'student'));
 }
}
