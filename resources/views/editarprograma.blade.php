@extends('adminlte::page')

@section('title', 'Crear Programas')

@section('content')
    <div class="row d-flex flex-column" style="margin: 0 100px">
        <div class="col-12">
            <div>
                <h2>Editar Programa</h2>                
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

        @if ( sizeof($programa) == 0 )            
            <p class="alert alert-danger">ID No Existe</p>
        @endif

        @foreach ($programa as $dato)
            <form action="{{ route('programas.update', $dato->Codigo)}}" method="POST">
                @csrf
                @method('PUT')
                
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Programa:</label>
                            <input type="text" name="prog_Denominacion" class="form-control" placeholder="Programa" value="{{$dato->prog_Denominacion}}" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Versión:</label>
                            <input type="number" name="prog_version" class="form-control" placeholder="Versión" value="{{$dato->prog_version}}" >
                        </div>
                        <div class="col-md-3">
                            {{-- <strong>Estado:</strong> --}}
                            {{-- <input type="text" name="prog_Estado" class="form-control" placeholder="Estado" value="{{$dato->prog_Estado}}"  >  --}}
                            <label class="form-label">Estado:</label>
                            <select name="prog_Estado" class="form-select" id="">
                                <option selected value=""> Elige el estado </option>
                                <option value="Activo" @selected("Activo" == $dato->prog_Estado)>Activo</option>
                                <option value="Inactivo" @selected("Inactivo" == $dato->prog_Estado) >Inactivo</option>
                            </select>

                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Horas:</label>
                            <input type="number" name="prog_HorasEstimadas" class="form-control" placeholder="Horas" value="{{$dato->prog_HorasEstimadas}}" >
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Creditos:</label>
                            <input type="number" name="prog_Creditos" class="form-control" placeholder="Creditos" value="{{$dato->prog_Creditos}}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Meses:</label>
                            <input type="number" name="prog_DuracionMeses" class="form-control" placeholder="Meses" value="{{$dato->prog_DuracionMeses}}" >
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Descripción:</label>
                            <textarea class="form-control" style="height:100px" name="prog_Descripcion" placeholder="Descripción...">{{$dato->prog_Descripcion}}</textarea>
                        </div>

                        
                    </div>               
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                
            </form>            
        @endforeach
            

        {{-- <p>{{ $input }}</p> --}}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

@stop