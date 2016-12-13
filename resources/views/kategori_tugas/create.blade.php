@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/admin/kategori-tugas') }}">Kategori Tugas</a></li>
<li class="active">Tambah Kategori Tugas</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Kategori Tugas</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('kategori-tugas.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('kategori_tugas._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
