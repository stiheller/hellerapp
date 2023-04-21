@extends('adminlte::page')

@section('title', 'Empresas')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Crear Empresa</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'mnt.empresa.store']) !!}

        {!! Form::hidden('user_id', Auth()->user()->id) !!}

        @include('mantenimiento.empresas.forms')

        <a class="btn btn-secondary float-right " href="{{  route('mnt.empresa.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

        {{ Form::button('<i class="fas fa-plus-square"> Crear Empresa</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}



    {!! Form::close() !!}
@stop

@section('js')
    <script src="{{ asset('js/UpperCase.js') }}"></script>
    <script src="{{ asset('js/LowerCase.js') }}"></script>
    <script src="{{ asset('/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#observacion' ), {
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
