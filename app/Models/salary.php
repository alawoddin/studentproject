<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    protected $guarded = [];


        public function subject()
    {
        return $this->belongsTo(DepartmentSubject::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class, 'teacher_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }


}
