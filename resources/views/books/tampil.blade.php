@extends('layouts.app')


@section('content')


        {{-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> --}}

        <h2>Tampil Buku</h2>
      <a href="{{url('books/create')}}"><button class="btn btn-primary">Tambah</button></a><br><br>
      <table id="example" class="table table-hover table-bordered" style="width:100%">
      <thead>
        <tr>
            <td>No</td>
            <td>Nama Buku </td>
            <td>Total</td>
            <td>Kategori</td>
            <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
      <?php $no=1;?>
      {{-- $book = [{"book_name":"abcd"},{"book_name":"ghij"}]
      $student->book = 
        echo $book[1]->book_name;     --> ghij
      {"book_name":"abcd"}
        $book->book_name   --> abcd

      $data[1]->book_name --}}
      
      @foreach($data as $d)
        <tr>
            <td> <?php echo $no++ ?></td>
            <td>{{$d->book_name}}</td>
            <td>{{$d->total_book}}</td>
            <td>{{$d->category}}</td>

            <td> <a href="{{url('books/'.$d->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>  
           
                {{-- {{Form::open(['method'=>'DELETE', 'route'=>['books.destroy',$d->id]])}}  --}}
            <a href = "{{ url('books/delete')}}/{{$d->id}}" class="btn btn-danger btn-sm" type="submit" onClick="return confirm('Yakin mau hapus?');">Hapus</a>
                {{-- {{Form::submit('Delete')}} --}}
                {{-- {{Form::close()}}   --}}
            </td>
        </tr>
        @endforeach
      </tbody>
      </table>
      @endsection
  
@section('js_datatable')
    <script>

    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
@endsection
