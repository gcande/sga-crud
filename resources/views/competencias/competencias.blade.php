@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <h1>Competencias</h1> 
@stop

@section('content')
<a name="" id="" class="btn btn-secondary btn-sm m-2" href="{{ route('competencias.create') }}" role="button">Crear Competencia</a>
<div class="card">
    <!-- DataTables -->
    <div class="card-body table-responsive p-2">
        {{-- @php
            dd($competencias);
        @endphp --}}
        <table id="datatables_competencias" class="display shadow-sm text-capitalize " > 
            <thead>
                <tr>
                    <th>#</th>
                    <th>Código competencia</th>
                    <th>Denominacion</th>
                    <th>version NCL</th>
                    <th>Duracion estimada</th>
                    <th>Créditos</th>
                    <th>Horas</th>
                    <th>Horas FI</th>
                    <th>Id programa</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
    
            <tbody>                
                @foreach ($competencias as $competencia)
                    <tr>
                        <td>{{$competencia->Codigo}}</td>
                        <td>{{$competencia->comp_codigoCompetencia}}</td>
                        <td>{{ $competencia->comp_Denominacion }}</td>
                        <td>{{ $competencia->comp_VersionNCl }}</td>
                        <td>{{ $competencia->comp_DuracionEstimada }}</td>
                        <td>{{ $competencia->comp_Creditos }}</td>
                        <td>{{ $competencia->comp_Horas }}</td>
                        <td>{{ $competencia->comp_Horas_FI}}</td>
                        <td>
                             {{ $competencia->Codigo_programa}}-
                            {{-- -{{ $competencia->programarelacionado->prog_Denominacion }} --}}
                            @if ($competencia->Codigo_programa && $competencia->programarelacionado)
                                @php
                                    $programaRelacionado = $competencia->programarelacionado->where('Codigo', $competencia->Codigo_programa)->first();
                                @endphp

                                @if ($programaRelacionado)
                                    {{ $programaRelacionado->prog_Denominacion }}
                                @endif
                            @endif
                            
                            {{-- @if ($competencia->programarelacionado)
                                {{ $competencia->programarelacionado->prog_Denominacion }}
                            @endif --}}
                            
                        </td>
                        
                        <td class="d-flex">
                            <a href="{{ route('competencias.edit', $competencia->Codigo) }}" 
                                class="btn btn-primary btn-sm mr-2" 
                                style="width: 30px; height: 30px; border-radius: 50%"
                            >
                                <i class="fas fa-pen"></i>
                            </a>
    
                            <form action="{{ route('competencias.destroy', $competencia) }}" method="POST" class="d-inline" >
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
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@stop

@section('js')
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- DataTables JS-->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

   <script>
        const dataTableOpciones = {            
            "order": [[ 0, 'asc' ]],                        
        }

        $(document).ready(function () {
            $('#datatables_competencias').DataTable();
        });
   </script>
@stop