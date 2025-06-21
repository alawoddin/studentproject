<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function SummaryReport()
    {
        $today = Carbon::today();

        $totalIncome = DB::table('student_incomes')
            ->whereDate('date', $today)
            ->sum('amount');

        $totalExpense = DB::table('expenses')
            ->whereDate('date', $today)
            ->sum('amount');

        $netIncome = $totalIncome - $totalExpense;

        return view('admin.report.summary_report', compact('totalIncome', 'totalExpense', 'netIncome'));
    }

    public function FilterReport(Request $request)
    {
        $filter = $request->filter;

        switch ($filter) {
            case 'day':
                $from = Carbon::today();
                $to = Carbon::today()->endOfDay();
                break;
            case 'week':
                $from = Carbon::now()->startOfWeek();
                $to = Carbon::now()->endOfWeek();
                break;
            case 'month':
                $from = Carbon::now()->startOfMonth();
                $to = Carbon::now()->endOfMonth();
                break;
            case 'year':
                $from = Carbon::now()->startOfYear();
                $to = Carbon::now()->endOfYear();
                break;
            default:
                $from = Carbon::today();
                $to = Carbon::today()->endOfDay();
        }

        $totalIncome = DB::table('student_incomes')
            ->whereBetween('date', [$from, $to])
            ->sum('amount');

        $totalExpense = DB::table('expenses')
            ->whereBetween('date', [$from, $to])
            ->sum('amount');

        $netIncome = $totalIncome - $totalExpense;

        return view('admin.report.summary_report', compact('totalIncome', 'totalExpense', 'netIncome', 'filter'));
    }
}