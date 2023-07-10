@extends('adminlte::page')

@section('title', 'Programas')

@section('content_header')
    <h1>Listas de programas: </h1>
    
@stop

@section('content')

    <a name="" id="" class="btn btn-primary btn-sm m-2" href="{{ route('programas.create')}}" role="button">Crear Programa</a>
    
    <div class="row d-flex flex-column">

        {{-- mensaje de programa agregado --}}
        @if (Session::get('success'))
            {{-- <div class="alert alert-success mt-2">
                <strong>{{Session::get('success')}}</strong>
            </div>  --}}
            {{-- <x-adminlte-alert theme="success" title="exitoso">
                <strong>{{Session::get('success')}}</strong>
            </x-adminlte-alert>     --}}
            <x-adminlte-card title="Success" theme="success" icon="fas fa-check" removable collapsible>
                <strong>{{Session::get('success')}}</strong>
            </x-adminlte-card>       
        @endif

    
        <div>
            <table id="datatables_programas" class="display shadow-sm text-capitalize class="text-center" >

                <thead>
                    <tr>
                        <th data-orderable="true">#</th>
                        <th data-orderable="true">Programa</th>
                        <th>Nivel de Formación</th>
                        <th>Versión</th>
                        <th>Estado</th>
                        <th>Horas</th>
                        <th>Creditos</th>
                        <th>Descripción</th>
                        <th>Meses</th>
                        <th>Acciones</th>
                    </tr>

                </thead>                            

                <tbody >
                @foreach ($programas as $programa )
                    <tr >
                        <td>{{$programa->Codigo}}</td>
                        <td>{{$programa->prog_Denominacion}}</td>
                        <td>{{$programa->prog_NivelFormacion}}</td>
                        <td>{{$programa->prog_version}}</td>                        
                        <td>
                            @if ( $programa->prog_Estado == 'Inactivo')
                                <span class="badge bg-danger fs-6">{{$programa->prog_Estado}}</span>
                            @else
                                <span class="badge bg-success fs-6">{{$programa->prog_Estado}}</span>
                            @endif
                        </td>

                        <td>{{$programa->prog_HorasEstimadas}}</td>
                        <td>{{$programa->prog_Creditos}}</td>
                        <td>{{$programa->prog_Descripcion}}</td>
                        <td>{{$programa->prog_DuracionMeses}}</td>

                        <td class="d-flex">
                            <a href="{{ route('programas.edit', $programa) }}" 
                                class="btn btn-primary btn-sm mr-2" 
                                onclick=""
                                style="width: 30px; height: 30px; border-radius: 50%"
                            >
                                <i class="far fa-edit"></i>
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
                        </td>
                    </tr>           

                    @endforeach
                </tbody>
                
           
                </table>
            {{-- {{ $programas->links() }} --}}
        </div>
    </div>  
    
@stop

@section('css')
    
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
            $('#datatables_programas').DataTable();
        });
   </script>

@endsection