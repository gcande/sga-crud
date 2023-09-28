<?php

namespace App\Http\Controllers;

use App\Models\TblCentro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $centros = TblCentro::get();
        return view('centros.centros', ['centros' => $centros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('centros.crearCentro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $centro = TblCentro::create($request->all());

        return redirect()->route('centros.index');
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
        $centro = TblCentro::find($id);

        return view('centros.editarCentros', ['centro' => $centro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $centro = TblCentro::find($id);
        $centro->update($request->all());
        // dd($centro);

        return redirect()->route('centros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $centro = TblCentro::find($id);
        $centro->delete();

        return redirect()->back();
    }
}
