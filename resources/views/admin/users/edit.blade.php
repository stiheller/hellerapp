@extends('adminlte::page')

@section('title', 'Intranet')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')

    {!! Form::model($user,['route' =>['admin.users.update', $user], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

        {!! Form::hidden('user_id', auth()->id()) !!}

        @include('admin.users.forms')

        {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary mt-2']) !!}
        <a class="btn btn-secondary float-right" href="{{ route('admin.users.index') }}"> Volver</a>
    {!! Form::close() !!}


@stop


