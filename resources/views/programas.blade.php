@extends('adminlte::page')

@section('title', 'Programas')

@section('content_header')
    <h1>Listas de programas: </h1>
    
@stop

@section('content')
    
    <div class="row d-flex flex-column">

        {{-- mensaje de programa agregado --}}
        @if (Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{Session::get('success')}}</strong>
            </div>            
        @endif

        
            
        <div>
            <table id="datatables_programas" class="display shadow-sm text-capitalize" >

                <thead>
                    <tr>
                        <th data-orderable="true">#</th>
                        <th data-orderable="true">Programa</th>
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
                    <tr>
                        <td>{{$programa->Codigo}}</td>
                        <td>{{$programa->prog_Denominacion}}</td>
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
                            <a href="{{ route('programas.edit', $programa) }}" class="btn btn-primary btn-sm mr-2" onclick="">Editar</a>
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
                                        >Eliminar</button>
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
<!-- SweetAlert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script>
        import swal from 'sweetalert';
    </script> --}}

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


   <script>
        const dataTableOpciones = {            
            "order": [[ 0, 'asc' ], [ 1, 'asc' ]],                        
        }

        $(document).ready(function () {
            $('#datatables_programas').DataTable();
        });
   </script>

@endsection