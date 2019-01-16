<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $guarded = [];

    // public function student()
    // {
    //     return $this->belongsTo('App\Models\Student', 'student_code', 'id');
    // }
}
