<div>
    <div class="card-header" x-data="{open_busqueda: @entangle('open_busqueda')}">
        <div class="row">
            <div class="col-4 col-sm-3 col-md-2 input-group input-group-sm items-center">
                <span>Mostrar</span>
                <select wire:model="cant" class="mx-2 form-control">
                    {{-- <option value="3">3</option> --}}
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                {{-- <span>entradas</span> --}}
            </div>
            <div class="col input-group input-group-sm flex items-center" style="width: full;" x-show="open_busqueda">
                <input wire:model="search" type="text" class="form-control" placeholder="Buscar">
                <div class="input-group-append mr-2">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-4 col-sm-3 col-md-2  input-group input-group-sm items-center">
                {{-- <span>Mostrar</span> --}}
                <select wire:model="filtro" class="mx-2 form-control">
                    <option value="9">Todos</option>
                    <option value="1">Activos</option>
                    <option value="0">Baja</option>
                    <option value="2">En Reparación</option>
                    <option value="3">Desaparecido</option>
                    <option value="4">Disponible</option>
                    {{-- <option value="100">100</option> --}}
                </select>
                {{-- <span>entradas</span> --}}
            </div>
        </div>
    </div>

    @if ($scanners->count()) {{-- Si hay alguno lo muestra --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table table-bordered">
                    <tr>
                        <th style="width: 60px" wire:click="order('id')">
                            ID
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif

                        </th>
                        <th wire:click="order('nombre')">
                            Nombre
                            @if ($sort == 'nombre')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th wire:click="order('modelo')">
                            Modelo
                            @if ($sort == 'modelo')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th wire:click="order('serial')">
                            Serial
                            @if ($sort == 'serial')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                        <th>N°Patrimonial</th>
                        <th>Nombre.Puesto</th>
                        
                        <th class="text-bold text-primary text-center">ACCIONES</th>
                        <th wire:click="order('estado')">
                            Estado
                            @if ($sort == 'estado')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mt-1 float-right"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mt-1 float-right"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mt-1 float-right"></i>
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($scanners as $scanner)
                        <tr>
                            <td>{{ $scanner->id }}</td>
                            <td class="text-bold">{{ $scanner->nombre }}</td>
                            <td class="text-center">
                                @if ($scanner->modelo != null)
                                    {{ $scanner->modelo }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($scanner->serial != null)
                                    {{ $scanner->serial }}
                                @else
                                    <small class="text-secondary">S/A</small>
                                @endif
                            </td>
                            
                            <td class="text-center">
                                @if ($scanner->patrimonial != null)
                                    {{$scanner->patrimonial}}
                                @else
                                    <small class="text-secondary">S/D</small>
                                @endif

                            </td>
                          
                            <td class="">
                                @if ($scanner->nombre_puesto != null)
                                    {{$scanner->nombre_puesto}}
                                @else
                                    <p class="text-secondary">S/D</p>
                                @endif
                            </td>

                            <td>
                                <div class="btn-group">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                            data-toggle="dropdown">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if ($scanner->descripcion != null)
                                                    <p class="mx-3">{{ $scanner->descripcion }}</p>    
                                                @else
                                                    <p class="mx-3">Sin Descripción</p>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>

                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('inventario.scanners.show', $scanner) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('inventario.scanners.edit', $scanner) }}">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('inventario.scanners.imagenes', $scanner) }}">
                                        <i class="fas fa-image"></i>
                                    </a>

                                    <form class="formulario-eliminar"
                                        action="{{ route('inventario.scanners.destroy', $scanner) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">
                                @if ($scanner->estado == 1)
                                    <small class="text-bold text-success">Activo</small>
                                @else
                                    @if ($scanner->estado == 0)
                                        <small class="text-bold text-danger">Baja</small>
                                    @else
                                        @if ($scanner->estado == 2)
                                            <small class="text-bold text-danger">En Reparación</small>
                                        @else
                                            @if ($scanner->estado == 3)
                                                <small class="text-bold text-dark">Desaparecido</small>
                                            @else
                                                <small class="text-bold text-primary">Disponible</small>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if ($scanners->hasPages())
                <div class="row">
                    <div class="col">
                        {{ $scanners->links() }}
                    </div>
                    <div class="col-1">
                        <label class="float-right" for="">{{$scanners->total()}} Registros</label>
                    </div>
                </div>
            @else
                <label class="float-right" for="">{{$scanners->total()}} Registros</label>
            @endif
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>
