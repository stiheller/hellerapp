@extends('adminlte::page')

@section('title', 'Administración')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Crear Sector</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.sector.store']) !!}

        {!! Form::hidden('user_id', Auth()->user()->id) !!}
        {!! Form::hidden('idJefeSector', 0) !!}

        @include('admin.sectores.forms')

        <a class="btn btn-secondary float-right " href="{{  route('admin.sector.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

        {{ Form::button('<i class="fas fa-plus-square"> Crear Sector</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}



    {!! Form::close() !!}
@stop

@section('js')
    <script src="{{ asset('js/UpperCase.js') }}"></script>
@stop
