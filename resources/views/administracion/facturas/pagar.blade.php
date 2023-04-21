@extends('adminlte::page')

    @section('title', 'Facturas')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')

        <h1>Pagar Factura</h1>
    @stop

    @section('css')

    @stop

    @section('content')
        <div class="card">

            <div class="card-header">
                @include('layouts.session_message')
            </div>

            <div class="card-body">
                <div class="row">

                        {{-- col-md-4 --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">TIPO</label>
                                <input type="text" class="form-control"  value="{{ $tipo->tipoFactura }}" readonly>
                            </div>
                        </div>

                        {{-- col-md-4 --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">NUMERO</label>
                                <input type="text" class="form-control text-right"  value="{{ $factura->numeroFactura }}" readonly>
                            </div>
                        </div>
                        {{-- col-md-4 --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">FECHA FACTURA</label>
                                <input type="date" class="form-control"  value="{{ $factura->fecha }}" readonly>
                            </div>
                        </div>
                        {{-- col-md-4 --}}

                </div>
                {{-- row --}}
                <div class="row">
                    {{-- col-md-4 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">PROVEEDOR</label>
                            <input type="text" class="form-control"  value="{{ $proveedor->nombreProveedor }}" readonly>
                        </div>
                    </div>
                    {{-- col-md-4 --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">IMPORTE FACTURA</label>
                            <input type="text" class="form-control text-right"  value="{{ number_format($factura->importeFactura,2) }}" readonly>
                        </div>
                    </div>
                    {{-- col-md-2 --}}
                    <div class="col-md-2">
                        <br>
                        @if ($totalPagado != $factura->importeFactura )
                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus-square fa-fw"></i> Agregar Pago</button>
                        @endif
                    </div>
                    {{-- col-md-2 --}}
                    <div class="col-md-2">
                        <br>
                        <a href="{{  route('administracion.facturas.anularPagoFactura', $factura->id) }}" class="btn btn-block btn-secondary"><i class="fas fa-backward fa-fw"></i> Volver</a>
                    </div>
                </div>
                {{-- row --}}
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Listado Pagos Asignados a la Factura</h3>
                @isset ($pagos)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>BANCO</th>
                                <th>CHEQUE</th>
                                <th>RETENCION</th>
                                <th>FT</th>
                                <th>NRO TRANSF</th>
                                <th>AFIP</th>
                                <th>AFIP2</th>
                                <th>RENTAS</th>
                                <th>PAGO</th>
                                <th>ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $item)
                               <tr>
                                   <td>{{ $item->nombre." ".$item->nombreCuenta." ".$item->nroCuenta }}</td>
                                   <td class="text-right">{{ $item->cheque_nro }}</td>
                                   <td class="text-right">{{ $item->retencion_nro }}</td>
                                   <td>{{ \Carbon\Carbon::parse($item->fecha_transferencia)->format('d/m/Y')}}</td>
                                   <td class="text-right">{{ $item->transferencia_nro }}</td>
                                   <td class="text-right">{{ number_format($item->imp_afip,2) }}</td>
                                   <td class="text-right">{{ number_format($item->imp_afip2,2) }}</td>
                                   <td class="text-right">{{ number_format($item->imp_rentas,2) }}</td>
                                   <td class="text-right">{{ number_format($item->imp_pago,2) }}</td>
                                   <td class="text-center">
                                    <form action="{{ route('administracion.facturas.eliminarPagoFactura', $item->id) }}" method="POST" style="display: inline-block;"
                                        onsubmit="return confirm('Esta seguro de Eliminar el Pago')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" rel="tooltip" class="btn btn-block btn-danger" data-toggle="tooltip" data-placement="top"  title="Eliminar Pago">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                    </td>
                               </tr>

                            @endforeach
                            <tr>
                                <td colspan="9">Cantidad de  Pagos cargados</td>
                                <td  class="text-right">{{ count($pagos) }}</td>
                            </tr>
                            <tr>
                                <td colspan="9">Total Pagos cargados</td>
                                <td  class="text-right">{{ number_format($totalPagado,2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="10" class="text-right">
                                    @if ($totalPagado != $factura->importeFactura )
                                        <span class="text-danger text-bold">Atención!!! El total Pagado es distinto al total de la factura</span>
                                    @else
                                        <a href="{{ route('administracion.facturas.procesarPagoFactura', $factura->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-dollar-sign"></i> Procesar Pagos</a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>

                    </table>
                @endif
            </div>
            <div class="card-body">

            </div>
        </div>
    @stop
    {{-- Modal  pago factura --}}
    <form action="{{ route('administracion.facturas.agregarPagoFactura', ) }}" method="POST" id="pagarFacturaModal" name="pagarFacturaModal" onsubmit="submitForm(event)">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Pago Factura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        {{-- datos ocultos de la factura --}}
                        <input type="hidden" name="proveedor_id" id="proveedor_id" value="{{ $proveedor->id }}">
                        <input type="hidden" name="factura_id" id="factura_id" value="{{ $factura->id }}">
                        <input type="hidden" name="user_id" id="usuario_id" value="{{ Auth()->user()->id }}">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">BANCO</label>
                                        <select name="banco_id" id="banco_id" class="form-control">
                                            <option value="">Seleccion Banco, Cuenta y Saldo</option>
                                            @foreach ($bancos as $item)
                                                <option value="{{ $item->id }}">{{ $item->nombre ."|". $item->nroCuenta ."| $ ".$item->saldo }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger"><strong id="banco_id-error"></strong></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">FECHA PAGO</label>
                                        <input type="date" name="fecha_pago"  id="fecha_pago" class="form-control text-right"  value="{{ $hoy }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- col-md-12 --}}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">CHEQUE NRO</label>
                                        <input type="text" class="form-control text-right" name="cheque_nro" id="cheque_nro"  value="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NRO COMP RETENCION</label>
                                        <input type="text" class="form-control text-right" name="retencion_nro" id="retencion_nro" value="0">
                                    </div>
                                </div>
                            </div>


                        </div>
                        {{-- col-md-12 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">FECHA TRANSFERENCIA</label>
                                    <input type="date" class="form-control text-right" name="fecha_transferencia"  id="name="fecha_transferencia"" value="{{ $hoy }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NRO COMP TRANSFERENCIA</label>
                                    <input type="text" class="form-control text-right" name="transferencia_nro" id="transferencia_nro" value="0">
                                </div>
                            </div>
                        </div>
                        {{-- col-md-12 --}}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">IMPORTE AFIP</label>
                                        <input type="number" class="form-control text-right" name="imp_afip" id="imp_afip" value="0.00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">IMPORTE AFIP 2</label>
                                        <input type="number" class="form-control text-right"  name="imp_afip2" id="imp_afip2" value="0.00">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">IMPORTE RENTAS</label>
                                        <input type="number" class="form-control text-right" name="imp_rentas" id="imp_rentas" value="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- col-md-12 --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> </label>
                                    <h3></h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">IMPORTE FACTURA</label>
                                    <input type="number" class="form-control text-right" name="imp_pago" id="imp_pago"  value="{{ $factura->importeFactura }}">
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="valida_envia()">Agregar Pago</button>
                </div>

                </div>
            </div>
        </div>
    </form>


@section('js')
        {{-- message --}}
        <script src="{{ asset('js/close_message_session.js') }}"></script>
        {{-- datatable --}}
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        {{-- validar modal --}}
        <script>
            function valida_envia(){
                var valido = true;

                if (document.pagarFacturaModal.banco_id.selectedIndex==0){
                    alert("Debe seleccionar El Banco.")
                    document.pagarFacturaModal.banco_id.focus()
                    return false;
                }
                //fecha pago
               if (document.pagarFacturaModal.fecha_pago.value==0){
                       alert("Debe seleccionar Fecha de pago")
                       document.pagarFacturaModal.fecha_pago.focus()
                       return false;
                }
                //cheque
                if (document.pagarFacturaModal.cheque_nro.value == ""){
                    alert("Debe Ingresar el Número de Cheque")
                    document.pagarFacturaModal.cheque_nro.focus()
                    return false;
                }
                //retencion
                if (document.pagarFacturaModal.retencion_nro.value == ""){
                    alert("Debe Ingresar el Número de Retención")
                    document.pagarFacturaModal.retencion_nro.focus()
                    return false;
                }
                //fecha_transferencia
               if (document.pagarFacturaModal.fecha_transferencia.value==0){
                alert("Debe seleccionar Fecha de Transferencia")
                document.pagarFacturaModal.fecha_transferencia.focus()
                return false;
                }
                //transferencia
                if (document.pagarFacturaModal.transferencia_nro.value == ""){
                    alert("Debe Ingresar el Número de Transferencia")
                    document.pagarFacturaModal.transferencia_nro.focus()
                    return false;
                }
                //Afip
                if (document.pagarFacturaModal.imp_afip.value == ""){
                    alert("Debe Ingresar el Importe de AFIP")
                    document.pagarFacturaModal.imp_afip.focus()
                    return false;
                }
                //Afip2
                if (document.pagarFacturaModal.imp_afip2.value == ""){
                    alert("Debe Ingresar el Importe de AFIP2")
                    document.pagarFacturaModal.imp_afip2.focus()
                    return false;
                }
                //rentas
                if (document.pagarFacturaModal.imp_rentas.value == ""){
                    alert("Debe Ingresar el Importe de RENTAS")
                    document.pagarFacturaModal.imp_rentas.focus()
                    return false;
                }
                //pago
                if (document.pagarFacturaModal.imp_pago.value == ""){
                    alert("Debe Ingresar el Importe del PAGO")
                    document.pagarFacturaModal.imp_pago.focus()
                    return false;
                }
                //el formulario se envia
                if (valido) {
                    document.getElementById("pagarFacturaModal").submit();
                  }
         }
        </script>

@stop
