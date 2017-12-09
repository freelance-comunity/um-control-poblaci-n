@extends('backLayout.app') @section('title') Crear nuevo Rol @stop @section('content')

<h1>Crear Nuevo Rol</h1>
<hr/> {!! Form::open(['url' => 'roles', 'class' => 'form-horizontal']) !!}
<div class="pmd-card pmd-z-depth">
  <div class="pmd-card-body">
    <div class="group-fields clearfix row {{ $errors->has('name') ? 'has-error' : ''}}">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group pmd-textfield pmd-textfield-floating-label">
          <label for="regular1" class="control-label">
                Nombre*
              </label> {!! Form::text('name', null, ['class' => 'form-control']) !!} {!! $errors->first('name', '
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
