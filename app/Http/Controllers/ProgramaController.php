<?php

namespace App\Http\Controllers;

use App\Models\TblPrograma;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
// use Symfony\Component\HttpFoundation\RedirectResponse;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        if (auth()->user()->hasPermissionTo('programas.index')) {
            $programas = TblPrograma::get();
            // $conteoProgramas = TblPrograma::count();     
            return view('programas.programas', ['programas' => $programas]);
        } else {
            // Almacena un mensaje en la sesión
            session()->flash('acceso_denegado', 'Acceso denegado');
            return redirect()->route('home'); // Redirige a la página anterior
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->hasPermissionTo('programas.create')) {
            return view('programas.crearprograma');
        } else {
            // Almacena un mensaje en la sesión
            session()->flash('acceso_denegado', 'Acceso denegado');
            return redirect()->route('programas.index'); // Redirige a la página anterior
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // validacion de los input requeridos  
        $request->validate([
            'prog_Denominacion' => 'required',
            'prog_HorasEstimadas' => 'required',
            'prog_Creditos' => 'required'
        ]);        
        
        // dd($request->all());
        TblPrograma::create($request->all());
        return redirect()->route('programas.index')->with('success','Nuevo Programa Creado Exitoxamente¡');
    }

    /**
     * Display the specified resource.
     */
    public function show(TblPrograma $tblPrograma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TblPrograma $tblPrograma, string $Codigo):View
    {        
        // dd($tblPrograma->where('Codigo', $Codigo)->get() );

        $dato = $tblPrograma->where('Codigo', $Codigo)->get();        
        
        return view('programas.editarprograma', ['programa'=> $dato]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
     {      
        // dd( TblPrograma::find($id) );
        // dd( $request -> input() );

        // validacion de los input requeridos  
        $request->validate([
            'prog_Denominacion' => 'required',
            'prog_HorasEstimadas' => 'required',
            'prog_Creditos' => 'required'
        ]);  

        $programa = TblPrograma::find( $id );

        $programa->prog_Denominacion = $request->prog_Denominacion;
        $programa->prog_version = $request->prog_version;
        $programa->prog_Estado = $request->prog_Estado;
        $programa->prog_HorasEstimadas = $request->prog_HorasEstimadas;
        $programa->prog_Creditos = $request->prog_Creditos;
        $programa->prog_Descripcion = $request->prog_Descripcion;
        $programa->prog_DuracionMeses = $request->prog_DuracionMeses;
        
        if( $programa->save() ) {
         return redirect()->route('programas.index')->with('success','Programa Actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        // $tblPrograma->delete();
        // return redirect()->route('programas.index');

        
        $programa = TblPrograma::find($id);
        // dd(TblPrograma::find($id));
        $programa->delete();
        return redirect()->route('programas.index')->with('success','Programa eliminado exitosamente') ;
        
    }
}
