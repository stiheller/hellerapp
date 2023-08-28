@extends('adminlte::page')

@section('title', 'Inventario - CPU')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('inventario.cpus.create') }}">Crear CPU</a>
    <h1>Listado de CPU's:</h1>
@stop

@section('content')
    @livewire('inventario.cpus-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="//unpkg.com/alpinejs"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('create') == 'ok')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Se Creó Correctamente El CPU.!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @endif

    @if (session('editar') == 'ok')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Se Editó Correctamente El CPU.!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @endif

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se Eliminó Correctamente.!',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de Eliminar?',
                text: "No se podrá revertir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    /* Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ) */
                }
            })
        });
    </script>
    <script> console.log('Hi!'); </script>
@stop