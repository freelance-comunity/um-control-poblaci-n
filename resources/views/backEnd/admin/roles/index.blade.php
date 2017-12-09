@extends('backLayout.app') @section('title') Roles @stop @section('content')

<h1>Roles <a href="{{ url('roles/create') }}" class="btn btn-lg pmd-btn-raised pmd-ripple-effect btn-primary pull-right">Agregar Nuevo Rol</a></h1>
<hr>
<!-- table card code and example -->
<div class="col-md-12">
  <div class="component-box">
    <!-- table card example -->
    <div class="pmd-card pmd-z-depth pmd-card-custom-view">
      <div class="table table-responsive">
        <table class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Detalle</th>
            </tr>
          </thead>
          <tbody>
            @foreach($roles as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td><a href="{{ url('roles', $item->id) }}">{{ $item->name }}</a></td>
              <td>
                <a href="{{ url('roles/' . $item->id . '/edit') }}" class="btn pmd-ripple-effect btn-primary">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['roles', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
                ['class' => 'btn pmd-ripple-effect btn-danger']) !!} {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pull-right" style="padding-right: 30px;">
          {{ $roles->links() }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
