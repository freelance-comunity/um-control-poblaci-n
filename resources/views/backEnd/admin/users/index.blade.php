@extends('layouts.ui') @section('title') Usuarios @stop @section('content')
<div class="uk-container uk-container-small">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1 class="uk-heading-primary">Usuarios <a href="{{ url('users/create') }}" class="uk-button uk-button-primary uk-button-large">Agregar Nuevo Usuario</a></h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-justify">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Foto de perfil</th>
                  <th>Correo Electrónico</th>
                  <th>Detalle</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td><img src="{{asset('uploads/avatars')}}/{{$item->avatar}}" style="width:60px; height:60px; border-radius:50%"></td>
                  <td>{{ $item->email }}</td>
                  <td>
                    <a href="{{ url('users/' . $item->id . '/edit') }}" class="uk-button uk-button-small uk-button-default">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['users', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
                    ['class' => 'uk-button uk-button-small uk-button-danger']) !!} {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="pull-right" style="padding-right: 30px;">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
