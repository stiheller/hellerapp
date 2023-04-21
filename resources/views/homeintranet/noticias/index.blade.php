@extends('adminlte::page')

    @section('title', 'Noticias')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}

    @section('content_header')
        @can('administracion.facturas.create')
            @can('homeintranet.noticias.create')
                <a class="btn btn-secondary btn-sm float-right" href="{{ route('homeintranet.noticias.create') }}"><i class="fas fa-plus-square fa-fw"></i> Nueva Noticia</a>
            @endcan

        @endcan

        <h1>Listado de Noticias Portada Intranet</h1>
    @stop

    @section('css')
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/responsive.bootstrap4.min.css') }}">
    @stop

    @section('content')
        <div class="card">

            <div class="card-header">
                @include('layouts.session_message')
            </div>
            <form action="{{ route('homeintranet.noticias.index') }}" method="GET">
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Desde</label>
                                <input type="date" class="form-control pull-right text-right" name="desde" id="hasta" value="{{ $desde }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hasta</label>
                                <input type="date" class="form-control pull-right text-right" name="hasta" id="hasta" value="{{ $hasta }}">
                            </div>

                        </div>

                        <div class="col-md-4">
                            <br>
                            <a href="{{ route('homeintranet.noticias.index') }}" class="btn btn-warning float-right"><i class="fas fa-sync"></i> Recargar</a>
                            <button type="submit" class="btn btn-primary float-right mr-2"><i class="fas fa-search"></i> Buscar</button>
                        </div>

                </div>
            </form>
            <div class="card-body">



                <table id="facturas" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>MENU</th>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>TITULO</th>
                            <th>COPETE</th>
                            <th>URLPAGINAWEB</th>
                            <th>IMAGEN</th>
                            <th>ACTIVA</th>
                            <th>USUARIO</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($noticias as $item)
                            <tr>
                                <td class="text-left">

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-divider"></div>
                                            @can('homeintranet.noticias.edit')
                                                <a class="dropdown-item" href="{{ route('homeintranet.noticias.edit', $item->id) }}"><i class="fas fa-edit"></i> Editar </a>
                                            @endcan

                                            <div class="dropdown-divider"></div>
                                            @can('homeintranet.noticias.destroy')
                                                <form action="{{ route('homeintranet.noticias.destroy', $item->id) }}" method="POST" style="display: inline-block;"
                                                    onsubmit="return confirm('Esta seguro de Eliminar la Noticia')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" rel="tooltip" class="dropdown-item"  title="Eliminar Factura">
                                                        <i class="fas fa-trash"> Eliminar</i>
                                                    </button>
                                                </form>
                                            @endcan

                                        </div>
                                    </div>


                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y') }}</td>
                                <td>{{ strip_tags($item->titulo) }}</td>
                                <td>{{ strip_tags($item->copete) }}</td>
                                <td>{{ $item->urlPagWeb }}</td>
                                <td><img src="{{ asset('/img/noticias/'.$item->urlImagen) }}" class="img-fluid mb-2" alt="black sample"></td>
                                <td>
                                    @if ($item->activo  != 'N')
                                        <span class="badge badge-success"> ACTIVA </span>
                                    @else
                                    <span class="badge badge-danger"> NO ACTIVA </span>
                                    @endif
                                </td>
                                <td>{{ $item->usuario->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop



    @section('js')
         {{-- message --}}
         <script src="{{ asset('js/close_message_session.js') }}"></script>
         {{-- datatable --}}
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script src="{{ asset('DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('DataTables/DataTables-1.10.24/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('DataTables/DataTables-1.10.24/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('DataTables/pdfmake-0.1.36/pdfmake.js') }}"></script>
        <script src="{{ asset('DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
        <script src="{{ asset('DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
        <script src="{{ asset('DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('DataTables/Buttons-1.7.0/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('DataTables/Buttons-1.7.0/js/buttons.print.min.js') }}"></script>
        </script>
@stop
