<!-- small box -->
<div class="small-box bg-warning">
  <div class="inner">
    <h3>{{ $totalUsuarios }}</h3>

    <p>Usuarios Registrados</p>
  </div>
  <div class="icon">
      <i class="fas fa-users" style="font-size: 80px;"></i>
  </div>
  <a href="{{ route('admin.users.index') }}" class="small-box-footer">Ver Más <i class="fas fa-arrow-circle-right"></i></a>
</div>

