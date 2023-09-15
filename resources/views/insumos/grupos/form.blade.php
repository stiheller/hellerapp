<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title"></h3>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre Grupo') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

                <hr>
                @error('nombre')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción Grupo') !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}

                <hr>
                @error('descripcion')
                    <spam class="text-danger">{{ $message }}</spam>
                @enderror
            </div>
        </div>
        <div class="row">

        
            <div class="col-md-3">
                <div class="form-group">
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
            </div>
            <div class="col-md-3">
                <div class="form-group">
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
    {{-- card-body --}}
</div>
