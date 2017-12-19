<?php

namespace App\Http\Controllers\Population;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Population;
use App\Campus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use \Excel;
use Alert;
use File;
use DB;

class PopulationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $population = Population::all();

        return view('backEnd.population.population.index', compact('population'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.population.population.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['month' => 'required', 'date' => 'required', 'status' => 'required', 'enrollment' => 'required', 'name' => 'required', 'system' => 'required', 'turn' => 'required', 'semi_day' => 'required', 'scholarship' => 'required', 'quarter' => 'required', 'year_income' => 'required', ]);

        Population::create($request->all());

        Session::flash('message', 'Population added!');
        Session::flash('status', 'success');

        return redirect('population/population');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $population = Population::findOrFail($id);

        return view('backEnd.population.population.show', compact('population'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $population = Population::findOrFail($id);

        return view('backEnd.population.population.edit', compact('population'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['month' => 'required', 'date' => 'required', 'status' => 'required', 'enrollment' => 'required', 'name' => 'required', 'system' => 'required', 'turn' => 'required', 'semi_day' => 'required', 'scholarship' => 'required', 'quarter' => 'required', 'year_income' => 'required', ]);

        $population = Population::findOrFail($id);
        $population->update($request->all());

        Session::flash('message', 'Population updated!');
        Session::flash('status', 'success');

        return redirect('population/population');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $population = Population::findOrFail($id);

        $population->delete();

        Alert::success('Registro eliminado exitosamente!');

        return redirect('population/population');
    }

    public function importExcel(Request $request)
    {
        try {
            if ($request->hasFile('excel')) {
                $this->validate($request, ['excel' => 'required|mimes:xls,xlsx']);

                \Excel::load($request->excel, function ($reader) {
                    $excel = $reader->get();
                    //iteración
                    $reader->each(function ($row) {
                        $enrollment = $row->matricula;
                        $query = DB::table('populations')->where('enrollment', $enrollment);
                        $exists = $query->first();
                        // Checamos si ya existe un registro con la misma matricula, de ser así omitimos este paso
                        // y saltamos al else para realizar un update del registro ya existente de esa matricula
                        if (!$exists) {
                            $archive = new Population;
                            $archive->month = $row->mes;
                            $archive->date = $row->fecha;
                            $archive->status = $row->status;
                            $archive->campus = $row->plantel;
                            $archive->enrollment = $row->matricula;
                            $archive->career = $row->carrera;
                            $archive->name = $row->nombre;
                            $archive->system = $row->sistema;
                            $archive->turn = $row->turno;
                            $archive->semi_day = $row->dia;
                            $archive->scholarship = $row->beca;
                            $archive->foreign = $row->foranea;
                            $archive->agreement = $row->convenio;
                            $archive->average = $row->promedio;
                            $archive->five_or_more = $row->cinco;
                            $archive->quarter = $row->cuatri;
                            $archive->year_income = $row->anioi;
                            $archive->year_discharge = $row->anioe;
                            $archive->observations_of_changes = $row->obcambios;
                            $archive->modification_date = $row->fechamod;
                            $archive->low = $row->baja;
                            $archive->low_date = $row->fechabaja;
                            $archive->observations_low = $row->obbajas;
                            $archive->intern_letter = $row->carta;
                            $archive->certificate = $row->certificado;
                            $archive->title = $row->titulo;
                            $archive->save();
                        } else {
                            DB::table('populations')
                      ->where('enrollment', $enrollment)
                      ->update([
                        'month' => $row->mes,
                        'date'  => $row->fecha,
                        'status'=> $row->status,
                        'campus' =>$row->plantel,
                        'enrollment' => $row->matricula,
                        'career' => $row->carrera,
                        'name' => $row->nombre,
                        'system' => $row->sistema,
                        'turn' => $row->turno,
                        'semi_day' => $row->dia,
                        'scholarship' => $row->beca,
                        'foreign' => $row->foranea,
                        'agreement' => $row->convenio,
                        'average' => $row->promedio,
                        'five_or_more' => $row->cinco,
                        'quarter' => $row->cuatri,
                        'year_income' => $row->anioi,
                        'year_discharge' => $row->anioe,
                        'observations_of_changes' => $row->obcambios,
                        'modification_date' => $row->fechamod,
                        'low' => $row->baja,
                        'low_date' => $row->fechabaja,
                        'observations_low' => $row->obbajas,
                        'intern_letter' => $row->carta,
                        'certificate' => $row->certificado,
                        'title' => $row->titulo
                      ]);
                        }
                    });
                });

                Alert::success('Se ha cargado el archivo Excel exitosamente!');
                return redirect('population/population');
            } else {
                Alert::error('Por favor sube un archivo valido de tippo Excel!');
                return redirect('population/population');
            }
            /*\Excel::load($request->excel, function ($reader) {
                $excel = $reader->get();
                //iteración
                $reader->each(function ($row) {
                    $enrollment = $row->matricula;
                    $query = DB::table('populations')->where('enrollment', $enrollment);
                    $exists = $query->first();

                    if (!$exists) {
                        $archive = new Population;
                        $archive->month = $row->mes;
                        $archive->date = $row->fecha;
                        $archive->status = $row->status;
                        $archive->enrollment = $row->matricula;
                        $archive->name = $row->nombre;
                        $archive->system = $row->sistema;
                        $archive->turn = $row->turno;
                        $archive->semi_day = $row->dia;
                        $archive->scholarship = $row->beca;
                        $archive->foreign = $row->foranea;
                        $archive->agreement = $row->convenio;
                        $archive->average = $row->promedio;
                        $archive->five_or_more = $row->cinco;
                        $archive->quarter = $row->cuatri;
                        $archive->year_income = $row->anioi;
                        $archive->year_discharge = $row->anioe;
                        $archive->observations_of_changes = $row->obcambios;
                        $archive->modification_date = $row->fechamod;
                        $archive->low = $row->baja;
                        $archive->low_date = $row->fechabaja;
                        $archive->observations_low = $row->obbajas;
                        $archive->intern_letter = $row->carta;
                        $archive->certificate = $row->certificado;
                        $archive->title = $row->titulo;
                        $archive->save();
                    } else {
                        DB::table('populations')
                      ->where('enrollment', $enrollment)
                      ->update([
                        'month' => $row->mes,
                        'date'  => $row->fecha,
                        'status'=> $row->status,
                        'enrollment' => $row->matricula,
                        'name' => $row->nombre,
                        'system' => $row->sistema,
                        'turn' => $row->turno,
                        'semi_day' => $row->dia,
                        'scholarship' => $row->beca,
                        'foreign' => $row->foranea,
                        'agreement' => $row->convenio,
                        'average' => $row->promedio,
                        'five_or_more' => $row->cinco,
                        'quarter' => $row->cuatri,
                        'year_income' => $row->anioi,
                        'year_discharge' => $row->anioe,
                        'observations_of_changes' => $row->obcambios,
                        'modification_date' => $row->fechamod,
                        'low' => $row->baja,
                        'low_date' => $row->fechabaja,
                        'observations_low' => $row->obbajas,
                        'intern_letter' => $row->carta,
                        'certificate' => $row->certificado,
                        'title' => $row->titulo
                      ]);
                    }
                });
            });

            Alert::success('Se ha cargado el archivo Excel exitosamente!');
            return redirect('population/population');*/
        } catch (\Exception $e) {
            Alert::error(''.$e->getMessage().'')->persistent("Cerrar");
            return redirect('population/population');
        }
    }
}
