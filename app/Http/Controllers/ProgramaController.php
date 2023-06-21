<?php

namespace App\Http\Controllers;

use App\Models\TblPrograma;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $programas = TblPrograma::latest()->paginate(5);
        return view('programas',['programas' => $programas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('crearprograma');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // validacion de los input requeridos  
        $request->validate([
            'prog_Denominacion' => 'required',
            'prog_Estado' => 'required',
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
        // dd($tblPrograma->all()) ;      
        // return view('editarprograma', ['tblPrograma'=>$tblPrograma]);

        // dd($tblPrograma->where('Codigo', $Codigo)->get() );

        $dato = $tblPrograma->where('Codigo', $Codigo)->get();        
        
        return view('editarprograma', ['programa'=> $dato]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
     {
        // $tblPrograma->update($request->all());
        // return redirect()->route('programas.index')->with('success','Programa Actualizado Exitoxamente¡');

        // dd( TblPrograma::find($id) );
        // dd( $request -> input() );

        // validacion de los input requeridos  
        $request->validate([
            'prog_Denominacion' => 'required',
            'prog_Estado' => 'required',
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
         return view('home')->with('success','Programa Actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $tblPrograma->delete();
        // return redirect()->route('programas.index');

        
        $programa = TblPrograma::find($id);
        // dd(TblPrograma::find($id));

        $programa->delete();
        return redirect()->route('programas.index')->with('success','Programa eliminado exitosamente') ;
        
    }
}
