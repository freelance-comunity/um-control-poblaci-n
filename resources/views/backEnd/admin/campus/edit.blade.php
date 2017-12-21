@extends('layouts.ui') @section('title') Editar Plantel @stop @section('title-section') Editar Plantel @stop @section('content')
<div class="uk-container uk-container-small">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1>Editar Plantel</h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            {!! Form::model($campus, [
                'method' => 'PATCH',
                'url' => ['admin/campus', $campus->id],
                'class' => 'form-horizontal'
            ]) !!}
           <fieldset class="uk-fieldset">
             <div class="uk-margin">
               <div class="uk-position-relative">
                 <span class="uk-form-icon ion-edit"></span> {!! Form::text('name', null, ['class' => 'uk-input', 'placeholder' => 'Escribe el nombre del plantel...', 'required' => 'required']) !!} {!! $errors->first('name', '
                             <p class="help-block">:message</p>') !!}
               </div>
             </div>
             <div class="uk-margin">
               <div class="uk-position-relative">
                 <span class="uk-form-icon ion-edit"></span> {!! Form::textarea('address', null, ['class' => 'uk-textarea', 'placeholder' => 'Escribe la dirección del plantel...', 'required' => 'required']) !!} {!! $errors->first('address', '
                 <p class="help-block">:message</p>') !!}
               </div>
             </div>
             <div class="uk-margin">
               <div class="uk-position-relative">
                 <span class="uk-form-icon ion-edit"></span> {!! Form::text('postal_code', null, ['class' => 'uk-input', 'placeholder' => 'Escribe el código postal...', 'required' => 'required']) !!} {!! $errors->first('postal_code', '
                                <p class="help-block">:message</p>') !!}
               </div>
             </div>
             <div class="uk-margin">
               <div class="uk-position-relative">
                 <label class="uk-form-label" for="form-stacked-select">Estatus</label> {!! Form::select('status',['ACTIVO' => 'ACTIVO', 'INCTIVO' => 'INACTIVO'], null, ['class' => 'uk-select', 'required']) !!} {!! $errors->first('password', '
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
