<?php

session_start(); // Inicia la sesión

include 'conexion_be.php';

if(isset($_POST['nombre_usuario']) && isset($_POST['contrasena'])) {
    $usuario_login = $_POST['nombre_usuario'];
    $contrasena_login = $_POST['contrasena'];

    // Busca el usuario en la base de datos
    $query = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario_login' AND contrasena='$contrasena_login'";
    $resultado = mysqli_query($con, $query);

    if(mysqli_num_rows($resultado) == 1) { // Si se encuentra un usuario con esos datos
        // Inicia sesión y redirige al usuario a la página de inicio
        $_SESSION['nombre_usuario'] = $usuario_login;
        header('Location: ../admin/index_admin.html');
        exit();
    } else {
        // Si no se encuentra, muestra un mensaje de error
        echo '<script>alert("Usuario o contraseña incorrectos"); window.location= "../indexlogin.php";</script>';
    }
} else {
    echo "Datos de inicio de sesión no proporcionados";
}
