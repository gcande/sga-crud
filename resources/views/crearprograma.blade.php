@extends('adminlte::page')

@section('title', 'Crear Programas')

@section('content')
    <div class="row d-flex flex-column" style="margin: 0 100px">
        <div class="col-12">
            <div>
                <h2>Crear Programa</h2>
            </div>        
        </div>

        {{-- mensaje de error de campos requeridos --}}
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <strong>Aviso importante!</strong> Algo anda mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('programas.store')}}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Programa:</strong>
                        <input type="text" name="prog_Denominacion" class="form-control" placeholder="Programa" >
                    </div>
                    <div class="form-group">
                        <strong>Versión:</strong>
                        <input type="number" name="prog_Version" class="form-control" placeholder="Versión" >
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <input type="text" name="prog_Estado" class="form-control" placeholder="Estado" >
                    </div>
                    <div class="form-group">
                        <strong>Horas:</strong>
                        <input type="number" name="prog_HorasEstimadas" class="form-control" placeholder="Horas" >
                    </div>
                    <div class="form-group">
                        <strong>Creditos:</strong>
                        <input type="number" name="prog_Creditos" class="form-control" placeholder="Creditos" >
                    </div>
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:100px" name="prog_Descripcion" placeholder="Descripción..."></textarea>
                    </div>

                    <div class="form-group">
                        <strong>Meses:</strong>
                        <input type="number" name="prog_DuracionMeses" class="form-control" placeholder="Meses" >
                    </div>
                    
                </div>
                {{-- <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:100px" name="prog_Descripcion" placeholder="Descripción..."></textarea>
                    </div>
                </div>                       --}}
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>

        {{-- <p>{{ $input }}</p> --}}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop