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
        $population = Population::all();
        $actives = Population::where('status', 'A');
        $lows = Population::where('status', 'B');
        $titles = Population::where('title', 'SI');
        return view('home')
        ->with('population', $population)
        ->with('actives', $actives)
        ->with('lows', $lows)
        ->with('titles', $titles);
    }

    public function chart()
    {
        $chart = Charts::database(User::all(), 'bar', 'google')
        ->elementLabel("Total")
        ->GroupByYear();
        return view('chart', compact('chart'));
    }

    /**
    *  Generar Referencia Bancaria para referenciado
    *  deacuerdo a la matricula de alumno de la
    *
    *  @param   Int
    *  @param   String
    *  @param   Int
    *  @param   Float
    *  @param   String
    *
    *  @return  String
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
