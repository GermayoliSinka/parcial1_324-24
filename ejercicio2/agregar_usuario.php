<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $celular = $_POST['celular']; 
    $rol = $_POST['rol'];
    $id_zona = $_POST['id_zona']; 

    $sql = "INSERT INTO usuario (ci, nombre, paterno, materno, celular, email, password, rol, id_zona) VALUES ('$ci', '$nombre', '$paterno', '$materno', '$celular', '$email', '$password', '$rol', '$id_zona')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: listar_usuarios.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
        }
        .container {
            max-width: 800px;
            margin: 30px auto;
        }
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px; 
        }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Agregar Usuario</h1>
    <div class="container">
        <form method="POST" action="">
            <div class="form-row">
                <div class="col form-group">
                    <label for="ci">CI</label>
                    <input type="text" name="ci" placeholder="CI" required>
                </div>
                <div class="col form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="paterno">Apellido Paterno</label>
                    <input type="text" name="paterno" placeholder="Apellido Paterno" required>
                </div>
                <div class="col form-group">
                    <label for="materno">Apellido Materno</label>
                    <input type="text" name="materno" placeholder="Apellido Materno" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="col form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" placeholder="Celular" required>
                </div>
                <div class="col form-group">
                    <label for="rol">Rol</label>
                    <select name="rol" required>
                        <option value="funcionario">Funcionario</option>
                        <option value="usuario">Usuario</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="distrito">Distrito</label>
                    <select id="distrito" name="id_distrito" required>
                        <option value="">Selecciona un distrito</option>
                        <?php
                            $sql = "SELECT id_distrito, nombre FROM distrito";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id_distrito'] . "'>" . $row['nombre'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="zona">Zona</label>
                    <select id="zona" name="id_zona" required>
                        <option value="">Selecciona una zona</option>
                    </select>
                </div>
            </div>
            <button type="submit">Agregar Usuario</button>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        $("#distrito").change(function() {
            var idDistrito = $(this).val();

            if (idDistrito) {
                $.ajax({
                    url: 'get_zonas.php',
                    type: 'GET',
                    data: { id_distrito: idDistrito },
                    dataType: 'json',
                    success: function(data) {
                        $('#zona').empty().append('<option value="">Selecciona una zona</option>');

                        $.each(data, function(index, zona) {
                            $('#zona').append('<option value="' + zona.id_zona + '">' + zona.nombre_zona + '</option>');
                        });
                    },
                    error: function() {
                        alert('Error al cargar las zonas.'); 
                    }
                });
            } else {
                $('#zona').empty().append('<option value="">seleccione distrito</option>');
            }
        });
    });
    </script>
</body>
</html>
