	@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('tugas.store-auditor'),
                    'method' => 'post', 'class'=>'form-horizontal']) !!}
                    @include('tugas._form_auditor')


                    {!! Form::close() !!}


                </div>
            </div>

@if(isset($judul))
<h2>{{ $judul }} </h2>
@endif
            @foreach ($tugas as $user)
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
                <a  href="{{ route('tugas.detail',$user->id_tugas)}}" class="btn btn-default">Komentar</a>
                <br>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
