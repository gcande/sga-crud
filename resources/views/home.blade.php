@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">Home</h1>
        <div>
            @role('admin')<p class="badge text-success fs-6">Admin</p>@endrole
            @role('instructor')<p class="badge text-success fs-6">Instructor</p>@endrole
            @role('aprendiz')<p class="badge text-success fs-6">Aprendiz</p>@endrole
            {{-- @hasanyrole('admin|usuario') <p class=“badge text-success fs-6”>Admin o usuario</p> @endhasanyrole --}}
        </div>
    </div>

@stop

@section('content')
        <!-- notificacion  -->
        @if (session()->has('acceso_denegado'))      
            {{-- <x-adminlte-card title="Alerta" theme="danger" theme-mode="outline"
                icon="fas fa-lg fa-envelope" header-class="text-uppercase rounded-bottom border-danger" removable>
                {{ session('acceso_denegado') }}
            </x-adminlte-card> --}}
            <div class="alert alert-danger" role="alert">
                <strong>{{ session('acceso_denegado') }}</strong> 
            </div>           
        @endif

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

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

@endpush