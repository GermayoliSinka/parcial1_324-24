<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Trámites y Servicios - HAM-LP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .card h5 {
            color: #d3d3d3; 
        }
        .search-input {
            margin-bottom: 20px;
            border-radius: 30px;
            padding: 10px;
            width: 100%;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-custom {
            background-color: #fa8072; 
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #e67361; 
        }
        .btn-filter {
            margin-right: 10px;
            margin-bottom: 10px;
            color: white; 
            border-radius: 20px;
        }
        .btn-filter[data-filter="registro"] {
            background-color: #007bff; 
        }
        .btn-filter[data-filter="consulta"] {
            background-color: #28a745; 
        }
        .btn-filter[data-filter="permisos"] {
            background-color: #ffc107; 
        }
        .btn-filter[data-filter="otros"] {
            background-color: #dc3545; 
        }
        .btn-filter:hover {
            opacity: 0.8; 
        }
        .card[data-category="registro"] {
            background-color: #f0f8ff; 
        }
        .card[data-category="consulta"] {
            background-color: #e6ffe6; 
        }
        .card[data-category="permisos"] {
            background-color: #fffacd; 
        }
        .card[data-category="otros"] {
            background-color: #ffe4e1; 
        }
        .card img {
            max-width: 100%; 
            border-radius: 10px 10px 0 0; 
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white text-center p-4"> 
        <h1>Trámites y Servicios</h1>
    </header>

    <main class="container mt-4">
        <div class="text-center mb-4">
            <button class="btn btn-filter" data-filter="all">Todos</button>
            <button class="btn btn-filter" data-filter="registro">Registro</button>
            <button class="btn btn-filter" data-filter="consulta">Consulta</button>
            <button class="btn btn-filter" data-filter="permisos">Permisos</button>
            <button class="btn btn-filter" data-filter="otros">Otros Servicios</button>
        </div>

        <input type="text" id="search" class="form-control search-input" placeholder="Buscar trámites...">

        <div class="row" id="tramites">
            <div class="col-md-4 filter-item" data-category="registro">
                <div class="card p-3">
                    <img src="URL_DE_LA_IMAGEN_1" alt="Registro Catastral">
                    <h5>Registro Catastral</h5>
                    <p>Realice el registro de propiedades y terrenos de manera segura y eficiente.</p>
                    <a href="#" class="btn btn-custom">Más información</a>
                </div>
            </div>
            <div class="col-md-4 filter-item" data-category="consulta">
                <div class="card p-3">
                    <img src="URL_DE_LA_IMAGEN_2" alt="Consulta de Propiedades">
                    <h5>Consulta de Propiedades</h5>
                    <p>Consulte la situación legal de cualquier propiedad en el municipio de La Paz.</p>
                    <a href="#" class="btn btn-custom">Más información</a>
                </div>
            </div>
            <div class="col-md-4 filter-item" data-category="permisos">
                <div class="card p-3">
                    <img src="URL_DE_LA_IMAGEN_3" alt="Permisos de Construcción">
                    <h5>Permisos de Construcción</h5>
                    <p>Solicite permisos de construcción para cualquier tipo de proyecto en La Paz.</p>
                    <a href="#" class="btn btn-custom">Más información</a>
                </div>
            </div>
            <div class="col-md-4 filter-item" data-category="registro">
                <div class="card p-3">
                    <img src="URL_DE_LA_IMAGEN_4" alt="Registro de Nueva Propiedad">
                    <h5>Registro de Nueva Propiedad</h5>
                    <p>Registre nuevas propiedades con el respaldo y seguridad del municipio de La Paz.</p>
                    <a href="#" class="btn btn-custom">Más información</a>
                </div>
            </div>
            <div class="col-md-4 filter-item" data-category="otros">
                <div class="card p-3">
                    <img src="URL_DE_LA_IMAGEN_5" alt="Solicitud de Información Pública">
                    <h5>Solicitud de Información Pública</h5>
                    <p>Acceda a información pública relevante a través de nuestro portal de transparencia.</p>
                    <a href="#" class="btn btn-custom">Más información</a>
                </div>
            </div>
            <div class="col-md-4 filter-item" data-category="otros">
                <div class="card p-3">
                    <img src="URL_DE_LA_IMAGEN_6" alt="Cambio de Titularidad">
                    <h5>Cambio de Titularidad</h5>
                    <p>Solicite el cambio de titularidad de su propiedad en el municipio de La Paz.</p>
                    <a href="#" class="btn btn-custom">Más información</a>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script>
        document.querySelectorAll('.btn-filter').forEach(function(button) {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                const tramites = document.querySelectorAll('.filter-item');

                tramites.forEach(function(tramite) {
                    if (filter === 'all' || tramite.getAttribute('data-category') === filter) {
                        tramite.style.display = 'block';
                    } else {
                        tramite.style.display = 'none';
                    }
                });
            });
        });

        document.getElementById('search').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const tramites = document.querySelectorAll('#tramites .filter-item');
            
            tramites.forEach(function(tramite) {
                const title = tramite.querySelector('h5').textContent.toLowerCase();
                const description = tramite.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    tramite.style.display = 'block';
                } else {
                    tramite.style.display = 'none';
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
