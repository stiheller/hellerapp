@extends('adminlte::page')

@section('title', 'Administración')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Crear Rubro</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'administracion.rubro.store']) !!}

        {!! Form::hidden('user_id', Auth()->user()->id) !!}

        @include('administracion.rubros.forms')

        <a class="btn btn-secondary float-right " href="{{  route('administracion.rubro.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

        {{ Form::button('<i class="fas fa-plus-square"> Crear Rubro</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}



    {!! Form::close() !!}
@stop
