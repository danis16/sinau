@extends('layouts.app')


@section('content')
        <h2>Tampil Siswa</h2>
      <a href="{{url('students/create')}}"><button class="btn btn-primary">Tambah</button></a><br><br>
      <table id="example" class="table table-bordered table-hover" style="width:100%">
      <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Umur</td>
            <td>Gender</td>
            <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
      <?php $no=1;?>
      @foreach($data as $d)
        <tr>
            <td> <?php echo $no++ ?></td>
            <td>{{$d->name}}</td>
            <td>{{$d->age}}</td>
            <td>{{$d->gender}}</td>
            <td> <a href="{{url('students/'.$d->id.'/edit')}}"><button class="btn btn-success">Edit</button></a>  
            <!-- <a href="{{url('students/'.$d->id.'/destroy')}}"><button>Delete</button></a>  -->
            {{Form::open(['method'=>'DELETE', 'route'=>['students.destroy',$d->id]])}} 
            
            <button class="btn btn-danger" type="submit" onClick="return confirm('Yakin mau hapus?');">Hapus</button>
            {{-- {{Form::submit('Delete')}} --}}
             {{Form::close()}}  
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
</html>