<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pending;

class teacherShowSalaryController extends Controller
{
    public function TeacherShowSalary(){
        // $pending = pending::all();
        return view('admin.teachershowsalary.index');
    }
}
