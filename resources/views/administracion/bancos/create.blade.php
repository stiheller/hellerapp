@extends('adminlte::page')

@section('title', 'Administración')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Crear Banco</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'administracion.bancos.store']) !!}

        {!! Form::hidden('user_id', Auth()->user()->id) !!}

        @include('administracion.bancos.forms')

        <a class="btn btn-secondary float-right " href="{{  route('administracion.bancos.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

        {{ Form::button('<i class="fas fa-plus-square"> Crear Banco</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}



    {!! Form::close() !!}
@stop
