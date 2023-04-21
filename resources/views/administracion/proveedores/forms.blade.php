<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>
    </div>
    {{-- card-header --}}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nombreProveedor', 'Nombre Proveedor') !!}
                    {!! Form::text('nombreProveedor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Proveedor']) !!}

                    @error('nombreProveedor')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nombreContactoProveedor', 'Nombre del Contacto') !!}
                    {!! Form::text('nombreContactoProveedor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Contacto']) !!}

                    @error('nombreContactoProveedor')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

        </div>
      {{-- row --}}
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('telefonoProveedor', 'Nro Teléfono') !!}
                {!! Form::text('telefonoProveedor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Número de Teléfono']) !!}

                @error('telefonoProveedor')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('emailProveedor', 'Email') !!}
                {!! Form::email('emailProveedor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese email del proveedor']) !!}

                @error('emailProveedor')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      {{-- row --}}
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('cuitProveedor', 'CUIT') !!}
                {!! Form::text('cuitProveedor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Número de CUIT']) !!}

                @error('cuitProveedor')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('nombreChequeProveedor', 'Nombre A Facturar') !!}
                {!! Form::text('nombreChequeProveedor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre a quien realizar la factura']) !!}

                @error('nombreChequeProveedor')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>
      {{-- row --}}
       <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nroCbu', 'CBU') !!}
                    {!! Form::text('nroCbu', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el CBU']) !!}

                    @error('nroCbu')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nombreBanco', 'BANCO') !!}
                    {!! Form::text('nombreBanco', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre del Banco']) !!}

                    @error('nombreBanco')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
      {{-- row --}}
      <div class="row">
        <div class="col-md-6">
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
        <div class="col-md-6"></div>
      </div>

      {{-- row --}}
    </div>
    {{-- card-body --}}
</div>
{{-- card --}}
