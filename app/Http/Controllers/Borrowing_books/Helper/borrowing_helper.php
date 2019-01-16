<?php

namespace App\Http\Controllers\Borrowing_books\Helper;
use App\Http\Controllers\Controller;

use App\Models\BorrowingBooks;

class borrowing_helper extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getData($id)
    {
        $borrow=BorrowingBooks::find($id);
        return $borrow;
        
        // $borrow=BorrowingBooks::find($id);
        // $borrow1=BorrowingBooks::find($id);
        // return array(['data'=>$borrow,'data2'=>$borrow1]);



    }

}