<?php
$nombre = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo Personalizado</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #006d77;
        }
        .saludo {
            margin-top: 20px;
            font-size: 24px;
            color: #ff6f61;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="text"] {
            padding: 10px;
            border: 2px solid #006d77;
            border-radius: 5px;
            margin-top: 10px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #006d77;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #005f5f;
        }
    </style>
</head>
<body>
    <h1>Ingrese su Nombre</h1>
    <form method="post">
        <input type="text" name="nombre" placeholder="Escribe tu nombre" required>
        <button type="submit">Saludar</button>
    </form>

    <?php if ($nombre): ?>
        <div class="saludo">¡Hola, <?php echo $nombre; ?>!</div>
    <?php endif; ?>
</body>
</html>
