<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}
$sql = "SELECT u.ci, u.nombre, u.paterno, u.materno, u.celular, u.email, u.rol, z.nombre_zona AS zona , d.nombre AS distrito
FROM usuario u 
LEFT JOIN zona z ON u.id_zona = z.id_zona
LEFT JOIN distrito d ON z.id_distrito = d.id_distrito
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        .table th, .table td {
            vertical-align: middle; 
        }
        .table thead th {
            background-color: #006d77;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #cce3de; 
        }
        .table tbody tr:nth-child(odd) {
            background-color: #ffffff; 
        }
        .btn-icon {
            border: none;
            background: none;
            padding: 0;
            cursor: pointer;
        }
        .btn-icon img {
            width: 20px; 
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <a href="agregar_usuario.php" class="btn btn-primary mb-3">Agregar Usuario</a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Paterno</th>
                    <th>Materno</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Distrito</th>
                    <th>Zona</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['ci']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['paterno']; ?></td>
                        <td><?php echo $row['materno']; ?></td>
                        <td><?php echo $row['celular']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['distrito']; ?></td>
                        <td><?php echo $row['zona']; ?></td>
                        <td>
                            <a class="btn-icon" href="editar_usuario.php?ci=<?php echo $row['ci']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" alt="Editar">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                            
                            <a class="btn-icon" href="eliminar_usuario.php?ci=<?php echo $row['ci']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
