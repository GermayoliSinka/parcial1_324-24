<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}

$ci = $_GET['ci'] ?? '';

if ($ci) {
    $sql = "DELETE FROM usuario WHERE ci='$ci'";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error: " . $conn->error;
    }
}

header("Location: listar_usuarios.php");
exit();
?>
