<?php
// Conexión a la base de datos
include '../../php/conexion_be.php';

// Consulta para obtener los IDs de los usuarios
$sql = "SELECT id FROM usuarios";
$result = $con->query($sql);

// Array para almacenar los IDs de los usuarios
$ids_usuarios = array();

// Verificar si hay resultados
if ($result->num_rows > 0) {
  // Iterar sobre los resultados y agregar cada ID al array
  while($row = $result->fetch_assoc()) {
    $ids_usuarios[] = $row['id'];
  }
}

// Devolver los IDs de los usuarios como JSON
echo json_encode($ids_usuarios);

// Cerrar la conexión
$con->close();

