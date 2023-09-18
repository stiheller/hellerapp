<div>
    <form action="{{route("inngresoDC")}}" method="post">
        @csrf
        <div class="row">

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="buscar">
                            <strong>Buscar Insumo</strong>
                            @if($picked)
                                <span class="badge badge-success">Seleccionado</span>
                            @else
                                <span class="badge badge-danger">Sin Seleccionar</span>
                            @endif
                        </label>
                        <input wire:model="buscar" name="producto" autocomplete="off"
                            wire:keydown.enter="asignarPrimero()" type="text" class="form-control" id="producto">
                        @error("buscar")
                            <small class="form-text text-danger">{{$message}}</small>
                        @else
                            @if(count($insumos)>0)
                                @if(!$picked)
                                <div class="shadow rounded px-3 pt-3 pb-0">
                                    @foreach($insumos as $insumo)
                                        <div style="cursor: pointer;">
                                            <a wire:click="asignarInsumo('{{ $insumo->id."|".$insumo->codigo_sss."|".$insumo->nombre; }}')">
                                                {{$insumo->id."|".$insumo->codigo_sss."|".$insumo->nombre; }}
                                            </a>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                                @endif
                            @else
                                <small class="form-text text-muted">Comienza a teclear para que aparezcan los resultados</small>
                            @endif
                        @enderror
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="Cantidad">
                            <strong>Cantidad</strong>
                            <input type="number" name="cant" class="form-control text-right" value="" autocomplete="off" required>
                        </label>
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group">
                        <label for="Cantidad">
                            <strong>VTO </strong>
                            <input type="text" name="vto" id="vto" class="form-control text-center" placeholder="AAAAMM" autocomplete="off" required>

                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Cantidad">
                            <strong>LOTE</strong>
                            <input type="text" name="lote" class="form-control" value="s/l" required>
                        </label>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="Cantidad">
                            @if($picked)
                                <strong>ACCION</strong>
                                <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-plus-square"></i> Agregar</button>
                            @endif
                        </label>
                    </div>

                </div>


        </div>
    </form>
</div>
