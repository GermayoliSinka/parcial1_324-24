<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAM-LP - Catastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        .nav-pills {
            border-radius: 5px;
            padding: 10px; 
        }

        .nav-pills .nav-link {
            color: #000; 
            font-size: 18px;
            font-weight: 500;
            padding: 12px 30px;
            margin: 0; 
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link:hover, .nav-pills .nav-link.active {
            background-color: transparent; 
            color: #495057; 
            border-radius: 0; 
        }

        .nav-pills .nav-link.active::after, .nav-pills .nav-link:hover::after {
            content: '';
            display: block;
            width: 100%;
            height: 3px;
            background-color: #ffb700; 
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .nav-pills .nav-link {
            position: relative;
        }

        /* Ajustes para el carrusel y los márgenes */
        #carouselExampleIndicators {
            margin-bottom: 0;
        }

        .carousel-item {
            height: 500px;
        }

        .carousel-item img {
            height: 100%;
            object-fit: cover;
        }

        /* Sección principal */
        main {
            margin-top: 10px;
        }

        /* Footer */
        footer {
            margin-top: 0;
        }

        /* Estilos para las tarjetas de actividades */
        .icon-link {
            color: #ffb700;
            text-decoration: none; 
        }

        .icon-link-hover:hover {
            text-decoration: underline;
        }

        /* Estilos actualizados para las tarjetas de actividades */
        .activity-card {
            margin-bottom: 20px;
        }

        .activity-card .row {
            height: 200px;
            overflow: hidden;
        }

        .activity-card .col-auto img {
            width: 150px;
            height: 100%;
            object-fit: cover;
        }

        .activity-card h3 {
            font-size: 1.2rem;
            margin-bottom: 0.3rem;
        }

        .activity-card p {
            font-size: 0.9rem;
            line-height: 1.3;
            max-height: 3.9em;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .activity-card .text-body-secondary {
            font-size: 0.8rem;
        }

        .activity-card .icon-link {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imagen/im10.jpg" class="d-block w-100 img-carousel" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="imagen/im12.jpg" class="d-block w-100 img-carousel" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="imagen/im13.webp" class="d-block w-100 img-carousel" alt="Imagen 3">
            </div>
            <div class="carousel-item active">
                <img src="imagen/im14.jpg" class="d-block w-100 img-carousel" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="imagen/im15.jpg" class="d-block w-100 img-carousel" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="imagen/im16.jpg" class="d-block w-100 img-carousel" alt="Imagen 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <main class="container mt-4">
        <section>
            <h3>Información General</h3>
            <p>La HAM-LP proporciona una variedad de servicios relacionados con el catastro, incluyendo la gestión de propiedades y trámites catastrales.</p>
        </section>

        <section class="mt-5">
            <h3>Últimas Noticias</h3>
            <div class="row">
                <!-- Tarjeta de Noticia 1 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="imagen/p7.jpg" class="card-img-top" alt="Noticia 1" style="height: 225px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Actualización de Trámites Catastrales</h5>
                            <p class="card-text">Se han implementado mejoras en los procesos para facilitar el registro de propiedades.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-primary">Leer más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Noticia 2 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="imagen/p1.jpg" class="card-img-top" alt="Noticia 2" style="height: 225px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Nuevas Normativas de Construcción</h5>
                            <p class="card-text">El gobierno municipal ha establecido nuevas regulaciones para las construcciones urbanas.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-warning">Leer más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Noticia 3 -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="imagen/p2.jpg" class="card-img-top" alt="Noticia 3" style="height: 225px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Mejoras en el Sistema de Registro</h5>
                            <p class="card-text">Se han actualizado los sistemas de registro catastral para mayor eficiencia.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-success">Leer más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5">
            <h3>Actividades Recientes</h3>
            <div class="row">
                <!-- Tarjeta de Actividad 1 -->
                <div class="col-md-6 activity-card">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm position-relative">
                        <div class="col p-3 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-1 text-primary">Taller sobre gestión de propiedades</strong>
                            <h3 class="mb-0">Actividad 1</h3>
                            <div class="mb-1 text-body-secondary">Oct 10</div>
                            <p class="mb-auto">Un taller enfocado en la correcta gestión de propiedades y trámites catastrales.</p>
                            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                Continuar leyendo
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="imagen/p7.jpg" alt="Actividad 1" class="bd-placeholder-img">
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Actividad 2 -->
                <div class="col-md-6 activity-card">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm position-relative">
                        <div class="col p-3 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-1 text-success">Jornadas de Capacitación</strong>
                            <h3 class="mb-0">Actividad 2</h3>
                            <div class="mb-1 text-body-secondary">Oct 15</div>
                            <p class="mb-auto">Capacitación dirigida a la comunidad para mejorar su conocimiento sobre trámites catastrales.</p>
                            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                Continuar leyendo
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="imagen/p5.jpg" alt="Actividad 2" class="bd-placeholder-img">
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Actividad 3 -->
                <div class="col-md-6 activity-card">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm position-relative">
                        <div class="col p-3 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-1 text-warning">Encuentro con líderes comunitarios</strong>
                            <h3 class="mb-0">Actividad 3</h3>
                            <div class="mb-1 text-body-secondary">Oct 20</div>
                            <p class="mb-auto">Reunión con líderes de la comunidad para discutir mejoras en los servicios catastrales.</p>
                            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                Continuar leyendo
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="imagen/p6.jpg" alt="Actividad 3" class="bd-placeholder-img">
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Actividad 4 -->
                <div class="col-md-6 activity-card">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm position-relative">
                        <div class="col p-3 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-1 text-info">Visita a la Oficina de Catastro</strong>
                            <h3 class="mb-0">Actividad 4</h3>
                            <div class="mb-1 text-body-secondary">Oct 25</div>
                            <p class="mb-auto">Visita guiada para entender mejor los servicios ofrecidos por la oficina de catastro.</p>
                            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                Continuar leyendo
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="imagen/p7.jpg" alt="Actividad 4" class="bd-placeholder-img">
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Actividad 5 -->
                <div class="col-md-6 activity-card">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm position-relative">
                        <div class="col p-3 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-1 text-danger">Conferencia sobre Patrimonio Cultural</strong>
                            <h3 class="mb-0">Actividad 5</h3>
                            <div class="mb-1 text-body-secondary">Oct 30</div>
                            <p class="mb-auto">Conferencia centrada en la preservación del patrimonio cultural y su relación con el catastro.</p>
                            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                Continuar leyendo
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="imagen/p1.jpg" alt="Actividad 5" class="bd-placeholder-img">
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de Actividad 6 -->
                <div class="col-md-6 activity-card">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm position-relative">
                        <div class="col p-3 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-1 text-secondary">Taller de Capacitación en Tecnologías</strong>
                            <h3 class="mb-0">Actividad 6</h3>
                            <div class="mb-1 text-body-secondary">Nov 05</div>
                            <p class="mb-auto">Taller sobre el uso de tecnologías modernas en la gestión catastral y urbanística.</p>
                            <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                                Continuar leyendo
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="imagen/p2.jpg" alt="Actividad 6" class="bd-placeholder-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>