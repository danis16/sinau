{{-- <html>
    <head>
        <title>Sistem Manajemen Siswa Sederhana</title>
    </head>
    <body> --}}
        
        @extends('layouts.app')
        
        
        @section('content')
        
            
        <h2>Form Peminjaman</h2>
        {{Form::open(['id'=>'myform', 'url'=>'borrowing', 'method' => 'post'])}}
        
        <p>Nama : 
            <label>
            <select name="nis" id="nis" class="form-control">
                @foreach ($data as $d)
                <option value={{$d->id}}> {{$d->name}} || {{$d->id}} </option>
                @endforeach
            </select>
            </label> 
        </p>
        
        <p>Buku : 
            <label>
            <select name="book_name" id="book_name" class="form-control">
                    @foreach ($books as $d)
                    <option value={{$d->id}}> {{$d->book_name}}
                            @endforeach
            </select>            
            </label> 
        </p>
        
        <p> Tanggal Pinjam :
            <label> 
                <input type="date" id="tanggal_pinjam" class="form-control" value="{{ Carbon\Carbon::now()->toDateString()}}">
            </label>
        </p>

        <p> Tanggal Kembali :
            <label> 
                    <input type="text" id="tanggal_kembali" name="tanggal_kembali" class="form-control">
                {{-- <input type="text" class="form-control" name="birthday" value="{{ Carbon\Carbon::now()->toDateString() }}" /> --}}
            </label>
        </p>
            <button type="submit" class="btn btn-primary">ADD</button>
            {{-- <input type="button"  onclick="add()" value="Add"  class="btn btn-primary"/> --}}
            {{-- {{Form::submit('Tambah')}} --}}
            {{Form::close()}}
            
@endsection

@section('js')

      

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script>
            $("#myform").validate({
                rules: {
                "tanggal_kembali": {
                    required: true
                    }   
                },
                messages: {
                "tanggal_kembali": {
                    required: "isi dong"
                    }
                },
                submitHandler: function(form) {
                    var Tanggal_Pinjam=$('#tanggal_pinjam').val();
                    var Tanggal_Kembali=$('#tanggal_kembali').val();
                    var Buku = $('#book_name').val();
                    var Nis = $('#nis').val();
                    $.ajax({
                        url: "{{url('borrowing')}}",
                        type:'POST',
                        data: {
                        "_token": "{{ csrf_token() }}",
                        "buku":Buku,
                        "nis":Nis,
                        "tanggal_pinjam":Tanggal_Pinjam,
                        "tanggal_kembali":Tanggal_Kembali
                        },
                        success : function(res) {
                            window.location.href = "{{url('borrowing')}}"
                        }
                    })
                }
            });
        </script>
        <script>
            function add(){
                // alert('a');
                console.log('tes');
                var Tanggal_Pinjam=$('#tanggal_pinjam').val();
                var Tanggal_Kembali=$('#tanggal_kembali').val();
                var Buku = $('#book_name').val();
                var Nis = $('#nis').val();
            $.ajax({
            // dataType: 'json',
            url: "{{url('borrowing')}}",
            // url: "{{url('borrowing/add')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "buku":Buku,
                "nis":Nis,
                "tanggal_pinjam":Tanggal_Pinjam,
                "tanggal_kembali":Tanggal_Kembali
                },
            type:'POST'
            })
                }  
        </script>

    @endsection
    {{-- </body>
</html> --}}