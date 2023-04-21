@extends('adminlte::page')

    @section('title', 'Usuarios')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        <h1>Estadisticas de Impresiones</h1>
    @stop

    @section('css')

    @stop

    @section('content')
        <div class="card">
            <form action="{{ route('admin.impresiones') }}" method="GET">
                <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Desde</label>
                                <input type="date" class="form-control pull-right text-right" name="desde" id="hasta" value="{{ $desde }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Hasta</label>
                                <input type="date" class="form-control pull-right text-right" name="hasta" id="hasta" value="{{ $hasta }}">
                            </div>

                        </div>

                        <div class="col-md-4">
                            <br>
                            <a href="{{ route('admin.impresiones') }}" class="btn btn-warning float-right"><i class="fas fa-sync"></i> Recargar</a>
                            <button type="submit" class="btn btn-primary float-right mr-2"><i class="fas fa-search"></i> Buscar</button>
                        </div>

                </div>
            </form>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <div id="impresoras"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="hojas"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div id="anual"></div>
                    </div>
                </div>
            </div>
        </div>
    @stop

    @section('js')
        <script src="{{ asset('js/highcharts/highcharts.js') }}"></script>
        <script src="{{ asset('js/highcharts/exporting.js') }}"></script>
        <script src="{{ asset('js/highcharts/export-data.js') }}"></script>
        <script src="{{ asset('js/highcharts/accessibility.js') }}"></script>
        /* distribucion por tipo de hojas */
        <script>
            /* distribucion por impresora */
            Highcharts.chart('impresoras', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Distribución Impresiones por Impresora '
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: <?= $impresora; ?>
                }]
            });

            /* distribucion por tipo de hojas */

            Highcharts.chart('hojas', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Distribución Impresiones por Tipo de Hoja '
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: <?= $hoja; ?>
                }]
            });
            /* anual */
            var users =  <?php echo json_encode($data) ?>;
            Highcharts.chart('anual', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Impresiones Anuales ' +  <?= $anio; ?>
                },
                subtitle: {
                    text: 'Distribucion Mensual'
                },
                xAxis: {
                    categories: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                    crosshair: true,
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cant Hojas'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }

                },
                series: [{
                    name: 'Impresiones',
                    data: users,
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        format: '{point.y:.1f}', // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }

                }]
            });

        </script>

    @stop




