
@extends('adminlte::page')

@section('title', 'Vigencias')

@section('content_header')
    <h1>Vigencias</h1>
@stop

@section('content')
<div class="card row d-flex flex-column p-3" style="margin: 0 100px">
    <div class=" col-12">
        <div>
            <h2>Crear Vigencia</h2>
        </div>        
    </div>
    
    <div class="card-body">
        <form action="{{route('vigencias.store')}}" method="POST" >
            @csrf            
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" >Contrato:</label>
                        <input type="number" name="vig_Contrato" class="form-control" placeholder="Contrato" required >
                    </div>                    
                    <div class="col-md-6">
                        <label class="form-label" >Año:</label>
                        <input type="number" name="vig_anio" class="form-control" placeholder="Año" required >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" >Inicio:</label>
                        <input type="date" name="vig_Inicio" class="form-control" placeholder="Inicio" required >
                    </div>
                    

                    <div class="col-md-6">
                        <label>Fin:</label>
                        <input type="date" name="vig_Fin" class="form-control" placeholder="Fin" required >
                    </div>  

                    <div class="col-md-6">
                        <label>Objeto:</label>
                        <input type="text" name="vig_Objetos" class="form-control" placeholder="Objeto" required >
                    </div>                                                                                         
                                      
                    <div class="col-md-6">
                        <label>Red:</label>
                        <input type="text" name="" class="form-control" placeholder="Red">
                    </div>                                  
                                      
                </div>               
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-secondary">Crear</button>
                </div>            
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@stop