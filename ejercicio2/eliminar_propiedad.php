<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['ci'])) {
    header("Location: login.php");
    exit();
}

$cod_catastro = $_GET['id'] ?? '';

if ($cod_catastro) {
    $sql = "DELETE FROM propiedad WHERE cod_catastro='$cod_catastro'";
    if ($conn->query($sql) === TRUE) {
        header("Location: listar_propiedades.php?mensaje=eliminado");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: listar_propiedades.php?mensaje=error");
}
exit();
?>
