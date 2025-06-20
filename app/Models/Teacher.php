<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Required for authentication
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable // ✅ Extend this, not Model
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

    
}




