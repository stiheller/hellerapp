@extends('adminlte::page')

@section('title', 'Blog')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}

@section('content_header')
    <h1>Editar Permiso</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($permission, ['route' => ['admin.permission.update', $permission], 'method' => 'put']) !!}


                @include('admin.permission.forms')

                {!! Form::submit('Actualizar Permiso', ['class' =>'btn btn-sm btn-primary']) !!}
                <a class="btn btn-sm btn-secondary float-right" href="{{  route('admin.permission.index') }}"> Volver</a>

            {!! Form::close() !!}

        </div>
    </div>
@stop
