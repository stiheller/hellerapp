@extends('adminlte::page')

@section('title', 'Facturas')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Crear Factura</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'administracion.facturas.store']) !!}

        {!! Form::hidden('user_id', Auth()->user()->id) !!}

        @include('administracion.facturas.forms')

        <a class="btn btn-secondary float-right " href="{{  route('administracion.facturas.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

        {{ Form::button('<i class="fas fa-plus-square"> Crear Factura</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}



    {!! Form::close() !!}
@stop
@section('js')
    /* cnd para integrar el editor*/
    <script src="{{ asset('/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#detalleRendicionFactura' ), {
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
        ClassicEditor
            .create( document.querySelector( '#detalleInternoFactura' ), {
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
@endsection
