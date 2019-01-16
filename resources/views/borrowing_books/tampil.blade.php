@extends('layouts.app')


@section('content') 
        <h2>Tampil Peminjaman Buku</h2>
      {{-- <a href="{{url('borrowing/create')}}"><button class="btn btn-primary">Tambah</button></a><br><br> --}}
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
            Tambah
          </button>

      <table id="example" class="table table-bordered table-hover" style="width:100%">
      <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Buku</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal Pengembalian</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
      </thead>
      <tbody>
        {{-- {{$data}}      --}}
     <?php $no=1;?>
      @foreach($data as $d)
        <tr>
            <td> <?php echo $no++ ?></td>
            <td>{{isset($d->students) ? $d->students->name:'-'}}</td>
            <td>{{isset($d->books) ? $d->books->book_name:'-'}}</td>
            <td>{{$d->date_of_borrowing}}</td>
            <td>{{$d->date_of_return}}</td>
            <td>{{$d->status == 0 ? 'false' : 'true' }}</td>
            <td> 
            
            {{-- <a href="{{url('borrowing/edit/'.$d->id)}}"> --}}
              <button onclick="data({{$d->id}})" type="button" class="btn btn-success">Edit</button>
            {{-- </a> --}}
            {{-- <a href="{{url('borrowing/'.$d->id.'/edit')}}"><button class="btn btn-success">Edit</button></a> --}}
            
            {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit" onclick="data()"> --}}
                   {{-- Edit
            </button> --}}
            {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit" onclick="data()">
                   Edit
            </button> --}}
            
           <!-- Button trigger modal -->
          <button onclick="hapus({{$d->id}})" type="button" class="btn btn-danger">
            Hapus
          </button>

            </td>
        </tr>
          
        @endforeach
      </tbody>
      </table>

{{-- MODAL DELETE  START--}}


<!-- Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{Form::open(['method'=>'DELETE', 'id'=>'confirm'])}}
      {{csrf_field()}}
      <div class="modal-body-delete">
        Apakah anda yakin dengan keputusan anda ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger" id="respon-delete">Yes !</button>
      </div>
      {{Form::close()}}
    </div>
  </div>
</div>

{{-- MODAL DELETE END --}}




      {{-- MODAL CREATE --}}

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                {{Form::open(['id'=>'myform','url'=>'#', 'method'=>'post'])}}
              
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama NIS</label>
                        <select name="nis" id="nis" class="form-control">
                                <option value=></option>
                                @foreach ($student as $d)
                                <option value={{$d->id}}> {{$d->name}} || {{$d->id}} </option>
                                @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Judul Buku</label>
                        <select name="book_name" id="book_name" class="form-control">
                                @foreach ($books as $d)
                                <option value={{$d->id}}> {{$d->book_name}}
                                @endforeach
                        </select>      
                      </div>

                      <div class="form-group">
                            <label for="exampleFormControlSelect1">Tanggal Pinjam</label>
                            <input type="date" id="tanggal_pinjam" class="form-control" value="{{ Carbon\Carbon::now()->toDateString()}}">
                       </div>
                      <div class="form-group">
                            <label for="exampleFormControlSelect1">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
                       </div>

                       
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        {{-- <input type="button"  onclick="add()" value="Add"  class="btn btn-primary" data-dismiss="modal"/> --}}
                        {{-- <button type="submit" class="btn btn-primary">ADD</button> --}}
                        <button type="submit" class="btn btn-primary">Add</button>
           
                        {{Form::close()}}
        </div>
      </div>
    </div>
  </div>

  {{-- END MODAL CREATE --}}
  

  {{-- START MODAL EDIT CREATE --}}
<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
    
                    {{Form::open(['id'=>'myform','url'=>'#', 'method'=>'post'])}}
                  
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Nama NIS</label>
                            <select name="nis" id="nis" class="form-control">
                                    @foreach ($student as $d)
                                    <option value={{$d->id}}> {{$d->name}} || {{$d->id}} </option>
                                    @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Judul Buku</label>
                            <select name="book_name" id="book_name" class="form-control">
                                    @foreach ($books as $d)
                                    <option value={{$d->id}}> {{$d->book_name}}
                                    @endforeach
                            </select>      
                          </div>
    
                          <div class="form-group">
                                <label for="exampleFormControlSelect1">Tanggal Pinjam</label>
                                <input type="date" id="tanggal_pinjam" class="form-control" >
                           </div>
                          <div class="form-group">
                                <label for="exampleFormControlSelect1">Tanggal Kembali</label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control">
                           </div>
    
                           
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            {{-- <input type="button"  onclick="add()" value="Add"  class="btn btn-primary" data-dismiss="modal"/> --}}
                            {{-- <button type="submit" class="btn btn-primary">ADD</button> --}}
                            <button type="submit" class="btn btn-primary">Add</button>
               
                            {{Form::close()}}
            </div>
          </div>
        </div>
      </div>
    
  {{-- END MODAL CREATE --}}







@endsection

@section('js_datatable')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {

            $("form#myform").validate({
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

                    // if (isNotEmpty(Tanggal_Pinjam) && isNotEmpty(Tanggal_Kembali) && isNotEmpty(Buku) && isNotEmpty(Nis)) {

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
                    // }
                return false;
                }
                
            });
} );


        function data(id){
          $('#modal-edit').modal();
          $.ajax({
              url: "{{url('borrowing/edit')}}/"+id,
              type: 'GET',
              success : function(res){
                $("select#nis").change(function(){
                  var selectedNIS = $(this).children("option:selected").val();
                  // alert("You have selected the NIS - " + selectedNIS);
              });
              // $("select#book_name").change(function(){
              //     var selectedBook_Name = $(this).children("option:selected").val();
              // });
                $("#nis").val('id_students');
                // $("#book_name").val('id_books');
                // $("#tanggal_pinjam").val('date_of_borrowing');
                // $("#tanggal_kembali").val('date_of_return');
              }
          })
        }

        function hapus(id){
          $('#modal-delete').modal();

          $('#respon-delete').on('click', function(e) {
            // e.preventDefault(); //buat menahan fungsi aslinya
            $('#confirm').attr('action', "{{route('borrowing.destroy', '')}}/" +id).submit();
          });
        }
         </script>
    @endsection
</html>