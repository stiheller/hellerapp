<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Nombre Permiso') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre Rol']) !!}

                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('description', 'Descripcion del Permiso') !!}
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre Rol']) !!}

                @error('description')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
    </div>

  </div>
