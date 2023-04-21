<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre Banco') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre Banco']) !!}

                @error('nombre')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('sucursal', 'Nombre de la Sucursal') !!}
                {!! Form::text('sucursal', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre de la Sucursal']) !!}

                @error('sucursal')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('nroCuenta', 'Número de Cuenta') !!}
                {!! Form::text('nroCuenta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Número de Cuenta']) !!}

                @error('nroCuenta')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('cbu', 'CBU') !!}
                {!! Form::text('cbu', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Número de CBU']) !!}

                @error('cbu')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('referente', 'Referente Sucursal') !!}
                {!! Form::text('referente', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Referente de la Sucursal']) !!}

                @error('referente')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('telefono', 'Teléfono') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Número de Teléfono sucursal']) !!}

                @error('telefono')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      <div class="row">
          <div class="col md-6">
            <div class="form-group">
                {!! Form::label('nombreCuenta', 'Nombre de Cuenta') !!}
                {!! Form::text('nombreCuenta', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre de la Cuenta']) !!}

                @error('nombreCuenta')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
          </div>
          <div class="col md-6"></div>
      </div>
      <div class="row">
        <div class="form-group">
            <p class="font-weight-bold">Activo</p>

            <label class="mr-2">
                {!! Form::radio('activo', 1, true) !!}
                SI
            </label>

            <label>
                {!! Form::radio('activo', 0) !!}
                NO
            </label>

            @error('activo')
                <br>
                <spam class="text-danger">{{ $message }}</spam>
            @enderror
        </div>
      </div>
    </div>

  </div>
