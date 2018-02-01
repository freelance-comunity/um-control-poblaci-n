<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Population;
use Charts;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Population::where('status', 'A');
        $b = Population::where('status', 'B');
        $esco = Population::where('system', 'ESCOLARIZADO');
        $semi = Population::where('system', 'SEMIESCOLARIZADO');

        // Consultas activos y bajas
        $actives = Population::where('status', 'A');
        $lows = Population::where('status', 'B');

        // Consulta activos y bajas por sistema educativo
        // $escoLows = $lows->where('system', 'ESCOLARIZADO');
        $escoLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'ESCOLARIZADO'],
          ])->count();
        $semiLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'SEMIESCOLARIZADO'],
          ])->count();

        // Consultas por plantel
        $tuxtla = Population::where('campus', 'TUXTLA');
        $cancun = Population::where('campus', 'CANCUN');
        $tapachula = Population::where('campus', 'TAPACHULA');

        // Consultas por carrera
        $admon = Population::where('career', 'ADMINISTRACION DE EMPRESAS');
        $conta = Population::where('career', 'CONTADURIA PUBLICA');
        $derecho = Population::where('career', 'DERECHO');
        $mecanica = Population::where('career', 'MECANICA AUTOMOTRIZ');
        $tsocial = Population::where('career', 'TRABAJO SOCIAL');
        $enfermeria = Population::where('career', 'ENFERMERIA');
        $civil = Population::where('career', 'INGENIERIA CIVIL');

        // Consultas por documentos
        $title = Population::where('title', 'SI');
        $intern = Population::where('intern_letter', 'SI');
        $certificate = Population::where('certificate', 'SI');

        $chart2 = Charts::create('pie', 'highcharts')
      ->title('ESTATUS')
      ->labels(['ACTIVOS', 'BAJAS'])
      ->values([$a->count(),$b->count()])
      ->dimensions(800, 400)
      ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
      ->title('MODALIDAD')
      ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
      ->elementLabel('TOTAL')
      ->values([$esco->count(),$semi->count()])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart4 = Charts::create('donut', 'highcharts')
      ->title('PLANTELES')
      ->labels(['TUXTLA GUTIERREZ', 'CANCUN', 'TAPACHULA'])
      ->values([$tuxtla->count(),$cancun->count(),$tapachula->count()])
      ->dimensions(800, 400)
      ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
      ->title('CARRERAS')
      ->labels(['ADMINISTRACION DE EMPRESAS', 'CONTADURIA PUBLICA', 'DERECHO', 'MECANICA AUTOMOTRIZ', 'TRABAJO SOCIAL', 'ENFERMERIA', 'INGENIERIA CIVIL'])
      ->elementLabel('TOTAL')
       ->template("material")
      ->values([$admon->count(),$conta->count(), $derecho->count(), $mecanica->count(), $tsocial->count(), $enfermeria->count(), $civil->count()])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
      ->title('DOCUMENTACIÓN')
      ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
      ->elementLabel('TOTAL')
      ->values([$title->count(),$intern->count(), $certificate->count()])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
        ->title('SISTEMA')
        ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
        ->values([$escoLows,$semiLows])
        ->dimensions(800, 400)
        ->responsive(true);


        return view('chart')
      ->with('actives', $actives)
      ->with('lows', $lows)
      ->with('chart2', $chart2)
      ->with('chart3', $chart3)
      ->with('chart4', $chart4)
      ->with('chart5', $chart5)
      ->with('chart6', $chart6)
      ->with('chart7', $chart7);
    }

    public function tuxtla()
    {
        $a = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $b = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $esco = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['system', '=', 'ESCOLARIZADO'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $semi = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['system', '=', 'SEMIESCOLARIZADO'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();

        // Consultas activos y bajas
        $actives = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $lows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();

        // Consulta activos y bajas por sistema educativo
        $escoLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'ESCOLARIZADO'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $semiLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'SEMIESCOLARIZADO'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();

        // Consultas por carrera
        $admon = DB::table('populations')->where([
          ['career', '=', 'ADMINISTRACION DE EMPRESAS'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $conta = DB::table('populations')->where([
          ['career', '=', 'CONTADURIA PUBLICA'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $derecho = DB::table('populations')->where([
          ['career', '=', 'DERECHO'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $mecanica = DB::table('populations')->where([
          ['career', '=', 'MECANICA AUTOMOTRIZ'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $tsocial = DB::table('populations')->where([
          ['career', '=', 'TRABAJO SOCIAL'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $enfermeria = DB::table('populations')->where([
          ['career', '=', 'ENFERMERIA'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $civil = DB::table('populations')->where([
          ['career', '=', 'INGENIERIA CIVIL'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();

        // Consultas por documentos
        $title = DB::table('populations')->where([
          ['title', '=', 'SI'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $intern = DB::table('populations')->where([
          ['intern_letter', '=', 'SI'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();
        $certificate = DB::table('populations')->where([
          ['certificate', '=', 'SI'],
          ['campus', '=', 'TUXTLA GUTIERREZ'],
          ])->count();

        $chart2 = Charts::create('pie', 'highcharts')
      ->title('ESTATUS')
      ->labels(['ACTIVOS', 'BAJAS'])
      ->values([$a,$b])
      ->dimensions(800, 400)
      ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
      ->title('MODALIDAD')
      ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
      ->elementLabel('TOTAL')
      ->values([$esco,$semi])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
      ->title('CARRERAS')
      ->labels(['ADMINISTRACION DE EMPRESAS', 'CONTADURIA PUBLICA', 'DERECHO', 'MECANICA AUTOMOTRIZ', 'TRABAJO SOCIAL', 'ENFERMERIA', 'INGENIERIA CIVIL'])
      ->elementLabel('TOTAL')
       ->template("material")
      ->values([$admon,$conta, $derecho, $mecanica, $tsocial, $enfermeria, $civil])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
      ->title('DOCUMENTACIÓN')
      ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
      ->elementLabel('TOTAL')
      ->values([$title,$intern, $certificate])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
        ->title('SISTEMA')
        ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
        ->values([$escoLows,$semiLows])
        ->dimensions(800, 400)
        ->responsive(true);


        return view('partials.tuxtla')
      ->with('actives', $actives)
      ->with('lows', $lows)
      ->with('chart2', $chart2)
      ->with('chart3', $chart3)
      ->with('chart5', $chart5)
      ->with('chart6', $chart6)
      ->with('chart7', $chart7);
    }

    public function tapachula()
    {
        $a = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $b = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $esco = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['system', '=', 'ESCOLARIZADO'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $semi = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['system', '=', 'SEMIESCOLARIZADO'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();

        // Consultas activos y bajas
        $actives = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $lows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();

        // Consulta activos y bajas por sistema educativo
        $escoLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'ESCOLARIZADO'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $semiLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'SEMIESCOLARIZADO'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();

        // Consultas por carrera
        $admon = DB::table('populations')->where([
          ['career', '=', 'ADMINISTRACION DE EMPRESAS'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $conta = DB::table('populations')->where([
          ['career', '=', 'CONTADURIA PUBLICA'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $derecho = DB::table('populations')->where([
          ['career', '=', 'DERECHO'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $mecanica = DB::table('populations')->where([
          ['career', '=', 'MECANICA AUTOMOTRIZ'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $tsocial = DB::table('populations')->where([
          ['career', '=', 'TRABAJO SOCIAL'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $enfermeria = DB::table('populations')->where([
          ['career', '=', 'ENFERMERIA'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $civil = DB::table('populations')->where([
          ['career', '=', 'INGENIERIA CIVIL'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();

        // Consultas por documentos
        $title = DB::table('populations')->where([
          ['title', '=', 'SI'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $intern = DB::table('populations')->where([
          ['intern_letter', '=', 'SI'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();
        $certificate = DB::table('populations')->where([
          ['certificate', '=', 'SI'],
          ['campus', '=', 'TAPACHULA'],
          ])->count();

        $chart2 = Charts::create('pie', 'highcharts')
      ->title('ESTATUS')
      ->labels(['ACTIVOS', 'BAJAS'])
      ->values([$a,$b])
      ->dimensions(800, 400)
      ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
      ->title('MODALIDAD')
      ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
      ->elementLabel('TOTAL')
      ->values([$esco,$semi])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
      ->title('CARRERAS')
      ->labels(['ADMINISTRACION DE EMPRESAS', 'CONTADURIA PUBLICA', 'DERECHO', 'MECANICA AUTOMOTRIZ', 'TRABAJO SOCIAL', 'ENFERMERIA', 'INGENIERIA CIVIL'])
      ->elementLabel('TOTAL')
       ->template("material")
      ->values([$admon,$conta, $derecho, $mecanica, $tsocial, $enfermeria, $civil])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
      ->title('DOCUMENTACIÓN')
      ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
      ->elementLabel('TOTAL')
      ->values([$title,$intern, $certificate])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
        ->title('SISTEMA')
        ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
        ->values([$escoLows,$semiLows])
        ->dimensions(800, 400)
        ->responsive(true);


        return view('partials.tapachula')
      ->with('actives', $actives)
      ->with('lows', $lows)
      ->with('chart2', $chart2)
      ->with('chart3', $chart3)
      ->with('chart5', $chart5)
      ->with('chart6', $chart6)
      ->with('chart7', $chart7);
    }

    public function cancun()
    {
        $a = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $b = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $esco = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['system', '=', 'ESCOLARIZADO'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $semi = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['system', '=', 'SEMIESCOLARIZADO'],
          ['campus', '=', 'CANCUN'],
          ])->count();

        // Consultas activos y bajas
        $actives = DB::table('populations')->where([
          ['status', '=', 'A'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $lows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['campus', '=', 'CANCUN'],
          ])->count();

        // Consulta activos y bajas por sistema educativo
        $escoLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'ESCOLARIZADO'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $semiLows = DB::table('populations')->where([
          ['status', '=', 'B'],
          ['system', '=', 'SEMIESCOLARIZADO'],
          ['campus', '=', 'CANCUN'],
          ])->count();

        // Consultas por carrera
        $admon = DB::table('populations')->where([
          ['career', '=', 'ADMINISTRACION DE EMPRESAS'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $conta = DB::table('populations')->where([
          ['career', '=', 'CONTADURIA PUBLICA'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $derecho = DB::table('populations')->where([
          ['career', '=', 'DERECHO'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $mecanica = DB::table('populations')->where([
          ['career', '=', 'MECANICA AUTOMOTRIZ'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $tsocial = DB::table('populations')->where([
          ['career', '=', 'TRABAJO SOCIAL'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $enfermeria = DB::table('populations')->where([
          ['career', '=', 'ENFERMERIA'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $civil = DB::table('populations')->where([
          ['career', '=', 'INGENIERIA CIVIL'],
          ['campus', '=', 'CANCUN'],
          ])->count();

        // Consultas por documentos
        $title = DB::table('populations')->where([
          ['title', '=', 'SI'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $intern = DB::table('populations')->where([
          ['intern_letter', '=', 'SI'],
          ['campus', '=', 'CANCUN'],
          ])->count();
        $certificate = DB::table('populations')->where([
          ['certificate', '=', 'SI'],
          ['campus', '=', 'CANCUN'],
          ])->count();

        $chart2 = Charts::create('pie', 'highcharts')
      ->title('ESTATUS')
      ->labels(['ACTIVOS', 'BAJAS'])
      ->values([$a,$b])
      ->dimensions(800, 400)
      ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
      ->title('MODALIDAD')
      ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
      ->elementLabel('TOTAL')
      ->values([$esco,$semi])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
      ->title('CARRERAS')
      ->labels(['ADMINISTRACION DE EMPRESAS', 'CONTADURIA PUBLICA', 'DERECHO', 'MECANICA AUTOMOTRIZ', 'TRABAJO SOCIAL', 'ENFERMERIA', 'INGENIERIA CIVIL'])
      ->elementLabel('TOTAL')
       ->template("material")
      ->values([$admon,$conta, $derecho, $mecanica, $tsocial, $enfermeria, $civil])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
      ->title('DOCUMENTACIÓN')
      ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
      ->elementLabel('TOTAL')
      ->values([$title,$intern, $certificate])
      ->dimensions(1000, 600)
      ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
        ->title('SISTEMA')
        ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
        ->values([$escoLows,$semiLows])
        ->dimensions(800, 400)
        ->responsive(true);


        return view('partials.cancun')
      ->with('actives', $actives)
      ->with('lows', $lows)
      ->with('chart2', $chart2)
      ->with('chart3', $chart3)
      ->with('chart5', $chart5)
      ->with('chart6', $chart6)
      ->with('chart7', $chart7);
    }

    public function chart()
    {
        $a = Population::where('status', 'A');
        $b = Population::where('status', 'B');
        $esco = Population::where('system', 'ESCOLARIZADO');
        $semi = Population::where('system', 'SEMIESCOLARIZADO');

        $actives = Population::where('status', 'A');
        $lows = Population::where('status', 'B');

        $chart2 = Charts::create('pie', 'highcharts')
        ->title('ESTATUS')
        ->labels(['ACTIVOS', 'BAJAS'])
        ->values([$a->count(),$b->count()])
        ->dimensions(800, 400)
        ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
        ->title('MODALIDAD')
        ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
        ->elementLabel('TOTAL')
        ->values([$esco->count(),$semi->count()])
        ->dimensions(1000, 600)
        ->responsive(true);

        $chart4 = Charts::create('pie', 'highcharts')
        ->title('My nice chart')
        ->labels(['First', 'Second', 'Third'])
        ->values([5,10,20])
        ->dimensions(800, 400)
        ->responsive(true);

        return view('chart')
        ->with('actives', $actives)
        ->with('lows', $lows)
        ->with('chart2', $chart2)
        ->with('chart3', $chart3)
        ->with('chart4', $chart4);
    }

    /**
    *  Generar fecha limite condensada
    *
    *
    */
    public function reference()
    {
        $monto = 2550;
        $fecha_limite = '2018-01-08';
        //CALCULO DE LA FECHA CONDENSADA
        $fechalimite = explode("-", $fecha_limite);
        //Calculamos Año
        $fecha['anio']  = (((int)$fechalimite[0]-2009)*372);
        //Calculamos en Mes
        $fecha['mes']  = (((int)$fechalimite[1]-1)*31);
        //Calculamos dís
        $fecha['dia']  = ((int)$fechalimite[2]-1);
        $suma_fecha     = ($fecha['anio']+$fecha['mes']+$fecha['dia']);
        $fecha_condensada    = substr($suma_fecha, 0, 4);
    }
}
