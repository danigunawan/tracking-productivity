
<div class="form-group{{ $errors->has('nama_tugas') ? ' has-error' : '' }}">
{!! Form::label('nama_tugas', 'NamaTugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('nama_tugas', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_tugas', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('deskripsi_tugas') ? ' has-error' : '' }}">
{!! Form::label('deskripsi_tugas', 'Deskripsi Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('deskripsi_tugas', null, ['class'=>'form-control']) !!}
{!! $errors->first('deskripsi_tugas', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group {!! $errors->has('id_kategori_tugas') ? 'has-error' : '' !!}">
{!! Form::label('id_kategori_tugas', 'Kategori Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('id_kategori_tugas', [''=>'Kategori Tugas']+App\KategoriTugas::pluck('nama_tugas','id')->all(), null,  array('class' => 'form-control')) !!}
{!! $errors->first('id_kategori_tugas', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group {!! $errors->has('id_user_bertugas') ? 'has-error' : '' !!}">
{!! Form::label('id_user_bertugas', 'User Di Tugaskan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('id_user_bertugas', [''=>'User Di Tugaskan']+App\User::pluck('name','id')->all(), null,  array('class' => 'form-control')) !!}

{!! $errors->first('id_user_bertugas', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group {!! $errors->has('prioritas') ? 'has-error' : '' !!}">
{!! Form::label('prioritas', 'Prioritas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('prioritas', array('1' => 'Tinggi', '2' => 'Sedang', '3' => 'Rendah'), null,  array('class' => 'form-control')) !!}
{!! $errors->first('prioritas', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
{!! Form::label('deadline', 'Due Date', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('deadline', null, ['class'=>'form-control datepicker', 'readonly'=>'true']) !!}
{!! $errors->first('deadline', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
