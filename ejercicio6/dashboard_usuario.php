<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}

$ci_usuario = $_SESSION['ci'];
$query = "SELECT * FROM propiedad WHERE ci_propietario = '$ci_usuario'";
$result = mysqli_query($mysqli, $query);
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
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo de Impuesto</th>
                <th>Cogcatastro</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['nombre']; ?></td>
                    <td>
                        <?php
                        $cogcatastro = $propiedad['cogcatastro'];
                        $tipo_impuesto = 'Bajo'; 
                        if (isset($cogcatastro) && is_numeric($cogcatastro)) {
                            $primer_digito = substr($cogcatastro, 0, 1);
                            if ($primer_digito == '2') {
                                $tipo_impuesto = 'Medio';
                            } elseif ($primer_digito == '3') {
                                $tipo_impuesto = 'Alto';
                            }
                        }
                        echo $tipo_impuesto;
                        ?>
                    </td>
                    <td><?php echo $cogcatastro; ?></td>
                    <td><?php echo $propiedad['direccion']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
