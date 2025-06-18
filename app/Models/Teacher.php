<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }


}
