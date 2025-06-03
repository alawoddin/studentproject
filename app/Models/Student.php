<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'father_name',
        'department_name',
        'subject_name',
        'phone_number',
        'email',
        'amount',
        'paid',
        'remaining_fees',
        'entry_date',
        'paid_date',
        'national_id',
    ];
}
