@extends('backLayout.app')
@section('title')
Editar Plantel
@stop

@section('content')

    <h1>Editar Plantel</h1>
    <hr/>

    {!! Form::model($campus, [
        'method' => 'PATCH',
        'url' => ['admin/campus', $campus->id],
        'class' => 'form-horizontal'
    ]) !!}
    <div class="pmd-card pmd-z-depth">
      <div class="pmd-card-body">
        <div class="group-fields clearfix row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              <label for="regular1" class="control-label">
                Nombre*
              </label> {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('name', '
              <p class="help-block">:message</p>') !!}
            </div>
          </div>
        </div>
        <div class="group-fields clearfix row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              <label class="control-label">Dirección*</label> {!! Form::textarea('address', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('address', '
              <p class="help-block">:message</p>') !!}
            </div>
          </div>
        </div>
        <div class="group-fields clearfix row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              <label for="regular1" class="control-label">
           Código postal*
           </label> {!! Form::text('postal_code', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('postal_code', '
              <p class="help-block">:message</p>') !!}
            </div>
          </div>
          {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
              <label>Estatus*</label>
              <select name="status" class="select-simple form-control pmd-select2">
      									<option></option>
      									<option>ACTIVO</option>
      									<option>INACTIVO</option>
      								</select>
            </div>
          </div> --}}
        </div>
      </div>
      <div class="pmd-card-actions">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary next']) !!}
      </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
