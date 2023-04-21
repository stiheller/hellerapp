@extends('adminlte::page')

@section('title', 'INTRANET')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}

@section('content_header')
    <h1>Crear Permiso</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.permission.store']) !!}

        @include('admin.permission.forms')

        {!! Form::submit('Crear Permiso', ['class' =>'btn btn-sm btn-primary']) !!}
        <a class="btn btn-sm btn-secondary float-right" href="{{  route('admin.permission.index') }}"> Volver</a>
    {!! Form::close() !!}
@stop
