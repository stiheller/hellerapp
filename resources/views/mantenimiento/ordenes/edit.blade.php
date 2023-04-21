@extends('adminlte::page')

@section('title', 'Ordenes')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Orden</h1>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/DataTables-1.10.24/css/responsive.bootstrap4.min.css') }}">
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($orden, ['route' => ['mnt.ordenes.update', $orden], 'method' => 'put']) !!}

                {!! Form::hidden('user_id', Auth()->user()->id) !!}

                @include('mantenimiento.ordenes.forms')

                <a class="btn btn-secondary float-right " href="{{  route('mnt.ordenes.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

                {{ Form::button('<i class="fas fa-save"> Actualizar Orden</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}

            {!! Form::close() !!}



        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/UpperCase.js') }}"></script>
    <script src="{{ asset('js/LowerCase.js') }}"></script>
    <script src="{{ asset('/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#tarea' ), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                }
            } )
            .catch( error => {
                console.error( error );


        } );
    </script>
@stop
