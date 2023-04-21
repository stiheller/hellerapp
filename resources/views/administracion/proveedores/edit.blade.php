@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($proveedor, ['route' => ['administracion.proveedores.update', $proveedor], 'method' => 'put']) !!}

                
                {!! Form::hidden('user_id', Auth()->user()->id) !!}
                

                @include('administracion.proveedores.forms')

                <a class="btn btn-secondary float-right " href="{{  route('administracion.proveedores.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>
        
                {{ Form::button('<i class="fas fa-save"> Actualizar Proveedor</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}

            {!! Form::close() !!}

        </div>
    </div>
@stop
