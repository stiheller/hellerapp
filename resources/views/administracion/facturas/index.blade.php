@extends('adminlte::page')

    @section('title', 'Facturas')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}

    @section('content_header')
        @can('administracion.facturas.create')
            <a class="btn btn-secondary btn-sm float-right" href="{{ route('administracion.facturas.create') }}"><i class="fas fa-plus-square fa-fw"></i> Nueva Factura</a>
        @endcan

        <h1>Listado de Facturas Intranet</h1>
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
            <form action="{{ route('administracion.facturas.index') }}" method="GET">
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
                            <a href="{{ route('administracion.facturas.index') }}" class="btn btn-warning float-right"><i class="fas fa-sync"></i> Recargar</a>
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
                            <th>NUMERO</th>
                            <th>FECHA FACTURA</th>
                            <th>PROVEEDOR</th>
                            <th>DESTINATARIO</th>
                            <th>IMPORTE</th>
                            <th>ESTADO</th>
                            <th>ELIMINADA</th>
                            <th>CREADA</th>
                            <th>USUARIO</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturas as $item)
                            <tr>
                                <td class="text-left">


                                    @if ($item->eliminada == 0)


                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu">

                                                @can('administracion.facturas.imprimir')
                                                    <a class="dropdown-item" href="{{ route('administracion.facturas.imprimir', $item->id) }}" target="_blank"><i class="fas fa-print"></i> Imprimir </a>
                                                    <div class="dropdown-divider"></div>
                                                @endcan

                                                @if($item->estado_id == 1)
                                                    @can('administracion.facturas.edit')
                                                        <a class="dropdown-item" href="{{ route('administracion.facturas.edit', $item->id) }}"><i class="fas fa-edit"></i> Editar </a>
                                                        <div class="dropdown-divider"></div>
                                                    @endcan
                                                    @can('administracion.facturas.pagar')
                                                        <a class="dropdown-item" href="{{ route('administracion.facturas.pagar', $item->id) }}"><i class="far fa-money-bill-alt"></i> Pagar</a>
                                                        <div class="dropdown-divider"></div>
                                                    @endcan
                                                    @can('administracion.facturas.destroy')
                                                        <form action="{{ route('administracion.facturas.destroy', $item->id) }}" method="POST" style="display: inline-block;"
                                                            onsubmit="return confirm('Esta seguro de Eliminar la Factura')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" rel="tooltip" class="dropdown-item"  title="Eliminar Factura">
                                                                <i class="fas fa-trash"> Eliminar</i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                </td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->numeroFactura }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}}</td>
                                <td>{{ $item->proveedor->nombreProveedor }}</td>
                                <td>{{ $item->destinatarioFactura }}</td>
                                <td class="text-right">{{ number_format($item->importeFactura,2) }}</td>

                                <td>
                                    @if ($item->eliminada  == 0)
                                        {{ $item->estado->name }}
                                    @else
                                        <span>ELIMINADA</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->eliminada  == 1)
                                        <span class="badge badge-danger ">Si</span>
                                    @else
                                        <span class="badge badge-success">No</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
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
        <script>
            $(document).ready(function() {
                var table = $('#facturas').DataTable({
                    order: [[ 1, "desc" ]],
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
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Generar PDF',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9]
                            }
                        },
                        {
                            extend:    'print',
                            text:      'Imprimir',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7, 8, 9]
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
                table.buttons().container().appendTo( '#bancos .col-md-6:eq(0)' );
            } );

        </script>
@stop
