@extends('adminlte::page')

@section('title', 'Perfil del Usuario')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Perfil del Usuario</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/responsive.bootstrap4.min.css') }}">
@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @isset ($user->image)
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('/avatar/'. $user->image) }}" alt="foto de perfil">
                    @else
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('/avatar/user_default.png') }}" alt="foto de perfil">
                    @endif

                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">Usuario: {{ $user->username }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>IP: </b> <a class="float-right">{{ $ip }}</a>
                </li>
                <li class="list-group-item">
                    <b>Importado</b> <a class="float-right">{{ $user->created_at }}</a>
                </li>
                <li class="list-group-item">
                    @if ($user->activo == 1)
                    <b>Activo</b> <a class="float-right text-success text-bold">SI</a>
                    @else
                    <b>Activo</b> <a class="float-right text-danger text-bold">NO</a>
                    @endif

                </li>
                <li class="list-group-item">
                    @if ($user->changepassword ==0)
                        <b>Cambia Clave</b> <a class="float-right text-success text-bold">NO</a>
                    @else
                        <b>Cambia Clave</b> <a class="float-right text-danger text-bold">SI</a>
                    @endif

                </li>
                <li class="list-group-item">
                    <b>email</b> <a class="float-right">{{ $user->email }}</a>
                </li>
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Información Personal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{--<strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                <span class="tag tag-danger">UI Design</span>
                <span class="tag tag-success">Coding</span>
                <span class="tag tag-info">Javascript</span>
                <span class="tag tag-warning">PHP</span>
                <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> --}}
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="card-header">
                        <h3 class="card-title">Rol o Roles asignados al Usuario</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($user->roles as $role)
                            <p class="h3">{{ $role->name }} - {{ $role->description }}</p>
                            <hr>
                            @foreach ($role->permissions as $item)
                                <span class="right badge badge-primary">{{ $item->description }}</span>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="card-header">
                        <h3 class="card-title">Actividad del Usuario</h3>
                    </div>
                    <div class="card-body">
                        <table id="logs" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Fecha Hora</td>
                                    <td>PC</td>
                                    <td>Accion</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($log->created_at)->diffForhumans() }}</td>
                                        <td>{{ $log->ip }}</td>
                                        <td>{{ $log->log_accion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

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
                $('#logs').DataTable({
                    responsive:true,
                    autoWidth:false,
                    "ordering": false,
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


