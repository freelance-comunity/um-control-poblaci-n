@extends('layouts.master-login')

@section('content')
  <form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="pmd-card-title card-header-border text-center">
      <div class="loginlogo">
        <a href="javascript:void(0);"><img src="{{asset('images/logo_1.png')}}"  alt="Logo"></a>
      </div>
      <h3>Inicia de sesión <span>con tu<strong> CUENTA</strong></span></h3>
    </div>

    <div class="pmd-card-body">
      <div class="alert alert-success" role="alert"> Oh snap! Change a few things up and try submitting again. </div>
                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label for="inputError1" class="control-label pmd-input-group-label">Usuario</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus id="exampleInputAmount">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group pmd-textfield pmd-textfield-floating-label">
                    <label for="inputError1" class="control-label pmd-input-group-label">Contraseña</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                        <input type="password" class="form-control" name="password" required id="exampleInputAmount">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
    <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
      <div class="form-group clearfix">
        <div class="checkbox pull-left">
          <label class="pmd-checkbox checkbox-pmd-ripple-effect">
            <input type="checkbox" checked="" value="">
            <span class="pmd-checkbox"> Recordar</span>
          </label>
        </div>
        <span class="pull-right forgot-password">
          <a href="{{ route('password.request') }}">¿Olvidate tu contraseña?</a>
        </span>
      </div>
      {{-- <a href="index.html" type="button" class="btn pmd-ripple-effect btn-primary btn-block">Entrar</a> --}}
      <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block" name="button">Entrar</button>

      {{-- <p class="redirection-link">Don't have an account? <a href="javascript:void(0);" class="login-register">Sign Up</a>. </p> --}}

    </div>

  </form>
@endsection
