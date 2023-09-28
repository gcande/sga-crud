@extends('adminlte::page')

@section('title', 'Programas')

@section('content_header')
    <h1>Programas</h1>    
@stop

@section('content')
    @if (session()->has('acceso_denegado'))      
    <x-adminlte-card title="Alerta" theme="danger" theme-mode="outline"
        icon="fas fa-lg fa-envelope" header-class="text-uppercase rounded-bottom border-danger" removable>
        {{ session('acceso_denegado') }}
    </x-adminlte-card>
    @endif

    @role('admin')
        <a name="" id="" class="btn btn-secondary btn-sm m-2" href="{{ route('programas.create')}}" role="button">Crear Programa</a>
    @endrole
    
    <div class="row d-flex flex-column">

        {{-- mensaje de programa agregado --}}
        @if (Session::get('success'))            
            <x-adminlte-card title="Success" theme="success" icon="fas fa-check" removable collapsible>
                <strong>{{Session::get('success')}}</strong>
            </x-adminlte-card>       
        @endif

        <div class="card estiloDataTable">
            <div class="card-body table-responsive p-2">
                <table id="datatables_programas" class="display shadow-sm text-capitalize " >    
                    <thead>
                        <tr>
                            <th data-orderable="true">#</th>
                            <th data-orderable="true">Programa</th>
                            <th>Código Programa</th>
                            <th>Nivel de Formación</th>
                            <th>Versión</th>
                            <th>Estado</th>
                            <th>Horas</th>
                            <th>Creditos</th>
                            <th>Descripción</th>
                            <th>Meses</th>
                            <th>Competencias</th>
                            <th>Acciones</th>
                        </tr>   
                    </thead>                            
    
                    <tbody >
                    @foreach ($programas as $programa )
                        <tr class="text-break">
                            <td>{{$programa->Codigo}}</td>
                            <td class="text-truncate">{{$programa->prog_Denominacion}}</td>
                            <td>{{ $programa->prog_codigoPrograma }}</td>
                            <td>{{$programa->prog_NivelFormacion}}</td>
                            <td>{{$programa->prog_version}}</td>                        
                            <td>
                                @if ( $programa->prog_Estado == 'Inactivo')
                                    <span class="badge text-danger fs-6">{{$programa->prog_Estado}}</span>
                                @else
                                    <span class="badge text-success fs-6">{{$programa->prog_Estado}}</span>
                                @endif
                            </td>    
                            <td>{{$programa->prog_HorasEstimadas}}</td>
                            <td>{{$programa->prog_Creditos}}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{$programa->prog_Descripcion}}</td>
                            <td>{{$programa->prog_DuracionMeses}}</td>    
                            <td> 
                                <a name="" id="" class="btn btn-outline-secondary btn-sm" href="#" role="button" data-bs-toggle="modal" 
                                data-bs-target="#modalCompetencias-{{ $programa->Codigo }}" >
                                    ver competencias
                                </a>
                                {{-- @foreach ($programa->competencias()->where('Codigo_programa', $programa->Codigo)->get() as $competencia)
                                    {{ $competencia->comp_Denominacion }}
                                @endforeach --}}
                                             
                            </td>    
                            <td class="d-flex">
                                @role('admin')
                                    <a href="{{ route('programas.edit', $programa) }}" 
                                        class="btn btn-primary btn-sm mr-2" 
                                        onclick=""
                                        style="width: 30px; height: 30px; border-radius: 50%"
                                    >
                                        <i class="fas fa-pen"></i>
                                    </a>                               
    
                                <form action="{{ route('programas.destroy', $programa) }}" method="POST" class="d-inline" >
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
                                @endrole
                                <a href="" 
                                        class="btn btn-success btn-sm ml-2" 
                                        onclick=""
                                        style="width: 30px; height: 30px; border-radius: 50%;"
                                        data-bs-toggle="modal" data-bs-target="#modalProgramas-{{ $programa->Codigo }}"
                                    >
                                        <i class="fas fa-eye" style="margin-left: -2px"></i>
                                    </a> 
                            </td>
                        </tr>         
                        @endforeach
                        </tbody>            
                    </table>
                {{-- {{ $programas->links() }} --}}
            </div>
        </div>
    </div>
    
    <!-- Modal programas -->
    @foreach ($programas as $programa )                   
    <div class="modal fade" id="modalProgramas-{{ $programa->Codigo }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Programa: {{ $programa->prog_Denominacion }}</h5>                        
                </div>
                <div class="modal-body text-capitalize row g-3">                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Etapa Lectiva</th>
                                <th scope="col">etapa productiva</th>
                                <th scope="col">Total Horas</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Justificacion</th>
                                <th scope="col">Metodológia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $programa->prog_etapaLectiva }}</th>
                                <td>{{ $programa->prog_etapaProductiva }}</td>
                                <td>{{ $programa->prog_totalHoras }}</td>
                                <td>{{ $programa->prog_Descripcion }}</td>
                                <td>{{ $programa->prog_justificacion }}</td>
                                <td>{{ $programa->prog_metodologia }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Modal competencias -->
    @foreach ($programas as $programa)
    <div class="modal fade" id="modalCompetencias-{{ $programa->Codigo }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Competencias de {{ $programa->prog_Denominacion }}</h5>
                </div>
                <div class="modal-body text-capitalize row g-3">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Código Competencia</th>
                            <th scope="col">Denominación</th>
                            <th scope="col">versión NCL</th>
                            <th scope="col">Duración estimada</th>
                            <th scope="col">Créditos</th>
                            {{-- <th scope="col">Horas</th> --}}
                            <th scope="col">Horas FI</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($programa->competencias as $competencia)
                            <tr>
                                <td>{{ $competencia->comp_codigoCompetencia }}</td>
                              <td>{{ $competencia->comp_Denominacion }}</th>
                              <td>{{ $competencia->comp_VersionNCl }}</td>
                              <td>{{ $competencia->comp_DuracionEstimada }}</td>
                              <td>{{ $competencia->comp_Creditos }}</td>
                              <td>{{ $competencia->comp_Horas_FI }}</td>
                              {{-- <td>{{ $competencia-> }}</td> --}}
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    
@stop

@section('css')
    <style>
        /* .desbordamientoDeTexto {
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis; 
            max-width: 200px;
        } */
    </style>
    
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}

   <script>
        const dataTableOpciones = {            
            "order": [[ 0, 'asc' ]],                        
        }

        $(document).ready(function () {
            $('#datatables_programas').DataTable();
        });
   </script>

@endsection