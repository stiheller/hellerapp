<div class="form-group">
    {!! Form::label('numero', 'Número') !!}
    {{-- {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Número de Switch']) !!} --}}
    {!! Form::number('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Número de Switch']) !!}

    @error('numero')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('serial', 'Serial:') !!}
    {!! Form::text('serial', null, ['class' => 'form-control', 'placeholder' => 'Serial del Switch']) !!}
    @error('serial')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('marca', 'Marca:') !!}
    {!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Marca del Switch']) !!}
    @error('marca')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción/Detalle']) !!}
    @error('descripcion')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('referencia_lugar', 'Referencia:') !!}
    {!! Form::text('referencia_lugar', null, ['class' => 'form-control', 'placeholder' => 'Lugar de Referencia']) !!}
    @error('referencia_lugar')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('fecha_limpieza', 'Fecha de Limpieza:', ['class' => 'mr-3']) !!}
    {!! Form::date('fecha_limpieza', \Carbon\Carbon::now()) !!}
</div>

<h5>Ubicación</h5>
<div class="row">
    <p class="font-weight-bold ml-3">Recordar... Rack o Sector, <span class="text-bold text-danger">No Ambos</span>. La opción de Sector, es para poder contemplar aquellos Switchs que no están en un Rack, y si en un sector ubicable</p>
    <div class="col-6 form-group" x-show="open_rack">
        {!! Form::label('rack_id', 'Rack') !!}
        {!! Form::select('rack_id', $racks, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
    </div>
    <div class="col-6 form-group" x-show="open_sector">
        {!! Form::label('sector_id', 'Sector') !!}
        {!! Form::select('sector_id', $sectores, null, ['class' => 'form-control', 'placeholder' => 'Sin Asignar']) !!}
    </div>
</div>
