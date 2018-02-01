<?php

namespace App\Http\Controllers\Population;

use Alert;
use App\Campus;
use App\Http\Controllers\Controller;
use App\Population;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Session;
// use Yajra\Datatables\Facades\Datatables;
use \Excel;

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
        
        return view('backEnd.population.population.population', compact('population'));
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
        $this->validate($request, ['month' => 'required', 'date' => 'required', 'status' => 'required', 'enrollment' => 'required', 'name' => 'required', 'system' => 'required', 'turn' => 'required', 'semi_day' => 'required', 'scholarship' => 'required', 'quarter' => 'required', 'year_income' => 'required']);

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
        $this->validate($request, ['month' => 'required', 'date' => 'required', 'status' => 'required', 'enrollment' => 'required', 'name' => 'required', 'system' => 'required', 'turn' => 'required', 'semi_day' => 'required', 'scholarship' => 'required', 'quarter' => 'required', 'year_income' => 'required']);

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
                $this->validate($request, ['excel' => 'required']);

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
                            $archive->status = $row->estatus;
                            $archive->campus = $row->plantel;
                            $archive->enrollment = $row->matricula;
                            $archive->career = $row->carrera;
                            $archive->name = $row->nombre;
                            $archive->system = $row->sistema;
                            $archive->sex = $row->sexo;
                            $archive->turn = $row->turno;
                            $archive->semi_day = $row->diasemi;
                            $archive->scholarship = $row->beca;
                            $archive->foreign = $row->foranea;
                            $archive->agreement = $row->convenio;
                            $archive->average = $row->promedio;
                            $archive->five_or_more = $row->cinco;
                            $archive->quarter = $row->cuatri;
                            $archive->year_income = $row->anioingreso;
                            $archive->year_discharge = $row->anioegreso;
                            $archive->observations_of_changes = $row->observacionescambios;
                            $archive->modification_date = $row->fechamodificaciones;
                            $archive->low = $row->baja;
                            $archive->administrative = $row->administrativa;
                            $archive->temporary = $row->temporal;
                            $archive->definitive = $row->definitiva;
                            $archive->low_date = $row->fechabaja;
                            $archive->observations_low = $row->observacionesbaja;
                            $archive->intern_letter = $row->cartapasante;
                            $archive->certificate = $row->certificado;
                            $archive->title = $row->titulo;
                            $archive->save();
                        } else {
                            DB::table('populations')
                                ->where('enrollment', $enrollment)
                                ->update([
                                    'month' => $row->MES,
                                    'date' => $row->FECHA,
                                    'status' => $row->STATUS,
                                    'campus' => $row->PLANTEL,
                                    'enrollment' => $row->matricula,
                                    'career' => $row->CARRERA,
                                    'name' => $row->NOMBRE,
                                    'system' => $row->SISTEMA,
                                    'turn' => $row->TURNO,
                                    'semi_day' => $row->DIA_SEMI,
                                    'scholarship' => $row->BECA,
                                    'foreign' => $row->FORANEA,
                                    'agreement' => $row->CONVENIO,
                                    'average' => $row->PROMEDIO,
                                    'five_or_more' => $row->CINCO_MAS,
                                    'quarter' => $row->CUATRI,
                                    'year_income' => $row->ANIO_INGRESO,
                                    'year_discharge' => $row->ANIO_EGRESO,
                                    'observations_of_changes' => $row->OBSERVACIONES_CAMBIOS,
                                    'modification_date' => $row->FECHA_MODIFICACIONES,
                                    'low' => $row->BAJA,
                                    'administrative' => $row->ADMINISTRATIVA,
                                    'temporary' => $row->TEMPORAL,
                                    'definitive' => $row->DEFINITIVA,
                                    'low_date' => $row->FECHABAJA,
                                    'observations_low' => $row->OBSERVACIONES_BAJA,
                                    'intern_letter' => $row->CARTA_PASANTE,
                                    'certificate' => $row->CERTIFICADO,
                                    'title' => $row->TITULO,
                                ]);
                        }
                    });
                }, 'UTF-8', true);

                Alert::success('Se ha cargado el archivo Excel exitosamente!');
                return redirect('population/population');
            } 
            else {
                Alert::error('Por favor sube un archivo valido de tipo Excel!');
                return redirect('population/population');
            }
        } catch (\Exception $e) {
            Alert::error('' . $e->getMessage() . '')->persistent("Cerrar");
            return redirect('population/population');
        }
    }

    public function apiPopulation()
    {
        try {
            $collection = Population::select(['id', 'month', 'date', 'status', 'campus', 'enrollment', 'career', 'name', 'system', 'turn'])->orderBy('enrollment');
            $population = $collection;
            return Datatables::of($population)->make(true);
        } catch (\Exception $e) {
            Alert::error('' . $e->getMessage() . '')->persistent("Cerrar");
            return redirect('population/population');
        }

    }
}
