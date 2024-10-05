<?php
session_start();
include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE email='$email' AND password='$password'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['ci'] = $row['ci'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['rol'] = $row['rol'];

        if ($_SESSION['rol'] == 'funcionario') {
            header("Location: dashboard_funcionario.php");
        } elseif ($_SESSION['rol'] == 'usuario') {
            header("Location: dashboard_usuario.php");
        } else {
            echo "Rol de usuario no reconocido.";
        }
        exit();
    } else {
        echo "Email o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .container {
            display: flex;
            height: 80vh;
            width: 90%;
            max-width: 1200px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }
        .image-container {
            flex: 1;
            background-size: cover;
            background-position: center;
        }
        .login-container {
            flex: 1;
            background-color: #ffffff;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #003366;
        }
        .btn-custom {
            background-color: #003366;
            color: white;
            border-radius: 20px;
        }
        .form-group {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container"></div>
        <div class="login-container">
            <h1>Iniciar Sesión</h1>
            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" name="login" class="btn btn-custom btn-block">Iniciar Sesión</button>
                <div class="mt-3">
                    <a href="registrar_usuario.php" class="btn btn-custom btn-block">Registrar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
