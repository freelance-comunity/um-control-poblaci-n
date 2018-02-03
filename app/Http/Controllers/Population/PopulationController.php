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

                \Excel::selectSheets('POBLACION')->load($request->excel, function ($reader) {
                    $excel = $reader->get();
                    //iteración
                    $reader->each(function ($row) {
                        // echo $row->matricula;
                        // echo "<br>";
                        $enrollment = $row->matricula;
                        $query = DB::table('populations')->where('enrollment', $enrollment);
                        $exists = $query->first();
                        // Checamos si ya existe un registro con la misma matricula, de ser así omitimos este paso
                        // y saltamos al else para realizar un update del registro ya existente de esa matricula

                        if (!$exists) {
                            $archive = new Population;
                            $archive->month = trim($row->mes);
                            $archive->date = $row->fecha;
                            $archive->status = trim($row->estatus);
                            $archive->campus = trim($row->plantel);
                            $archive->enrollment = $row->matricula;
                            $archive->career = trim($row->carrera);
                            $archive->name = trim($row->nombre);
                            $archive->system = trim($row->sistema);
                            $archive->sex = trim($row->sexo);
                            $archive->turn = trim($row->turno);
                            $archive->semi_day = trim($row->diasemi);
                            $archive->scholarship = trim($row->beca);
                            $archive->foreign = trim($row->foranea);
                            $archive->agreement = trim($row->convenio);
                            $archive->average = trim($row->promedio);
                            $archive->five_or_more = trim($row->cinco);
                            $archive->quarter = trim($row->cuatri);
                            $archive->year_income = trim($row->anioingreso);
                            $archive->year_discharge = trim($row->anioegreso);
                            $archive->observations_of_changes = trim($row->observacionescambios);
                            $archive->modification_date = $row->fechamodificaciones;
                            $archive->low = trim($row->baja);
                            $archive->administrative = trim($row->administrativa);
                            $archive->temporary = trim($row->temporal);
                            $archive->definitive = trim($row->definitiva);
                            $archive->low_date = $row->fechabaja;
                            $archive->observations_low = trim($row->observacionesbaja);
                            $archive->intern_letter = trim($row->cartapasante);
                            $archive->certificate = trim($row->certificado);
                            $archive->title = trim($row->titulo);
                            $archive->save();
                        } else {
                            DB::table('populations')
                                ->where('enrollment', $enrollment)
                                ->update([
                                    'month' => trim($row->mes),
                                    'date' => $row->fecha,
                                    'status' => trim($row->estatus),
                                    'campus' => trim($row->plantel),
                                    'enrollment' => trim($row->matricula),
                                    'career' => trim($row->carrera),
                                    'name' => trim($row->nombre),
                                    'system' => trim($row->sistema),
                                    'sex' => trim($row->sexo),
                                    'turn' => trim($row->turno),
                                    'semi_day' => trim($row->diasemi),
                                    'scholarship' => trim($row->beca),
                                    'foreign' => trim($row->foranea),
                                    'agreement' => trim($row->convenio),
                                    'average' => trim($row->promedio),
                                    'five_or_more' => trim($row->cinco),
                                    'quarter' => trim($row->cuatri),
                                    'year_income' => trim($row->anioingreso),
                                    'year_discharge' => trim($row->anioegreso),
                                    'observations_of_changes' => trim($row->observacionescambios),
                                    'modification_date' => $row->fechamodificaciones,
                                    'low' => trim($row->baja),
                                    'administrative' => trim($row->administrativa),
                                    'temporary' => trim($row->temporal),
                                    'definitive' => trim($row->definitiva),
                                    'low_date' => $row->fechabaja,
                                    'observations_low' => trim($row->observacionesbaja),
                                    'intern_letter' => trim($row->cartapasante),
                                    'certificate' => trim($row->certificado),
                                    'title' => trim($row->titulo),
                                ]);
                        }
                    });
                }, 'UTF-8', true);

                Alert::success('Se ha cargado el archivo Excel exitosamente!');
                return redirect('population/population');
            } else {
                Alert::error('Por favor sube un archivo valido de tipo Excel!');
                return redirect('population/population');
            }
        } catch (\Exception $e) {
            // Alert::error('' . $e->getMessage() . '')->persistent("Cerrar");
            // return redirect('population/population');
            return $e->getMessage();
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
            // return $e->getMessage();
        }

    }
}
