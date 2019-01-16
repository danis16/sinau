<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $guarded = [];

    public function book()
    {
        return $this->hasMany('App\Models\Books', 'student_code', 'id');
    }
}
