<?php
$host = 'localhost'; 
$usuario = 'root';
$password = ''; 
$base_datos = 'BDGermayoli'; 

$mysqli = new mysqli($host, $usuario, $password, $base_datos);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
