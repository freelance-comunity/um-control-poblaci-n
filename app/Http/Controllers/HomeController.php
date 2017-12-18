<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Population;
use Charts;
use App\User;

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
