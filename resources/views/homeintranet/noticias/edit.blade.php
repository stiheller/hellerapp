@extends('adminlte::page')

@section('title', 'Noticias')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Noticia</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($noticia, ['route' => ['homeintranet.noticias.update', $noticia], 'method' => 'put']) !!}

                {!! Form::hidden('user_id', Auth()->user()->id) !!}


                @include('homeintranet.noticias.forms')

                <a class="btn btn-secondary float-right " href="{{  route('homeintranet.noticias.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

                {{ Form::button('<i class="fas fa-save"> Actualizar Noticia</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}

            {!! Form::close() !!}

        </div>
    </div>
@stop
