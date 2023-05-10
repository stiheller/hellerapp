@extends('adminlte::page')

@section('title', 'Inventario - Monitores / Editar')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('inventario.monitores.index') }}">Volver al Índice</a>
    <h1>Editar Monitor:</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($monitore, ['route' => ['inventario.monitores.update', $monitore], 'method' => 'put']) !!}

                @include('inventario.monitores.partials.form')

                {!! Form::submit('Actualizar Monitor', ['class' => 'btn btn-primary']) !!}
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