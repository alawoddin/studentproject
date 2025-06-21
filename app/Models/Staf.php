<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;

    protected $table = 'staf'; // explicitly define the table name

    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'gender',
        'phone',
        'email',
        'photo',
        'national_id',
        'roll_id',
        'salary',
    ];
}
