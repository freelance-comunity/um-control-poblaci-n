@extends('backLayout.app') @section('content')

<h1>Planteles <a href="{{ url('admin/campus/create') }}" class="btn btn-lg pmd-btn-raised pmd-ripple-effect btn-primary pull-right">Agregar Nuevo Plantel</a></h1>
<hr>
<!-- table card code and example -->
<div class="col-md-12">
  <div class="component-box">
    <!-- table card example -->
    <div class="pmd-card pmd-z-depth pmd-card-custom-view">
      <div class="table table-responsive">
        <table id="#campus" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Código Postal</th>
              <th>Detalle</th>
            </tr>
          </thead>
          <tbody>
            @foreach($campus as $item)
            <tr>
              <td><a href="{{ url('admin/campus', $item->id) }}">{{ $item->name }}</a></td>
              <td>{{ $item->address }}</td>
              <td>{{ $item->postal_code }}</td>
              <td>
                <a href="{{ url('admin/campus/' . $item->id . '/edit') }}" class="btn pmd-ripple-effect btn-primary">Actualiar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/campus', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
                ['class' => 'btn pmd-ripple-effect btn-danger']) !!} {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pull-right" style="padding-right: 30px;">
          {{ $campus->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
