<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paid extends Model
{
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function teacher()
{
    return $this->belongsTo(Teacher::class, 'teacher_id');
}

public function student()
{
    return $this->belongsTo(Student::class , 'student_id');
}

public function subject()
{
    return $this->belongsTo(DepartmentSubject::class, 'subject_id');
}

public function expense()
{
    return $this->belongsTo(Expense::class, 'expense_id');
}


}
