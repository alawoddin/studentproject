<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];


    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}


