
@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Generar Reporte Cta Cte Proveedor</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/twitter-bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/twitter-bootstrap/css/bootstrap.css') }}">
@stop

@section('content')
    <form action="{{ route('administracion.proveedores.rptProveedor') }}" method="GET">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id" class="form-control" style="width: 100%;" required>
                                @foreach ($proveedores as $item)
                                    @if ( $proveedor_sel == $item->id )
                                        <option value="{{ $item->id }}" selected>{{ $item->nombreProveedor}}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->nombreProveedor}}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Desde:</label>

                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" value="{{ $desde }}" name="desde" id="desde">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Hasta:</label>

                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" value="{{ $hasta }}" name="hasta" id="hasta">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <br>
                        <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-search"></i> Buscar</button>
                    </div>
                </div>



            </div>
            <div class="card-body">
                @if(count($registros) > 0)

                    <table id="ctacte" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <td>FECHA</td>
                                <td>NRO FACTURA</td>
                                <td>DETALLE INTERNO</td>
                                <td>DESTINATARIO</td>
                                <td>ESTADO</td>
                                <td>FACTURADO</td>
                                <td>PAGADO</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $item)
                                <tr>
                                    <td class="text-right">{{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}} </td>
                                    <td class="text-right">{{ $item->numeroFactura }}</td>
                                    <td>{{ strip_tags($item->detalleInternoFactura)  }}</td>
                                    <td>{{ strip_tags($item->destinatarioFactura) }}</td>
                                    <td>
                                        @if ($item->eliminada == 1)
                                            <span>ELIMINADA</span>
                                        @else
                                            {{ $item->name }}
                                        @endif
                                    </td>
                                    <td class="text-right">{{ number_format($item->facturado,2) }}</td>
                                    <td class="text-right">{{ number_format($item->cobrado,2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endisset

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-9"><h3>SALDO ACTUAL DEL PROVEEDOR </h3></div>
                    @isset($proveedor->saldo)
                        <div class="col-md-3 text-right text-bold"><span class="float-right">{{ number_format($proveedor->saldo,2) }}</span></div>
                    @else
                        <div class="col-md-3 text-right text-bold"><span class="float-right">{{ number_format(0,2) }}</span></div>
                    @endisset

                </div>
                <div class="row float-right">
                    <a class="btn btn-secondary  " href="{{  route('administracion.proveedores.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>
                </div>
            </div>
        </div>
    </form>
@stop



@section('js')
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
            var table = $('#ctacte').DataTable({
                order:[[ 0, "desc" ]],
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
                            columns: [ 0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Generar PDF',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend:    'print',
                        text:      'Imprimir',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5, 6]


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
