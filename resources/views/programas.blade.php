@extends('adminlte::page')

@section('title', 'Programas')

@section('content_header')
    <h1>Listas de programas: </h1>
@stop

@section('content')
    
    <div class="row d-flex flex-column">

        {{-- mensaje de programa agregado --}}
        @if (Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{Session::get('success')}}</strong>
            </div>            
        @endif

        
            
        <div class="col-12 mt-4">
            <table class="table table-bordered ">
                <tr class="text-secondary">
                    <th>#</th>
                    <th>Programa</th>
                    <th>Versión</th>
                    <th>Horas</th>
                    <th>Creditos</th>
                    <th>Descripción</th>
                    <th>Meses</th>
                    <th>Acciones</th>
                </tr>

                @foreach ($programas as $programa )
                    <tr>
                        <td class="fw-bold">{{$programa->Codigo}}</td>
                        <td>{{$programa->prog_Denominacion}}</td>
                        <td>{{$programa->prog_version}}</td>
                        <td><span class="badge bg-success fs-6">{{$programa->prog_HorasEstimadas}}</span></td>
                        <td><span class="badge bg-success fs-6">{{$programa->prog_Creditos}}</span></td>
                        <td>{{$programa->prog_Descripcion}}</td>
                        <td>{{$programa->prog_DuracionMeses}}</td>
                        <td>
                            <a href="" class="btn btn-primary">Editar</a>

                            <form action="{{ route('programas.destroy',$programas) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>            
                 @endforeach
                
            </table>
            {{ $programas->links() }}
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop