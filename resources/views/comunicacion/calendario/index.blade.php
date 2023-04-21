@extends('adminlte::page')

    @section('title', 'Calendario')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notficacion --}}
    @section('content_header')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('comunicacion.calendario.create') }}" data-toggle="tooltip" data-placement="top"  title="Nueva Programación"> Nuevo Programación</a>
        <h1>Calendario Eventos Institucionales</h1>
    @stop

    @section('css')
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" href="{{ asset('fullcalendar/css/fullcalendar.css') }}" />
    @stop

    @section('content')
        <div class="card">

            <div class="card-body">
                <div id="calendar"></div>
            </div>

    @stop



    @section('js')
        <script src="{{ asset('fullcalendar/js/jquery.min.js') }}"></script>
        <script src="{{ asset('fullcalendar/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('fullcalendar/js/moment.min.js') }}"></script>
        <script src="{{ asset('fullcalendar/js/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('fullcalendar/js/locale/es.js') }}"></script>
        <script src="{{ asset('fullcalendar/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('fullcalendar/js/bootstrap.min.js') }}" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var booking = @json($events);

                $('#calendar').fullCalendar({
                    lang: 'es',
                    weekends:false,
                    header: {
                        left: 'prev, next today',
                        center: 'title',
                        right: 'prevYear, month, agendaWeek, agendaDay, nextYear',
                    },

                    //array con los eventos
                    events: booking,

                });


                $("#bookingModal").on("hidden.bs.modal", function () {
                    $('#saveBtn').unbind();
                });

                $('.fc-event').css('font-size', '13px');
                $('.fc-event').css('width', '20px');
                $('.fc-event').css('border-radius', '50%');


            });
        </script>
    @stop
