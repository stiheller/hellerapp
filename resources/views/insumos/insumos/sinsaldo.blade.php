@extends('adminlte::page')

    @section('title', 'Insumos')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        <h1>Listado de Insumos SIN CONTROL NEGATIVO con Disponible Menor o Igual a 0 </h1>
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
                <table id="negativos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>MENU</th>
                            <th>ID</th>
                            <th>CODIGO</th>
                            <th>GRUPO</th>
                            <th>NOMBRE</th>
                            <th>DISPONIBLE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sinsaldo as $item)
                            <tr>
                                <td class="text-center"><a class="btn btn-success" href="{{ route('insumo.seguimiento', $item->id) }}" title="seguimineto de insumos"><i class="fas fa-user-secret"></i></a></td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->codigo_sss }}</td>
                                <td>{{ $item->grupo }}</td>
                                <td>{{ strip_tags($item->nombre) }}</td>
                                <td class="text-right">{{ $item->disponible }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop

    @section('js')
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
            $('#negativos').DataTable({
                displayStart: 20,
                responsive:true,
                autoWidth:true,
                pageLength: 25,
                dom: 'B<"clear">lfrtip',
                    buttons: [

                        {
                            extend: 'excelHtml5',
                            text: 'Exportar a Excel',
                            className: 'red',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4,5]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            orientation: 'horizontal',
                            pageSize: 'A4',
                            text: 'Generar PDF',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4,5]
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
                },

            });

        </script>
@stop
