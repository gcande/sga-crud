@extends('adminlte::page')

@section('content_header')
  <h1>Eventos</h1>
@stop

@section('content')  

  <div class=" d-flex flex-row justify-content-start align-items-start">

    {{-- cards de info --}}
    <div class="d-flex flex-column justify-content-center mr-3" style="width: 300px">

      {{-- <div class="card" >
      </div> --}}
      <x-adminlte-card class="" title="Últimos Eventos registrados" theme="dark" icon="far lg fa-calendar-plus">
        {{-- <div class="card-header text-uppercase fw-bold">Últimos Eventos registrados</div> --}}
        <div class=" scroll">
            @if ($eventos->count() > 0)
                @foreach ($eventos->take(6) as $evento)          
                    <ul class="list-group ">
                        <li class="list-group-item list-group-item-action list-group-item-warning mb-1"> 
                            <div class="d-flex w-100 justify-content-between text-capitalize">
                                <strong class="mb-1 text-truncate">{{ $evento->title }}</strong>
                                <small>{{ $evento->start->format('d/m/Y') }}</small>
                            </div>
                            <small class="mb-1">Hora: {{ $evento->horaInicio }} - {{ $evento->horaFinal }}</small>
                        </li>                                          
                    </ul>            
                @endforeach
            @else
                <li class="list-group-item list-group-item-action list-group-item-warning p-3">
                  <strong>No hay eventos...</strong> 
                </li>
            @endif
        </div>
      </x-adminlte-card>

      {{-- <div class="card" > --}}
      <x-adminlte-card class="" title="Feriados Del Mes" theme="dark" icon="far lg fa-calendar-plus">
        {{-- <div class="card-header text-uppercase fw-bold">Feriados Del Mes</div> --}}
        <div class=" scroll">
          <ul class="list-group " id="listaFeriados">                       
          </ul>
        </div>
      </x-adminlte-card>
      {{-- </div> --}}

      <x-adminlte-card title="Lista de tareas pendientes" theme="dark" icon="fas lg fa-tasks">
      {{-- <div class="card"> --}}
        {{-- <div class="card-header text-uppercase fw-bold">Lista de tareas pendientes</div> --}}
        <div class=" scroll">
          <ul class="list-group " id="contenedorTareas">            
          </ul>
        </div>
        <div class="card-footer input-group">
          {{-- <label for="inputNuevaTarea">Agregar nueva tarea: </label> --}}
          <input class="form-control" type="text" id="inputNuevaTarea" placeholder="Agregar nueva tarea">
          <button class="btn btn-secondary" id="btnAgregarTarea">Agregar</button>
        </div>
      {{-- </div> --}}
    </x-adminlte-card>
  
    </div>

    {{-- calendar --}}
    
    <div class="card p-2" style="width: 100%">      
        <div id="calendar" style="">      
        </div>        
    </div>   

  </div>


<!-- Modal Body -->
<div class="modal fade" id="evento" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalTitleId">Evento</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <form class="row g-2" action="" id="formularioEventos" >
                {{-- {!! csrf_field() !!} --}}
                @csrf

                {{-- tarjeta para el instructor --}}
                <div class="alert alert-success text-capitalize">
                  <div class="alert-heading">
                    <h3 class="card-title fw-bold">Titulo: <span id="eventoTitle"></span></h3>
                  </div>
                    <p class="card-text">Descripción: <span id="eventoDescripcion"></span></p>                   
                    <p class="card-text">Ambiente: <span id=""></span> </p>                 
                    <p class="card-text">Ficha: <span id="eventoFicha"></span> </p>                 
                    <p class="card-text">Competencia: <span id="eventoCompetencia"></span> </p>                 
                    <p class="card-text">Instructor: <span id="eventoInstructor"></span> <span id="eventoInstructorApellido"></span></p>                 
                    <p class="card-text">fecha: <span id="eventoFechaInicio"></span>- <span id="eventoFechaFinal"></span></p>                 
                    <p class="card-text">Hora: <span id="eventoHoraInicio"></span>- <span id="eventoHoraFinal"></span></p>                 
                </div>

                @role('admin')

                  <div class="col-md-12">
                    <label for="id" class="form-label ">ID </label>
                    <input type="text"
                      class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="" disabled>
                  </div>
                                    
                  <div class="col-md-12">
                    <label for="Codigo_ficha" class="form-lavel">Ficha</label>
                    <select class="form-select" name="Codigo_ficha" id="Codigo_ficha">
                      <option class="form-select" selected value="">Elige la ficha</option>
                      @foreach ($fichas as $ficha)
                        <option value="{{ $ficha->Codigo }}">
                          {{ $ficha->fich_Codigo }} - {{ $ficha->programa->prog_Denominacion }}
                        </option>                        
                      @endforeach
                    </select>
                  </div >
                  <div class="col-md-12">
                    <label for="Codigo_competencia" class="form-lavel">Competencia</label>
                    <select class="form-select" name="Codigo_competencia" id="Codigo_competencia">
                      <option selected>Elige la competencia</option>
                      @foreach ($competencias as $competencia)
                        <option value="{{ $competencia->Codigo }}">
                          {{ $competencia->comp_codigoCompetencia }} - {{ $competencia->comp_Denominacion }}
                        </option>                        
                      @endforeach
                    </select>
                  </div>                  
                  <div class="col-md-12">
                    <label for="Codigo_instructor" class="form-lavel">Instructor</label>
                    <select class="form-select" name="Codigo_instructor" id="Codigo_instructor">
                      <option selected>Elige el instructor</option>
                      @foreach ($instructores as $instructor)
                        <option value="{{ $instructor->Codigo }}">{{ $instructor->inst_Nombres }} {{ $instructor->inst_Apellido }}</option>                                          
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-12">
                    <label class="form-lavel">RAP</label>
                    <select class="form-select">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label class="form-lavel">#</label>
                    <input type="text" class="form-control" disabled >
                  </div>
                  
                  <div class="col-md-6">
                    <label class="form-lavel">Ambiente</label>
                    <select class="form-select">
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-lavel">Disponibilidad</label>
                    <input type="text" class="form-control">
                  </div>

                  <hr/>
                  <div class="col-md-6">
                    <label for="title" class="form-label ">Título</label>
                    <input type="text" name="title" id="title" aria-describedby="helpId" class="form-control" />                                           
                  </div>

                  <div class="col-md-6">
                    <label for="color" class="form-label ">Color</label>
                    <select class="form-select" id="color" name="color" required>
                      <option class="form-select" selected value="">Elige un color</option>
                      <option value="red">Rojo</option>
                      <option value="blue">Azul</option>
                      <option value="green">Verde</option>
                    </select>
                  </div>

                  <div class="col-md-12">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripción" rows="3"></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="start" class="form-label">Fecha Inicio</label>
                    <input type="date"
                      class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="2010-10-10">
                  </div>

                  <div class="col-md-6">
                    <label for="end" class="form-label">Fecha Final</label>
                    <input type="date"
                      class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="2010-10-10">
                  </div>

                  <div class="col-md-6">
                    <label for="horaInicio" class="form-label">Hora inicio</label>
                    <input type="time"
                      class="form-control" name="horaInicio" id="horaInicio" aria-describedby="helpId" placeholder="2010-10-10" >
                  </div>
                  <div class="col-md-6">
                    <label for="horaFinal" class="form-label">Hora final</label>
                    <input type="time"
                      class="form-control" name="horaFinal" id="horaFinal" aria-describedby="helpId" placeholder="2010-10-10" >
                  </div>
                @endrole

                </form>                    
                
              </div>
          <div class="modal-footer btn-group" role="group" >
            @role('admin')
              {{-- <button type="button" class="btn btn-secondary btn-sm m-0" data-bs-dismiss="modal">Cerrar</button> --}}
              <button type="button" class="btn btn-danger btn-sm m-0" id="btnEliminar">Eliminar</button>
              <button type="button" class="btn btn-success btn-sm m-0" id="btnModificar">Modificar</button>
              <button type="button" class="btn btn-primary btn-sm m-0" id="btnGuardar">Guardar</button>
            @endrole
          </div>
          
      </div>
  </div>
</div>    

@stop 

@section('css')
  <style>
    .scroll {
      max-width: 300px;
      max-height: 200px;
      overflow-y: auto;
    }
    li {
		list-style: none;
		margin-bottom: 5px;
	  }

	a.enlace-eliminar {
		margin-left: 10px;
    font-weight: bolder;    
		text-decoration: none;
		font-size: 1rem;
    color: gray
	}
  a.enlace-eliminar:hover {
    color: red;
  }

	.tachado {
		text-decoration: line-through;
	}   
  </style>
  
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">   --}}
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.css" rel="stylesheet">  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

@endsection

@section('js')

<!-- moment para fechas-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/locale/es-mx.min.js" ></script>

<!-- tippy para tooltip -->
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

  {{--  --}}
  
  {{-- calendar --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/locales-all.min.js"></script>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

{{-- sweetalert --}}
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  {{-- scrits de eventos.js y axios --}}
  <script src="{{ asset('js/eventos.js') }}"></script>
  <script src="{{ asset('js/tareas.js') }}"></script>
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script type="text/javascript"> var baseURL = {!! json_encode(url('/')) !!}; </script>

 
@endsection






  




