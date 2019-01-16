<html>
    <head>
        <title>Sistem Manajemen Siswa Sederhana</title>
    </head>
    <body>
        <h2>Tambah Siswa</h2>
        {{Form::open(['method'=>'POST','route'=>['siswa.store']])}}
        <p>Nama : <input type="text" name="nama"> </p>
        <p>Umur : <input type="text" name="umur"> </p>
        <p>No HP : <input type="text" name="no_hp"> </p>
        <p>Alamat : <textarea name="alamat"></textarea></p>
        {{Form::submit('Tambah')}}
        {{Form::close()}}
    </body>
</html>