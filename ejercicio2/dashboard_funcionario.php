<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Funcionario</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex; 
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #003366;
            color: white;
            padding: 15px;
            position: fixed;
            overflow-y: auto;
        }
        .sidebar h2 {
            margin: 0;
            padding: 10px 0;
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px 15px;
            cursor: pointer;
            color: white;
            font-weight: normal;
            text-decoration: none;
            display: flex; 
            align-items: center; 
        }
        .sidebar ul li:hover {
            background-color: #00509e;
        }
        .sidebar ul li.active {
            background-color: #00509e; 
        }
        .sidebar ul li img {
            margin-right: 10px;
            width: 20px; 
            height: 20px; 
        }
        .main {
            margin-left: 270px; 
            padding: 20px;
            width: calc(100% - 270px); 
        }
        iframe {
            width: 100%;
            height: calc(100vh - 40px); 
            border: none; 
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Bienvenido, <?php echo $_SESSION['nombre']; ?></h2>
        <ul>
            <li class="active" onclick="loadContent('listar_usuarios.php')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                </svg> Usuarios
            </li>
            <li onclick="loadContent('listar_propiedades.php')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-gear-fill" viewBox="0 0 16 16">
                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708z"/>
                    <path d="M11.07 9.047a1.5 1.5 0 0 0-1.742.26l-.02.021a1.5 1.5 0 0 0-.261 1.742 1.5 1.5 0 0 0 0 2.86 1.5 1.5 0 0 0-.12 1.07H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6 4.724 4.724a1.5 1.5 0 0 0-1.654 1.03"/>
                    <path d="m13.158 9.608-.043-.148c-.181-.613-1.049-.613-1.23 0l-.043.148a.64.64 0 0 1-.921.382l-.136-.074c-.561-.306-1.175.308-.87.869l.075.136a.64.64 0 0 1-.382.92l-.148.045c-.613.18-.613 1.048 0 1.229l.148.043a.64.64 0 0 1 .382.921l-.074.136c-.306.561.308 1.175.869.87l.136-.075a.64.64 0 0 1 .92.382l.045.149c.18.612 1.048.612 1.229 0l.043-.15a.64.64 0 0 1 .921-.38l.136.074c.561.305 1.175-.309.87-.87l-.075-.136a.64.64 0 0 1 .382-.92l.149-.044c.612-.181.612-1.049 0-1.23l-.15-.043a.64.64 0 0 1-.38-.921l.074-.136c.305-.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 1-.92-.382ZM12.5 14a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                </svg> Propiedades
            </li>
            <li><a href="logout.php" style="color: white; text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg> Cerrar Sesión
            </a></li>
        </ul>
    </div>
    <div class="main">
        <h1>Panel de Funcionario</h1>
        <p>Aquí puedes gestionar usuarios y propiedades.</p>
        <iframe id="contentFrame" src="" style="display:none;"></iframe>
    </div>

    <script>
        function loadContent(page) {
            const iframe = document.getElementById('contentFrame');
            iframe.src = page; 
            iframe.style.display = 'block'; 
            document.querySelector('.main h1').style.display = 'none'; 
            document.querySelector('.main p').style.display = 'none'; 
            
            const menuItems = document.querySelectorAll('.sidebar ul li');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            const activeItem = Array.from(menuItems).find(item => item.innerText.includes(page === 'listar_usuarios.php' ? 'Usuarios' : 'Propiedades'));
            if (activeItem) {
                activeItem.classList.add('active'); 
            }
        }
    </script>
</body>
</html>
