@extends('adminlte::page')

@section('title', 'Calendario')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}


@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/icheck-bootstrap.min.css') }}">
@stop

@section('content_header')
    <div class="card-header">
        @include('layouts.session_message')
    </div>
    <h1>Crear Nuevo Evento</h1>
@stop

@section('content')

    {!! Form::open(['route' => 'comunicacion.calendario.store']) !!}

        {!! Form::hidden('user_id', Auth()->user()->id) !!}

        @include('comunicacion.calendario.forms')

        <a class="btn btn-sm btn-secondary float-right" href="{{  route('comunicacion.calendario.index') }}"> Volver</a>
        {!! Form::submit('Crear Evento', ['class' =>'btn btn-sm btn-primary float-right']) !!}

    {!! Form::close() !!}
@stop

@section('js')
    {{-- message --}}
    <script src="{{ asset('js/close_message_session.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('adminlte/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop(''));
        })
    </script>
@stop
