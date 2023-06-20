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
    public function edit(TblPrograma $tblPrograma):View
    {
        // dd($tblPrograma);
        
        return view('editarprograma', ['tblPrograma'=>$tblPrograma]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TblPrograma $tblPrograma):RedirectResponse
    {
        // dd($request->all());
        $tblPrograma->update($request->all());
        return redirect()->route('programas.index')->with('success','Programa Actualizado Exitoxamente¡');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TblPrograma $tblPrograma)
    {
        $tblPrograma->delete();
        return redirect()->route('programas.index');
    }
}
