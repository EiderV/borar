<?php
// Conexión a la base de datos
include '../../php/conexion_be.php';

// Consulta para obtener los horarios de la tabla calendario_riego
$sql = "SELECT id, fecha, hora, id_usuario FROM calendario_riego";
$result = $con->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
  // Array para almacenar los resultados
  $horarios = array();

  // Iterar sobre los resultados y agregar cada horario al array
  while($row = $result->fetch_assoc()) {
    $horarios[] = $row;
  }

  // Devolver los horarios como JSON
  echo json_encode($horarios);
} else {
  echo json_encode(array()); // Devolver un array vacío si no hay resultados
}

// Cerrar la conexión
$con->close();
