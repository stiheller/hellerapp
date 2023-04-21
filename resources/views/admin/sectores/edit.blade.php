@extends('adminlte::page')

@section('title', 'Administracion')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Sector</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($sector, ['route' => ['admin.sector.update', $sector], 'method' => 'put']) !!}

                {!! Form::hidden('user_id', Auth()->user()->id) !!}
                {!! Form::hidden('idJefeSector', 0) !!}

                @include('admin.sectores.forms')

                <a class="btn btn-secondary float-right " href="{{  route('admin.sector.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

                {{ Form::button('<i class="fas fa-save"> Actualizar Sector</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}

            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/UpperCase.js') }}"></script>
@stop
