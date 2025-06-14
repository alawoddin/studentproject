<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentSubject;

class SubjectController extends Controller
{
    
    public function getSubjectsByDepartment($department_id)
    {
        $subjects = DepartmentSubject::where('department_id', $department_id)->get();

        return response()->json($subjects->map(function ($subject) {
            return [
                'id' => $subject->id,
                'name' => $subject->subject_name, // or whatever your column is called
            ];
        }));
    }
}



