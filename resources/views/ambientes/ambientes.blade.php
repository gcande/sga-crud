@extends('adminlte::page')

@section('title', 'Ambientes')

@section('content_header')
    <h1>Ambientes</h1>
@stop

@section('content')

<a class="btn btn-secondary btn-sm m-2" href="" role="button" >Crear Ambiente</a>

<div class="card">
    <!-- DataTables -->
    <div class="card-body table-responsive p-2">
        <table id="datatables_instructores" class="display shadow-sm text-capitalize " > 
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cupo</th>
                    <th>Tipo</th>
                    <th>Estado</th>
    
                    <th>Acciones</th>
                </tr>
            </thead>    
            <tbody>
                {{-- @foreach ($centros as $centro) --}}
                    <tr>            
                        <td></td>                       
                        <td></td>                       
                        <td></td>                       
                        <td></td>                       
                        <td></td>                       
                        <td class="d-flex">
                            <a href="" 
                                class="btn btn-primary btn-sm mr-2" 
                                onclick=""
                                style="width: 30px; height: 30px; border-radius: 50%"
                            >
                                <i class="fas fa-pen"></i>
                            </a>
                            
                            <form action="" method="POST" class="d-inline" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="
                                                 event.preventDefault(); 
                                                 swal({title: '¿Estás seguro de eliminar?',
                                                 text: 'Una vez eliminado, no se podrá recuperar',
                                                 icon: 'warning', buttons: true, dangerMode: true}).
                                                 then((eliminar) => { if (eliminar){form.submit();} 
                                                 else {swal('Elemento no eliminado');}});
                                                 "
                                        style="width: 30px; height: 30px; border-radius: 50%"
                                        >
                                        <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
            
        </table>
    </div>


@stop

@section('css')
{{-- datatables --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
@stop

@section('js')
     {{-- jQuery --}}
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <!-- DataTables JS-->
     <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
 
     <!-- SweetAlert2 -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 
    <script>
         const dataTableOpciones = {            
             "order": [[ 0, 'asc' ]],                        
         }
 
         $(document).ready(function () {
             $('#datatables_instructores').DataTable();
         });
    </script>
@stop