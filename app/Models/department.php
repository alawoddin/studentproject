<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $guarded = [];

    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'department_id');
    }

}
