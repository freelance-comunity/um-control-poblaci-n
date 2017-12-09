<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Campus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Alert;
use Hash;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('backEnd.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $campus = Campus::pluck('name', 'id');
        return view('backEnd.admin.users.create')
        ->with('campus', $campus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            User::create($request->all());

            Alert::success('Usuario creado exitosamente!')->persistent("Cerrar");

            return redirect('users');
        } catch (\Exception $e) {
            Alert::error(''.$e->getMessage().'')->persistent("Cerrar");
            return redirect('users');
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
        $user = User::findOrFail($id);

        return view('backEnd.admin.users.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('backEnd.admin.users.edit', compact('user'));
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
            $user = User::findOrFail($id);
            $user->update($request->all());

            Alert::info('Usuario actualizado exitosamente!')->persistent("Cerrar");


            return redirect('users');
        } catch (\Exception $e) {
            Alert::error(''.$e->getMessage().'')->persistent("Cerrar");
            return redirect('users');
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
            $user = User::findOrFail($id);

            $user->delete();

            Alert::success('Usuario eliminado exitosamente!')->persistent("Cerrar");

            return redirect('users');
        } catch (\Exception $e) {
            Alert::error(''.$e->getMessage().'')->persistent("Cerrar");
            return redirect('users');
        }
    }

    public function changePassword(Request $request)
    {
      try {
        $this->validate($request, ['password' => 'required|string|min:6|confirmed', ]);

        $user = User::findOrFail($request->input('user'));
        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success('Contraseña actualizada exitosamente!')->persistent("Cerrar");
        return redirect('users');
      } catch (\Exception $e) {
        Alert::error(''.$e->getMessage().'')->persistent("Cerrar");
        return redirect('users');
      }

    }
}
