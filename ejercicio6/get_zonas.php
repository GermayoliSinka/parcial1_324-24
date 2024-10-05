<?php
include('conexion.php'); 

if (isset($_GET['id_distrito'])) {
    $id_distrito = $_GET['id_distrito'];

    
    $sql = "SELECT id_zona, nombre_zona FROM zona WHERE id_distrito = ?";
    $stmt = $mysqli->prepare($sql);
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . htmlspecialchars($mysqli->error));
    }

    $stmt->bind_param("i", $id_distrito); 
    $stmt->execute();
    $result = $stmt->get_result();

    $zonas = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $zonas[] = [
                'id_zona' => $row['id_zona'],
                'nombre_zona' => $row['nombre_zona']
            ];
        }
    } else {
        $zonas = []; 
    }

    header('Content-Type: application/json');
    echo json_encode($zonas);
} else {
    header('Content-Type: application/json');
    echo json_encode([]);
}
?>
