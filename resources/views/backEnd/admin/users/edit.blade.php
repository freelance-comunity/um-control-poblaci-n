@extends('backLayout.app')
@section('title')
Editar Usuario
@stop

@section('content')

    <h1>Editar Usuario</h1>
    <hr/>
    <div class="page-content profile-edit section-custom">
  			<div class="pmd-card pmd-z-depth">
  				<div class="pmd-card-body">
  					<div class="row">
  						<div class="col-lg-12 custom-col-12">
  							<h3 class="heading">Información Personal</h3>
  							<div class="row">
                  {!! Form::model($user, [
                      'method' => 'PATCH',
                      'url' => ['users', $user->id],
                      'class' => 'form-horizontal'
                  ]) !!}
  								  <fieldset>
  										<div class="form-group prousername pmd-textfield">
  										  <label class="control-label col-sm-3">Nombre</label>
  										  <div class="col-sm-9">
  											<p class="form-control-static"><strong>{{$user->name}}</strong></p>
  										  </div>
  										</div>
  										<div class="form-group pmd-textfield">
  										  <label class="col-sm-3 control-label" for="u_fname">Email</label>
  										  <div class="col-sm-9">
  											  {{-- <input type="email" class="form-control empty" value="andrew.dane@xyz.com" id="inputEmail" placeholder=""> --}}
                          {!! Form::email('email', null, ['class' => 'form-control']) !!}
                          {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  										  </div>
  										</div>
  										<div class="form-group btns margin-bot-30">
  										  <div class="col-sm-9 col-sm-offset-3">
                          {!! Form::submit('Actualizar', ['class' => 'btn btn-primary pmd-ripple-effect']) !!}
  										  </div>
  										</div>
  								  </fieldset>
  								{!! Form::close() !!}
  							</div>
  							<h3 class="heading">Cambiar Contraseña</h3>
  							<div class="row">
  								<form action="{{url('changePassword')}}" class="form-horizontal">
  								  <fieldset>
  									<div class="form-group pmd-textfield">
  										<label class="control-label col-sm-3" for="u_password">Contraseña</label>
  										<div class="col-sm-9">
  											<input type="password" name="password" class="form-control empty" id="inputEmail" value="">
  										</div>
  									</div>
  									<div class="form-group pmd-textfield">
  										<label class="control-label col-sm-3" for="u_password"></label>
  										<div class="col-sm-9">
  											<input type="password" name="password_confirmation" class="form-control empty" id="inputEmail" value="">
  											<span class="help-text">Repetir contraseña</span>
                        <input type="hidden" name="user" value="{{$user->id}}">
  										</div>
  									</div>
  									<div class="form-group btns">
  									  <div class="col-sm-9 col-sm-offset-3">
  										<button type="submit" class="btn btn-primary pmd-ripple-effect">Actualizar</button>
  									  </div>
  									</div>
  								  </fieldset>
  								</form>
  							</div>
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
@endsection
