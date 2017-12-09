@extends('backLayout.app') @section('title') Usuarios @stop @section('content')

<h1>Usuarios <a href="{{ url('users/create') }}" class="btn btn-lg pmd-btn-raised pmd-ripple-effect btn-primary pull-right">Agregar Nuevo Usuario</a></h1>
<hr>
<!-- table card code and example -->
<div class="col-md-12">
  <div class="component-box">
    <!-- table card example -->
    <div class="pmd-card pmd-z-depth pmd-card-custom-view">
      <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tblusers">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo Electrónico</th>
              <th>Detalle</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $item)
            <tr>
              <td><a href="{{ url('users', $item->id) }}">{{ $item->name }}</a></td>
              <td>{{ $item->email }}</td>
              <td>
                <a href="{{ url('users/' . $item->id . '/edit') }}" class="btn pmd-ripple-effect btn-primary">Actualizar</a>
                {!! Form::open([ 'method'=>'DELETE', 'url' => ['users', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar', ['class' =>
                'btn pmd-ripple-effect btn-danger']) !!} {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pull-right" style="padding-right: 30px;">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
