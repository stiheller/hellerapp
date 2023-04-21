<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                {!! Form::label('titulo', 'Titulo') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Titulo']) !!}

                @error('titulo')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('fecha', 'Fecha Compra') !!}
                {{ Form::date('fecha', new \DateTime(), ['class' => 'form-control']) }}

                @error('fecha')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      {{-- row --}}
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('detallecompra', 'Detalle Explicativo Compra') !!}
                {!! Form::textarea('detallecompra', null, ['class' => 'form-control']) !!}

                <hr>
                @error('detallecompra')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>
      </div>
      {{-- row --}}
      <div class="row">
          <div class="col-md-9">
            <div class="form-group">
                {!! Form::label('referente', 'Referente Compra') !!}
                {!! Form::text('referente', null, ['class' => 'form-control', 'placeholder' => 'Referente O Referentes Compra']) !!}

                @error('referente')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
          </div>
          <div class="col-md-3">
            {!! Form::label('monto_aprox', 'Importe Factura') !!}
            {!! Form::number('monto_aprox', '0.00', ['class' => 'form-control text-right']) !!}

            @error('monto_aprox')
                <spam class="text-danger">{{ $message }}</spam>
            @enderror
          </div>
      </div>
      {{-- row --}}
      <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('sector_id', 'Seleccione Sector') !!}
                {!! Form::select('sector_id', $sectores, null, ['class' => 'form-control']) !!}

                @error('sector_id')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('estado_id', 'Seleccione Estado Compra') !!}
                {!! Form::select('estado_id', $estados, null, ['class' => 'form-control']) !!}

                @error('estados_id')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('prioridad_id', 'Seleccione Prioridad Compra') !!}
                {!! Form::select('prioridad_id', $prioridades, null, ['class' => 'form-control']) !!}

                @error('prioridad_id')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror

            </div>
          </div>
      </div>
  </div>
</div>
