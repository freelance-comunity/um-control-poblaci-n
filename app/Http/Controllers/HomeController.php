<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function chart()
    {
      $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['CP', 'DERECHO', 'ENFERMERIA'])
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB', '#3679DF'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#3679DF'],
                'data' => [69, 59,90]
            ]
        ])
        ->options([]);

        return view('chart', compact('chartjs'));
    }
}