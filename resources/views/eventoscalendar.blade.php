@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Horarios</h1>
@stop

@section('content')

<div class="card">
  <div class="container table-responsive">
    <div id="calendar" style="margin-bottom: 20px">      
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
                  <div class="col-md-12">
                    <label for="id" class="form-label ">ID </label>
                    <input type="text"
                      class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="" disabled>
                  </div>

                  <hr/>
                  
                  <div class="col-md-12">
                    <label class="form-lavel">Ficha</label>
                    <select class="form-select">
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div >
                  <div class="col-md-12">
                    <label class="form-lavel">Competencia</label>
                    <select class="form-select">
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label class="form-lavel">#</label>
                    <input type="text" class="form-control" disabled>
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
                  <div class="col-md-12">
                    <label class="form-lavel">Instructor</label>
                    <select class="form-select">
                      <option>1</option>
                      <option>1</option>
                      <option>1</option>
                    </select>
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
                    <input type="text"
                    class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="" required>
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
                      class="form-control" name="horaInicio" id="horaInicio" aria-describedby="helpId" placeholder="2010-10-10">
                  </div>
                  <div class="col-md-6">
                    <label for="horaFinal" class="form-label">Hora final</label>
                    <input type="time"
                      class="form-control" name="horaFinal" id="horaFinal" aria-describedby="helpId" placeholder="2010-10-10">
                  </div>

                </form>                    
                
              </div>
          <div class="modal-footer btn-group" role="group" >
            <button type="button" class="btn btn-secondary btn-sm m-0" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger btn-sm m-0" id="btnEliminar">Eliminar</button>
            <button type="button" class="btn btn-success btn-sm m-0" id="btnModificar">Modificar</button>
            <button type="button" class="btn btn-primary btn-sm m-0" id="btnGuardar">Guardar</button>
          </div>
          
      </div>
  </div>
</div>    

<!-- Optional: Place to the bottom of scripts -->
{{-- <script>
  const myModal = new bootstrap.Modal(document.getElementById('evento'))
</script> --}}

@stop 

@section('css')
     {{-- styles --}}
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">   --}}
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.css" rel="stylesheet">
  

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

@stop

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

{{-- calendar --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/locales-all.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  {{-- sweetalert --}}
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  {{-- scrits de eventos.js y axios --}}
  <script src="{{ asset('js/eventos.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script type="text/javascript">
      var baseURL = {!! json_encode(url('/')) !!};
  </script>
@stop



