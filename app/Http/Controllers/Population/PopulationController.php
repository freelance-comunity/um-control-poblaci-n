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
                            $archive->month = $row->MES;
                            $archive->date = $row->FECHA;
                            $archive->status = $row->STATUS;
                            $archive->campus = $row->PLANTEL;
                            $archive->enrollment = $row->MATRICULA;
                            $archive->career = $row->CARRERA;
                            $archive->name = $row->NOMBRE;
                            $archive->system = $row->SISTEMA;
                            $archive->sex = $row->SEXO;
                            $archive->turn = $row->TURNO;
                            $archive->semi_day = $row->DIA_SEMI;
                            $archive->scholarship = $row->BECA;
                            $archive->foreign = $row->FORANEA;
                            $archive->agreement = $row->CONVENIO;
                            $archive->average = $row->PROMEDIO;
                            $archive->five_or_more = $row->CINCO_MAS;
                            $archive->quarter = $row->CUATRI;
                            $archive->year_income = $row->ANIO_INGRESO;
                            $archive->year_discharge = $row->ANIO_EGRESO;
                            $archive->observations_of_changes = $row->OBSERVACIONES_CAMBIOS;
                            $archive->modification_date = $row->FECHA_MODIFICACIONES;
                            $archive->low = $row->BAJA;
                            $archive->administrative = $row->ADMINISTRATIVA;
                            $archive->temporary = $row->TEMPORAL;
                            $archive->definitive = $row->DEFINITIVA;
                            $archive->low_date = $row->FECHABAJA;
                            $archive->observations_low = $row->OBSERVACIONES_BAJA;
                            $archive->intern_letter = $row->CARTA_PASANTE;
                            $archive->certificate = $row->CERTIFICADO;
                            $archive->title = $row->TITULO;
                            $archive->save();
                        } else {
                            DB::table('populations')
                                ->where('enrollment', $enrollment)
                                ->update([
                                    'month' => $row->MES,
                                    'date' => $row->FECHA,
                                    'status' => $row->STATUS,
                                    'campus' => $row->PLANTEL,
                                    'enrollment' => $row->MATRICULA,
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
            // else {
            //     Alert::error('Por favor sube un archivo valido de tipo Excel!');
            //     return redirect('population/population');
            // }
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
