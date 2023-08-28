@extends('adminlte::page')

@section('title', 'Inv-Racks/Show')

@section('content_header')
    <a class="btn btn-info float-right" href="{{ route('inventario.racks.index') }}">Volver al Índice</a>
    <h1>Puesto: {{ $rack->nombre }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="rack-desc-tab" data-toggle="tab" href="#rack-desc"
                        role="tab" aria-controls="rack-desc" aria-selected="true">Detalle-Rack</a>
                    <a class="nav-item nav-link" id="switch-desc-tab" data-toggle="tab" href="#switch-desc"
                        role="tab" aria-controls="switch-desc" aria-selected="false">Switchs</a>
                    <a class="nav-item nav-link" id="imagenes-desc-tab" data-toggle="tab" href="#imagenes-desc"
                        role="tab" aria-controls="imagenes-desc" aria-selected="false">Imágenes</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade active show" id="rack-desc" role="tabpanel"
                    aria-labelledby="rack-desc-tab">
                    <h5><u> Descripción:</u></h5>
                    @if ($rack->descripcion != null)
                        <p>{{ $rack->descripcion }}</p>
                    @else
                        <p>Sin Detalle</p>
                    @endif
                    <h6><u>Referencia (Ubicación):</u></h6>
                    @if ($rack->referencia_lugar != null)
                        <p>{{ $rack->referencia_lugar }}</p>
                    @else
                        <p class="text-danger"><em>Sin Detalle</em></p>
                    @endif
                    <h6><u>Planta:</u></h6>
                    @if ($rack->planta == 1)
                        <p class="text-success"><em>P. Alta</em></p>
                    @else
                        <p class="text-danger"><em>P. Baja</em></p>
                    @endif
                    <h6><u>Fecha última limpieza:</u></h6>
                    <p class="text-danger">{{ $rack->fecha_limpieza }}</p>
                </div>
                <div class="tab-pane fade" id="switch-desc" role="tabpanel" aria-labelledby="switch-desc-tab">
                    {{-- @livewire('admin.conmutadores-show', compact('conmutadores')) --}}
                    @if ($conmutadores->count())
                    
                        <div class="card-body table-striped table-responsive p-0" style="height: 500px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 60px">
                                            ID
                                        </th>
                                        <th>Nro</th>
                                        <th>Marca</th>
                                        <th>Descripción</th>
                                        <th>Referencia</th>
                                        <th>Fecha Limpieza</th>
                                        <th class="text-bold text-danger text-center">Detalle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conmutadores as $conmutador)
                                        <tr>
                                            <td>{{$conmutador->id}}</td>
                                            <td>{{$conmutador->numero}}</td>
                                            <td>{{$conmutador->marca}}</td>
                                            <td>{{$conmutador->descripcion}}</td>
                                            <td>
                                                {{ $conmutador->referencia_lugar }}
                                                {{-- <div class="btn-group ml-3">
                                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <i class="fas fa-bars"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <p class="mx-3">{{ $conmutador->referencia_lugar }}</p>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                            </td>
                                            <td>{{$conmutador->fecha_limpieza}}</td>
                                            <td width="10px">
                                                <a class="btn btn-success btn-sm" href="{{route('inventario.conmutadores.show', $conmutador)}}">
                                                    <i class="fas fa-eye"></i> Detalle
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                    @else
                        <div class="card-body">
                            <strong>No hay ningún registro</strong>
                        </div>
                    @endif

                </div>
                <div class="tab-pane fade" id="imagenes-desc" role="tabpanel" aria-labelledby="imagenes-desc-tab">
                    <div class="row">
                        @if ($rack->imagenes->count())
                            @foreach ($rack->imagenes as $imagen)
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="callout callout-info mr-3">
                                        <div class="image-wrapper">
                                            <img class="img-fluid rounded-sm" id="picture" src="{{Storage::url($imagen->url)}}" alt="Imagen del Rack">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach    
                        @else
                            <p>No hay imágenes Asociadas al Rack.</p>
                        @endif
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop