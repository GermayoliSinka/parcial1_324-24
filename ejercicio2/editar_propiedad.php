<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}

$cod_catastro = $_GET['id'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_zona = $_POST['id_zona'];
    $x_inicial = $_POST['x_inicial'];
    $y_inicial = $_POST['y_inicial'];
    $x_final = $_POST['x_final'];
    $y_final = $_POST['y_final'];
    $superficie = $_POST['superficie'];
    $ci_propietario = $_POST['ci_propietario'] ?? null;

    if (!$ci_propietario) {
        echo "<div class='alert alert-danger'>Error: El CI del propietario es obligatorio.</div>";
        exit();
    }

    $sql_usuario = "SELECT * FROM usuario WHERE ci='$ci_propietario'";
    $result_usuario = $conn->query($sql_usuario);

    if ($result_usuario->num_rows == 0) {
        echo "<div class='alert alert-danger'>Error: El CI del propietario no existe en la base de datos.</div>";
        exit();
    }

    $sql = "UPDATE propiedad SET id_zona='$id_zona', x_inicial='$x_inicial', y_inicial='$y_inicial', 
            x_final='$x_final', y_final='$y_final', superficie='$superficie', ci_propietario='$ci_propietario'
            WHERE cod_catastro='$cod_catastro'";

    if ($conn->query($sql) === TRUE) {
        header("Location: listar_propiedades.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

$sql = "SELECT * FROM propiedad WHERE cod_catastro='$cod_catastro'";
$result = $conn->query($sql);
$propiedad = $result->fetch_assoc();

if (!$propiedad) {
    echo "<div class='alert alert-warning'>Propiedad no encontrada.</div>";
    exit();
}

$sql_cis = "SELECT ci FROM usuario";
$result_cis = $conn->query($sql_cis);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Propiedad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Propiedad</h1>
        <form method="POST" action="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_zona">ID Zona</label>
                    <input type="text" class="form-control" name="id_zona" value="<?php echo $propiedad['id_zona']; ?>" required placeholder="ID Zona">
                </div>
                <div class="form-group col-md-6">
                    <label for="x_inicial">X Inicial</label>
                    <input type="number" class="form-control" name="x_inicial" value="<?php echo $propiedad['x_inicial']; ?>" required placeholder="X Inicial">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="y_inicial">Y Inicial</label>
                    <input type="number" class="form-control" name="y_inicial" value="<?php echo $propiedad['y_inicial']; ?>" required placeholder="Y Inicial">
                </div>
                <div class="form-group col-md-6">
                    <label for="x_final">X Final</label>
                    <input type="number" class="form-control" name="x_final" value="<?php echo $propiedad['x_final']; ?>" required placeholder="X Final">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="y_final">Y Final</label>
                    <input type="number" class="form-control" name="y_final" value="<?php echo $propiedad['y_final']; ?>" required placeholder="Y Final">
                </div>
                <div class="form-group col-md-6">
                    <label for="superficie">Superficie</label>
                    <input type="number" class="form-control" name="superficie" value="<?php echo $propiedad['superficie']; ?>" required placeholder="Superficie">
                </div>
            </div>

            <div class="form-group">
                <label for="ci_propietario">CI del Propietario</label>
                <select class="form-control" name="ci_propietario" required>
                    <?php
                    if ($result_cis->num_rows > 0) {
                        while($row = $result_cis->fetch_assoc()) {
                            $selected = ($row['ci'] == $propiedad['ci_propietario']) ? 'selected' : '';
                            echo "<option value='" . $row['ci'] . "' $selected>" . $row['ci'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay propietarios disponibles</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Propiedad</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
