@extends('adminlte::page')

    @section('title', 'Mantenimiento Ordenes')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
    @stop

    @section('css')
    @stop

    @section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión de Ordenes</h1>
          </div>
          <div class="col-sm-6">


          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ route('mnt.ordenes.create') }}" class="btn btn-primary btn-block mb-3"><i class="fas fa-envelope-open fa-fw"></i>Nueva Orden</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Ordenes por Estado</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                    @foreach ($indicadores as $item )
                        <li class="nav-item active">
                            <a href="#" class="nav-link">
                            <i class="fas fa-inbox"></i> {{ $item->name}}
                            <span class="badge bg-success float-right">{{ $item->cant }}</span>
                            </a>
                      </li>
                    @endforeach
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ESTADOS</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">

                @foreach ($estados as $item )
                        <li class="nav-item active">
                            <a href="#" class="nav-link">
                            <i class="fas fa-inbox"></i> {{ $item->name}}
                            <span class="badge  {{ $item->colorFondo }} float-right"> {{ $item->sigal }}</span>
                            </a>
                      </li>
                @endforeach


              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Bandeja de Entrada de Ordenes</h3>

              <div class="card-tools">

              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">

                <a href="{{ route('mnt.ordenes.index') }}"  class="btn btn btn-warning btn-sm" title="Refrescar busqueda"><i class="fas fa-sync-alt"></i></a>
                <div class="float-right">
                    <form action="{{ route('mnt.ordenes.index') }}" method="GET">
                        <input type="date"  name="desde" id="desde" value="{{ $desde}}">
                        <input type="date"  name="hasta" id="hasta" value="{{ $hasta }}">
                        <a href="{{ route('mnt.ordenes.index') }}"  class="btn btn-primary btn-sm" title="Buscar por Fechas"><i class="fas fa-search"></i></a>
                    </form>

                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach ($listado as $item )
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" style="">
                                      <li><a class="dropdown-item" href="{{ route('mnt.ordenes.edit', $item->id) }}"><i class="fas fa-edit"></i>  Editar</a></li>
                                      <li><a class="dropdown-item" href="#"><i class="far fa-sticky-note"></i> Ver Notas</a></li>
                                      <li><a class="dropdown-item" href="{{ route('mnt.ordenes.imprimirOrdenbyId', $item->id) }}"><i class="fas fa-print"></i> Imprimir</a></li>

                                      <li><a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i> Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td class="mailbox-name"><label <span class="badge {{ $item->colorFondo }} float-right" title=" {{ $item->estado }} ">{{ $item->sigal }}</span></a></td>
                            <td class="mailbox-subject">{{ $item->sector }}
                            <td class="mailbox-subject">{{ $item->nombreCorto }}
                            </td>
                            <td class="mailbox-attachment"></td>
                            <td class="mailbox-date">{{ \Carbon\Carbon::parse($item->fechaIni)->format('d/m/Y')}}</td>
                            <td class="mailbox-date">{{ \Carbon\Carbon::parse($item->fechaVto)->format('d/m/Y')}}</td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">


                <div class="float-right">


                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
    @stop



@section('js')
@stop
