	@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active">Tugas {{ $tugas->nama_tugas }}</li>
</ul>
    <!-- panel tugas -->
 <div class="panel panel-default">
                <div class="panel-heading"> {{ $tugas->nama_tugas }} . Prioritas:
                 @if($tugas->prioritas == 1)   Tinggi
                 @elseif($tugas->prioritas == 2) Sedang 
                 @elseif($tugas->prioritas == 3) Rendah
                 @endif
                 . 
                 Due Date (deadline) : {{ $tugas->deadline}} . Kategori : 
                 </div>

                <div class="panel-body">
                {{ $tugas->deskripsi_tugas }}

                </div>
                <a  href="{{ route('subtugas.display',$tugas->id_tugas)}}" class="btn btn-default">Sub Tugas</a> 
                @role('member')
                @if($tugas->status_selesai === 0)
                <a  href="{{ route('tugas.finish',$tugas->id_tugas)}}" class="btn btn-danger">Selesai</a>
                @endif
                @endrole
                @role('auditor')
                 @if($tugas->status_konfirmasi == 0 &&  $tugas->status_selesai === 1)
                <a  href="{{ route('tugas.confirm',$tugas->id_tugas)}}" class="btn btn-danger">Konfirmasi Selesai</a>
                   @endif
                @endrole
                <br>
            </div>
 <!-- /panel tugas -->
 <!-- panel form komentar -->
 <div class="panel panel-default">
                <div class="panel-heading"> 
                Komentar
                 </div>

                <div class="panel-body">
                {!! Form::open(['url' => route('tugas.komentar'),
                    'method' => 'post', 'class'=>'form-horizontal']) !!}
                    @include('tugas._form_komentar')


                    {!! Form::close() !!}
               
                </div>
          
                <br>
            </div>
 <!-- /panel form komentar -->

 <!-- menampilkan semua komentar untuk tugas yang di pilih -->
            @foreach ($komentar_tugas as $komentars)
 <div class="panel panel-default">
                <div class="panel-heading"> {{ $komentars->email }} ( {{ $komentars->name }} )  {{ $komentars->created_at }}
                 </div>

                <div class="panel-body">
                {{ $komentars->isi_komentar }}

                </div>
            </div>

            @endforeach
<!-- /menampilkan semua komentar untuk tugas yang di pilih -->

           
        </div>
    </div>
</div>
@endsection
