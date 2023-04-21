@extends('adminlte::page')

    @section('title', 'Usuarios')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        @can('admin.users.create')
            <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.users.create') }}"> Nuevo Usuario</a>
        @endcan

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

                <table id="centrex" class="table table-striped table-bordered table-hover projects" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Sector</th>
                            <th>roles</th>
                            <th>Activo</th>
                            <th>Cambia Clave</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    @isset ($user->image)
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="{{ asset('/avatar/'. $user->image) }}">
                                        </li>
                                    @else
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="{{ asset('/avatar/user_default.png') }}">
                                        </li>
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sector->Nombre }}</td>

                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="right badge badge-warning">{{ $role->name }}</span>
                                    @endforeach

                                </td>
                                <td class="text-center">
                                    @if ($user->activo == 1)
                                        <span class="right badge badge-success">SI</span>
                                    @else
                                        <span class="right badge badge-danger">NO</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($user->changepassword == 0)
                                        <span class="right badge badge-success">NO</span>
                                    @else
                                        <span class="right badge badge-danger">SI</span>
                                    @endif
                                </td>

                                @if ($user->id == 1)
                                    <td></td>
                                @else
                                    <td class="text-center">
                                        @can('admin.users.edit')
                                            <a href="{{ route('admin.users.edit', $user) }}"  class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top"  title="Editar Usuario">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                        @endcan

                                        @can('admin.users.resetpassword')
                                            <form action="{{ route('admin.users.resetpassword', $user->id) }}" method="POST" style="display: inline-block;"
                                                onsubmit="return confirm('Esta seguro de Resetear la Password Usuario Seleccionado')">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" rel="tooltip" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top"  title="Resetear Clave">
                                                    <i class="fas fa-sync-alt"></i>
                                                </button>
                                            </form>
                                        @endcan
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
