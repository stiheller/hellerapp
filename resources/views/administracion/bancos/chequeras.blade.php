@extends('adminlte::page')

@section('title', 'Administracion | Bancos | Chequeras')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Gestión Chequeras</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Info:</h5>
                <strong>Banco: </strong> {{ $banco->nombre }} |  <strong>Sucursal: </strong> {{ $banco->sucursal }} | <strong>Cuenta: </strong>{{ $banco->nroCuenta }}
              </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label>Listado de Chequeras</label>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>Desde</td>
                                <td>Hasta</td>
                                <td>Usuario</td>
                                <td>Creada</td>
                                <td>Activa</td>
                                <td>Libres</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chequeras as $item)
                                <tr>
                                    <td class="text-right">{{ $item->nroDesde }}</td>
                                    <td class="text-right">{{ $item->nroHasta }}</td>
                                    <td>{{ $item->usuario->name }}</td>
                                    <td>{{ $item->usuario->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td class="text-center">
                                        @if ($item->activa  == 1)
                                            <span class="right badge badge-success ">Si</span>
                                        @else
                                        <span class="right badge badge-danger">No</span>
                                        @endif

                                    </td>
                                    <td>0</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <label>Generar Chequera Nueva</label>
                    {!! Form::open(['route' => 'administracion.bancos.chequerasCreate']) !!}

                        {{ Form::hidden('banco', $banco->id) }}


                        <div class="form-group">
                            {!! Form::label('nroDesde', 'Nro Desde') !!}
                            {!! Form::number('nroDesde', null, ['class' => 'form-control']) !!}

                            @error('nroDesde')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('nroHasta', 'Nro Hasta') !!}
                            {!! Form::number('nroHasta', null, ['class' => 'form-control']) !!}

                            @error('nroHasta')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>


                        {!! Form::submit('Crear Chequera', ['class' =>'btn btn-sm btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary float-right " href="{{  route('administracion.bancos.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
