@extends('backLayout.app') @section('title') Crear nuevo Usuario @stop @section('content')

<h1>Crear Nuevo Usuario</h1>
<hr/> {!! Form::open(['url' => 'users', 'class' => 'form-horizontal']) !!}
<div class="pmd-card pmd-z-depth">
  <div class="pmd-card-body">
    <div class="group-fields clearfix row {{ $errors->has('name') ? 'has-error' : ''}}">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group pmd-textfield pmd-textfield-floating-label">
          <label for="regular1" class="control-label">
            Nombre*
          </label>
          {!! Form::text('name', null, ['class' => 'form-control']) !!} {!! $errors->first('name', '
          <p class="help-block">:message</p>') !!}
        </div>
      </div>
    </div>
    <div class="group-fields clearfix row {{ $errors->has('email') ? 'has-error' : ''}}">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group pmd-textfield pmd-textfield-floating-label">
          <label for="regular1" class="control-label">
            Email*
          </label>
          {!! Form::email('email', null, ['class' => 'form-control']) !!} {!! $errors->first('email', '
          <p class="help-block">:message</p>') !!}
        </div>
      </div>
    </div>
    <div class="group-fields clearfix row {{ $errors->has('password') ? 'has-error' : ''}}">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group pmd-textfield pmd-textfield-floating-label">
          <label for="regular1" class="control-label">
            Contraseña*
          </label>
          {!! Form::password('password', ['class' => 'form-control']) !!} {!! $errors->first('password', '
          <p class="help-block">:message</p>') !!}
        </div>
      </div>
    </div>
    <div class="group-fields clearfix row {{ $errors->has('campuses_id') ? 'has-error' : ''}}">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group pmd-textfield pmd-textfield-floating-label">
          <label for="regular1" class="control-label">
            Plantel*
          </label>
          {!! Form::select('campuses_id', $campus, null, ['class' => 'form-control']) !!} {!! $errors->first('password', '
          <p class="help-block">:message</p>') !!}
        </div>
      </div>
    </div>
    <div class="group-fields clearfix row {{ $errors->has('role') ? 'has-error' : ''}}">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group pmd-textfield pmd-textfield-floating-label">
          <label for="regular1" class="control-label">
            Plantel*
          </label>
          {!! Form::select('role', $roles, null, ['class' => 'form-control']) !!} {!! $errors->first('roles', '
          <p class="help-block">:message</p>') !!}
        </div>
      </div>
    </div>
  </div>
  <div class="pmd-card-actions">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary next']) !!}
  </div>
</div>
    {!! Form::close() !!} @if ($errors->any())
    <ul class="alert alert-danger">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif @endsection
