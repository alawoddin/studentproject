<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\pending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingController extends Controller
{
    public function AllPending() {
        $pending = pending::all();

        return view('admin.pending.all_pending', compact('pending'));
    }

    public function AddPending() {
        $pending = pending::all();

        return view ('admin.pending.add_pending', compact('pending'));
    }

    public function StorePending(Request $request) {
        pending::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'time' => $request->time,
        ]);

        return redirect()->route('all.pending')->with('success', 'Pending added successfully');
    }

    public function StudentPending($id) {

        $record = DB::table('pendings')->select('status')->where('id', $id)->first();

if (!$record) {
    return redirect()->back()->with([
        'message' => 'Paid record not found',
        'alert-type' => 'error'
    ]);
}

$newStatus = '';

if ($record->status === 'wait') {
    $newStatus = 'done';
} elseif ($record->status === 'done') {
    $newStatus = 'reject';
} else {
    $newStatus = 'wait';
}

DB::table('pendings')->where('id', $id)->update(['status' => $newStatus]);

$notification = [
    'message' => "Status changed to '{$newStatus}' successfully",
    'alert-type' => 'info'
];

return redirect()->back()->with($notification);

    }

    public function CheckPending() {
        $pending = pending::all();

        return view('admin.pending.check_pending', compact('pending'));
    }
   
}
