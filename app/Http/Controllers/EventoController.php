<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\View\View;

use Carbon\Carbon;//para dar formato a varios datos

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('eventoscalendar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate(Evento::$rules);//validacion
        $request = Evento::create($request->all());
        
        // return redirect()->route('eventoscalendar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        $evento = Evento::all();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evento = Evento::find($id);

        //reescribimos el formato de las fechas
        $evento->start = Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d');
        $evento->end = Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d');

        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);
        $evento->update($request->all());
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd(Evento::find($id)); 
        $evento = Evento::find($id)->delete();
        return response()->json($evento);
    }
}
