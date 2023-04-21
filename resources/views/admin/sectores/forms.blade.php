<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                {!! Form::label('Nombre', 'Nombre Sector') !!}
                {!! Form::text('Nombre', null, ['class' => 'form-control UpperCase', 'placeholder' => 'Ingrese Nombre Sector']) !!}

                @error('Nombre')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('Nivel', 'Nivel Sector') !!}
                {!! Form::number('Nivel', '1', ['class' => 'form-control text-right', 'step' => 'any']) !!}

                @error('Nivel')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <p class="font-weight-bold">Activo</p>

                <label class="mr-2">
                    {!! Form::radio('Activo', 1, true) !!}
                    SI
                </label>

                <label>
                    {!! Form::radio('Activo', 0) !!}
                    NO
                </label>

                @error('Activo')
                    <br>
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <p class="font-weight-bold">Eliminado</p>

                <label class="mr-2">
                    {!! Form::radio('eliminado', 1) !!}
                    SI
                </label>

                <label>
                    {!! Form::radio('eliminado', 0, true) !!}
                    NO
                </label>

                @error('eliminado')
                    <br>
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>

      </div>
    </div>

  </div>
