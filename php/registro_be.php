<?php
include 'conexion_be.php';

$nombre_usuario = $_POST['nombre_usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$query = " INSERT INTO  usuarios(nombre_usuario,correo,contrasena)
            VALUES('$nombre_usuario','$correo','$contrasena')";

#verificar correos y usuario
$ver_correo = mysqli_query($con,"SELECT * FROM usuarios WHERE correo ='$correo'");

if (mysqli_num_rows($ver_correo) > 0) {
    echo '
    <script>
      alert("Este correo ya esta registrado, intenta con otro");
      window.location= "../indexlogin.php";
    </script>';
    exit();
    # code...
}

$ver_nombre_usuario = mysqli_query($con,"SELECT * FROM usuarios WHERE nombre_usuario ='$nombre_usuario'");

if (mysqli_num_rows($ver_nombre_usuario)> 0) {

    echo'
    <script>
    alert("Este usuario ya esta registrado, intenta con otro");
    window.location= "../indexlogin.php";
  </script>
    ';
    exit();
    # code...
}

$ejec= mysqli_query($con,$query);

if ($ejec) {
    echo'
    <script>
    alert("usuario registrado con exito");
    window.location= "../indexlogin.php";
    </script>
    ';
    # code...
}