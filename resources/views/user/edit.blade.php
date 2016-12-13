@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/admin/kategori-tugas') }}">User</a></li>
<li class="active">Ubah User</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah User</h2>
</div>
<div class="panel-body">
{!! Form::model($role_user, ['url' => route('user.update', $role_user->user_id),
'method'=>'put', 'class'=>'form-horizontal']) !!}

<div class="form-group {!! $errors->has('role_id') ? 'has-error' : '' !!}">
{!! Form::label('role_id', 'Role', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('role_id', [''=>'']+App\Role::pluck('display_name','id')->all(), null,  array('class' => 'form-control')) !!}
{!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>

{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection