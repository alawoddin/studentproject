<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{

    use Notifiable;

    protected $guarded = [];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function salary()
    {
        return $this->belongsTo(salary::class);
    }

    public function subjects()
    {
        return $this->belongsTo(DepartmentSubject::class);
    }




}
