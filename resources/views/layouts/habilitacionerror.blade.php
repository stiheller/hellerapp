@extends('adminlte::page')

    @section('title', 'Ingresos')
    {{-- notficacion --}}
    @include('dash.notificaciones')
    {{-- notificacion --}}
    @section('content_header')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>500 Error Autorización</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}">Home</a></li>
                        <li class="breadcrumb-item active">500 Autorización</li>
                    </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    @stop
    @section('content')
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-danger">500</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Algo salio mal.</h3>

                    <p>
                        {{Session::get('habilitacion')}}
                    </p>

                    <form class="search-form">
                        <div class="input-group">

                        </div>
                    <!-- /.input-group -->
                    </form>
                </div>
            </div>
        </section>
    @stop

