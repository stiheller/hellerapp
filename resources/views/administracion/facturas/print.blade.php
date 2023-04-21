<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        html {
            font-size: 12px;
            line-height: 1.5;
            color: #000;
            background: #ddd;
            -moz-box-sizing: border-box;
            box-sizing: border-box
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 6rem auto 0;
            max-width: 800px;
            background: white;
            border: 1px solid #aaa;
            padding: 2rem
        }
        table {
            width: 100%;
            height: 100%;
            border: 1px solid black;
          }
        th, td {
            border:hidden;
          }
        .encabezado{
            border-bottom: 2px solid #000;
            padding-bottom: 2em;
        }


        .container {
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1rem;
            padding-right: 1rem
        }
        .titulo{
            text-align:center;
            font: 2rem;
            color: blue;

        }
        .rotulo{
            background-color: #009688;
            color: white;
            font-style: bold;
        }
        .numero{
            text-align: right;
        }
        .details{
            display: inline;
            margin: 0 0 0 .5rem;
            border-right: 1px;
            width: 50px;
            min-width: 0;
            background: transparent;
            text-align: left
        }

    </style>
    <title>Imprimir Factura</title>
</head>
<body>
    <div class="container">
        <table  border="1px;" width="100%" >
            <thead>
                <tr>
                    <td colspan="8">
                        <img class="encabezado" src="{{ asset('/img/print-header.png') }}" >
                    </td>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td colspan="5"></td>
                    <td class="rotulo">FECHA:</td>
                    <td colspan="2">{{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y')}}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td class="rotulo">NRO:</td>
                    <td colspan="2">{{ $factura->numeroFactura }}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td class="rotulo">TIPO:</td>
                    <td colspan="2">{{ $factura->tipoFactura->tipoFactura }}</td>
                </tr>
                <tr>
                    <td class="rotulo">PROVEEDOR:</td>
                    <td colspan="7">{{ $factura->proveedor->nombreProveedor }}</td>
                </tr>
                <tr>
                    <td class="rotulo">CUIT:</td>
                    <td colspan="7">{{ $factura->proveedor->cuitProveedor }}</td>
                </tr>
                <tr>
                    <td colspan="8" class="rotulo">Detalle Rendicion Factura</td>

                </tr>
                <tr>
                    <td colspan="8"><h3>{{ strip_tags($factura->detalleRendicionFactura) }}</h3></td>

                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td class="rotulo">IMPORTE:</td>
                    <td class="numero">{{ number_format($factura->importeFactura,2) }}</td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td class="rotulo">PAGO</td>
                    <td class="numero">{{ number_format($factura->importePagado,2) }}</td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td class="rotulo">AFIP:</td>
                    <td class="numero">{{ number_format($factura->importeAfip,2) }}</td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td class="rotulo">AFIP2:</td>
                    <td class="numero">{{ number_format($factura->importeAfip2,2) }}</td>
                </tr>
                <tr>
                    <td colspan="6"></td>
                    <td class="rotulo">RENTAS:</td>
                    <td class="numero">{{ number_format($factura->importeRentas,2) }}</td>
                </tr>
                <tr>
                    <td colspan="8" class="rotulo">RUBROS ASIGNADOS A LA FACTURA</td>
                </tr>
                <tr>
                    <td colspan="8">
                        @foreach ($rubros_in_factura as $rubro)

                            @if ($rubro->infactura == 1)
                                <label class="mr-4">{{ $rubro->name. " - " }}</label>
                            @endif
                        </label>
                    @endforeach
                    </td>
                </tr>
                <tr>
                    <td class="rotulo">ESTADO</td>
                    <td colspan="6">{{ $factura->estado->name}}</td>
                </tr>
                <tr>
                    <td class="rotulo">DESTINATARIO</td>
                    <td colspan="6">{{ $factura->destinatarioFactura }}</td>
                </tr>
                <tr>
                    <td class="rotulo">GENERADA POR</td>
                    <td colspan="6">$factura->usuario->name }}</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <span >Impresion generada por el sistema de Administración Hospital Heller Código Seg: {{ $ramdom }}</span>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</body>
</html>
