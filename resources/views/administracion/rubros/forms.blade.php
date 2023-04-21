<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Rubro') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre del Rubro']) !!}

                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
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

      </div>

    </div>

  </div>
