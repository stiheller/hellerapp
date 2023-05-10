@extends('adminlte::page')

@section('title', 'Inventario CPU / Create')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('inventario.cpus.index') }}">Volver al Índice</a>
    <h1>Crear CPU:</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'inventario.cpus.store', 'autocomplete' => 'off', 'files' => true]) !!}
                
                @include('inventario.cpus.partials.form')

                {!! Form::submit('Crear CPU', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop