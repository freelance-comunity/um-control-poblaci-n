<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Campus;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Alert;
use Hash;
use Image;
use Auth;

class UsersController extends Controller
{
    /**
    *
    *
    *
    */
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
        $roles  = Role::pluck('name', 'id');
        return view('backEnd.admin.users.create')
        ->with('campus', $campus)
        ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $password = Hash::make($request->input('password'));
            $input = $request->all();
            $input['password'] = $password;

            $role = Role::findOrFail($request->input('role'));
            $user = User::create($input);
            $user->assignRole($role->name);

            // Handle the user upload of avatar
            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

                $user->avatar = $filename;
                $user->save();
            }

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
        $this->validate($request, ['password' => 'required|string|min:6|confirmed', ]);

        $user = User::findOrFail($request->input('user'));
        $user->password = Hash::make($request->password);
        $user->save();

        Alert::success('Contraseña actualizada exitosamente!')->persistent("Cerrar");
        return redirect('users');
    }

    public function updateProfile(Request $request)
    {
        // Handle the user upload of avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('backEnd.admin.users.profile');
    }
}
