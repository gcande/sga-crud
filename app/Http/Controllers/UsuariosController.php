<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::get();
        // $role = Role::get();
        $role = Role::pluck('name', 'id')->all();


        //carpeta usuario con vista usuario -> usuarios.usuarios
        return view('usuarios.usuarios', ['usuarios'=>$usuarios, 'role'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuarios.crearusuario', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validacion de los input requeridos  
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);  

        User::create($request->all());
        

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //dd($id);
        $usuario = User::find($id);// Busca el usuario por su id
        $roles = Role::all();

        return view('usuarios.editarusuario', ['usuario'=>$usuario, 'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $usuario = User::find($id);// Busca el usuario por su id        
        $usuario->update($request->all());       
        

        // se asigna el rol que viene del request al usuario
        $usuario->syncRoles($request->input('role'));

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        // dd( User::find($id) );

        return redirect()->route('usuarios.index');
    }
}
