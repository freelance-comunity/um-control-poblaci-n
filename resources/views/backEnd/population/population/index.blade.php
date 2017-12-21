@extends('layouts.ui') @section('title') Población estudiantil @stop @section('content') @include('backEnd.population.population.excel')
<div class="uk-container uk-container-large">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1 class="uk-heading-primary">Población Estudiantil <a class="uk-button uk-button-primary uk-button-large" href="#excel" uk-toggle>Cargar Excel</a></h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-justify" id="population">
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
    $(document).ready(function() {
      $('#population').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ url('api/population') }}",
        "columns": [{
            data: 'id',
            name: 'id'
          },
          {
            data: 'month',
            name: 'month'
          },
          {
            data: 'date',
            name: 'date'
          },
          {
            data: 'status',
            name: 'status'
          },
          {
            data: 'campus',
            name: 'campus'
          },
          {
            data: 'enrollment',
            name: 'enrollment'
          },
          {
            data: 'career',
            name: 'career'
          },
          {
            data: 'name',
            name: 'name'
          },
          {
            data: 'system',
            name: 'system'
          },
          {
            data: 'turn',
            name: 'turn'
          },
        ],
        "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        columnDefs: [{
          targets: [0],
          visible: false,
          searchable: false
        }, ],
        order: [
          [0, "asc"]
        ],
      });
    });
  </script>
@endsection
@endsection
