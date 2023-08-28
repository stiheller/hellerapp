@extends('adminlte::page')

@section('title', 'Inv-Switchs/Crear')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('inventario.conmutadores.index') }}">Volver al Índice</a>
    <h1>Crear Switch</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'inventario.conmutadores.store']) !!}

            @include('inventario.conmutadores.partials.form')

            {!! Form::submit('Crear Switch', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop