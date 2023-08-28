@extends('adminlte::page')

@section('title', 'Inv-Switchs/Editar')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('inventario.conmutadores.index') }}">Volver al Índice</a>
    <h1>Switchs Edit - Inventario</h1>
@stop

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="card-body">
            {!! Form::model($conmutadore, ['route' => ['inventario.conmutadores.update', $conmutadore], 'method' => 'put']) !!}

                @include('inventario.conmutadores.partials.form')

                {!! Form::submit('Actualizar Switch', ['class' => 'btn btn-primary']) !!}
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