<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Nombre Rol') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre Rol']) !!}

                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('description', 'Descripcion del Rol') !!}
                {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre Rol']) !!}

                @error('description')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Listado de Permisos </h3>
                </div>
                <div class="card-bpdy">
                    @foreach ($permissions as $permission)

                        <label for="">
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            {{ $permission->description }}
                        </label>
                @endforeach
                </div>
            </div>
        </div>

      </div>

    </div>

  </div>
