<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="sti">
    <meta name="generator" content="">
    <title>Solicitud Formulario Articulo 65</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('boostrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Favicons -->
    <link href="favicon.ico" rel="icon">
    <!--<link rel="apple-touch-icon" href="{{ asset('boostrap/img/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('boostrap/img/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('boostrap/img/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="{{ asset('boostrap/img/favicons/safari-pinned-tab.svg') }}" color="#7952b3">
    <link rel="icon" href="{{ asset('boostrap/img/favicon.ico') }}"> -->
    <link rel="manifest" href="{{ asset('boostrap/js/manifest.json') }}">
    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('boostrap/css/navbar-top.css') }}" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Top navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">


        </div>
    </div>
    </nav>

    <main class="container">
        <div class="row">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style='{{ $display }}'>
                <strong>Algo Salio Mal!</strong> El numero de documento {{ $dni }} no se encuentra en nuestras bases de datos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

        <div class="bg-light p-5 rounded">

            <form class="d-flex">
                <input class="form-control me-2" id="dni" name="dni" type="text" onkeypress="return valideKey(event);" required
                    placeholder="ingrese número de documento sin puntos"
                    maxlength="8"
                    @if (count($persona)>0)
                        value="{{ $persona['NroDoc']."|".$persona['Apellido'].", ".$persona['Nombre']}}"
                    @else
                        value=""
                    @endif
                    {{ $lectura }}
                >
                <input class="form-control me-2" id="idAgente" name="idAgente" type="hidden"
                @if (count($persona)>0)
                        value="{{ $agente[0]->idAgente }}"
                    @else
                        value=""
                    @endif
                >
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>


        </div>


        <div class="container bg-light rounded">

            <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <th><b>Desde</b></th>
                        <th><b>Hasta</b></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->FechaDesde)->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y')}}</td>

                                <td>{{ \Carbon\Carbon::parse($item->FechaHasta)->locale('es')->isoFormat('dddd D \d\e MMMM \d\e\l Y')}}</td>
                            </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col">
                    <div class="row pt-2">
                        <div class="row">

                            <div class="form-group">
                                @if (count($data)>=12)
                                    <div class="alert alert-danger" role="alert">Pedidos en el Año: {{count($data) }}</div>
                                @else
                                    <div class="alert alert-success" role="alert">Pedidos en el Año: {{count($data) }}</div>
                                @endif

                            </div>
                            <div class="form-group">
                                @if ($contador < 2)
                                    <div class="alert alert-success" role="alert">Pedidos en el Mes: {{ $contador }}</div>
                                @else
                                    <div class="alert alert-danger" role="alert">Pedidos en el Mes: {{ $contador }}</div>
                                @endif

                            </div>
                        </div>
                        <div class="col">
                        <label for=""><b>Desde</b></label>
                        <input type="date" class="form-control"  value="{{ $hoy }}">
                        </div>
                        <div class="col">
                            <label for=""><b>Hasta</b></label>
                        <input type="date" class="form-control"  value="{{ $hoy }}">
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="form-group">
                            <label for=""><strong>Ingrese Clave Intranet</strong></label>
                            <input class="form-control me-2" id="clave" name="clave" type="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="btn-group pt-4" role="group" aria-label="Basic mixed styles example">
                            @if ( $contador < 2 && $lectura !='')

                                <a href="#" class="btn btn-success"><i class="fa fa-calendar" aria-hidden="true"></i> Solicitar Articulo</a>

                            @endif

                            <a href="{{ route('f80') }}" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Cancelar </a>
                        </div>
                    </div>
            </div>
            </div>
        </div>


    </main>
    <!-- message -->
    <script src="{{ asset('js/close_message_session.js') }}"></script>
    <!-- formulario -->
    <script src="{{ asset('boostrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/onlynumber.js') }}"></script>

  </body>

</html>
