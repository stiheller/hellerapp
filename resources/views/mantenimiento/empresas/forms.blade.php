<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>


    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Nombre Empresa <span style="color: red">*</span>','',false) !!}
                {!! Form::text('name', null, ['class' => 'form-control UpperCase', 'placeholder' => 'Ingrese Nombre Empresa']) !!}

                @error('name')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>

      </div>
      {{-- contacto--}}
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('contacto1', 'Nombre Contacto 1 <span style="color: red">*</span>','',false) !!}
                {!! Form::text('contacto1', null, ['class' => 'form-control UpperCase', 'placeholder' => 'Ingrese Nombre Contacto']) !!}

                @error('contacto1')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('contacto2', 'Nombre Contacto 2') !!}
                {!! Form::text('contacto2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombre Contacto']) !!}

                @error('contacto2')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>
      {{-- mail --}}
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('mail1', 'Correo Electronico Contacto 1 <span style="color: red">*</span>','',false) !!}
                {!! Form::text('mail1', null, ['class' => 'form-control LowerCase', 'placeholder' => 'Ingrese Correo Electronico Contacto 1']) !!}

                @error('mail1')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('mail2', 'Correo Electronico Contacto 2') !!}
                {!! Form::text('mail2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese orreo Electronico Contacto 2']) !!}

                @error('mail2')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>
      {{-- telefono --}}
      <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('telefono1', 'Teléfono Contacto 1 <span style="color: red">*</span>','',false) !!}
                {!! Form::text('telefono1', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Teléfono Contacto 1']) !!}

                @error('telefono1')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('telefon21', 'Teléfono Contacto 2') !!}
                {!! Form::text('telefono2', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Teléfono Contacto 2']) !!}

                @error('telefono2')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
        </div>
      </div>
      {{-- observacion --}}
      <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('observacion', 'Observación Empresa') !!}
                {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
                <hr>
                @error('observacion')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>
      </div>
      {{-- activo --}}
      <div class="row">
        <div class="form-group">
            <p class="font-weight-bold">Activo</p>

            <label class="mr-2">
                {!! Form::radio('activa', 1, true) !!}
                SI
            </label>

            <label>
                {!! Form::radio('activa', 0) !!}
                NO
            </label>

            @error('activa')
                <br>
                <spam class="text-danger">{{ $message }}</spam>
            @enderror
        </div>
      </div>
    </div>

  </div>
