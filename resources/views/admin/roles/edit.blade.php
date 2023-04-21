@extends('adminlte::page')

@section('title', 'Blog')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}


                @include('admin.roles.forms')

                {!! Form::submit('Actualizar Rol', ['class' =>'btn btn-sm btn-primary']) !!}
                <a class="btn btn-sm btn-secondary float-right" href="{{  route('admin.roles.index') }}"> Volver</a>

            {!! Form::close() !!}

        </div>
    </div>
@stop
