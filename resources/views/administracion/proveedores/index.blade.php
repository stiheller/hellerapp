@extends('adminlte::page')

    @section('title', 'Proveedores')

    @section('content_header')
        @can('administracion.proveedores.create')
            <a class="btn btn-secondary btn-sm float-right" href="{{ route('administracion.proveedores.create') }}"><i class="fas fa-plus-square fa-fw"></i> Nuevo Proveedor</a>
        @endcan
        @can('administracion.proveedores.rptProveedor')
            <a class="btn btn-secondary btn-sm float-right mr-2" href="{{ route('administracion.proveedores.rptProveedor') }}"><i class="fas fa-envelope-open-text fa-fw"></i> Cta Cte Proveedor</a>
        @endcan


        <h1>Listado de Proveedores Intranet</h1>
    @stop

    @section('css')
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/twitter-bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/twitter-bootstrap/css/bootstrap.css') }}">
    @stop

    @section('content')
        <div class="card">
            <div class="card-header">
                @include('layouts.session_message')
            </div>

            <div class="card-body">

                <table id="proveedores" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>MENU</th>
                            <th>ID</th>
                            <th>PROVEEDOR</th>
                            <th>CONTACTO</th>
                            <th>TELEFONO</th>
                            <th>EMAIL</th>
                            <th>CHEQUE A</th>
                            <th>CBU</th>
                            <th>BANCO</th>
                            <th>SALDO</th>
                            <th>ACTIVO</th>

                        </tr>
                    </thead>
                <tbody>
                    @foreach ($proveedores as $item)
                        <tr>
                            <td class="text-left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu">
                                            @can('administracion.proveedores.edit')
                                                <a class="dropdown-item" href="{{ route('administracion.proveedores.edit', $item->id) }}"><i class="fas fa-edit"></i> Editar </a>
                                                <div class="dropdown-divider"></div>
                                            @endcan
                                            @can('administracion.proveedores.rptProveedor')
                                                <a class="dropdown-item" href="{{ route('administracion.proveedores.rptProveedor', $item->id) }}"><i class="fas fa-envelope-open-text"></i> Rpte Cta Cte </a>
                                                <div class="dropdown-divider"></div>
                                            @endcan
                                            @can('administracion.proveedores.destroy')
                                                <form action="{{ route('administracion.proveedores.destroy', $item->id) }}" method="POST" style="display: inline-block;"
                                                    onsubmit="return confirm('Esta seguro de Eliminar el Proveedor')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" rel="tooltip" class="dropdown-item"  title="Eliminar Proveedor">
                                                        <i class="fas fa-trash"> Eliminar</i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                </div>
                            </td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombreProveedor }}</td>
                            <td>{{ $item->nombreContactoProveedor }}</td>
                            <td>{{ $item->telefonoProveedor }}</td>
                            <td>{{ $item->emailProveedor }}</td>
                            <td>{{ $item->nombreChequeProveedor }}</td>
                            <td>{{ $item->nroCbu }}</td>
                            <td>{{ $item->nombreBanco }}</td>
                            <td class="text-right">{{ number_format($item->saldo) }}</td>
                            <td class="text-center">
                                @if ($item->activo  == 1)
                                    <span class="right badge badge-success ">Si</span>
                                @else
                                <span class="right badge badge-danger">No</span>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
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
        <script>
            $(document).ready(function() {
                var table = $('#proveedores').DataTable({
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
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8]
                            },
                            orientation: 'landscape',
                            pageSize: 'LEGAL'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Generar PDF',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8]
                            },
                            orientation: 'landscape',
                            pageSize: 'LEGAL'
                        },
                        {
                            extend:    'print',
                            text:      'Imprimir',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8]

                            },
                            orientation: 'landscape',
                            pageSize: 'LEGAL'

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
                table.buttons().container().appendTo( '#bancos .col-md-6:eq(0)' );
            } );

        </script>
@stop
