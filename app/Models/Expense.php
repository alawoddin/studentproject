<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = [];

    public function paid()
    {
        return $this->belongsTo(Paid::class, 'paid_id');
    }

public function teacher()
{
    return $this->belongsTo(Teacher::class, 'teacher_id');  // Fix the typo here
}

}
