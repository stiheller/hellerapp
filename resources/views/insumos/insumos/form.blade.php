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
                        @foreach ($grupos as $item )
                            @if(isset($insumo->grupo_id))
                                @if($insumo->grupo_id == $item->id)
                                <option value="{{ $item->id }}" selected> {{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->id }}"> {{ $item->nombre }}</option>
                                @endif
                            @else
                            <option value="{{ $item->id }}"> {{ $item->nombre }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('grupo_id')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
                <div class="col-md-6">
                    {!! Form::label('codigo_sss', 'Código Insumo') !!}
                    @isset($insumo->codigo_sss)
                    {!! Form::text('codigo_sss', $insumo->codigo_sss, ['class' => 'form-control', 'disabled']) !!}
                    @else
                        {!! Form::text('codigo_sss', null, ['class' => 'form-control']) !!}
                    @endisset


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

                    {!! Form::label('envase_id', 'Envase Insumo') !!}
                    {!! Form::select('envase_id', $envases, null, ['class' => 'form-control']) !!}
                    <hr>
                    @error('envase_id')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
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
                            <p class="font-weight-bold">Control Negativos</p>
                            <label class="mr-2">
                                {!! Form::radio('ctrlnegativos', 1) !!}
                                Si
                            </label>

                            <label>
                                {!! Form::radio('ctrlnegativos', 0, true) !!}
                                No
                            </label>

                            @error('ctrlnegativos')
                                <br>
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- card-body --}}
</div>
