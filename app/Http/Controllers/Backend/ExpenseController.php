<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Paid;

class ExpenseController extends Controller
{
    public function AddExpense()
    {
        return view('admin.expense.add_expense');
    }

    public function StoreExpense(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        Expense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        return redirect()->route('manage.expense')->with('success', 'Expense added successfully');
    }

    public function ManageExpense()
    {
        $expenses = Expense::latest()->get();
        return view('admin.expense.manage_expense', compact('expenses'));
    }

    public function EditExpense($id)
    {
        $expense = Expense::findOrFail($id);
        return view('admin.expense.edit_expense', compact('expense'));
    }

    public function UpdateExpense(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $expense->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        return redirect()->route('manage.expense')->with('success', 'Expense updated successfully');
    }

    public function DeleteExpense($id)
    {
        Expense::findOrFail($id)->delete();
        return redirect()->route('manage.expense')->with('success', 'Expense deleted successfully');
    }//endmethod


    // Start Teccher Expense
    public function StoreTeacherExpense(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        Expense::create([
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('success', 'Expense added successfully');
    }// End Teccher Expense

    public function PaidAllForTeacher($id)
        {
            Paid::where('teacher_id', $id)
                ->where('status', '!=', 'no_paid')
                ->update(['status' => 'no_paid']);

            return redirect()->back()->with('success', 'All students for this teacher have been paid.');
        }

}
