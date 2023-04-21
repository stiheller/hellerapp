@extends('adminlte::page')

    @section('title', 'Usuarios')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        <h1>Estadisticas Seguimiento Intranet</h1>
    @stop

    @section('css')

    @stop

    @section('content')
        <div class="card">
            <form action="{{ route('sti.segIntranet') }}" method="GET">
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
                            <a href="#" class="btn btn-warning float-right"><i class="fas fa-sync"></i> Recargar</a>
                            <button type="submit" class="btn btn-primary float-right mr-2"><i class="fas fa-search"></i> Buscar</button>
                        </div>

                </div>
            </form>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div id="secciones"></div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="columnas"></div>
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
        <script>
            /* columnas secciones */
            Highcharts.chart('secciones', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'center',
                    text: 'Cantidad de Click por Secciones '
                },
                subtitle: {
                    align: 'center',
                    text: 'Clicks por secciones de la portada de Intranet'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Cantidad Total de Clicks'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}<br/>'
                },

                series: [
                    {
                        name: "Clicks",
                        colorByPoint: true,
                        data: <?= $grupos; ?>
                    }
                ]

            });
            /* columnas individuales */
                Highcharts.chart('columnas', {
                chart: {
                    type: 'column'
                },
                title: {
                    align: 'center',
                    text: 'Cantidad de Click por Item'
                },
                subtitle: {
                    align: 'center',
                    text: 'Clicks por link o secciones de la Intranet.'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Cantidad Total de Clicks'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}<br/>'
                },

                series: [
                    {
                        name: "Clicks",
                        colorByPoint: true,
                        data: <?= $columnas; ?>
                    }
                ]

            });


        </script>
    @stop




