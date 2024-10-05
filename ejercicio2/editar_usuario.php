<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}

$ci = $_GET['ci'] ?? '';

$sqlDistritos = "SELECT * FROM distrito";
$resultDistritos = $conn->query($sqlDistritos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $celular = $_POST['celular'];
    $id_zona = $_POST['id_zona'];

    $sql = "UPDATE usuario SET nombre='$nombre', paterno='$paterno', materno='$materno', email='$email', password='$password', rol='$rol', celular='$celular', id_zona='$id_zona' WHERE ci='$ci'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: listar_usuarios.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM usuario WHERE ci='$ci'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
        .form-row {
            margin-bottom: 15px;
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
        .description {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Editar Usuario</h1>
    <div class="container">
        <form method="POST" action="">
            <div class="form-row">
                <div class="col">
                    <label class="description">CI</label>
                    <input type="text" name="ci" value="<?php echo $user['ci']; ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label class="description">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $user['nombre']; ?>" placeholder="Nombre" required>
                </div>
                <div class="col">
                    <label class="description">Apellido Paterno</label>
                    <input type="text" name="paterno" value="<?php echo $user['paterno']; ?>" placeholder="Apellido Paterno" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label class="description">Apellido Materno</label>
                    <input type="text" name="materno" value="<?php echo $user['materno']; ?>" placeholder="Apellido Materno" required>
                </div>
                <div class="col">
                    <label class="description">Email</label>
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label class="description">Número de Celular</label>
                    <input type="text" name="celular" value="<?php echo $user['celular']; ?>" placeholder="Número de Celular" required>
                </div>
                <div class="col">
                    <label class="description">Contraseña</label>
                    <input type="password" name="password" value="<?php echo $user['password']; ?>" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label class="description">Rol</label>
                    <select name="rol" required>
                        <option value="funcionario" <?php echo ($user['rol'] == 'funcionario') ? 'selected' : ''; ?>>Funcionario</option>
                        <option value="usuario" <?php echo ($user['rol'] == 'usuario') ? 'selected' : ''; ?>>Usuario</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label class="description">Distrito</label>
                    <select name="id_distrito" id="distrito" required onchange="cargarZonas()">
                        <option value="">Seleccione Distrito</option>
                        <?php while ($distrito = $resultDistritos->fetch_assoc()): ?>
                            <option value="<?php echo $distrito['id_distrito']; ?>" <?php echo ($user['id_zona'] == $distrito['id_distrito']) ? 'selected' : ''; ?>>
                                <?php echo $distrito['nombre']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col">
                    <label class="description">Zona</label>
                    <select name="id_zona" id="zona" required>
                        <option value="">Seleccione Zona</option>
                    </select>
                </div>
            </div>
            <button type="submit">Actualizar Usuario</button>
        </form>
    </div>

    <script>
    function cargarZonas() {
        var distritoId = document.getElementById('distrito').value;
        var zonaSelect = document.getElementById('zona');

        zonaSelect.innerHTML = '<option value="">Seleccione Zona</option>';

        if (distritoId) {
            fetch('get_zonas.php?id_distrito=' + distritoId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(zona => {
                        var option = document.createElement('option');
                        option.value = zona.id_zona;
                        option.textContent = zona.nombre_zona;
                        zonaSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    }
    </script>
</body>
</html>
