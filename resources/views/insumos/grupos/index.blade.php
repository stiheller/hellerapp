@extends('adminlte::page')

@section('title', 'Intranet')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    @can('insumos.grupos.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('insumos.grupos.create') }}"><i
                class="fas fa-plus-square fa-fw"></i> Nuevo Grupo</a>
    @endcan

    <h1>Listado de Grupos </h1>
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



            <table id="grupos" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>MENU</th>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>GENERADO POR</th>
                        <th>ACTIVO</th>
                        <th>ELIMINADO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grupos as $item)
                        <tr>
                            <td class="text-center">

                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu">
                                        @can('insumos.grupos.edit')
                                            <a class="dropdown-item" href="{{ route('insumos.grupos.edit', $item->id) }}"><i
                                                class="fas fa-edit"></i> Editar </a>
                                            <div class="dropdown-divider"></div>    
                                        @endcan
                                        @can('insumos.grupos.destroy')
                                            <form action="{{ route('insumos.grupos.destroy', $item->id) }}" method="POST"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Esta seguro de Eliminar el Grupo')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip" class="dropdown-item"
                                                    title="Eliminar Banco">
                                                    <i class="fas fa-trash"> Eliminar</i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                            <td class="text-right">{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ strip_tags($item->descripcion) }}</td>
                            <td>{{ $item->usuario->name }}</td>
                            <td class="text-center">
                                @if ($item->activo == 0)
                                    <span class="right badge badge-danger">No</span>
                                @else
                                    <span class="right badge badge-success">Si</span>
                                @endif

                            </td>
                            <td class="text-center">
                                @if ($item->eliminado == 1)
                                    <span class="right badge badge-danger">Si</span>
                                @else
                                    <span class="right badge badge-success">No</span>
                                @endif

                            </td>
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
        $(function() {
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
    <script>
        $(document).ready(function() {
            var table = $('#grupos').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 25,
                dom: 'B<"clear">lfrtip',
                buttons: [

                    {
                        extend: 'excelHtml5',
                        text: 'Exportar a Excel',
                        className: 'red',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Generar PDF',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5]
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
                        ` +
                        " registros por pagina",
                    "zeroRecords": "No se encontró nada - lo siento",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }

            });
            table.buttons().container().appendTo('#grupos .col-md-6:eq(0)');
        });
    </script>
@stop
