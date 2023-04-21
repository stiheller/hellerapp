@extends('adminlte::page')

@section('title', 'Administracion')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($banco, ['route' => ['administracion.bancos.update', $banco], 'method' => 'put']) !!}

                {!! Form::hidden('user_id', Auth()->user()->id) !!}

                @include('administracion.bancos.forms')

                <a class="btn btn-secondary float-right " href="{{  route('administracion.bancos.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

                {{ Form::button('<i class="fas fa-save"> Actualizar Banco</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}

            {!! Form::close() !!}

        </div>
    </div>
@stop
