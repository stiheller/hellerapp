<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <label for="">Grupo Insumo</label>
                    <select name="grupo_id" id="grupo_id" class="form-control">
                        @foreach ($grupos as $grupo )
                            @if(isset($insumo->grupo_id))
                                @if($insumo->grupo_id == $grupo->id)
                                <option value="{{ $grupo->id }}" selected> {{ $grupo->nombre }}</option>
                                @else
                                    <option value="{{ $grupo->id }}"> {{ $grupo->nombre }}</option>
                                @endif
                            @else
                            <option value="{{ $grupo->id }}"> {{ $grupo->nombre }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('grupo_id')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="col-md-6">
                    {!! Form::label('codigo_sss', 'Código Insumo') !!}
                    {!! Form::text('codigo_sss', null, ['class' => 'form-control']) !!}
           
                    @error('codigo_sss')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('nombre', 'Nombre del Insumo') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

                    <hr>
                    @error('nombre')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="col-md-6">
                    {!! Form::label('descripcion', 'Descripción del Insumo') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}

                    <hr>
                    @error('descripcion')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="font-weight-bold">Activo</p>
                            <label class="mr-2">
                                {!! Form::radio('activo', 1, true) !!}
                                Si
                            </label>

                            <label>
                                {!! Form::radio('activo', 0) !!}
                                No
                            </label>

                            @error('activo')
                                <br>
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <p class="font-weight-bold">Eliminado</p>
                            <label class="mr-2">
                                {!! Form::radio('eliminado', 1, true) !!}
                                Si
                            </label>

                            <label>
                                {!! Form::radio('eliminado', 0) !!}
                                No
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
    </div>
    {{-- card-body --}}
</div>
