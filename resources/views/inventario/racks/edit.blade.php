@extends('adminlte::page')

@section('title', 'Inv-Racks/Editar')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('inventario.racks.index') }}"><i class="fas fa-undo"></i> Volver al Índice</a>
    <h1>Editar Rack:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($rack, ['route' => ['inventario.racks.update', $rack], 'method' => 'put']) !!}

                @include('inventario.racks.partials.form')

                <div class="form-group">
                    {!! Form::label('fecha_limpieza', 'Fecha de Limpieza:', ['class' => 'mr-3']) !!}
                    {!! Form::date('fecha_limpieza', null) !!}    
                </div>

                {!! Form::submit('Actualizar Rack', ['class' => 'btn btn-primary']) !!}
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