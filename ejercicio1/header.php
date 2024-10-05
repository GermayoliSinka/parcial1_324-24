<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAM-LP - Catastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .nav {
            background-color: transparent;
        }
        
        .nav-pills {
            border-radius: 5px;
            padding: 10px;
        }
        
        .nav-pills .nav-link {
            color: #000 !important;
            font-size: 18px;
            font-weight: 500;
            padding: 8px 20px;
            margin: 0;
            transition: all 0.3s ease;
            position: relative;
            background-color: transparent !important;
        }
        
        .nav-pills .nav-link:hover::after,
        .nav-pills .nav-link.active::after {
            content: '';
            display: block;
            width: 100%;
            height: 3px;
            background-color: #ffb700;
            position: absolute;
            bottom: 0;
            left: 0;
        }
        
        .nav-pills .nav-link:focus {
            box-shadow: none;
        }
    </style>
</head>
<body>
    <?php
        $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    
    <header class="d-flex flex-wrap justify-content-center py-3">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="index.php" class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>">Sobre Nosotros</a>
            </li>
            <li class="nav-item">
                <a href="services.php" class="nav-link <?php echo $current_page == 'services.php' ? 'active' : ''; ?>">Trámites y Servicios</a>
            </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">Contacto</a>
            </li>
        </ul>
    </header>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>