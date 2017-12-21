@extends('layouts.ui') @section('title') Editar Rol @stop @section('title-section') Editar Rol @stop @section('content')
<div class="uk-container uk-container-small">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1>Crear Nuevo Rol</h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <hr/> {!! Form::model($role, [ 'method' => 'PATCH', 'url' => ['roles', $role->id], 'class' => 'form-horizontal' ]) !!}
            <fieldset class="uk-fieldset">
              <div class="uk-margin">
                <div class="uk-position-relative">
                  <span class="uk-form-icon ion-edit"></span> {!! Form::text('name', null, ['class' => 'uk-input', 'placeholder' => 'Escribe nombre del rol...']) !!} {!! $errors->first('name', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>
              <div class="uk-margin">
                {!! Form::submit('Guardar', ['class' => 'uk-button uk-button-primary']) !!}
              </div>
            </fieldset>
            {!! Form::close() !!} @if ($errors->any())
            <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
