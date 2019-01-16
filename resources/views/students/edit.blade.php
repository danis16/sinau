{{-- <html>
    <head>
        <title>Sistem Manajemen Siswa Sederhana</title>
    </head>
    <body>
         --}}
@extends('layouts.app')

@section('content')
    
<h2>Edit Students</h2>
{{Form::open(['method'=>'PATCH','route'=>['students.update',$students->id]])}}
<p>Nama : <input type="text" name="name" value="{{$students->name}}" required> </p>
<p>Umur : <input type="number" name="age" value="{{$students->age}}" required> </p>


<p>Gender : <br> 
    <input type="radio" name="gender" value="laki-laki" required {{ $students->gender == "laki-laki" ? 'checked' : '' }}>Laki-laki </p>
    <input type="radio" name="gender" value="perempuan" required {{ $students->gender == "perempuan" ? 'checked' : '' }}>Perempuan </p>
    {{Form::submit('Edit')}}
    {{Form::close()}}
    @endsection
    {{-- </body>
</html> --}}