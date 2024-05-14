<?php
// Conexión a la base de datos 
include '../../php/conexion_be.php';

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $id_usuario = $_POST['id_usuario'];

    // Preparar la consulta SQL para insertar el horario de riego
    $sql = "INSERT INTO calendario_riego (fecha, hora, id_usuario) VALUES ('$fecha', '$hora', '$id_usuario')";

    // Ejecutar la consulta
    if ($con->query($sql) === TRUE) {
        // Mostrar mensaje de alerta
        echo '<script>alert("Horario de riego agregado correctamente."); window.location.href="../agregar.html";</script>';
    } else {
        // Mostrar mensaje de error
        echo '<script>alert("Error al agregar el horario de riego: ' . $con->error . '"); window.location.href="../agregar.html";</script>';
    }

    // Cerrar la conexión
    $con->close();
}
?>

