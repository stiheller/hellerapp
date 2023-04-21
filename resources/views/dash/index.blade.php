@extends('adminlte::page')

@section('title', 'INTRANET')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Dashboard del Usuario</h1>
@stop

@section('content')
    <div class="ribbon-wrapper ribbon-xl">
        <div class="ribbon bg-danger text-lg">
            DESARROLLO
        </div>
    </div>
    @switch($user->sector_id)
        @case(2)
            {{-- sti --}}
            @include('dash.indicadores_sti')
            @break

        @default
            <p>Bienvenido a este hermoso panel de administración</p>
            @include('dash.indicadores')
    @endswitch


@stop

@section('css')

@stop

@section('js')

@stop
