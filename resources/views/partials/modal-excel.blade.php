
<script type="text/javascript" language="javascript">
  function checkfile(sender) {
    var validExts = new Array(".xlsx", ".xls");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      alert("Archivo Seleccionado invalido, por favor selecciona uno de los siguientes tipos de archivos " +
       validExts.toString());
      return false;
    }
    else return true;
  }
</script>
<div tabindex="-1" class="modal fade" id="form-dialog" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bordered">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h2 class="pmd-card-title-text">Cargar Excel</h2>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('import-excel')}}" enctype="multipart/form-data">
         {{csrf_field()}}
          <div class="form-group pmd-textfield pmd-textfield-floating-label">
            <label for="first-name">Cargar Excel</label>
             <input type="file" name="excel" onchange="checkfile(this);" class="form-control">
            <span class="help-text">El archivo tiene que tener extensión .xls</span> </div>
          {{-- <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
              {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
            </div>
          </div> --}}
      </div>
      <div class="pmd-modal-action">
        {{-- <button data-dismiss="modal" class="btn pmd-ripple-effect btn-primary" type="button">Guardar Cambios</button> --}}
        {!! Form::submit('SUBIR', ['class' => 'btn pmd-ripple-effect btn-primary']) !!}
        </form>
        <button data-dismiss="modal" class="btn pmd-ripple-effect btn-danger" type="button">Cancelar</button>
      </div>
    </div>
  </div>
</div>
@section('scripts')

@endsection
