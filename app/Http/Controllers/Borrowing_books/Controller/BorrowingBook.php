<?php

namespace App\Http\Controllers\Borrowing_books\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BorrowingBooks;
use App\Models\Student;
use App\Models\Books;

class BorrowingBook extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data=BorrowingBooks::all();
        $student=Student::all();
        $book=Books::all();
        // $ambilBorrowing=BorrowingBooks::with('')

        // return $data;
        return view('borrowing_books.tampil')->with(['data' => $data,'student'=>$student,'books'=>$book]);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Student::all();
        $data1=Books::all();


        // return $data;
        return view('borrowing_books.create')->with(
            ['data' => $data,'books'=> $data1]    
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new BorrowingBooks();
        $data->id_students=$request->get('nis');
        $data->id_books=$request->get('buku');
        $data->date_of_borrowing=$request->get('tanggal_pinjam');
        $data->date_of_return=$request->get('tanggal_kembali');
        $data->status=0;
        $data->save();
        return redirect('borrowing');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=BorrowingBooks::find($id);
        $data->delete();
        return redirect('borrowing');
    }
}
