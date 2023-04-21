@extends('adminlte::page')

    @section('title', 'Compras')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        @can('administracion.compras.create')
            <a class="btn btn-secondary btn-sm float-right" href="{{ route('administracion.compras.create') }}"><i class="fas fa-plus-square fa-fw"></i> Nueva Compra</a>
        @endcan

        <h1>Listado de Compras</h1>
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

            <div class="card-body">
                <table id="compras" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>MENU</th>
                            <th>ID</th>
                            <th>TITULO</th>
                            <th>FECHA</th>
                            <th>DETALLE</th>
                            <th>REFERENTE</th>
                            <th>MONTO APROX</th>
                            <th>SECTOR</th>
                            <th>PRIORIDAD</th>
                            <th>ESTADO</th>
                            <th>ELIMINADA</th>
                            <th>USUARIO</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $item)
                            <tr>
                                <td class="text-center">
                                    @if ($item->eliminada  == 0)
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu">
                                                @can('administracion.compras.edit')
                                                    <a class="dropdown-item" href="{{ route('administracion.compras.edit', $item->id) }}"><i class="fas fa-edit"></i> Editar </a>
                                                    <div class="dropdown-divider"></div>
                                                @endcan
                                                @can('administracion.compras.destroy')
                                                    <form action="{{ route('administracion.compras.destroy', $item->id) }}" method="POST" style="display: inline-block;"
                                                        onsubmit="return confirm('Esta seguro de Eliminar la Compra')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="dropdown-item"  title="Eliminar Compra">
                                                            <i class="fas fa-trash"> Eliminar</i>
                                                        </button>
                                                    </form>
                                                @endcan


                                            </div>
                                        </div>
                                    @endif

                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->titulo }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}}</td>
                                <td>{{ strip_tags($item->detallecompra) }}</td>
                                <td>{{ $item->referente }}</td>
                                <td class="text-right">{{ number_format($item->monto_aprox,2) }}</td>
                                <td>{{ $item->sector->Nombre }}</td>
                                <td>{{ $item->prioridad->prioridad }}</td>
                                <td>{{ $item->estado->estado }}</td>
                                <td class="text-center">
                                    @if ($item->eliminada  == 1)
                                        <span class="right badge badge-danger ">Si</span>
                                    @else
                                        <span class="right badge badge-success">No</span>
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
        <script>
            $(document).ready(function() {
                var table = $('#compras').DataTable({
                    responsive:true,
                    autoWidth:false,
                    pageLength: 25,
                    dom: 'B<"clear">lfrtip',
                    buttons: [

                        {
                            extend: 'excelHtml5',
                            text: 'Exportar a Excel',
                            className: 'red',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Generar PDF',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                            }
                        },
                        {
                            extend:    'print',
                            text:      'Imprimir',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                            }

                        },

                    ],

                    "language": {
                        "lengthMenu": "Mostrando " +
                        `
                        <select class="custom-select custom-select-sm form-control form-control-sm">
                            <option value='10'>10</option>
                            <option value='25'>25</option>
                            <option value='50'>50</option>
                            <option value='100'>100</option>
                            <option value='-1'>Todos</option>
                        </select>
                        `
                        + " registros por pagina",
                        "zeroRecords": "No se encontró nada - lo siento",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate":{
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }

                });

            } );
            table.buttons().container().appendTo( '#compras .col-md-6:eq(0)' );
        </script>

@stop
