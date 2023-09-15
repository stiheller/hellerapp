@extends('adminlte::page')

    @section('title', 'Insumos')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}

    @section('content_header')
        
        @can('insumos.grupos.create')
            <a class="btn btn-secondary btn-sm float-right" href="{{ route('insumos.insumos.create') }}"><i class="fas fa-plus-square fa-fw"></i> Nuevo Insumo</a>
        @endcan

        <h1>Listado de Insumos </h1>
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
            <form action="{{ route('insumos.insumos.index') }}" method="GET">
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Grupo</label>
                                <select name="grupo" id="grupo" class="form-control">
                                    <option value=""> Seleccione Grupo</option>
                                    @foreach ($grupos as $item)
                                        @if ($item->id == $grupo_id)
                                            <option value="{{ $item->id }}" selected> {{ $item->nombre }}</option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->nombre }}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Insumo a Buscar</label>
                            @if ($search !='')
                                <input type="text" class="form-control" name="search" placeholder="insumo a buscar" value="{{ $search }}">
                            @else
                                <input type="text" class="form-control" name="search" placeholder="insumo a buscar" value="">
                            @endif

                        </div>

                        <div class="col-md-4">
                            <br>
                            <a href="{{ route('insumos.insumos.index') }}" class="btn btn-warning float-right"><i class="fas fa-sync"></i> Recargar</a>
                            <button type="submit" class="btn btn-primary float-right mr-2"><i class="fas fa-search"></i> Buscar</button>
                        </div>

                </div>
            </form>
            <div class="card-body">
                <table id="insumos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>MENU</th>
                            <th>CODIGO SSS</th>
                            <th>GRUPO</th>
                            <th>NOMBRE</th>
                            <th>DESCRIPCION</th>
                            <th>STOCK</th>
                            <th>ACTIVO</th>
                            <th>ELIMINADO</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($insumos as $item)
                            <tr>
                                <td class="text-center">
                                    
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu">
                                                
                                                    <a class="dropdown-item" href="{{ route('insumos.insumos.edit', $item->id) }}"><i class="fas fa-edit"></i> Editar </a>
                                                    <div class="dropdown-divider"></div>
                                                
                                                    <a class="dropdown-item" href="#"><i class="fas fa-user-secret"></i> Seguimiento </a>
                                                
                                                <div class="dropdown-divider"></div>
                                                
                                                    <form action="{{ route('insumos.insumos.destroy', $item->id) }}" method="POST" style="display: inline-block;"
                                                        onsubmit="return confirm('Esta seguro de Eliminar el Insumo')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" rel="tooltip" class="dropdown-item">
                                                            <i class="fas fa-trash"> Eliminar</i>
                                                        </button>
                                                    </form>
                                              
                                            </div>
                                        </div>
                                    
                                    
                                    
                                </td>
                                <td>{{ $item->codigo_sss }}</td>
                                <td>{{ $item->grupo->nombre }}</td>
                                <td>{{ strip_tags($item->nombre) }}</td>
                                <td>{{ strip_tags($item->descripcion) }}</td>
                                @if ($item->stock <=0)
                                    <td class="text-right text-danger text-bold">{{ $item->stock }}</td>
                                @else    
                                    <td class="text-right text-bold">{{ $item->stock }}</td>
                                @endif
                                
                                <td class="text-center">
                                    @if ($item->activo  == 0)
                                        <span class="right badge badge-danger">No</span>
                                    @else
                                    <span class="right badge badge-success">Si</span>
                                    @endif

                                </td>
                                <td class="text-center">
                                    @if ($item->eliminado  == 1)
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
            $('#insumos').DataTable({
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
                                columns: [ 1, 2, 3, 4, 5, 6, 7 ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            text: 'Generar PDF',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6, 7 ]
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
