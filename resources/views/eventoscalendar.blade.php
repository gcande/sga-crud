@extends('adminlte::page')

@section('content')
<div class="container">
  <div id="calendar" style="margin: auto 100px; margin-bottom: 50px;">      
  </div>
</div>

@stop  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- styles --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  {{-- js --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        {{-- calendar --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.min.js"></script>

    <script src="{{ asset('js/eventos.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>  
  <!-- Modal trigger button -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#evento" style="display: none">
  Launch
</button>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="evento" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              
              <form action="" method="" >
                  {{-- {!! csrf_field() !!} --}}
                  @csrf
                    <div class="mb-2">
                      <label for="id" class="form-label">ID</label>
                      <input type="text"
                        class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="mb-2">
                      <label for="title" class="form-label">Título</label>
                      <input type="text"
                        class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="mb-2">
                      <label for="descripcion" class="form-label">Descripción</label>
                      <textarea class="form-control" name="descripcion" id="descripción" rows="3"></textarea>
                    </div>

                    <div class="mb-2">
                      <label for="start" class="form-label">Inicio</label>
                      <input type="date"
                        class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="2010-10-10">
                        <small>Año-Mes-Día</small>
                    </div>

                    <div class="mb-2">
                      <label for="end" class="form-label">Final</label>
                      <input type="date"
                        class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="2010-10-10">
                        <small>Año-Mes-Día</small>
                    </div>
                  </form>                    
                  
                </div>
            <div class="modal-footer d-flex flex-row-reverse justify-content-center">
                <button type="button" class="btn btn-success btn-sm" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-warning btn-sm" id="btnModificar">Modificar</button>
                <button type="button" class="btn btn-danger btn-sm" id="btnEliminar">Eliminar</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>    

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('evento'), options)
</script>

</body>
</html>