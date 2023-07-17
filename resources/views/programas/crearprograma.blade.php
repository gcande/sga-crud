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

        <form action="{{route('programas.store')}}" method="POST" >
            @csrf            
                <div class="row g-3">                    
                    <div class="col-md-6">
                        <label class="form-label" >Programa:</label>
                        <input type="text" name="prog_Denominacion" class="form-control" placeholder="Programa" required >
                    </div>
                    <div class="col-md-6">
                        <label>Versión:</label>
                        <input type="number" name="prog_Version" class="form-control" placeholder="Versión" required >
                    </div>

                    <div class="col-md-6">
                        {{-- <strong>Estado:</strong>
                        <input type="text" name="prog_Estado" class="form-control" placeholder="Estado" > --}}
                        <label class="form-label">Estado:</label>
                        <select name="prog_Estado" class="form-select" id="" required>
                            <option selected value=""> Elige el estado </option>
                            <option class="bg-success" value="Activo">Activo</option>
                            <option class="bg-danger" value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-6">                        
                        <label class="form-label">Nivel De Formación:</label>
                        <select name="prog_NivelFormacion" class="form-select" id="">
                            <option selected value=""> Elige el nivel </option>
                            <option value="Técnico">Técnico</option>
                            <option value="Tecnólogo">Tecnólogo</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Horas:</label>
                        <input type="number" name="prog_HorasEstimadas" class="form-control" placeholder="Horas" required >
                    </div>
                    <div class="col-md-4">
                        <label>Créditos:</label>
                        <input type="number" name="prog_Creditos" class="form-control" placeholder="Créditos" required >
                    </div>
                    <div class="col-md-4">
                        <label>Meses:</label>
                        <input type="number" name="prog_DuracionMeses" class="form-control" placeholder="Meses" required >
                    </div>
                    <div class="col-md-12">
                        <label>Descripción:</label>
                        <textarea class="form-control" style="height:100px" name="prog_Descripcion" placeholder="Descripción..." required ></textarea>
                    </div>

                    
                </div>               
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>            
        </form>

        {{-- <p>{{ $input }}</p> --}}
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop