@extends('layouts.ui')
@section('title') Editar Usuario @stop
@section('content')
<div class="uk-container uk-container-large">
  <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Información personal
        </div>
        <div class="uk-card-body">
          {!! Form::model($user, [ 'method' => 'PATCH', 'url' => ['users', $user->id]]) !!}
          <div class="uk-margin">
            <div class="uk-position-relative">
              <img src="{{asset('uploads/avatars')}}/{{$user->avatar}}" style="width:100px; height:100px; border-radius:50%">
              <br>
              {{-- <label class="uk-form-label" for="form-stacked-select">Nombre</label> --}}
              <p class="form-control-static"><strong>{{$user->name}}</strong></p>
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
            {!! Form::submit('Actualizar', ['class' => 'uk-button uk-button-primary']) !!}
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          Actualizar contraseña
        </div>
        <div class="uk-card-body">
          <form action="{{url('changePassword')}}" class="form-horizontal">
            <div class="uk-margin">
              <div class="uk-position-relative">
                <label class="uk-form-label" for="form-stacked-select">Contraseña</label>
                </label>
                <input type="password" name="password" class="uk-input" id="inputEmail" required> {!! $errors->first('password', '
                <p class="help-block">:message</p>') !!}
              </div>
            </div>
            <div class="uk-margin">
              <div class="uk-position-relative">
                <label class="uk-form-label" for="form-stacked-select">Repetir contraseña</label>
                </label>
                <input type="password" name="password_confirmation" class="uk-input" id="inputEmail">
                <input type="hidden" name="user" value="{{$user->id}}">
              </div>
            </div>
            <div class="uk-margin">
              {!! Form::submit('Actualizar', ['class' => 'uk-button uk-button-primary']) !!}
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @if ($errors->any())
  <div class="uk-alert-danger" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  </div>
  @endif
  <div>
  </div>
</div>
</div>
@endsection
