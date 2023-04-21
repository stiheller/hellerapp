<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control',
                                                'placeholder' => 'Ingrese Nombre del Usuario'
                                                ]) !!}

                    @error('name')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('username', 'Número de Documento') !!}
                    {!! Form::text('username', null, ['class' => 'form-control',
                                                'placeholder' => 'Ingrese Número Documento del Usuario'
                                                ]) !!}

                    @error('username')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class' => 'form-control',
                                                'placeholder' => 'Ingrese Email del Usuario'
                                                ]) !!}

                    @error('email')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('sector_id', 'Sector') !!}
                    {!! Form::select('sector_id', $sectores, null, ['class' => 'form-control']) !!}

                    @error('sector_id')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror

                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Cambia Clave</p>

                    <label class="mr-2">
                        {!! Form::radio('changepassword', 0) !!}
                        NO
                    </label>

                    <label>
                        {!! Form::radio('changepassword', 1,true) !!}
                        SI
                    </label>

                    @error('changepassword')
                        <br>
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>

                    <label class="mr-2">
                        {!! Form::radio('activo', 1, true) !!}
                        Activo
                    </label>

                    <label>
                        {!! Form::radio('activo', 0) !!}
                        Bloqueado
                    </label>

                    @error('activo')
                        <br>
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body">

                <h5>Listado de Roles </h5>
                <br>
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                @error('roles')
                    <br>
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                  @isset ($user->image)
                    <img class="profile-user-img img-fluid" src="{{ asset('/avatar/'. $user->image) }}" alt="User profile picture">      
                  @else
                    <img class="profile-user-img img-fluid" src="{{ asset('/avatar/user_default.png') }}" alt="User profile picture">      
                  @endif
                  
              </div>
            </div>
            <div class="card footer">
                <input type="file" name="image" class="form-control" id="chooseFile"/>
                @error('image')
                    <br>
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
              </div>
          </div>
    </div>
</div>
