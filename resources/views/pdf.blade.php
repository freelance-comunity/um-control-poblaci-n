<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Pago referenciado</title>
</head>
<style>
body{
  font-family: Arial;
}
  .demo {
    width: 100%;
    border: 1px solid #C0C0C0;
    border-collapse: collapse;
    padding: 5px;
  }

  .demo th {
    border: 1px solid #C0C0C0;
    padding: 5px;
    background: #242424;
  }

  .demo td {
    border: 1px solid #C0C0C0;
    padding: 5px;
  }
</style>

<body>
  <img src="{{asset('images/logo_1.png')}}" style="width:100px;"alt="">
  <center>
    <h1>KARDEX DE PAGOS Y VENCIMIENTOS</h1>
    <h3>UNIVERSIDAD MAYA</h3>
    <h4>Campus Tuxtla: CIRCUNVALACIÓN SUR 2076 PENIPAK, TUXTLA GUTIERREZ, CHIAPAS.</h4>
  </center>
  <table class="demo">
    <thead>
      <tr>
        <th style="color:white;">DATOS DEL ALUMNO</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>&nbsp;Nombre: <strong>BALBUENA MUÑOA RICARDO</strong> </td>
      </tr>
      <tr>
        <td>&nbsp;Grupo: <strong>D2AD</strong> </td>
      </tr>
      <tbody>
  </table>
  <hr>
  <table class="demo">
	<caption><strong>COLEGIATURA ENERO</strong> </caption>
	<thead>
	<tr style="color:white;">
		<th>Fecha limite de pago: </th>
		<th>Total a pagar: </th>
		<th>Banco: </th>
		<th>Empresa</th>
		<th>Referencias</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td rowspan="2">&nbsp; {{$print[3]}}</td>
		<td rowspan="2">&nbsp;${{number_format($print[4],2)}}</td>
		<td>&nbsp; <img src="{{asset('images/banorte.png')}}" style="width:250px;" alt=""> </td>
		<td>&nbsp;56570</td>
		<td>&nbsp;{{$print[1]}}</td>
	</tr>
	<tr>
		<td>&nbsp; <img src="{{asset('images/santander.png')}}" style="width:250px;" alt=""></td>
		<td>&nbsp;4990</td>
		<td>&nbsp;{{$print[2]}}</td>
	</tr>
	<tbody>
</table>
</body>

</html>
