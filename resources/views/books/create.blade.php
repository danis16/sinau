{{-- <html>
    <head>
        <title>Sistem Manajemen Siswa Sederhana</title>
  
    </head>
    <body> --}}
        @extends('layouts.app')

        @section('content')
            
        <h2>Tambah Buku</h2>
        {{Form::open(['method'=>'POST','route'=>['books.store'], 'id'=>'myform'])}}

        {{-- <form> --}}
    


        <div class="form-group">
        <p><label> Buku : </label><input type="text" name="book_name" id="book_name"> </p>
        </div>
        <p><label> Jumlah  : </label><input type="text" name="total_book" id="total_book"> </p>
        <p><label>Kategori : </label> <input type="text" name="category" id="category"> </p>
        
        {{Form::submit('Tambah',['id'=>'frm-mhs','class'=>'btn btn-primary'])}}
        {{Form::close()}}
        
        @endsection
        
        @section('js')
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script>
        $('#myform').validate({
            rules:{
                'book_name':{
                    required:true,
                    minlength:5
                },
                'total_book':{
                    required:true,
                },
                'category':{
                    required:true
                }
            }
            // message:{

            // }
        })
        </script>  
        @endsection

    {{-- </body>
</html> --}}