<html>
    <head>
        <title>Sistem Manajemen Siswa Sederhana</title>
    </head>
    <body>
        <h2>Edit Buku</h2>
        {{Form::open(['method'=>'PATCH','route'=>['books.update', $books->id]])}}
        <p>Nama Buku : <input type="text" name="book_name" required value="{{$books->book_name}}"> </p>
        <p>Jumlah Buku : <input type="text" name="total_book" required value="{{$books->total_book}}"> </p>
        <p>Kategori : <input type="text" name="category" required value="{{$books->category}}"> </p>
    
        {{Form::submit('Update')}}
        {{Form::close()}}
    </body>
</html>