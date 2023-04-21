@extends('adminlte::page')

@section('title', 'Blog')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">

                <form action="{{ route('administracion.bancos.transferenciaUpdate', $banco->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth()->user()->id }}">

                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Nombre Banco</label>
                              <input type="text" name= "nombre" class="form-control" placeholder='Ingrese Nombre Banco' value="{{ $banco->nombre }}" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de la Sucursal</label>
                                <input type="text" name= "sucursal" class="form-control" placeholder='Ingrese Nombre Banco' value="{{ $banco->sucursal }}" disabled>
                            </div>
                      </div>

                    </div>
                    {{-- row --}}
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <div class="form-group">
                                <label for="">Número de Cuenta</label>
                                <input type="text" name= "nroCuenta" class="form-control" placeholder='Ingrese Número de Cuenta' value="{{ $banco->nroCuenta }}" disabled>
                            </div>

                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Nombre de Cuenta</label>
                                <input type="text" name= "nombreCuenta" class="form-control" placeholder='Ingrese Nombre Banco' value="{{ $banco->nombreCuenta }}" disabled>
                            </div>

                        </div>
                      </div>

                    </div>
                    {{-- row --}}
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Saldo Actual del Banco</label>
                                <input type="text" class="form-control text-right text-bold" value="{{ number_format($banco->saldo,2) }}" id="numero1" disabled >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Fecha Transferencia</label>
                                <input type="date" class="form-control text-right text-bold" name="fecha" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" >
                            </div>
                            @if($errors->has('monto'))
                                <span class="text-danger">{{ $errors->first('monto') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Motivo Transferencia</label>
                                <input type="text" class="form-control text-bold" value="{{ old('concepto') }}" name="concepto" autofocus>
                            </div>
                            @if($errors->has('concepto'))
                                <span class="text-danger">{{ $errors->first('concepto') }}</span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Monto Transferido por SSS</label>
                                <input type="text" class="form-control text-right text-bold" name="monto" value="{{ old('monto') }}" >
                            </div>
                            @if($errors->has('monto'))
                                <span class="text-danger">{{ $errors->first('monto') }}</span>
                            @endif
                        </div>

                    </div>

                    <a class="btn btn-secondary float-right " href="{{  route('administracion.bancos.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>
                    <button type="submit" class="btn btn-primary float-right mr-2"> <i class="fas fa-save"></i> Grabar Transferencia </button>


                </form>

                {!! Form::close() !!}
        </div>
        <div class="card-footer">
            <h3>HISTORIAL DE MOVIMIENTOS ULTIMOS 6 MESES</h3>
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FECHA TRANS</th>
                        <th>CONCEPTO</th>
                        <th>INGRESO</th>
                        <th>EGRESO</th>
                        <th>USUARIO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movimientos as $item)
                        <tr>
                            <td class="text-right">{{ $item->id }}</td>
                            <td class="text-right">{{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}} </td>
                            <td>{{ $item->concepto }}</td>
                            <td class="text-right">{{ number_format($item->ingresos,2) }}</td>
                            <td class="text-right">{{ number_format($item->egresos,2) }}</td>
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/formatNumber.js') }}"></script>

@stop
