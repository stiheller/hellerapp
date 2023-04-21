@extends('adminlte::page')

    @section('title', 'Intranet')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.permission.create') }}" data-toggle="tooltip" data-placement="top"  title="Nuevo Permiso"> Nuevo Permiso</a>
        <h1>Listado de Permisos</h1>
    @stop

    @section('css')
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/responsive.bootstrap4.min.css') }}">
    @stop

    @section('content')
        <div class="card">
            <div class="card-body">

                @include('sweetalert::alert')

                <table id="centrex" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permiso</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                @if ($permission->id == 1)
                                    <td></td>
                                @else
                                    <td class="text-center">
                                        <a href="{{ route('admin.permission.edit', $permission->id) }}"  class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"  title="Editar Permiso">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.permission.destroy', $permission) }}" method="POST" style="display: inline-block;"
                                            onsubmit="return confirm('Esta seguro de Eliminar el Permiso Seleccionado')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"  title="Eliminar Permiso">
                                                <i class="fas fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
        <script>
            $(document).ready(function() {
                $('#centrex').DataTable({
                    responsive:true,
                    autoWidth:false,
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
        </script>
@stop
