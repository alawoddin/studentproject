<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function attendances()
    {
        return $this->hasMany(Attend::class);
    }


    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function paid()
    {
        return $this->belongsTo(Paid::class);
    }

    public function salary()
    {
        return $this->belongsTo(salary::class);
    }
}


