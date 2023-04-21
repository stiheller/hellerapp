<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
        {{-- encabezado orden --}}
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('fechaIni', 'Fecha <span style="color: red">*</span>','',false) !!}

                        {{ Form::date('fechaIni', new \DateTime(), ['class' => 'form-control']) }}

                    @error('fechaIni')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('empresa_id', 'Seleccione Empresa <span style="color: red">*</span>','',false) !!}
                    {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control']) !!}
                    @error('empresa_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('sector_id', 'Seleccione Sector <span style="color: red">*</span>','',false) !!}
                    {!! Form::select('sector_id', $sectores, null, ['class' => 'form-control']) !!}
                    @error('sector_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <div class="col-md-4">
                {!! Form::label('nombreCorto', 'Nombre Corto Orden <span style="color: red">*</span>','',false) !!}
                {!! Form::text('nombreCorto', null, ['class' => 'form-control UpperCase', 'placeholder' => 'Ingrese Nombre Contacto']) !!}

                @error('nombreCorto')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        {{-- tarea --}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('tarea', 'Descripción detallada de la Orden <span style="color: red">*</span>','',false) !!}
                    {!! Form::textarea('tarea', null, ['class' => 'form-control']) !!}
                    <hr>
                    @error('tarea')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
            </div>
        </div>
        {{-- prioridad, estado, puntaje,  fecha vto--}}
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('prioridad_id', 'Seleccione Prioridad <span style="color: red">*</span>','',false) !!}
                    {!! Form::select('prioridad_id', $prioridad, null, ['class' => 'form-control']) !!}

                    @error('prioridad_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('estado_id', 'Seleccione Estado <span style="color: red">*</span>','',false) !!}
                    {!! Form::select('estado_id', $estado, null, ['class' => 'form-control']) !!}
                    @error('estado_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('fechaVto', 'Fecha Vto según Prioridad <span style="color: red">*</span>','',false) !!}

                        {{ Form::date('fechaVto', new \DateTime(), ['class' => 'form-control']) }}

                    @error('fechaVto')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>

    </div>
  </div>
