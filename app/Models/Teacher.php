<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'gender',
        'phone',
        'email',
        'national_id',
        'roll_id',
    ];
}
