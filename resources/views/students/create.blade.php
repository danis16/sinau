{{-- <html>
    <head>
        <title>Sistem Manajemen Siswa Sederhana</title>
    </head>
    <body> --}}

@extends('layouts.app')


@section('content')
            
        <h2>Add Students</h2>
        {{Form::open(['method'=>'POST','route'=>['students.store'],'id'=>'myform'])}}
        
        <p>Nama : <label><input type="text" name="name"></label> </p>
        <p>Umur : <label></label><input type="text" name="age"></label> </p>
        <p>Gender : <br> 
        <input type="radio" name="gender" id="gender" value="laki-laki" checked> Laki-laki </p>
        <input type="radio" name="gender" id="gender" value="perempuan"> Perempuan  </p>
        {{Form::submit('Tambah')}}
        {{Form::close()}}

@endsection

@section('js')
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script>
        // $(document).ready(function(){
            
            $("#myform").validate({
                rules: {
                "name": {
                    required: true,
                    minlength: 5
                    },
                "age": {
                    required: true,
                    number: true,
                    minlength: 5
                    },
                "gender": {
                    required: true,                    },
                },
                messages: {
                "name": {
                    required: "isi dong",
                    minlength: "this field must contain at least {0} characters"                    
                    },
                "age" : {
                    required: "isi dong",
                    number:"harus diisi pake angka",
                    minlength: "this field must contain at least {0} characters"
                    },
                "gender" : {
                    required:'isi yooooo'
                }
                }
            });
                // alert('coba');

        // });
        // $("#myform").validate({
        //     alert('coba');
        //     debug: true   
        // });
        </script>
    @endsection
    {{-- </body>
</html> --}}