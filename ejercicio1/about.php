<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - HAM-LP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4f7; 
            color: #333333; 
        }
        .header-section {
            background-color: #778da9; 
            color: white;
            padding: 30px 0;
        }
        .section-card {
            background-color: #ffffff; /* Fondo blanco para las secciones */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
        }
        .section-card h2 {
            color: #fa8072; /* Títulos en color salmón */
        }
        .btn-custom {
            background-color: #fa8072; /* Color salmón */
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #e67361; /* Salmón más oscuro al hacer hover */
            color: white;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px;
        }
    </style>
</head>
<body>

    <header class="header-section text-center">
        <h1>Sobre el Área de Catastro</h1>
    </header>

    <main class="container mt-5">
        <!-- Primera sección centrada -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-card">
                    <h2>¿Quiénes Somos?</h2>
                    <p><strong>Autoridad Municipal:</strong> Alcalde Municipal Iván Arias Durán</p>
                    <a href="#" class="btn btn-custom">Ver más</a>
                </div>
            </div>
        </div>

        <!-- Segunda sección en dos columnas -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="section-card">
                    <h2>Misión Institucional</h2>
                    <p>Somos una institución pública municipal renovada, dinámica, transparente e incluyente, que brinda servicios públicos modernos, eficientes, ágiles y planificados, con concertación y participación ciudadana, impulsando una convivencia pacífica en búsqueda de una mejor calidad de vida de la población paceña por el Bien Común.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-card">
                    <h2>Visión Institucional</h2>
                    <p>Ser una institución pública modelo de gestión municipal democrática, participativa, transparente, eficiente, innovadora y tecnológica, que dinamiza la economía, el desarrollo social y territorial; consolidando una La Paz saludable, productiva, competitiva, biodiversa y resiliente, cultural, ordenada e interconectada, con diálogo y reconciliación por el Bien Común.</p>
                </div>
            </div>
        </div>

        <!-- Tercera sección centrada -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-card">
                    <h2>Programa de Gobierno</h2>
                    <p>Ejes y programas del Plan de Gobierno Municipal "La Paz en Paz y Moderna".</p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
