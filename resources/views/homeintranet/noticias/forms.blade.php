<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('fecha', 'Fecha Noticia') !!}
                    @isset ($factura->fecha)
                        {{ Form::date('fecha', $factura->fecha, ['class' => 'form-control']) }}
                    @else
                        {{ Form::date('fecha', new \DateTime(), ['class' => 'form-control']) }}
                    @endif
                    @error('fecha')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                {!! Form::label('titulo', 'Titulo de la Noticia') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Titulo de la Noticia']) !!}

                @error('titulo')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      <!-- row -->
      <div class="row">
        <div class="col-md-12">
            {!! Form::label('copete', 'Copete Nota') !!}
            {!! Form::textarea('copete', null, ['class' => 'form-control']) !!}

            <hr>
            @error('copete')
                <spam class="text-danger">{{ $message }}</spam>
            @enderror
        </div>
      </div>
      <!-- row -->
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('urlPagWeb', 'Link Pagina Web') !!}
                    {!! Form::text('urlPagWeb', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Link Pagina Web']) !!}

                    @error('urlPagWeb')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('urlImagen', 'Nombre Images') !!}
                {!! Form::text('urlImagen', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre Imagen de la Noticia']) !!}

                @error('urlImagen')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      <!-- row -->
      <div class="row">
        <div class="form-group">
            <p class="font-weight-bold">Activa</p>

            <label class="mr-2">
                {!! Form::radio('activo', 'S', true) !!}
                SI
            </label>

            <label>
                {!! Form::radio('activo', 'N') !!}
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




