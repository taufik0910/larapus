@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active">Ubah Password</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Password</h2>
</div>
<div class="panel-body">
<<<<<<< HEAD
{!! Form::open(['url' => url('/settings/password'),'method' => 'post', 'class'=>'form-horizontal']) !!}
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
{!! Form::label('password', 'Password lama', ['class'=>'col-md-4 control-label']) !!}
=======
{!! Form::open(['url' => url('/settings/password'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
{!! Form::label('password', 'Password lama', ['class'=>'col-md-4 control-label'\
	]) !!}
>>>>>>> 2ddd467ce0c2e9397f56f5d63a66c275183efc34
<div class="col-md-6">
{!! Form::password('password', ['class'=>'form-control']) !!}
{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
<<<<<<< HEAD
{!! Form::label('new_password', 'Password baru', ['class'=>'col-md-4 control-label']) !!}
=======
{!! Form::label('new_password', 'Password baru', ['class'=>'col-md-4 control-la\
bel']) !!}
>>>>>>> 2ddd467ce0c2e9397f56f5d63a66c275183efc34
<div class="col-md-6">
{!! Form::password('new_password', ['class'=>'form-control']) !!}
{!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
</div>
</div>
<<<<<<< HEAD
<div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error': '' }}">
{!! Form::label('new_password_confirmation', 'Konfirmasi password baru', ['class'=>'col-md-4 control-label']) !!}
<div class="col-md-6">
{!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
{!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
=======
<div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error'\
: '' }}">
{!! Form::label('new_password_confirmation', 'Konfirmasi password baru', ['clas\
s'=>'col-md-4 control-label']) !!}
<div class="col-md-6">
{!! Form::password('new_password_confirmation', ['class'=>'form-control']) !!}
{!! $errors->first('new_password_confirmation', '<p class="help-block">:messa\
ge</p>') !!}
>>>>>>> 2ddd467ce0c2e9397f56f5d63a66c275183efc34
</div>
</div>
<div class="form-group">
<div class="col-md-6 col-md-offset-4">
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