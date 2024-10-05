<?php
session_start();
include('conexion.php');

$ci_propietario = isset($_GET['ci']) ? $_GET['ci'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod_catastro = $_POST['cod_catastro'];
    $id_zona = $_POST['id_zona'];
    $x_inicial = $_POST['x_inicial'];
    $y_inicial = $_POST['y_inicial'];
    $x_final = $_POST['x_final'];
    $y_final = $_POST['y_final'];
    $superficie = $_POST['superficie'];
    $ci_propietario = $_POST['ci_propietario'];

    $sql = "INSERT INTO propiedad (cod_catastro, id_zona, x_inicial, y_inicial, x_final, y_final, superficie, ci_propietario) 
            VALUES ('$cod_catastro', '$id_zona', '$x_inicial', '$y_inicial', '$x_final', '$y_final', '$superficie', '$ci_propietario')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: listar_propiedades.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql_distritos = "SELECT * FROM distrito";
$result_distritos = $conn->query($sql_distritos);

$sql_propietarios = "SELECT ci, nombre FROM usuario WHERE rol != 'funcionario'";
$result_propietarios = $conn->query($sql_propietarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Propiedad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </style>
    <script>
        function cargarZonas() {
            var distritoId = document.getElementById('distrito').value;
            var zonasSelect = document.getElementById('zona');

            zonasSelect.innerHTML = '<option value="">Seleccionar Zona</option>';

            if (distritoId) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_zonas.php?id_distrito=' + distritoId, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var zonas = JSON.parse(xhr.responseText);
                        zonas.forEach(function(zona) {
                            var option = document.createElement('option');
                            option.value = zona.id_zona;
                            option.textContent = zona.nombre_zona;
                            zonasSelect.appendChild(option);
                        });
                    }
                };
                xhr.send();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Agregar Propiedad</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" name="cod_catastro" placeholder="Código Catastro" required>
            </div>
            <div class="form-group">
                <select id="distrito" name="id_distrito" onchange="cargarZonas()" required>
                    <option value="">Seleccionar Distrito</option>
                    <?php while ($row = $result_distritos->fetch_assoc()): ?>
                        <option value="<?php echo $row['id_distrito']; ?>"><?php echo $row['nombre']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <select id="zona" name="id_zona" required>
                    <option value="">Seleccionar Zona</option>
                </select>
            </div>
            <div class="form-group">
                <input type="number" name="x_inicial" placeholder="X Inicial" step="0.000001" required>
            </div>
            <div class="form-group">
                <input type="number" name="y_inicial" placeholder="Y Inicial" step="0.000001" required>
            </div>
            <div class="form-group">
                <input type="number" name="x_final" placeholder="X Final" step="0.000001" required>
            </div>
            <div class="form-group">
                <input type="number" name="y_final" placeholder="Y Final" step="0.000001" required>
            </div>
            <div class="form-group">
                <input type="number" name="superficie" placeholder="Superficie" step="0.001" required>
            </div>
            <div class="form-group">
                <select name="ci_propietario" required>
                    <option value="">Seleccionar Propietario</option>
                    <?php while ($row = $result_propietarios->fetch_assoc()): ?>
                        <option value="<?php echo $row['ci']; ?>" <?php if ($row['ci'] == $ci_propietario) echo "selected"; ?>>
                            <?php echo $row['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit">Agregar Propiedad</button>
        </form>

        <?php
        if ($result_propietarios->num_rows == 0) {
            echo "<p>No se encontraron propietarios.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
