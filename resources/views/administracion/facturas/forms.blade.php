<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('tipo_id', 'Tipo Factura') !!}
                            {!! Form::select('tipo_id', $tipos, null, ['class' => 'form-control']) !!}

                            @error('tipo_id')
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror

                        </div>
                    </div>
                    {{-- col-md-4 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('numeroFactura', 'Número Factura') !!}
                            {!! Form::text('numeroFactura', null, ['class' => 'form-control text-right', 'placeholder' => 'Ingrese Número de Factura']) !!}

                            @error('numeroFactura')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    {{-- col-md-4 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('fecha', 'Fecha Factura') !!}
                            @isset ($factura->fecha)
                                {{ Form::date('fecha', $factura->fecha, ['class' => 'form-control', 'disabled']) }}
                            @else
                                {{ Form::date('fecha', new \DateTime(), ['class' => 'form-control']) }}
                            @endif
                            @error('fecha')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    {{-- col-md-4 --}}
                </div>
                {{-- row --}}

            </div>
            {{-- col-md-6 --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            {!! Form::label('proveedor_id', 'Proveedor') !!}
                            @isset ($factura->importeFactura)
                                {!! Form::select('proveedor_id', $proveedores, null, ['class' => 'form-control', 'disabled']) !!}
                            @else
                                {!! Form::select('proveedor_id', $proveedores, null, ['class' => 'form-control']) !!}
                            @endif
                            @error('proveedor_id')
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror

                        </div>
                    </div>
                    {{-- col-md-6 --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Generar Proveedor</label><br>
                            <a class="btn btn-secondary btn-sm" href="{{ route('administracion.proveedores.create') }}"><i class="fas fa-plus-square fa-fw"></i> Nuevo Proveedor</a>
                        </div>
                    </div>
                    {{-- col-md-6 --}}
                </div>
                {{-- row --}}
            </div>
            {{-- col-md-6 --}}
        </div>
        {{-- row --}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('detalleRendicionFactura', 'Nota Rendición') !!}
                    {!! Form::textarea('detalleRendicionFactura', null, ['class' => 'form-control']) !!}

                    <hr>
                    @error('detalleRendicionFactura')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
            </div>
            {{-- col-md-6 --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('detalleInternoFactura', 'Nota Interna') !!}
                    {!! Form::textarea('detalleInternoFactura', null, ['class' => 'form-control']) !!}

                    <hr>
                    @error('detalleInternoFactura')
                        <spam class="text-danger">{{ $message }}</spam>
                    @enderror
                </div>
            </div>
            {{-- col-md-6 --}}
        </div>
        {{-- row --}}
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('importeFactura', 'Importe Factura') !!}
                            @isset ($factura->importeFactura)
                                {!! Form::number('importeFactura', $factura->importeFactura, ['class' => 'form-control text-right', 'step' => 'any', 'disabled']) !!}
                            @else
                                {!! Form::number('importeFactura', '0.00', ['class' => 'form-control text-right', 'step' => 'any']) !!}
                            @endif
                            @error('importeFactura')
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror

                        </div>
                    </div>
                    {{-- col-md-4 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('destinatarioFactura', 'Destinatario Factura') !!}
                            {!! Form::text('destinatarioFactura', null, ['class' => 'form-control']) !!}

                            <hr>
                            @error('destinatarioFactura')
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror
                        </div>
                    </div>
                    {{-- col-md-4 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('estado_id', 'Estado Factura') !!}
                            {!! Form::select('estado_id', $estados, null, ['class' => 'form-control']) !!}

                            @error('estado_id')
                                <spam class="text-danger">{{ $message }}</spam>
                            @enderror

                        </div>
                    </div>
                    {{-- col-md-4 --}}
                </div>
                {{-- row --}}
            </div>
            {{-- col-md-6 --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group">
                        <p class="font-weight-bold">Seleccione Rubros</p>

                        @foreach ($rubros_in_factura as $rubro)
                            <label class="mr-2">
                                @if ($rubro->infactura == 1)
                                    {!! Form::checkbox('rubros[]', $rubro->id, true) !!}
                                    {{ $rubro->name }}
                                @else
                                    {!! Form::checkbox('rubros[]', $rubro->id, null) !!}
                                    {{ $rubro->name }}
                                @endif
                            </label>
                        @endforeach
                        @error('rubros')
                            <br>
                            <spam class="text-danger">{{ $message }}</spam>
                        @enderror
                    </div>

                </div>
                {{-- row --}}
            </div>
            {{-- col-md-6 --}}
        </div>
        {{-- row --}}

    </div>
    {{-- card-body --}}
</div>
