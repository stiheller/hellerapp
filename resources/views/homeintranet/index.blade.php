<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intranet</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="favicon.ico" rel="icon">

    <!-- Google Web Fonts
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">-->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('homeintranet/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('homeintranet/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('homeintranet/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('homeintranet/css/style.css') }}" rel="stylesheet">

    <!-- Boton para ir arriba -->
    <link href="{{ asset('homeintranet/css/irArriba.css') }}" rel="stylesheet">
    <!-- ribbon -->
    <style>
       .ribbon {
            background-color: #a00;
            overflow: hidden;
            white-space: nowrap;
            /* top left corner */
            position: absolute;
            left: -50px;
            top: 40px;
            z-index: 999;
            /* for 45 deg rotation */
            -webkit-transform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                -o-transform: rotate(-45deg);
                    transform: rotate(-45deg);
            /* for creating shadow */
            -webkit-box-shadow: 0 0 10px #888;
                -moz-box-shadow: 0 0 10px #888;
                    box-shadow: 0 0 10px #888;
            }
            .ribbon a {
            border: 1px solid #faa;
            color: #fff;
            display: block;
            font: bold 100% 'Helvetica Neue', Helvetica, Arial, sans-serif;
            margin: 1px 0;
            padding: 10px 50px;
            text-align: center;
            text-decoration: none;
            /* for creating shadow */
            text-shadow: 0 0 5px #444;
            }
        }
    </style>

</head>

<body>

<!--begin::Card-->
    <!-- seguimiento -->
    <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
     <!-- ./seguimiento -->
    <div class="ribbon">
        <a href="#">DESARROLLO</a>
    </div>

<!--end::Card-->

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">

        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Godoy y Liguen, Neuquén</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+54 0299 4490700</small>

                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://hhheller.org/" target="_blank"><i class="fa fa-globe fa-fw"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/hhheller" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.youtube.com/channel/UCP2B9sNvZ_K-3MuOT2AhNFQ" target="_blank"><i class="fab fa-youtube fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.instagram.com/hospital.heller/" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
        </div>

    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <!--<h1 class="m-0"><i class="fa fa-home fa-fw"></i>Intranet</h1>-->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="http://10.1.104.12/hellerapp/public/" class="nav-item nav-link">Inicio</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sistemas</a>
                        <div class="dropdown-menu m-0">
                            <a href="http://10.1.104.10/login/login.php" target="_blank" class="dropdown-item"> Sistemas Generales</a>
                            <a href="http://10.1.104.10/guardia/guardia.php" target="_blank" class="dropdown-item">Guardia</a>
                            <a href="http://10.1.104.10/pacientes/pacientes.php" target="_blank" class="dropdown-item">Pacientes</a>
                            <a href="http://10.1.104.10/internacion/internacion.php"  target="_blank" class="dropdown-item">Internación</a>
                            <a href="http://10.1.104.10/laboratorio/lab_monitor.php" target="_blank" class="dropdown-item">Laboratorio</a>
                            <a href="http://172.16.1.252/sistemas/mesa_ayuda/nuevotkt.php" target="_blank" class="dropdown-item">Mesa de Ayuda</a>
                            <a href="http://172.16.1.252/" target="_blank" class="dropdown-item">Intranet 2</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Utilidades</a>
                        <div class="dropdown-menu m-0">
                            <a href="http://hhheller.org:2084/login.php?idn" target="_blank" class="dropdown-item seguimientoclick" data-id="20">Correo Hospitalario</a>
                            <a href="http://intranet/pagvarias/paginasutiles.php" target="_blank" class="dropdown-item seguimientoclick" data-id="21">Páginas Utiles</a>
                            <a href="http://intranet/telefonos/internos.php" target="_blank" class="dropdown-item seguimientoclick" data-id="6">Internos</a>
                            <a href="http://intranet/telefonos/centrex.php" target="_blank" class="dropdown-item seguimientoclick" data-id="7">Centrex</a>
                            <a href="http://intranet/pagvarias/zm.php" target="_blank" class="dropdown-item seguimientoclick" data-id="22">Teléfonos Zona Metro</a>
                            <a href="http://intranet/comunicacion/comunicacion.php" target="_blank" class="dropdown-item seguimientoclick" data-id="23">Comunicación Interna</a>
                            <a href="http://intranet/biblioteca/biblioteca.php" target="_blank" class="dropdown-item seguimientoclick" data-id="24">Biblioteca</a>
                            <a href="http://intranet/seguridad_higiene/seg_higiene.php" target="_blank" class="dropdown-item seguimientoclick" data-id="25">Plan de Contingencia</a>

                        </div>
                    </div>
                    <a href="http://intranet/intranet3/guardiaspasivas/viewpasivas.php" target="_blank" class="nav-item nav-link seguimientoclick" data-id="19">Guardias y Coord Enfermeria</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Espacios Institucionales</a>
                        <div class="dropdown-menu m-0">
                            <a href="http://10.1.104.10/calendarioPortal/calendario_espInstitucionalAll.php" target="_blank" class="dropdown-item seguimientoclick" data-id="10">Ver</a>
                            <a href="https://forms.gle/5CNYT3X3cHgj9nqo9" target="_blank" class="dropdown-item seguimientoclick" data-id="15">Formulario Solicitud</a>
                        </div>
                    </div>
                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Formularios Personal</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('f80') }}" target="_blank" class="dropdown-item">Articulo 50 ex 80</a>
                            <a href="#" target="_blank" class="dropdown-item">Permiso de Salida</a>
                        </div>
                    </div>-->
                    <a href="#" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal"></a>
                    <a href="http://intranet/tutorialesandes/tutorialesandes.php" target="_blank" class="nav-item nav-link seguimientoclick" data-id="16">TUTORIALES ANDES</a>
                    <!--<a href="#" target="_blank" class="nav-item nav-link">IP: {{ $ip }}</a>-->


                </div>

                <a href="{{ route('loginSistemas') }}" target="_blank" class="btn btn-primary py-2 px-4 ms-3 seguimientoclick" data-id="17">Iniciar Sesion</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-2 bg-header" style="margin-bottom: 90px;">
            <div class="row py-2">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn m-0"><i class="fa fa-home fa-fw"></i>Intranet</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <br>
    <pre id="output"></pre>

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
            <!-- Full Screen Search End -->
        <!-- alertas -->
        @if (count($alertas) > 0)
            <div class="container-fluid facts pt-lg-0">
                <div class="container py-5 pt-lg-0">
                    <div class="row gx-0">
                        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                            <h5 class="fw-bold text-primary text-uppercase">Notificaciones Importantes</h5>
                            <!--<h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>-->
                        </div>

                        <div class="alert alert-danger" role="alert">
                            @foreach ($alertas as $item)
                            <p><strong>Atención !!!</strong> El día <strong>{{  \Carbon\Carbon::parse($item->dia)->format('d/m/Y')}} </strong> a las <strong> {{ $item->hora}} </strong>  {{ $item->alerta}}</strong></p>
                                @if (!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- ./alertas -->
        <br>
        <!-- Facts Start -->

        <div class="container-fluid facts pt-lg-0">
            <div class="container py-5 pt-lg-0">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                            <h5 class="fw-bold text-primary text-uppercase">CLAVES WIFI</h5>
                            <!--<h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>-->
                </div>
                <div class="row gx-0">
                    
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="fa fa-wifi fa-fw text-primary"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-white mb-0">PLANTA ALTA</h5>
                                <h1 class="text-white mb-0" >f4obMx0w1Yn4</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s">
                        <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                                <i class="fa fa-wifi fa-fw text-white"></i>
                            </div>
                            <div class="ps-4">
                                <h5 class="text-primary mb-0">PLANTA BAJA</h5>
                                <h1 class="mb-0" >12345678</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Facts Start -->
        

      <!-- Team Start -->
      <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Accesos Directos</h5>
                <!--<h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>-->
            </div>
            <div class="row g-5">
                <!-- rayos -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/rayos.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="1" href="http://visorheller/" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Visor Rayos</h4>
                            <p class="text-lowercase m-0"><strong> Usuario: admin -- Clave: adm1n</strong></p>
                        </div>
                    </div>
                </div>
                <!-- andes -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/andes.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="2" href="https://app.andes.gob.ar/login" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">ANDES</h4>
                            <p class="text-lowercase m-0">Aplicacion Neuquinas de Salud</p>
                        </div>
                    </div>
                </div>
                <!-- sips -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/sips.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded  seguimientoclick" data-id="3" href="https://www.saludnqn.gob.ar/SSO/Login.aspx?url=http%3a%2f%2fwww.saludnqn.gob.ar%2fSips&amp;RedirectToSecure=1" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">SIPS</h4>
                            <p class="text-lowercase m-0">sistema Integral provincial de salud</p>
                        </div>
                    </div>
                </div>
                <!-- SIL -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/sil.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="4" href="http://10.1.104.231:9090/laboratorio" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">SIL</h4>
                            <p class="text-lowercase m-0">sistema integral de laboratorio</p>
                        </div>
                    </div>
                </div>
                <!-- GDE -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/gde.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="5" href="https://cas.gde.neuquen.gob.ar/acceso/login/?generateToken=true&generateIDP=true&" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">GDE</h4>
                            <p class="text-lowercase m-0"><strong> Gestión Documental Electrónica</strong></p>
                        </div>
                    </div>
                </div>
                <!-- Feriados Nacionales -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/feriados.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="26" href="https://www.argentina.gob.ar/interior/feriados-nacionales-{{ $year }}" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Feriados</h4>
                            <p class="text-lowercase m-0">Feriados Nacionales</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-5">
                <!--internos -->
               <div class="col-lg-2 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/internos.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="6" href="http://intranet/telefonos/internos.php" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">INTERNOS</h4>
                            <p class="text-lowercase m-0"><strong>Internos de la institución</strong></p>
                        </div>
                    </div>
                </div>
                <!-- centrex -->
                 <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/centrex.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="7" href="http://intranet/telefonos/centrex.php" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">CENTREX</h4>
                            <p class="text-lowercase m-0"><strong>Centrex asignados</strong></p>
                        </div>
                    </div>
                </div>
                <!-- onelogin -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/onelogin.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="27" href="https://cas.neuquen.gov.ar/cas/login" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">ONE LOGIN</h4>
                            <p class="text-lowercase m-0"><strong>One Login</strong></p>
                        </div>
                    </div>
                </div>

                <!-- nutricion -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/nutricion-guardia-cocina.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="28" href="https://docs.google.com/spreadsheets/d/1JlheC19rO1Vn7MYeWTNnl8neLHK2dtNI/edit?usp=sharing&ouid=103520412529601884761&rtpof=true&sd=true" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">PEDIDO COMINDA</h4>
                            <p class="text-lowercase m-0"><strong>Pac. Internado</strong></p>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- Team End -->

        <!-- carousel Start -->
            <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h5 class="fw-bold text-primary text-uppercase">Novedades</h5>
                        <!--<h1 class="mb-0">What Our Clients Say About Our Digital Services</h1>-->
                    </div>
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                        @foreach ($novedades as $item)
                            <div class="testimonial-item bg-light my-4">
                                <div class="d-flex align-items-center border-bottom">
                                    <img class="img-fluid rounded" src="{{ asset('/img/novedades/'.$item->img) }}" style="width: 100%; height: 100%;" >
                                    <div class="ps-4">
                                        <!--<h4 class="text-primary mb-1">Client Name</h4>
                                        <small class="text-uppercase">Profession</small>-->
                                    </div>
                                </div>
                                <!--<div class="pt-4 pb-5 px-5">
                                    Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                                </div>-->
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        <!-- carousel End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <!-- Noticias Start-->
                <div class="container py-5">
                    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                        <h5 class="fw-bold text-primary text-uppercase">Noticias</h5>
                        <!--<h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>-->
                    </div>
                    <div class="row">
                        <!-- Blog list Start -->
                        <div class="col-lg">
                                <div class="row g-5">
                                    @foreach ($noticias as $noticia)
                                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                                            <div class="blog-item bg-light rounded overflow-hidden h-100">
                                                <div class="blog-img position-relative overflow-hidden">
                                                    <img class="img-fluid" src="{{ asset('/img/noticias/'.$noticia->urlImagen) }}"  alt="">
                                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4 seguimientoclick" data-id="9" href="{{ $noticia->urlPagWeb}}" target='_blank'>Más</a>
                                                </div>
                                                <div class="p-4">
                                                    <div class="d-flex mb-3">
                                                        {{--<small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>--}}
                                                        <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($noticia->fecha)->format('d/m/Y') }}</small>
                                                    </div>
                                                    <h4 class="mb-3">{{ $noticia->titulo}}</h4>
                                                    <p>{{ strip_tags($noticia->copete) }}</p>
                                                    <!--<a class="text-uppercase" href="http://www.hhheller.org" target='_blank'>www.hhheller.org <i class="bi bi-arrow-right"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                        <!-- End Blog list Start -->


                    </div>
                    <!-- End Row -->
                    <div class="row">

                    </div>
                    <!-- End Row -->
                </div>
            <!-- Noticias End -->
            <!-- Service Start -->
                <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container py-5">
                        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                            <h5 class="fw-bold text-primary text-uppercase">En Linea</h5>
                            <h1 class="mb-0">Registro a Distintas Actividades</h1>
                        </div>
                        <div class="row g-5">
                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.3s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <i class="fa fa-calendar fa-2x text-white"></i>
                                    </div>
                                    <h4 class="mb-3">Espacios Institucionales</h4>
                                    <p class="m-0">Antes de realizar una reserva por favor leer la Circular
                                        Solicitud de espacios institucionales, por favor con 24 hs de antelacion para evitar superposicion de lugares y equipamientos.</p>
                                    <a class="btn btn-lg btn-primary rounded" href="http://10.1.104.10/calendarioPortal/calendario_espInstitucionalAll.php" target="_blank">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.6s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <i class="fa fa-users fa-2x text-white"></i>
                                    </div>
                                    <h4 class="mb-3">Violencia de Genero</h4>
                                    <p class="m-0">Desde el Comité de para la prevención y abordaje de violencia de género del Hospital Dr. Horacio Heller se extiende la invitación para completar un cuestionario (anónimo),
                                        en el marco del desarrollo de un programa institucional de abordaje de la violencia en el ámbito de las relaciones laborales.
                                       </p>
                                    <a class="btn btn-lg btn-primary rounded seguimientoclick" data-id="11" href="https://forms.gle/susrA5Bg26HFxYLx6" target="_blank">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.9s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <a href="{{ asset('homeintranet/lenguajeSenasA4.pdf') }}" target="_blank"><i class="fa fa-sign-language fa-2x text-white"></i></a>
                                    </div>
                                    <h4 class="mb-3">Lenguaje de Señas</h4>
                                    <!--<p class="m-0">Formulario de Inscripción</p>-->
                                    <a class="btn btn-lg btn-primary rounded  seguimientoclick" data-id="12" href="{{ asset('homeintranet/lenguajeSenasA4.pdf') }}"  target="_blank"><i class="bi bi-arrow-right"></i></a>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row g-5">

                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.3s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <i class="fa fa-clone fa-2x text-white"></i>
                                    </div>
                                    <h4 class="mb-3">Mis Licencias</h4>
                                    <p class="m-0">Instructivo de uso del App Mis Licencias</p>
                                    <a class="btn btn-lg btn-primary rounded seguimientoclick" data-id="14" href="https://youtube.com/shorts/13u1isfeASY" target="_blank">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- Service End -->
        </div>
    </div>
    <!-- Blog End -->
       
        
      <!-- Team Start -->
      <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Accesos Directos</h5>
                <!--<h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>-->
            </div>
            <div class="row g-5">
                <!-- rayos -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/rayos.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="1" href="http://visorheller/" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Visor Rayos</h4>
                            <p class="text-lowercase m-0"><strong> Usuario: admin -- Clave: adm1n</strong></p>
                        </div>
                    </div>
                </div>
                <!-- andes -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/andes.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="2" href="https://app.andes.gob.ar/login" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">ANDES</h4>
                            <p class="text-lowercase m-0">Aplicacion Neuquinas de Salud</p>
                        </div>
                    </div>
                </div>
                <!-- sips -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/sips.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded  seguimientoclick" data-id="3" href="https://www.saludnqn.gob.ar/SSO/Login.aspx?url=http%3a%2f%2fwww.saludnqn.gob.ar%2fSips&amp;RedirectToSecure=1" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">SIPS</h4>
                            <p class="text-lowercase m-0">sistema Integral provincial de salud</p>
                        </div>
                    </div>
                </div>
                <!-- SIL -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/sil.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="4" href="http://10.1.104.231:9090/laboratorio" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">SIL</h4>
                            <p class="text-lowercase m-0">sistema integral de laboratorio</p>
                        </div>
                    </div>
                </div>
                <!-- GDE -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/gde.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="5" href="https://cas.gde.neuquen.gob.ar/acceso/login/?generateToken=true&generateIDP=true&" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">GDE</h4>
                            <p class="text-lowercase m-0"><strong> Gestión Documental Electrónica</strong></p>
                        </div>
                    </div>
                </div>
                <!-- Feriados Nacionales -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/feriados.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="26" href="https://www.argentina.gob.ar/interior/feriados-nacionales-{{ $year }}" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">Feriados</h4>
                            <p class="text-lowercase m-0">Feriados Nacionales</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row g-5">
                <!--internos -->
               <div class="col-lg-2 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/internos.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="6" href="http://intranet/telefonos/internos.php" target="_blank"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">INTERNOS</h4>
                            <p class="text-lowercase m-0"><strong>Internos de la institución</strong></p>
                        </div>
                    </div>
                </div>
                <!-- centrex -->
                 <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/centrex.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="7" href="http://intranet/telefonos/centrex.php" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">CENTREX</h4>
                            <p class="text-lowercase m-0"><strong>Centrex asignados</strong></p>
                        </div>
                    </div>
                </div>
                <!-- onelogin -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/onelogin.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="27" href="https://cas.neuquen.gov.ar/cas/login" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">ONE LOGIN</h4>
                            <p class="text-lowercase m-0"><strong>One Login</strong></p>
                        </div>
                    </div>
                </div>

                <!-- nutricion -->
                <div class="col-lg-2 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="homeintranet/img/nutricion-guardia-cocina.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded seguimientoclick" data-id="28" href="https://docs.google.com/spreadsheets/d/1JlheC19rO1Vn7MYeWTNnl8neLHK2dtNI/edit?usp=sharing&ouid=103520412529601884761&rtpof=true&sd=true" target="_blank"><i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                        <div class="text-center py-3">
                            <h4 class="text-primary">PEDIDO COMINDA</h4>
                            <p class="text-lowercase m-0"><strong>Pac. Internado</strong></p>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- Team End -->

        <!-- carousel Start -->
            <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                        <h5 class="fw-bold text-primary text-uppercase">Novedades</h5>
                        <!--<h1 class="mb-0">What Our Clients Say About Our Digital Services</h1>-->
                    </div>
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                        @foreach ($novedades as $item)
                            <div class="testimonial-item bg-light my-4">
                                <div class="d-flex align-items-center border-bottom">
                                    <img class="img-fluid rounded" src="{{ asset('/img/novedades/'.$item->img) }}" style="width: 100%; height: 100%;" >
                                    <div class="ps-4">
                                        <!--<h4 class="text-primary mb-1">Client Name</h4>
                                        <small class="text-uppercase">Profession</small>-->
                                    </div>
                                </div>
                                <!--<div class="pt-4 pb-5 px-5">
                                    Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                                </div>-->
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        <!-- carousel End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <!-- Noticias Start-->
                <div class="container py-5">
                    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                        <h5 class="fw-bold text-primary text-uppercase">Noticias</h5>
                        <!--<h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>-->
                    </div>
                    <div class="row">
                        <!-- Blog list Start -->
                        <div class="col-lg">
                                <div class="row g-5">
                                    @foreach ($noticias as $noticia)
                                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                                            <div class="blog-item bg-light rounded overflow-hidden h-100">
                                                <div class="blog-img position-relative overflow-hidden">
                                                    <img class="img-fluid" src="{{ asset('/img/noticias/'.$noticia->urlImagen) }}"  alt="">
                                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4 seguimientoclick" data-id="9" href="{{ $noticia->urlPagWeb}}" target='_blank'>Más</a>
                                                </div>
                                                <div class="p-4">
                                                    <div class="d-flex mb-3">
                                                        {{--<small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small>--}}
                                                        <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($noticia->fecha)->format('d/m/Y') }}</small>
                                                    </div>
                                                    <h4 class="mb-3">{{ $noticia->titulo}}</h4>
                                                    <p>{{ strip_tags($noticia->copete) }}</p>
                                                    <!--<a class="text-uppercase" href="http://www.hhheller.org" target='_blank'>www.hhheller.org <i class="bi bi-arrow-right"></i></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                        <!-- End Blog list Start -->


                    </div>
                    <!-- End Row -->
                    <div class="row">

                    </div>
                    <!-- End Row -->
                </div>
            <!-- Noticias End -->
            <!-- Service Start -->
                <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container py-5">
                        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                            <h5 class="fw-bold text-primary text-uppercase">En Linea</h5>
                            <h1 class="mb-0">Registro a Distintas Actividades</h1>
                        </div>
                        <div class="row g-5">
                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.3s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <i class="fa fa-calendar fa-2x text-white"></i>
                                    </div>
                                    <h4 class="mb-3">Espacios Institucionales</h4>
                                    <p class="m-0">Antes de realizar una reserva por favor leer la Circular
                                        Solicitud de espacios institucionales, por favor con 24 hs de antelacion para evitar superposicion de lugares y equipamientos.</p>
                                    <a class="btn btn-lg btn-primary rounded" href="http://10.1.104.10/calendarioPortal/calendario_espInstitucionalAll.php" target="_blank">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.6s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <i class="fa fa-users fa-2x text-white"></i>
                                    </div>
                                    <h4 class="mb-3">Violencia de Genero</h4>
                                    <p class="m-0">Desde el Comité de para la prevención y abordaje de violencia de género del Hospital Dr. Horacio Heller se extiende la invitación para completar un cuestionario (anónimo),
                                        en el marco del desarrollo de un programa institucional de abordaje de la violencia en el ámbito de las relaciones laborales.
                                       </p>
                                    <a class="btn btn-lg btn-primary rounded seguimientoclick" data-id="11" href="https://forms.gle/susrA5Bg26HFxYLx6" target="_blank">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.9s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <a href="{{ asset('homeintranet/lenguajeSenasA4.pdf') }}" target="_blank"><i class="fa fa-sign-language fa-2x text-white"></i></a>
                                    </div>
                                    <h4 class="mb-3">Lenguaje de Señas</h4>
                                    <!--<p class="m-0">Formulario de Inscripción</p>-->
                                    <a class="btn btn-lg btn-primary rounded  seguimientoclick" data-id="12" href="{{ asset('homeintranet/lenguajeSenasA4.pdf') }}"  target="_blank"><i class="bi bi-arrow-right"></i></a>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row g-5">

                            <div class="col-lg-4 col-md-6 wow zoomIn h-100" data-wow-delay="0.3s">
                                <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="service-icon">
                                        <i class="fa fa-clone fa-2x text-white"></i>
                                    </div>
                                    <h4 class="mb-3">Mis Licencias</h4>
                                    <p class="m-0">Instructivo de uso del App Mis Licencias</p>
                                    <a class="btn btn-lg btn-primary rounded seguimientoclick" data-id="14" href="https://youtube.com/shorts/13u1isfeASY" target="_blank">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <!-- Service End -->
        </div>
    </div>
    <!-- Blog End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <a href="https://cas.neuquen.gov.ar/cas/login" target="_blank"><img src="homeintranet/img/onelogin.png" alt="One Login" title="OneLogin" ></a>
                    <a href="http://www.rionegro.com.ar" target="_blank"><img src="homeintranet/img/diarioRioNegro.png" alt="Diario Rio Negro" title="Diario Río Negro"></a>
                    <a href="http://www.lmneuquen.com.ar" target="_blank"><img src="homeintranet/img/lmneuquen.png" alt="Diario La Mañana" title="Diario LM Neuquén"></a>
                    <a href="https://www.saludneuquen.gob.ar/" target="_blank"><img src="homeintranet/img/subsecretariaDeSalud.png" alt="Subsecretaría de Salud" title="Subsecretaría de Salud"></a>
                    <a href="https://www.bpn.com.ar/" target="_blank"><img src="homeintranet/img/bpn.png" alt="BPN" title="BPN"></a>
                    <a href="https://www.hospitalneuquen.org.ar/" target="_blank"><img src="homeintranet/img/hospitalCastroRendon.png" alt="HPN" title="Hospital Castro Rendón"></a>
                    <a href="https://bancolechehumana.neuquen.gob.ar/" target="_blank"><img src="homeintranet/img/bancoLecheMaterna.png" alt="Banco Leche Materna" title="Banco Leche Materna"></a>

                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">


                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="www.hhheller.org">www.hhheller.org</a>. Todos los derechos Reservados

						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Diseñado por <a class="text-white border-bottom" href="">STI</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Info PC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Back to Top -->
    <!--<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>-->
    <span class="ir-arriba icon-arrow-up2"><i class="bi bi-arrow-up"></i></span>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('homeintranet/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('homeintranet/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('homeintranet/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('homeintranet/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('homeintranet/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            margin:5,
            touchDrag: true,
            loop:true,
            lazyLoad:true,
            autoWidth:true,
            autoplay:true,
            autoplayTimeout: 2500,
            autoplayHoverPause:true,
            responsiveClass: true

        })
    </script>
    <script src="{{ asset('homeintranet/js/irArriba.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('homeintranet/js/main.js') }}"></script>
    <!-- ajax capturar click -->
    <script>
        $(".seguimientoclick").click(function(){
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            console.log(id);

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax(
            {
                url: "link/"+id,
                type: "post",
                DataType: 'json',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){
                    console.log("it Works");
                }
            });

        });
    </script>


</body>

</html>
