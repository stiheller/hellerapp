@extends('adminlte::page')

@section('title', 'INTRANET')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.roles.store']) !!}

        @include('admin.roles.forms')

        {!! Form::submit('Crear Rol', ['class' =>'btn btn-sm btn-primary']) !!}
        <a class="btn btn-sm btn-secondary float-right" href="{{  route('admin.roles.index') }}"> Volver</a>
    {!! Form::close() !!}
@stop

