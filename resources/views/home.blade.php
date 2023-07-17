@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">Home</h1>
        <div>
            @role('admin')<p>Admin</p>@endrole
            @role('instructor')<p>Instructor</p>@endrole
            @role('aprendiz')<p>Aprendiz</p>@endrole
        </div>
    </div>

@stop

@section('content')

    <div class="row g-3">

        <div class="col-md-4  ">
            <x-adminlte-small-box class="shadow-lg" title="0" text="Centros" icon="fas fa-synagogue text-dark" theme="danger" url="#" url-text="Ver más"/>                           
        </div>
        <div class="col-md-4">
            <x-adminlte-small-box class="shadow-lg" title="{{$usersCount}}" text="Usuarios" icon="fas fa-user-plus text-teal" theme="primary" url="/usuarios" url-text="Ver usuarios"/>
        </div>
        <div class="col-md-4 ">
            <x-adminlte-small-box class="shadow-lg" title="{{$conteoProgramas}}" text="Programas" icon="fas fa-graduation-cap text-dark" theme="teal" url="/programas" url-text="Ver más" />
        </div>       
                                  
    </div>
    

@stop

@push('js')
<script> </script>
@endpush