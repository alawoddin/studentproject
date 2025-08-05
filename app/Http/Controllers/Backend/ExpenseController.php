<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Paid;
use App\Models\Teacher;

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
         // Save 1 if switch is ON, else save 0
    $leetValue = $request->has('leet') ? '1' : '0';

     $note = $request->note_option === 'custom' 
        ? $request->note_custom 
        : $request->note_option;

        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Expense::create([

            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => $request->date,
            'note' => $note,
            'leet' => $leetValue,
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


        public function leetDestroy($id)
            {
                $expense = Expense::findOrFail($id);
                $expense->delete();

                return back()->with('success', 'Record deleted successfully.');
            }

        public function allLeet()   {
             $teacher = Teacher::get();
            return view('admin.expense.all_leet', compact('teacher'));
        } 


        

}
