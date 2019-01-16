<?php

namespace App\Http\Controllers\Students\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Student;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Student::all();
        return view('students.tampil',compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Student();
        $data->name=$request->get('name');
        $data->age=$request->get('age');
        $data->gender=$request->get('gender');
        $data->save();
        return redirect('students');
        //
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
        $students = Student::find($id);
        return view('students.edit', compact('students'));  

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
        $data=Student::find($id);
        
        // $data=  ::where('id',$id)->first(); //manggil id yang pertama
        // $data=Student::where('id',$id)->get(); //manggil 1 data tapi outputnya array
        // // $data=DB::RAW('select * from student JOIN on');
        // $data=Student::where('name', 'siapa');
        // if($request->has('kelas')){
        //     $data=$data->where('kelas', $request->get('KELAS'));
        // }
        // $data=$data->get();
        // Student::where('name', 'siapa')->where('kelas', $request->get('KELAS'))->get();
        // Student::where('name', 'siapa')->whereRaw('JOIN on asdsadsa')->get();

        $data->name=$request->get('name');
        $data->age=$request->get('age');
        $data->gender=$request->get('gender');
        $data->save();
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Student::find($id);
        $data->delete();
        return redirect('students');
        //
    }
}
