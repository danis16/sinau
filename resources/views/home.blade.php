@extends('layouts.app')

@section('content')

                <div class="panel-heading">Dashboard</div>
                {{-- {{$student}}
                @include() --}}

                <div class="panel-body">
                  <form method="POST" action="{{route('send.sms')}}">
                    {{ csrf_field() }}

                    <button>Kirim</button>
                  </form>
                </div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
@endsection
