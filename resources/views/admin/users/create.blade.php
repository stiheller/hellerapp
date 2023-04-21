@extends('adminlte::page')

@section('title', 'Crear Usuario')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'admin.users.store','enctype' => 'multipart/form-data']) !!}

        @include('admin.users.forms')

        {!! Form::submit('Crear Usuario', ['class' =>'btn btn-sm btn-primary']) !!}
        <a class="btn btn-sm btn-secondary float-right" href="{{  route('admin.users.index') }}"> Volver</a>
    {!! Form::close() !!}
@stop
