@extends('layouts.master-app')

@section('content')
<form class="" action="{{ url('generar')}}" method="get">
  <div class="form-group">
    <label for="">Referencia</label>
    <input type="text" name="reference" class="form-group" value="">
  </div>
  <div class="form-group">
    <label for="">Fecha limite</label>
    <input type="date" name="date_limit" value="">
  </div>
  <div class="form-group">
    <label for="">Importe</label>
    <input type="number" name="amount" value="">
  </div>
  <div class="form-group">
    <input type="submit" name="" value="GENERAR">
  </div>
</form>
@endsection
