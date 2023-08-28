@extends('adminlte::page')

@section('title', 'Inv-CPU/Editar')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('inventario.cpus.index') }}">Volver al Índice</a>
    <h1>Editar CPU:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($cpu, ['route' => ['inventario.cpus.update', $cpu], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

                @include('inventario.cpus.partials.form')

                {!! Form::submit('Actualizar CPU', ['class' => 'btn btn-primary']) !!}
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