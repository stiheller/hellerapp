<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Intranet</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('homeintranet/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="{{ asset('img/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Intranet</span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Calendario Espacios Institucionales</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <form action="{{ route('calendario') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md4"><input type="month" name="month" class="form-control" value="{{ $valor }}"></div>
                    <div class="col-md8"><button type="submit" class="btn btn-primary float-right mr-2"> Buscar</button></div>
                </div>
            </form>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <table  style="width:100%;border-collapse: collapse;">
                <thead>
                    <tr align="center">
                        <td align="center"><p style="background-color:#008000; color:#fff">SUM</p></td>
                        <td align="center"><p style="background-color:#ff8c00; color:#fff">AUDITORIO</p></td>
                        <td align="center"><p style="background-color:#FF0000; color:#fff">SALA SITUACION</p></td>
                        <td colspan="3" align="center"><p style="background-color:#40e0d0; color:#fff">UDH</p></td>

                    </tr>
                    <tr align="center">
                        <th>Fecha</th>
                        <th>Titulo</th>
                        <th>Duracion</th>
                        <th>Estado</th>
                        <th>Espacio</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr style="font: small-caps 90%/200% Segoe UI;">
                            <td >{{ \Carbon\Carbon::parse($evento->start_date)->format('d/m/Y') }}</td>
                            <td>{{ strip_tags($evento->title) }}</td>
                            <td>{{ \Carbon\Carbon::parse($evento->start_time)->format('H:m:s') }} - {{ \Carbon\Carbon::parse($evento->end_time)->format('H:m:s') }}
                            <td>{{ $evento->estadoAgendaTeleconf}}</td>
                            <td style="background-color: {{ $evento->salonColorFondo }}; color: #fff;">{{ $evento->salonTeleconferencia}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminlte/js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>

</body>
</html>
