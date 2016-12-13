	@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li ><a href="{{ route('tugas.show',$tugas->id_tugas)}}">Tugas {{ $tugas->nama_tugas }}</a></li>
<li  class="active">Sub Tugas {{ $tugas->nama_tugas }}</li>
</ul>
            <div class="panel panel-default">
                <div class="panel-heading">Subtugas {{ $tugas->nama_tugas }} </div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('subtugas.store'),
                    'method' => 'post', 'class'=>'form-horizontal']) !!}
                    @include('subtugas._form_member')


                    {!! Form::close() !!}


                </div>
            </div>

            @foreach ($subtugas as $user)
 <div class="panel panel-default">
                <div class="panel-heading"> {{ $user->nama_tugas }} . Prioritas:
                 @if($user->prioritas == 1)   Tinggi
                 @elseif($user->prioritas == 2) Sedang 
                 @elseif($user->prioritas == 3) Rendah
                 @endif
                 . 
                 Due Date (deadline) : {{ $user->deadline}} . Kategori : {{ $user->k}}
                 </div>

                <div class="panel-body">
                {{ $user->deskripsi_tugas }}

                </div>
                <a  href="{{ route('tugas.show',$user->id_tugas)}}" class="btn btn-default">Komentar</a>
                <br>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
