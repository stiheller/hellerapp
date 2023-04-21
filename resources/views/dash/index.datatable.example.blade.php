@extends('adminlte::page')

    @section('title', 'Intranet')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('sti.users.create') }}"> Nuevo Usuario</a>
        <h1>Listado de Usuarios Intranet</h1>
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
                            <th>Apellido Nombre</th>
                            <th>Usuario</th>
                            <th>Cambiar Pass</th>
                            <th>Sector</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>

                                <td class="text-center">
                                    @if ($user->changepass  == 1)
                                        <span class="right badge badge-danger">Si</span>
                                    @else
                                    <span class="right badge badge-success">No</span>
                                    @endif

                                </td>
                                <td>{{ $user->sector->Nombre }}</td>
                                <td class="text-center">
                                    @if ($user->activo  == 1)
                                        <span class="right badge badge-success">Si</span>
                                    @else
                                    <span class="right badge badge-danger">No</span>
                                    @endif

                                </td>

                                @if ($user->id == 1)
                                    <td></td>
                                @else
                                    <td class="text-center">
                                        <a href="{{ route('sti.users.edit', $user->id) }}"  class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"  title="Editar Usuario">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="{{ route('sti.users.resetPassword', $user->id) }}"  class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top"  title="Resetear Clave">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                        <form action="{{ route('sti.users.destroy', $user->id) }}" method="POST" style="display: inline-block;"
                                            onsubmit="return confirm('Esta seguro de Eliminar el Usuario Seleccionado')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" rel="tooltip" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"  title="Eliminar Usuario">
                                                <i class="fas fa-user-times"></i>
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
