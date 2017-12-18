@extends('layouts.ui') @section('title') Crear nuevo Usuario @stop @section('content')
<div class="uk-container uk-container-small">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1>Crear Nuevo Usuario</h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            {!! Form::open(['url' => 'users', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            <fieldset class="uk-fieldset">

              <div class="uk-margin">
                <div class="uk-position-relative">
                  <span class="uk-form-icon ion-edit"></span> {!! Form::text('name', null, ['class' => 'uk-input', 'placeholder' => 'Nombre', 'required']) !!} {!! $errors->first('name', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="uk-margin">
                <div class="uk-position-relative">
                  <span class="uk-form-icon ion-android-person"></span>
                </label> {!! Form::email('email', null, ['class' => 'uk-input', 'placeholder' => 'Email', 'required']) !!} {!! $errors->first('email', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="uk-margin">
                <div class="uk-position-relative">
                  <span class="uk-form-icon ion-locked"></span> {!! Form::password('password', ['class' => 'uk-input', 'placeholder' => 'Contraseña', 'required']) !!} {!! $errors->first('password', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="uk-margin">
                <div class="uk-position-relative">
                    <label class="uk-form-label" for="form-stacked-select">Foto de perfil</label>
                  {!! Form::file('avatar', ['class' => 'uk-input']) !!} {!! $errors->first('file', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="uk-margin">
                <div class="uk-position-relative">
                  <label class="uk-form-label" for="form-stacked-select">Plantel</label> {!! Form::select('campuses_id', $campus, null, ['class' => 'uk-select', 'required']) !!} {!! $errors->first('password', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="uk-margin">
                <div class="uk-position-relative">
                  <label class="uk-form-label" for="form-stacked-select">Rol</label> {!! Form::select('role', $roles, null, ['class' => 'uk-select', 'required']) !!} {!! $errors->first('roles', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>

              <div class="uk-margin">
                {!! Form::submit('Guardar', ['class' => 'uk-button uk-button-primary']) !!}
              </div>

              <hr />
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
