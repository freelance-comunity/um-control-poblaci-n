@extends('layouts.ui') 
@section('title') 
Población estudiantil 
@stop 
@section('title-section') 
Población estudiantil
@stop
@section('content') 
@include('backEnd.population.population.excel')
<div class="uk-container uk-container-large">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1 class="uk-heading-primary">Población Estudiantil
            <a class="uk-button uk-button-primary uk-button-large" href="#excel" uk-toggle>Cargar Excel</a>
          </h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-justify" id="populations">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Mes</th>
                  <th>Fecha</th>
                  <th>Estatus</th>
                  <th>Plantel</th>
                  <th>Matricula</th>
                  <th>Carrera</th>
                  <th>Nombre</th>
                  <th>Sistema</th>
                  <th>Turno</th>
                </tr>
              </thead>
              <tbody>
                @foreach($population as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->month }}</td>
                  <td>{{ $item->date }}</td>
                  <td>{{ $item->status }}</td>
                  <td>{{ $item->campus }}</td>
                  <td>{{ $item->enrollment }}</td>
                  <td>{{ $item->career }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->system }}</td>
                  <td>{{ $item->turn }}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Mes</th>
                  <th>Fecha</th>
                  <th>Estatus</th>
                  <th>Plantel</th>
                  <th>Matricula</th>
                  <th>Carrera</th>
                  <th>Nombre</th>
                  <th>Sistema</th>
                  <th>Turno</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@section('scripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('#populations').DataTable({
      "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página.",
        "zeroRecords": "Lo sentimos. No se encontraron registros.",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros aún.",
        "infoFiltered": "(filtrados de un total de _MAX_ registros)",
        "search": "Búsqueda",
        "LoadingRecords": "Cargando ...",
        "Processing": "Procesando...",
        "SearchPlaceholder": "Comience a teclear...",
        "paginate": {
          "previous": "Anterior",
          "next": "Siguiente",
        }
      },
      columnDefs: [{
        targets: [0],
        visible: true,
        searchable: true
      }, ],
      order: [
        [0, "asc"]
      ],
    });
  });
</script>
@endsection @endsection