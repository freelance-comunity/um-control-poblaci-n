@extends('layouts.ui') @section('title')Actualizar foto de perfil @stop @section('content')
<div class="uk-container uk-container-small">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1>Actualizar foto de perfil</h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <img src="{{asset('uploads/avatars')}}/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ Auth::user()->name }}</h2>
            <form enctype="multipart/form-data" action="{{url('/profile')}}" method="POST">
              <div class="uk-margin">
                <div class="uk-position-relative">
                  {!! Form::file('avatar', ['class' => 'uk-input', 'required']) !!} {!! $errors->first('file', '
                  <p class="help-block">:message</p>') !!}
                </div>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="uk-margin">
                {!! Form::submit('Actualizar', ['class' => 'uk-button uk-button-primary']) !!}
              </div>
            </form>
            @if ($errors->any())
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
