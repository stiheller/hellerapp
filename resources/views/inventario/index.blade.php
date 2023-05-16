@extends('adminlte::page')

@section('title', 'Inventario')

@section('content_header')
    {{-- <h4>Inventario:</h4> --}}
@stop

@section('content')
{{-- <h1>Acá tiene que estar la vista del Inventario</h1> --}}
    @livewire('inventario.principal-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop