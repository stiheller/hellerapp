@extends('adminlte::page')

    @section('title', 'Ingresos')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        <h1>Seguimiento Insumo </h1>
    @stop

    @section('css')
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/responsive.bootstrap4.min.css') }}">
    @stop

    @section('content')
        <div class="card-header">
            <form action="{{ route('insumo.seguimiento', $insumo->id) }}" method="GET">
                <div class="row">
                        <input type="hidden" name="id" id="id" value="{{ $insumo->id }}">
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
                            <a href="{{ route('insumo.seguimiento', $insumo->id) }}" class="btn btn-warning float-right"><i class="fas fa-sync"></i> Recargar</a>
                            <button type="submit" class="btn btn-primary float-right mr-2"><i class="fas fa-search"></i> Buscar</button>
                        </div>

                </div>
            </form>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                            <strong>ID</strong>
                            <input type="text"  class="form-control" value="{{ $insumo->id }}" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                            <strong>Codigo SSS</strong>
                            <input type="text"  class="form-control" value="{{ $insumo->codigo_sss }}" readonly>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                            <strong>Tipo</strong>
                            <input type="text"  class="form-control" value="{{ $insumo->nombre }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">


            <div class="card-body">
                <table id="rotulos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>CUANDO</th>
                            <th>ROTULO</th>
                            <th>INTERNO</th>
                            <th>INGRESO</th>
                            <th>EGRESO</th>
                            <th>USUARIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $item)
                            <tr>
                                <td class="text-right">{{ $item->id }}</td>
                                <td class="text-right">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s')}}</td>
                                <td>{{ $item->rotulo }}</td>
                                <td class="text-right">{{ $item->interno }}</td>
                                <td class="text-right">{{ $item->ingreso }}</td>
                                <td class="text-right">{{ $item->egreso }}</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary float-right " href="{{  route('insumos.insumos.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>
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
                var table = $('#rotulos').DataTable({
                    responsive:true,
                    autoWidth:false,
                    pageLength: 25,
                    order: [[ 0, "desc" ]],
                    dom: 'B<"clear">lfrtip',
                    buttons: [

                        {
                            extend: 'excelHtml5',
                            text: 'Exportar a Excel',
                            className: 'red',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Generar PDF',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
                            }
                        },
                        {
                            extend:    'print',
                            text:      'Imprimir',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3]
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
                table.buttons().container().appendTo( '#rotulos .col-md-6:eq(0)' );
            } );
        </script>
@stop

