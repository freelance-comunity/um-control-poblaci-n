<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Campus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Alert;
use User;

class CampusController extends Controller
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
        $campus = Campus::all();

        return view('backEnd.admin.campus.index', compact('campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.campus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required', 'address' => 'required', 'postal_code' => 'required', 'status' => 'required', ]);

            Campus::create($request->all());

            Alert::success('Plantel creado exitosamente!')->persistent("Cerrar");

            return redirect('admin/campus');
        } catch (\Exception $e) {
            Alert::error(''.$e->getMessage().'')->persistent("Cerrar");

            return redirect('admin/campus');
        }
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
        $campus = Campus::findOrFail($id);

        return view('backEnd.admin.campus.show', compact('campus'));
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
        $campus = Campus::findOrFail($id);

        return view('backEnd.admin.campus.edit', compact('campus'));
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
        try {
            $this->validate($request, ['name' => 'required', 'address' => 'required', 'postal_code' => 'required',]);

            $campus = Campus::findOrFail($id);
            $campus->update($request->all());

            Alert::message('Plantel actualizado exitosamente!')->persistent("Cerrar");

            return redirect('admin/campus');
        } catch (\Exception $e) {
            Alert::error(''.$e->getMessage().'')->persistent("Cerrar");

            return redirect('admin/campus');
        }
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
        try {
            $campus = Campus::findOrFail($id);
            $users = $campus->users;

            /**
             * check if the record is related to any record of the users
             */
            if ($users) {
              Alert::error('No puedes eliminar a '.$campus->name.', ya que cuenta con usuarios relacionados!')->persistent("Cerrar");

              return redirect('admin/campus');
            }else {
              $campus->delete();

              Alert::message('Plantel eliminado exitosamente!')->persistent("Cerrar");

              return redirect('admin/campus');
            }
        } catch (\Exception $e) {
            Alert::error(''.$e->getMessage().'')->persistent("Cerrar");

            return redirect('admin/campus');
        }
    }
}
