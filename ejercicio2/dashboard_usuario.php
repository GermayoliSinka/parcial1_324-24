<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}

$ci_usuario = $_SESSION['ci'];
$query = "
    SELECT 
        p.cod_catastro AS cod, 
        p.x_inicial AS x_inicial, 
        p.y_inicial AS y_inicial, 
        p.superficie AS superficie, 
        z.nombre_zona AS zona, 
        d.nombre AS distrito
    FROM propiedad p
    JOIN zona z ON p.id_zona = z.id_zona
    JOIN distrito d ON z.id_distrito = d.id_distrito
    WHERE 
        p.ci_propietario = '$ci_usuario'
";

$result = mysqli_query($conn, $query);
$propiedades = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Usuario</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #f4f4f4; 
            padding: 10px;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd; 
        }
        th, td {
            padding: 10px;
            text-align: left; 
        }
        th {
            background-color: #f2f2f2; 
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>
    </header>
    
    <h2>Panel de Usuario</h2>

    <table>
    <thead>
        <tr>
            <th>COD. Catrasto</th>
            <th>x inicial</th>
            <th>y inicial</th>
            <th>superficie</th>
            <th>zona</th>
            <th>Distrito</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($propiedades as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad['cod']; ?></td>
                <td><?php echo $propiedad['x_inicial']; ?></td>
                <td><?php echo $propiedad['y_inicial'];?></td>
                <td><?php echo $propiedad['superficie']; ?></td>
                <td><?php echo $propiedad['zona']; ?></td>
                <td><?php echo $propiedad['distrito']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>