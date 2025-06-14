<?php

// app/Models/Department.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'department_id');
    }

    public function subjects()
    {
        return $this->hasMany(DepartmentSubject::class, 'department_id');
    }

    public function paid()
    {
        return $this->hasMany(Paid::class, 'department_id');
    }


}
