@extends('adminlte::page')

@section('title', 'Inventario - Puestos')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('inventario.puestos.create') }}">Crear Puesto</a>
    <h1>Lista de Puestos:</h1>
@stop

@section('content')
        @livewire('inventario.puestos.puestos-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="//unpkg.com/alpinejs"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function muestraSweet() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El botón está funcionando.!',
                showConfirmButton: false,
                timer: 3500
            })
        }
    </script>

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
    @if (session('create') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se registró el Puesto Correctamente.!',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    @if (session('edit') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El Puesto se Actualizó Correctamente.!',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif
    @if (session('desconectar') == 'ok')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El Ip se Liberó, el Puesto se actualizó.!',
                showConfirmButton: false,
                timer: 3500
            })
        </script>
    @endif

    @if (session('ip') == 'fail')
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Creo un puesto con un IP no libre, preste atención',
                showConfirmButton: false,
                timer: 3500
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
    <script>
        $('.liberar-ip').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro de Desconectar?',
                text: "Quedará el Puesto Sin IP y el IP pasará a LIBRE",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, Desconectar!'
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
    <script>
        console.log('Hi!');
    </script>
@stop
