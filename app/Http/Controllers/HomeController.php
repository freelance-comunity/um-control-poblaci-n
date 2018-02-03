<?php

namespace App\Http\Controllers;

use App\Population;
use Charts;
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
        $graduates = Population::where('intern_letter', 'SI');

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
        $enfermeria = Population::where('career', 'ENFERMERIA')->where('status', 'A');
        $mecanica = Population::where('career', 'INGENIERIA MECANICA AUTOMOTRIZ')->where('status', 'A');
        $derecho = Population::where('career', 'DERECHO')->where('status', 'A')->where('status', 'A');
        $civil = Population::where('career', 'INGENIERIA CIVIL')->where('status', 'A');
        $sistemas = Population::where('career', 'INGENIERIA EN SISTEMAS')->where('status', 'A');
        $admon = Population::where('career', 'ADMINISTRACION DE EMPRESAS')->where('status', 'A');
        $tsocial = Population::where('career', 'TRABAJO SOCIAL')->where('status', 'A');
        $merca = Population::where('career', 'MERCADOTECNIA')->where('status', 'A');
        $conta = Population::where('career', 'CONTADURIA PUBLICA')->where('status', 'A');
        $informatica = Population::where('career', 'INFORMATICA ADMINISTRATIVA')->where('status', 'A');
        $doc_educ_tab = Population::where('career', 'DOCTORADO EN EDUCACION TABASCO')->where('status', 'A');
        $doc_educ = Population::where('career', 'DOCTORADO EN EDUCACION')->where('status', 'A');
        $maes_calidad = Population::where('career', 'MAESTRIA EN CALIDAD')->where('status', 'A');
        $maes_educ = Population::where('career', 'MAESTRIA EN EDUCACION ')->where('status', 'A');
        $maes_educ_tab = Population::where('career', 'MAESTRIA EN EDUCACION TABASCO')->where('status', 'A');
        $maes_der_fis = Population::where('career', 'MAESTRIA EN DERECHO FISCAL')->where('status', 'A');
        $maes_admon_pub = Population::where('career', 'MAESTRIA EN ADMINISTRACION PUBLICA')->where('status', 'A');
        $maes_comer_ven = Population::where('career', 'MAESTRIA EN COMERCIALIZACION Y VENTAS')->where('status', 'A');

        // Consultas por documentos
        $title = Population::where('title', 'SI');
        $intern = Population::where('intern_letter', 'SI');
        $certificate = Population::where('certificate', 'SI');

        $chart2 = Charts::create('area', 'c3')
            ->title('ESTATUS')
            ->responsive(true)
            ->elementLabel('TOTAL')
            ->labels(['ACTIVOS', 'BAJAS'])
            ->values([$a->count(), $b->count()])
            ->dimensions(0, 1000)
            ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
            ->title('MODALIDAD')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->elementLabel('TOTAL')
            ->values([$esco->count(), $semi->count()])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart4 = Charts::create('bar', 'c3')
            ->title('PLANTELES')
            ->labels(['TUXTLA', 'CANCUN', 'TAPACHULA'])
            ->elementLabel('TOTAL')
            ->values([$tuxtla->count(), $cancun->count(), $tapachula->count()])
            ->dimensions(800, 400)
            ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
            ->title('CARRERAS')
            ->labels(['ENFERMERIA', 'INGENIERIA MECANICA AUTOMOTRIZ', 'DERECHO', 'INGENIERIA CIVIL', 'INGENIERIA EN SISTEMAS', 'ADMINISTRACIÓN DE EMPRESAS', 'TRABAJO SOCIAL', 'MERCADOTECNIA', 'CONTADURIA PUBLICA',
                'INFORMATICA ADMINISTRATIVA', 'DOCTORADO EN EDUCACIÓN TABASCO', 'DOCTORADO EN EDUCACIÓN', 'MAESTRÍA EN CALIDAD', 'MESTRÍA EN EDUCACIÓN', 'MAESTRÍA EN EDUCACIÓN TABASCO', 'MAESTRÍA EN DERECHO FISCAL', 'MAESTRÍA EN ADMINISTRACIÓN PUBLICA', 'MAESTRÍA EN COMERCIALIZACIÓN Y VENTAS'])
            ->elementLabel('TOTAL')
            ->template("material")
            ->values([$enfermeria->count(), $mecanica->count(), $derecho->count(), $civil->count(), $sistemas->count(), $admon->count(), $tsocial->count(), $merca->count(), $conta->count(),
                $informatica->count(), $doc_educ_tab->count(), $doc_educ->count(), $maes_calidad->count(), $maes_educ->count(), $maes_educ_tab->count(), $maes_der_fis->count(), $maes_admon_pub->count(), $maes_comer_ven->count()])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
            ->title('DOCUMENTACIÓN')
            ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
            ->elementLabel('TOTAL')
            ->values([$title->count(), $intern->count(), $certificate->count()])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
            ->title('SISTEMA')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->values([$escoLows, $semiLows])
            ->dimensions(800, 400)
            ->responsive(true);

        return view('chart')
            ->with('actives', $actives)
            ->with('lows', $lows)
            ->with('graduates', $graduates)
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
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $b = DB::table('populations')->where([
            ['status', '=', 'B'],
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $esco = DB::table('populations')->where([
            ['status', '=', 'A'],
            ['system', '=', 'ESCOLARIZADO'],
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $semi = DB::table('populations')->where([
            ['status', '=', 'A'],
            ['system', '=', 'SEMIESCOLARIZADO'],
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $graduates = DB::table('populations')->where([
            ['intern_letter', '=', 'SI'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        // Consultas activos y bajas
        $actives = DB::table('populations')->where([
            ['status', '=', 'A'],
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $lows = DB::table('populations')->where([
            ['status', '=', 'B'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        // Consulta activos y bajas por sistema educativo
        $escoLows = DB::table('populations')->where([
            ['status', '=', 'B'],
            ['system', '=', 'ESCOLARIZADO'],
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $semiLows = DB::table('populations')->where([
            ['status', '=', 'B'],
            ['system', '=', 'SEMIESCOLARIZADO'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        // Consultas por carrera
        $enfermeria = DB::table('populations')->where([
            ['career', '=', 'ENFERMERIA'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $mecanica = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA MECANICA AUTOMOTRIZ'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $derecho = DB::table('populations')->where([
            ['career', '=', 'DERECHO'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $civil = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA CIVIL'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $sistemas = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA EN SISTEMAS'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $admon = DB::table('populations')->where([
            ['career', '=', 'ADMINISTRACION DE EMPRESAS'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $tsocial = DB::table('populations')->where([
            ['career', '=', 'TRABAJO SOCIAL'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

         $merca = DB::table('populations')->where([
            ['career', '=', 'MERCADOTECNIA'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

         $conta = DB::table('populations')->where([
            ['career', '=', 'CONTADURIA PUBLICA'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

         $informatica = DB::table('populations')->where([
            ['career', '=', 'INFORMATICA ADMINISTRATIVA'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

         $doc_educ = DB::table('populations')->where([
            ['career', '=', 'DOCTORADO EN EDUCACION'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $maes_calidad = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN CALIDAD'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

         $maes_educ = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN EDUCACION'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $maes_der_fis = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN DERECHO FISCAL'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $maes_admon_pub = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN ADMINISTRACION PUBLICA'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $maes_comer_ven = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN COMERCIALIZACION Y VENTAS'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        // Consultas por documentos
        $title = DB::table('populations')->where([
            ['title', '=', 'SI'],
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $intern = DB::table('populations')->where([
            ['intern_letter', '=', 'SI'],
            ['campus', '=', 'TUXTLA'],
        ])->count();
        $certificate = DB::table('populations')->where([
            ['certificate', '=', 'SI'],
            ['campus', '=', 'TUXTLA'],
        ])->count();

        $chart2 = Charts::create('pie', 'highcharts')
            ->title('ESTATUS')
            ->labels(['ACTIVOS', 'BAJAS'])
            ->values([$a, $b])
            ->dimensions(800, 400)
            ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
            ->title('MODALIDAD')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->elementLabel('TOTAL')
            ->values([$esco, $semi])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
            ->title('CARRERAS')
            ->labels(['ENFERMERIA', 'INGENIERIA MECANICA AUTOMOTRIZ', 'DERECHO', 'INGENIERIA CIVIL', 'INGENIERIA EN SISTEMAS', 'ADMINISTRACIÓN DE EMPRESAS', 'TRABAJO SOCIAL', 'MERCADOTECNIA', 'CONTADURIA PUBLICA',
                'INFORMATICA ADMINISTRATIVA', 'DOCTORADO EN EDUCACIÓN', 'MAESTRÍA EN CALIDAD', 'MESTRÍA EN EDUCACIÓN', 'MAESTRÍA EN DERECHO FISCAL', 'MAESTRÍA EN ADMINISTRACIÓN PUBLICA', 'MAESTRÍA EN COMERCIALIZACIÓN Y VENTAS'])
            ->elementLabel('TOTAL')
            ->template("material")
            ->values([$enfermeria, $mecanica, $derecho, $civil, $sistemas, $admon, $tsocial, $merca, $conta,
                $informatica, $doc_educ, $maes_calidad, $maes_educ, $maes_der_fis, $maes_admon_pub, $maes_comer_ven])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
            ->title('DOCUMENTACIÓN')
            ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
            ->elementLabel('TOTAL')
            ->values([$title, $intern, $certificate])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
            ->title('SISTEMA')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->values([$escoLows, $semiLows])
            ->dimensions(800, 400)
            ->responsive(true);

        return view('partials.tuxtla')
            ->with('actives', $actives)
            ->with('lows', $lows)
            ->with('graduates', $graduates)
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
        $graduates = DB::table('populations')->where([
            ['intern_letter', '=', 'SI'],
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
          $enfermeria = DB::table('populations')->where([
            ['career', '=', 'ENFERMERIA'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $mecanica = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA MECANICA AUTOMOTRIZ'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $derecho = DB::table('populations')->where([
            ['career', '=', 'DERECHO'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $civil = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA CIVIL'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $sistemas = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA EN SISTEMAS'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $admon = DB::table('populations')->where([
            ['career', '=', 'ADMINISTRACION DE EMPRESAS'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $tsocial = DB::table('populations')->where([
            ['career', '=', 'TRABAJO SOCIAL'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

         $merca = DB::table('populations')->where([
            ['career', '=', 'MERCADOTECNIA'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

         $conta = DB::table('populations')->where([
            ['career', '=', 'CONTADURIA PUBLICA'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

         $informatica = DB::table('populations')->where([
            ['career', '=', 'INFORMATICA ADMINISTRATIVA'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

         $doc_educ = DB::table('populations')->where([
            ['career', '=', 'DOCTORADO EN EDUCACION'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $maes_calidad = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN CALIDAD'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

         $maes_educ = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN EDUCACION'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $maes_der_fis = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN DERECHO FISCAL'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $maes_admon_pub = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN ADMINISTRACION PUBLICA'],
            ['campus', '=', 'TAPACHULA'],
        ])->count();

        $maes_comer_ven = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN COMERCIALIZACION Y VENTAS'],
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
            ->values([$a, $b])
            ->dimensions(800, 400)
            ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
            ->title('MODALIDAD')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->elementLabel('TOTAL')
            ->values([$esco, $semi])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
            ->title('CARRERAS')
            ->labels(['ENFERMERIA', 'INGENIERIA MECANICA AUTOMOTRIZ', 'DERECHO', 'INGENIERIA CIVIL', 'INGENIERIA EN SISTEMAS', 'ADMINISTRACIÓN DE EMPRESAS', 'TRABAJO SOCIAL', 'MERCADOTECNIA', 'CONTADURIA PUBLICA',
                'INFORMATICA ADMINISTRATIVA', 'DOCTORADO EN EDUCACIÓN', 'MAESTRÍA EN CALIDAD', 'MESTRÍA EN EDUCACIÓN', 'MAESTRÍA EN DERECHO FISCAL', 'MAESTRÍA EN ADMINISTRACIÓN PUBLICA', 'MAESTRÍA EN COMERCIALIZACIÓN Y VENTAS'])
            ->elementLabel('TOTAL')
            ->template("material")
            ->values([$enfermeria, $mecanica, $derecho, $civil, $sistemas, $admon, $tsocial, $merca, $conta,
                $informatica, $doc_educ, $maes_calidad, $maes_educ, $maes_der_fis, $maes_admon_pub, $maes_comer_ven])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
            ->title('DOCUMENTACIÓN')
            ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
            ->elementLabel('TOTAL')
            ->values([$title, $intern, $certificate])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
            ->title('SISTEMA')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->values([$escoLows, $semiLows])
            ->dimensions(800, 400)
            ->responsive(true);

        return view('partials.tapachula')
            ->with('actives', $actives)
            ->with('lows', $lows)
            ->with('graduates', $graduates)
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
        $graduates = DB::table('populations')->where([
            ['intern_letter', '=', 'SI'],
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
        $enfermeria = DB::table('populations')->where([
            ['career', '=', 'ENFERMERIA'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
            ['status', '=', 'A'],
        ])->count();

        $mecanica = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA MECANICA AUTOMOTRIZ'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $derecho = DB::table('populations')->where([
            ['career', '=', 'DERECHO'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $civil = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA CIVIL'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $sistemas = DB::table('populations')->where([
            ['career', '=', 'INGENIERIA EN SISTEMAS'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $admon = DB::table('populations')->where([
            ['career', '=', 'ADMINISTRACION DE EMPRESAS'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $tsocial = DB::table('populations')->where([
            ['career', '=', 'TRABAJO SOCIAL'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

         $merca = DB::table('populations')->where([
            ['career', '=', 'MERCADOTECNIA'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

         $conta = DB::table('populations')->where([
            ['career', '=', 'CONTADURIA PUBLICA'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

         $informatica = DB::table('populations')->where([
            ['career', '=', 'INFORMATICA ADMINISTRATIVA'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

         $doc_educ = DB::table('populations')->where([
            ['career', '=', 'DOCTORADO EN EDUCACION'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $maes_calidad = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN CALIDAD'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

         $maes_educ = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN EDUCACION'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $maes_der_fis = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN DERECHO FISCAL'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $maes_admon_pub = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN ADMINISTRACION PUBLICA'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
        ])->count();

        $maes_comer_ven = DB::table('populations')->where([
            ['career', '=', 'MAESTRIA EN COMERCIALIZACION Y VENTAS'],
            ['campus', '=', 'CANCUN'],
            ['status', '=', 'A'],
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
            ->values([$a, $b])
            ->dimensions(800, 400)
            ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
            ->title('MODALIDAD')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->elementLabel('TOTAL')
            ->values([$esco, $semi])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart5 = Charts::create('area', 'highcharts')
            ->title('CARRERAS')
            ->labels(['ENFERMERIA', 'INGENIERIA MECANICA AUTOMOTRIZ', 'DERECHO', 'INGENIERIA CIVIL', 'INGENIERIA EN SISTEMAS', 'ADMINISTRACIÓN DE EMPRESAS', 'TRABAJO SOCIAL', 'MERCADOTECNIA', 'CONTADURIA PUBLICA',
                'INFORMATICA ADMINISTRATIVA', 'DOCTORADO EN EDUCACIÓN', 'MAESTRÍA EN CALIDAD', 'MESTRÍA EN EDUCACIÓN', 'MAESTRÍA EN DERECHO FISCAL', 'MAESTRÍA EN ADMINISTRACIÓN PUBLICA', 'MAESTRÍA EN COMERCIALIZACIÓN Y VENTAS'])
            ->elementLabel('TOTAL')
            ->template("material")
            ->values([$enfermeria, $mecanica, $derecho, $civil, $sistemas, $admon, $tsocial, $merca, $conta,
                $informatica, $doc_educ, $maes_calidad, $maes_educ, $maes_der_fis, $maes_admon_pub, $maes_comer_ven])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart6 = Charts::create('bar', 'highcharts')
            ->title('DOCUMENTACIÓN')
            ->labels(['TITULO', 'CARTA DE PASANTE', 'CERTIFICADO'])
            ->elementLabel('TOTAL')
            ->values([$title, $intern, $certificate])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart7 = Charts::create('pie', 'highcharts')
            ->title('SISTEMA')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->values([$escoLows, $semiLows])
            ->dimensions(800, 400)
            ->responsive(true);

        return view('partials.cancun')
            ->with('actives', $actives)
            ->with('lows', $lows)
            ->with('graduates', $graduates)
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
            ->values([$a->count(), $b->count()])
            ->dimensions(800, 400)
            ->responsive(true);

        $chart3 = Charts::create('bar', 'highcharts')
            ->title('MODALIDAD')
            ->labels(['ESCOLARIZADO', 'SEMIESCOLARIZADO'])
            ->elementLabel('TOTAL')
            ->values([$esco->count(), $semi->count()])
            ->dimensions(1000, 600)
            ->responsive(true);

        $chart4 = Charts::create('pie', 'highcharts')
            ->title('My nice chart')
            ->labels(['First', 'Second', 'Third'])
            ->values([5, 10, 20])
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
        $fecha['anio'] = (((int) $fechalimite[0] - 2009) * 372);
        //Calculamos en Mes
        $fecha['mes'] = (((int) $fechalimite[1] - 1) * 31);
        //Calculamos dís
        $fecha['dia'] = ((int) $fechalimite[2] - 1);
        $suma_fecha = ($fecha['anio'] + $fecha['mes'] + $fecha['dia']);
        $fecha_condensada = substr($suma_fecha, 0, 4);
    }
}
