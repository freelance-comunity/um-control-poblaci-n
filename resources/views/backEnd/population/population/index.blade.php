@extends('backLayout.app') @section('title') Población Estudiantil @stop @section('content')

<h1>Población Estudiantil <div class="btn-group pull-right"  style="margin: 9px 0 5px;"><button data-target="#form-dialog" data-toggle="modal" class="btn btn-lg pmd-btn-raised pmd-ripple-effect btn-warning pull-right" type="button">Cargar Excel</button> <a href="{{ url('population/population/create') }}" class="btn btn-lg pmd-btn-raised pmd-ripple-effect btn-primary pull-right">Agregar Nuevo Registro</a></div></h1>
<hr> @include('partials.modal-excel') @if ($errors->any())
<ul class="alert alert-danger">
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<div class="table table-responsive">
  <table class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Mes</th>
        <th>Fecha</th>
        <th>Estatus</th>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Sistema</th>
        <th>Turno</th>
        <th>Día semi escolarizado</th>
        <th>Beca</th>
        <th>Foranea</th>
        <th>Convenio</th>
        <th>Promedio</th>
        <th>5 o más</th>
        <th>Cuatrimestre</th>
        <th>Año de Ingreso</th>
        <th>Año de Egreso</th>
        <th>Observaciones de cambios de carrera, sistema, plantel, etc.</th>
        <th>Fecha de modificación de cambios de carrera, sistema, plantel, etc.</th>
        <th>Baja</th>
        <th>Fecha baja</th>
        <th>Observaciones de bajas</th>
        <th>Carta de pasante</th>
        <th>Certificado de licenciatura</th>
        <th>Titulo</th>
        <th>Detalle</th>
      </tr>
    </thead>
    <tbody>
      @foreach($population as $item)
      <tr>
        <td>{{ $item->month}}</td>
        <td>{{ $item->date}}</td>
        <td>{{ $item->status}}</td>
        <td>{{ $item->enrollment}}</td>
        <td><a href="{{ url('population/population', $item->id) }}">{{ $item->name }}</a></td>
        <td>{{ $item->system }}</td>
        <td>{{ $item->turn }}</td>
        <td>{{ $item->semi_day }}</td>
        <td>{{ $item->scholarship }}</td>
        <td>{{ $item->foreign }}</td>
        <td>{{ $item->agreement }}</td>
        <td>{{ $item->average }}</td>
        <td>{{ $item->five_or_more }}</td>
        <td>{{ $item->quarter }}</td>
        <td>{{ $item->year_income }}</td>
        <td>{{ $item->year_discharge }}</td>
        <td>{{ $item->observations_of_changes }}</td>
        <td>{{ $item->modification_date }}</td>
        <td>{{ $item->low }}</td>
        <td>{{ $item->low_date }}</td>
        <td>{{ $item->observations_low }}</td>
        <td>{{ $item->intern_letter }}</td>
        <td>{{ $item->certificate }}</td>
        <td>{{ $item->title }}</td>
        <td>
          <a href="{{ url('population/population/' . $item->id . '/edit') }}" class="btn pmd-ripple-effect btn-primary">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['population/population', $item->id], 'style' => 'display:inline' ]) !!}
          {!! Form::submit('Eliminar', ['class' => 'btn pmd-ripple-effect btn-danger']) !!} {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pull-right" style="padding-right: 30px;">
    {{ $population->links() }}
  </div>
</div>
@endsection
