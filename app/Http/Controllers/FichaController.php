<?php

namespace App\Http\Controllers;

use App\Models\TblCentro;
use App\Models\TblFichaCaracterizacion;
use App\Models\TblModalidad;
use App\Models\TblPrograma;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichas = TblFichaCaracterizacion::get();
        
        return view('fichas.fichas', ['fichas'=>$fichas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $programas = TblPrograma::all();
        $modalidad = TblModalidad::all();
        $centros = TblCentro::all();
        return view('fichas.crearFicha', ['programas' => $programas, 'modalidad' => $modalidad, 'centros' => $centros]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fichas = TblFichaCaracterizacion::create($request->all());
        // dd($fichas);
        return redirect()->route('fichas.index');
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
        //
        $ficha = TblFichaCaracterizacion::find($id);
        $programas = TblPrograma::all();
        $modalidad = TblModalidad::all();
        $centros = TblCentro::all();

        return view('fichas.editarFicha', ['ficha' => $ficha, 'programas' => $programas, 'modalidad' => $modalidad, 'centros' => $centros]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $ficha = TblFichaCaracterizacion::find($id);
        $ficha->update($request->all());

        return redirect()->route('fichas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ficha = TblFichaCaracterizacion::find($id);
        $ficha->delete();

        return redirect()->back();
    }
}
