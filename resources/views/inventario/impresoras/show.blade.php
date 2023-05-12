@extends('adminlte::page')

@section('title', 'Inventario - Impresora / Show')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('inventario.impresoras.index') }}">Volver al Índice</a>
    <h1>Info de Impresora:</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <div id="accordion">
                <div class="card card-info">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                Datos Relevantes
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row">
                                <div class="callout callout-info col-8 col-md-10">
                                    <h5>Nombre:</h5>
                                    <p>{{$impresora->nombre}}</p>
                                </div>
                                
                                <div class="col-4 col-md-2">
                                    <h5>Estado:</h5>
                                    @if ($impresora->estado==1)
                                        <button type="button" class="btn btn-success btn-block"><i class="fa fa-check"></i> Activo</button>
                                    {{-- <span class="badge bg-success">Activo</span> --}}
                                    @else
                                        @if ($impresora->estado==0)
                                            <button type="button" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Baja</button>
                                        @else
                                            @if ($impresora->estado==2)
                                                <button type="button" class="btn btn-warning btn-block"><i class="fa fa-bolt"></i> En Reparación</button>
                                            @else
                                            <button type="button" class="btn btn-dark btn-block"><i class="fa fa-eye"></i> Desaparecido</button>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                                

                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-md-4 callout callout-success">
                                    <h5>Modelo</h5>
                                    @if ($impresora->modelo)
                                        <p>{{$impresora->modelo}}</p>
                                    @else
                                        -
                                    @endif 
                                </div>
                                <div class="col-12 col-md-4 callout callout-info">
                                    <h5>Serial:</h5>
                                    @if ($impresora->serial)
                                        <p>{{$impresora->serial}}</p>
                                    @else
                                        -
                                    @endif
                                </div>
                                <div class="col-12 col-md-4 callout callout-success">
                                    <h5>Patrimonial:</h5>
                                    @if ($impresora->patrimonial != null)
                                        <p>{{$impresora->patrimonial}}</p>    
                                    @else
                                        -
                                    @endif 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo"
                                aria-expanded="false">
                                Descripción
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                        <div class="card-body">
                            @if ($impresora->descripcion != null)
                                <div class="callout callout-info">
                                    <p>{{$impresora->descripcion}}</p>
                                </div>
                            @else
                                <div class="callout callout-info">
                                    <h6>Sin Descripción</h6>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree"
                                aria-expanded="false">
                                Imágenes
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                        <div class="card-body">
                            <div class="row">
                                {{-- @if ($impresora->imagenes->count())
                                    @foreach ($impresora->imagenes as $imagen)
                                        <div class="col-12 col-md-6 my-2">
                                            <div class="image-wrapper">
                                                <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($imagen->url)}}" alt="Imagen del CPU">
                                            </div>
                                        </div>
                                    @endforeach    
                                @else
                                    <p>No hay imágenes Asociadas a la Impresora.</p>
                                @endif --}}

                                <p>No hay imágenes Asociadas a la Impresora. Aún.!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop