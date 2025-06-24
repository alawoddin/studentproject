<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentSubject extends Model
{
    // ✅ Allow mass assignment for these fields
    protected $fillable = ['department_id', 'subject_name'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function paid()
    // {
    //     return $this->belongsTo(Paid::class);
    // }
}
