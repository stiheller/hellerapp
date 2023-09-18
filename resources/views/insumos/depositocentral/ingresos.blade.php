@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
    @livewireStyles
@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Ingreso Deposito Central</p>
    @livewire('insumos.searchboxinsumo')
@stop



@section('js')
    @livewireScripts
@stop