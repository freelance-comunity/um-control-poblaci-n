@extends('layouts.ui') @section('title') Planteles @stop @section('content')
<div class="uk-container uk-container-small">
  <div uk-grid class="uk-child-width-2-4@s uk-child-width-2-4@l">
    <div>
      <div class="uk-card uk-card-default">
        <div class="uk-card-header">
          <h1 class="uk-heading-primary">Planteles <a href="{{ url('admin/campus/create') }}" class="uk-button uk-button-primary uk-button-large">Agregar Nuevo Plantel</a></h1>
        </div>
        <div class="uk-card-body">
          <div class="uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-justify" id="campus">
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
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->address }}</td>
                  <td>{{ $item->postal_code }}</td>
                  <td>
                    <a href="{{ url('admin/campus/' . $item->id . '/edit') }}" class="uk-button-small-bottom uk-width-1-1 uk-button uk-button-default">Actualiar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/campus', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
                    ['class' => 'uk-button-small-bottom uk-width-1-1 uk-button uk-button-danger']) !!} {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
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
    $('#campus').DataTable({
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
                },
            ],
            order: [[0, "asc"]],
        });
  });
</script>
@endsection
@endsection
