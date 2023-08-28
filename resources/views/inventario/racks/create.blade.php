@extends('adminlte::page')

@section('title', 'Inv-Racks/Crear')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('inventario.racks.index') }}">Volver al Índice</a>
    <h1>Crear Rack</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'inventario.racks.store']) !!}
             
                @include('inventario.racks.partials.form')

                <div class="form-group">
                    {!! Form::label('fecha_limpieza', 'Fecha de Limpieza:', ['class' => 'mr-3']) !!}
                    {!! Form::date('fecha_limpieza', \Carbon\Carbon::now()) !!}        
                </div>

                {!! Form::submit('Crear Rack', ['class' => 'btn btn-primary']) !!}
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