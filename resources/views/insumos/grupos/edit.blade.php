@extends('adminlte::page')

@section('title', 'Grupos')
{{-- notficacion --}}
@include('dash.notificaciones')
{{-- notificacion --}}
@section('content_header')
    <h1>Editar Grupo</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::model($grupo, ['route' => ['insumos.grupos.update', $grupo], 'method' => 'put']) !!}

                {!! Form::hidden('user_id', Auth()->user()->id) !!}

                @include('insumos.grupos.form')

                <a class="btn btn-secondary float-right " href="{{  route('insumos.grupos.index') }}"><i class="fas fa-backward fa-fw"></i> Volver</a>

                {{ Form::button('<i class="fas fa-save"> Actualizar Grupo</i>', ['type' => 'submit', 'class' => 'btn btn-primary float-right mr-2'] )  }}

            {!! Form::close() !!}

        </div>
    </div>
@stop
@section('js')
    /* cnd para integrar el editor*/
    <script src="{{ asset('/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#descripcion' ), {
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
