@extends('adminlte::page')

@section('title', 'Inventario - Sectores - Create')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('inventario.sectores.index') }}">Volver al Índice</a>
    <h1>Crear Sector:</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'inventario.sectores.store']) !!}

                @include('inventario.sectores.partials.form')

                {!! Form::submit('Crear Sector', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>

    <script> console.log('Hi!'); </script>
@stop
