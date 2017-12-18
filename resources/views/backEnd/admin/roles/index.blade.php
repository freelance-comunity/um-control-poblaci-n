@extends('layouts.ui') @section('title') Roles @stop @section('content')
<div class="uk-container uk-container-small">
  <div uk-grid class="uk-child-width-2-4@s uk-child-width-2-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1 class="uk-heading-primary">Roles <a href="{{ url('roles/create') }}" class="uk-button uk-button-primary uk-button-large">Agregar Nuevo Rol</a></h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-justify">
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
              <td>{{ $item->name }}</td>
              <td>
                <a href="{{ url('roles/' . $item->id . '/edit') }}" class="uk-button uk-button-default">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['roles', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
                ['class' => 'uk-button uk-button-danger']) !!} {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="pull-right" style="padding-right: 30px;">
        {{ $roles->links() }}
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
