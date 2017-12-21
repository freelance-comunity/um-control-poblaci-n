<script type="text/javascript" language="javascript">
  function checkfile(sender) {
    var validExts = new Array(".xlsx", ".xls");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
      event.target.value = '';
      alert("Archivo Seleccionado invalido, por favor selecciona uno de los siguientes tipos de archivos " +
        validExts.toString());
      return false;
    } else return true;
  }
</script>
<div id="excel" uk-modal>
  <div class="uk-modal-dialog">
    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-modal-header">
      <h2 class="uk-modal-title">Subir archivo Excel</h2>
    </div>
    <div class="uk-modal-body">
      <form method="post" action="{{url('import-excel')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset class="uk-fieldset">
          <div class="uk-margin">
            <div class="uk-position-relative">
              <label class="uk-form-label" for="form-stacked-select">Seleccionar archivo</label>
              <input type="file" name="excel" id="excel" onchange="checkfile(this);" class="uk-input"> {!! $errors->first('excel', '
              <p class="help-block">:message</p>') !!}
            </div>
          </div>
        </fieldset>
    </div>
    <div class="uk-modal-footer uk-text-right">
      <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
      {!! Form::submit('SUBIR', ['class' => 'uk-button uk-button-primary']) !!}
    </div>
    </div>
    </form>
  </div>
</div>
