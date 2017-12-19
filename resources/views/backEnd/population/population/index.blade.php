@extends('layouts.ui') @section('title') Población estudiantil @stop @section('content')
<div class="uk-container uk-container-large">
  <div uk-grid class="uk-child-width-3-4@s uk-child-width-3-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1 class="uk-heading-primary">Población Estudiantil <button data-target="#form-dialog" data-toggle="modal" class="uk-button uk-button-primary uk-button-large" type="button">Cargar Excel</button> <!--<a href="{{ url('population/population/create') }}" class="btn btn-lg pmd-btn-raised pmd-ripple-effect btn-primary pull-right">Agregar Nuevo Registro</a>--></h1>
          @include('partials.modal-excel')
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-justify" id="population">
              <thead>
                <tr>
                  <th>Mes</th>
                  <th>Fecha</th>
                  <th>Estatus</th>
                  <th>Plantel</th>
                  <th>Matricula</th>
                  <th>Carrera</th>
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
                  {{--
                  <th>Detalle</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($population as $item)
                <tr>
                  <td>{{ $item->month}}</td>
                  <td>{{ $item->date}}</td>
                  <td>{{ $item->status}}</td>
                  <td>{{ $item->campus }}</td>
                  <td>{{ $item->enrollment}}</td>
                  <td>{{ $item->career }}</td>
                  <td>
                    <!--<a href="{{ url('population/population', $item->id) }}">-->{{ $item->name }}
                    <!--</a>-->
                  </td>
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
                  {{--
                  <td>
                    <a href="{{ url('population/population/' . $item->id . '/edit') }}" class="btn pmd-ripple-effect btn-primary">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['population/population', $item->id], 'style' => 'display:inline'
                    ]) !!} {!! Form::submit('Eliminar', ['class' => 'btn pmd-ripple-effect btn-danger']) !!} {!! Form::close() !!}
                  </td> --}}
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{-- <div class="pull-right" style="padding-right: 30px;">
            {{ $population->links() }}
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#population').DataTable({
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
                  visible: false,
                  searchable: false
                  },
              ],
              order: [[0, "asc"]],
          });
    });
  </script>
@endsection
