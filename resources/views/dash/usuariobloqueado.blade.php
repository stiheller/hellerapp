
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/ionicons.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="login-logo">
      <a href="#"><b>INTRANET</b> Heller</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name"></div>
    <br><br>
    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="{{ asset('/avatar/'. $user->image) }}" alt="User Image">
      </div>
      <!-- /.lockscreen-image -->

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials">
        <div class="input-group">
          <input type="text" class="form-control" value="{{ $user->name}}" enabled="false">
        </div>
      </form>
      <!-- /.lockscreen credentials -->
  
    </div>
    <br><br>
    <!-- /.lockscreen-item -->
    <div class="alert alert-danger alert-dismissible">
        <h5>Atención !!!</h5>
        Su usuario se encuentra bloqueado, por favor comuniquese con el Sector de STI o Soporte a los internos 718 o 719
    </div>
    <br>
    <div class="text-center">
        <a href="/" target="_self" class="btn btn-success"> SALIR </a>  
    </div>
    
  </div>
  <!-- /.center -->
  
  <!-- jQuery -->
<script src="{{ asset('vendor/adminlte/dist/js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/adminlte/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
  </body>
</html>