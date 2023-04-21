<div class="row">


    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Clima</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('dash.widget.widget_clima')
            </div>
            <!-- /.card-body -->
          </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">FECHA y HORA</h3>
            </div>

            <div class="card-body">
                @include('dash.widget.widget_reloj')
            </div>
        </div>

    </div>
    <div class="col-md-4">
        @include('dash.widget.widget_ip')
    </div>
</div>
