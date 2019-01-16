<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowingBooks extends Model
{
    protected $table = 'borrowing_books';
    protected $guarded = [];
    
    public function students()
    {
        return $this->hasOne('App\Models\Student','id', 'id_students');
    }

    public function books()
    {
        return $this->hasOne('App\Models\Books','id','id_books');
    }

}
